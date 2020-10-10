<?php
/**
 *　                  oooooooooooo
 *
 *                  ooooooooooooooooo
 *                       o
 *                      o
 *                     o        o
 *                    oooooooooooo
 *
 *         ～～         ～～         　　～～
 *       ~~　　　　　~~　　　　　　　　~~
 * ~~～~~～~~　　　~~~～~~～~~～　　　~~~～~~～~~～
 * ·······              ~~XYHCMS~~            ·······
 * ·······  闲看庭前花开花落 漫随天外云卷云舒 ·······
 * ·············     www.xyhcms.com     ·············
 * ··················································
 * ··················································
 *
 * @Author: gosea <gosea199@gmail.com>
 * @Date:   2014-06-21 10:00:00
 * @Last Modified by:   gosea
 * @Last Modified time: 2017-11-11 08:35:02
 */
namespace Api\Controller;

class UserController extends ApiCommonController {

	protected $app_secret; //申请应用时分配密钥

	protected $is_mobile; //手机访问--公共
	protected $user = [];//用户信息

	/**
	 * 初始化
	 */
	public function _initialize() {

		$this->app_secret = I('app_secret', '');
		$this->is_mobile = I('ismobile', 0, 'intval');

	}

	/*
		*   用户登录
	*/
	public function login() {
		$this->result['code'] = 0;
		if (!IS_POST) {
			$this->result['msg'] = '非法请求';
			$this->ajaxReturn($this->result);
		}

		$username = I('username', '', 'htmlspecialchars,trim');
		$phone_flag = 0; //邮箱为0，手机为1
		$password = I('password', '');

		if (empty($username)) {
			$this->result['msg'] = '请输入帐号！';
			$this->ajaxReturn($this->result);
		}

		if (!filter_var($username, FILTER_VALIDATE_EMAIL) && !check_phone($username)) {
			$this->result['msg'] = '账号必须为邮箱地址或手机号码！';
			$this->ajaxReturn($this->result);
		}

		if (check_phone($username)) {
			$phone_flag = 1;
		}

		if (strlen($password) < 4 || strlen($password) > 20) {
			$this->result['msg'] = '密码必须是4-20位的字符！';
			$this->ajaxReturn($this->result);
		}

		//检测IP黑白名单
		$ip = get_client_ip();
		$stop = check_ip($ip);
		if (!$stop['status']) {
			$this->result['msg'] = '登录失败，原因：' . $stop['info'];
			$this->ajaxReturn($this->result);
		}

		$where = array('email' => $username);
		if ($phone_flag) {
			$where = array('phone' => $username);
		}

		$user = M('member')->where($where)->find();

		if (!$user || ($user['password'] != get_password($password, $user['encrypt']))) {
			$this->result['msg'] = '账号或密码错误';
			$this->ajaxReturn($this->result);
		}

		if ($user['is_lock']) {
			$this->result['msg'] = '用户被锁定！';
			$this->ajaxReturn($this->result);
		}
		//更新数据库的参数
		$data = array('id' => $user['id'], //保存时会自动为此ID的更新
			'login_time' => date('Y-m-d H:i:s'),
			'login_ip' => get_client_ip(),
			'login_num' => $user['login_num'] + 1,

		);
		//更新数据库
		M('member')->save($data);

		$token = $this->createToken($user['id']);
		if (empty($token)) {
			$this->result['msg'] = '用户token生成失败，请重试';
			$this->ajaxReturn($this->result);
		}

		$where = array('member.id' => $user['id']);
		$userData = D('MemberView')->nofield('password,encrypt')->where($where)->find();
		$userData['token'] = $token;

		$this->result['code'] = 1;
		$this->result['data']['user'] = $userData;
		$this->ajaxReturn($this->result);

	}

	/*
		*   用户注册
	*/
	public function register() {

		$this->result['code'] = 0;
		if (!IS_POST) {
			$this->result['msg'] = '非法请求';
			$this->ajaxReturn($this->result);
		}

		$datas = I('post.', array());
		if (!empty($datas['email']) && !filter_var($datas['email'], FILTER_VALIDATE_EMAIL)) {
			$this->result['msg'] = '电子邮箱格式不正确！';
			$this->ajaxReturn($this->result);
		}
		if (!empty($datas['phone']) && !check_phone($datas['phone'])) {
			$this->result['msg'] = '手机号码格式不正确！';
			$this->ajaxReturn($this->result);
		}
		if (empty($datas['email']) && empty($datas['phone'])) {
			$this->result['msg'] = '手机、邮箱必须要填写一个！';
			$this->ajaxReturn($this->result);
		}
		if (empty($datas['nickname'])) {
			$this->result['msg'] = '昵称不能为空！';
			$this->ajaxReturn($this->result);
		}
		if (strlen($datas['password']) < 4 || strlen($datas['password']) > 20) {
			$this->result['msg'] = '密码必须是4-20位的字符！';
			$this->ajaxReturn($this->result);
		}
		if ($datas['password'] != $datas['rpassword']) {
			$this->result['msg'] = '两次密码不一致！';
			$this->ajaxReturn($this->result);
		}

		//检测IP黑白名单
		$ip = get_client_ip();
		$stop = check_ip($ip);
		if (!$stop['status']) {
			$this->result['msg'] = '注册失败，原因：' . $stop['info'];
			$this->ajaxReturn($this->result);
		}

		if (!empty($datas['email'])) {
			$ret = M('member')->where(array('email' => $datas['email']))->getField('id');
			if ($ret) {
				$this->result['msg'] = '邮箱已经存在！';
				$this->ajaxReturn($this->result);
			}
		}
		if (!empty($datas['phone'])) {
			$ret = M('member')->where(array('phone' => $datas['phone']))->getField('id');
			if ($ret) {
				$this->result['msg'] = '手机号码已经存在！';
				$this->ajaxReturn($this->result);
			}
		}

		$datas['nickname'] = trim($datas['nickname']);
		$notallowname = explode(',', C('CFG_MEMBER_NOTALLOW'));
		if (in_array($datas['nickname'], $notallowname)) {
			$this->result['msg'] = '此昵称系统禁用，请重新更换一个！';
			$this->ajaxReturn($this->result);
		}

		$data = array();

		//判断后台是否开始邮件验证
		$data['group_id'] = 2; //注册会员
		/*
	        $mGroup = M('membergroup')->Field('id')->find();
	        if ($mGroup) {
	        $data['group_id'] = $mGroup['id'];
	        }*/

		if (!empty($datas['email'])) {
			$data['email'] = $datas['email'];
		} else {
			$data['email'] = '';
		}
		if (!empty($datas['phone'])) {
			$data['phone'] = $datas['phone'];
		}

		$data['nickname'] = $datas['nickname'];
		//代替自动完成
		$data['reg_time'] = date('Y-m-d H:i:s');
		$passwordinfo = get_password($datas['password']);
		$data['password'] = $passwordinfo['password'];
		$data['encrypt'] = $passwordinfo['encrypt'];

		if ($id = M('member')->add($data)) {
			$this->result['code'] = 1;
			$this->result['msg'] = '注册会员成功';
			$this->ajaxReturn($this->result);
		} else {
			$this->result['code'] = 0;
			$this->result['msg'] = '注册会员失败';
			$this->ajaxReturn($this->result);
		}

	}

	/*
		*   用户登录
	*/
	public function person() {
		$this->result['code'] = 0;
		if (!IS_POST) {
			$this->result['msg'] = '非法请求';
			$this->ajaxReturn($this->result);
		}

		if (!$this->chkToken()) {
			$this->result['msg'] = 'token验证失败，请重新登录';
			$this->ajaxReturn($this->result);
		}

		if (empty($this->user['id'])) {
			$this->result['msg'] = '非法用户，请重新登录!';
			$this->ajaxReturn($this->result);
		}

		$data = array();
		$data['realname'] = I('realname', '', 'htmlspecialchars,trim');
		$data['birthday'] = I('birthday', '0000-00-00');
		$data['sex'] = I('sex', 0, 'intval');
		$data['address'] = I('address', '');
		$data['tel'] = I('tel', '');
		$data['mobile'] = I('mobile', '');
		$data['qq'] = I('qq', '');
		$data['maxim'] = I('maxim', '');
		$data['user_id'] = $this->user['id'];//I('user_id', 0, 'intval');
		$data['update_time'] = date('Y-m-d H:i:s');

		$userData = array();
		$userData['id'] = $this->user['id'];//$data['user_id'];
		$userData['nickname'] = I('nickname', '', 'htmlspecialchars,trim');

		if (empty($data['user_id'])) {
			$this->result['msg'] = '用户参数错误，请重新登录';
			$this->ajaxReturn($this->result);
		}
		if (empty($data['realname'])) {
			$this->result['msg'] = '姓名不能为空';
			$this->ajaxReturn($this->result);
		}

		if (empty($userData['nickname'])) {
			$this->result['msg'] = '昵称不能为空';
			$this->ajaxReturn($this->result);
		}

		//检测IP黑白名单
		$ip = get_client_ip();
		$stop = check_ip($ip);
		if (!$stop['status']) {
			$this->result['msg'] = '更新失败，原因：' . $stop['info'];
			$this->ajaxReturn($this->result);
		}

		$where = array('id' => $data['user_id']);
		$user = M('member')->where($where)->find();

		if (!$user) {
			$this->result['msg'] = '用户不存在';
			$this->ajaxReturn($this->result);
		}

		//更新数据库
		M('member')->save($userData);

		$ret = true;
		$_user_id = M('memberDetail')->field('user_id')->where(array('user_id' => $data['user_id']))->find();

		if (empty($_user_id)) {
			$ret = M('MemberDetail')->add($data);
		} else {
			$ret = M('MemberDetail')->save($data);
		}

		if ($ret === false) {
			$this->result['msg'] = '修改基本资料失败';
			$this->ajaxReturn($this->result);
		}

		//$encode = C('CFG_COOKIE_ENCODE'); //检测因子
		//$token = $user['id'] . '.' . md5(md5($user['id'] . $user['password']) . $encode);

		//$user['token'] = $token;

		$where = array('member.id' => $data['user_id']);
		$userData = D('MemberView')->nofield('password,encrypt')->where($where)->find();
		//$userData['token'] = $token;

		$this->result['code'] = 1;
		$this->result['data']['user'] = $userData;
		$this->result['msg'] = '修改基本资料成功';
		$this->ajaxReturn($this->result);

	}

	/*
		* 生成token
	*/
	protected function createToken($uid) {
		if (empty($uid)) {
			return null;
		}
		$where = array('id' => $uid);
		$user = M('member')->where($where)->find();

		if (!$user) {
			return null;
		}

		$encode = C('CFG_COOKIE_ENCODE'); //检测因子
		$token = $user['id'] . '.' . md5(md5($user['id'] . $user['password'] . $user['is_lock']) . $encode.microtime(true));

		//token应该保存到token数据库中，包含token过期时间，及刷新时间，常时间不用（刷新）则过期		

		//S(缓存名称,缓存值,缓存有效时间[秒]);
		S('token.'.$token, $token, 24 * 60 * 60 * 90);//90天--3个月

		return $token;

	}

	protected function chkToken() {
		$token = isset($_SERVER['HTTP_TOKEN']) ? htmlspecialchars($_SERVER['HTTP_TOKEN']) : '';

		if (empty($token)) {
			return false;
		}
		$token_arr = explode('.', $token);
		if (count($token_arr) !== 2) {
			return false;
		}
		//应该从token数据表里查询
		$_token = S('token.'.$token);

		if (!$_token) {
			return false;
		}

		if ($_token !== $token) {
			return false;
		}
		$where = array('id' => $token_arr[0]);
		$user = M('member')->where($where)->find();

		if (!$user) {
			return false;
		}
		if ($user['id'] != $token_arr[0]) {
			return false;
		}
		$this->user = $user;
		
		return true;

	}

}

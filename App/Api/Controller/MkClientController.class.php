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
 * @Last Modified time: 2017-11-25 09:34:46
 */
namespace Api\Controller;

class MkClientController extends ApiCommonController {

	protected $app_secret; //申请应用时分配密钥

	protected $client_user; //用户账号
	protected $client_token; //账号登录后返回给客户端授权码access_token

	protected $account = array(); //当前账号信息
	/**
	 * 初始化
	 */
	public function _initialize() {

		$this->app_secret = I('app_secret', '');
		$this->client_user = I('username', '');

	}

	/*
		*   检测账号及新版本及通知--需要第三方网站登录
	*/
	public function addArticle() {

		$this->result['code'] = 0;
		if (!IS_POST) {
			$this->result['msg'] = '请求失败';
			$this->ajaxReturn($this->result);
		}
		$ret = $this->chkAdminLogin();
		if (!$ret['code']) {
			$this->result['code'] = 0;
			$this->result['msg'] = $ret['msg'];
			$this->ajaxReturn($this->result);
		}

		$data = I('post.');
		$data['cid'] = I('cid', 0, 'intval');
		$data['title'] = I('title', '', 'htmlspecialchars,rtrim');
		$data['short_title'] = I('short_title', '', 'htmlspecialchars,rtrim');
		$data['keywords'] = trim($data['keywords']);
		$data['content'] = I('content', '', '');
		$publish_time = I('publish_time', 0, 'strtotime');
		$update_time = I('update_time', 0, 'strtotime');
		$data['click'] = I('click', 0, 'intval');
		$data['delete_status'] = I('delete_status', 0, 'intval'); //不兼容
		$data['aid'] = $this->uid;
		$data['content'] = preg_replace("@<script(.*?)</script>@is", '', $data['content']);

		//兼容老版XYHCMS3.2及以前版本
		if (empty($data['short_title'])) {
			$data['short_title'] = I('shorttitle', '', 'htmlspecialchars,rtrim');
		}
		if (empty($publish_time)) {
			$publish_time = I('publishtime', time(), 'strtotime');
		}
		if (empty($update_time)) {
			$update_time = I('updatetime', time(), 'strtotime');
		}
		//============

		$data['publish_time'] = date('Y-m-d H:i:s', $publish_time);
		$data['update_time'] = date('Y-m-d H:i:s', $update_time);

		$pid = intval($data['pid']);
		$flags = I('flags', array(), 'intval');
		$pic = ''; //$data['litpic'];

		if (empty($data['title'])) {
			$this->result['msg'] = '标题不能为空';
			$this->ajaxReturn($this->result);
		}
		if (!$data['cid']) {
			$this->result['msg'] = '请选择栏目';
			$this->ajaxReturn($this->result);
		}
		if (empty($data['description'])) {
			$data['description'] = str2sub(strip_tags($data['content']), 120);
		}

		$data['flag'] = 0;
		foreach ($flags as $v) {
			$data['flag'] += $v;
		}

		if (M('article')->where(array('title' => $data['title']))->find()) {
			$this->result['msg'] = '文章重复';
			$this->ajaxReturn($this->result);
		}

		//获取属于分类信息,得到model_id
		$selfCate = \Common\Lib\Category::getSelf(get_category(0), $data['cid']); //当前栏目信息
		$model_id = $selfCate['model_id'];

		if ($id = M('article')->add($data)) {

			$img_array = array();
			$reg = "/<img[^>]*src=\"((.+)\/(.+)\.(jpg|gif|bmp|png))\"/isU";
			preg_match_all($reg, $data['content'], $img_array, PREG_PATTERN_ORDER);
			// 匹配出来的不重复图片
			$img_array = array_unique($img_array[1]);

			if (!empty($img_array)) {
				$baseurl = get_url_path(get_cfg_value('CFG_UPLOAD_ROOTPATH'), true);
				$img_array = str_replace($baseurl, '', $img_array); //清除域名前缀

				$yun_upload = new \Common\Lib\YunUpload(1, '', 'fimg2016');
				$_GET['fimg2016'] = $img_array;
				$upload_result = $yun_upload->saveRemote();
				if (!empty($upload_result['data'])) {
					//获取成功
					$old_img_array = array();
					$new_img_array = array();
					foreach ($upload_result['data'] as $key => $val) {
						if ($key == 0) {
							$data['pic'] = $val['turl'];
						}
						$old_img_array[] = $val['source'];
						$new_img_array[] = $val['url'];
					}
					$data['content'] = str_replace($old_img_array, $new_img_array, $data['content']);

				}

				$first_pic = '';
				insert_att_index($data['content'], $first_pic, $id, $model_id);

				//更新缩略图
				$updata = array('id' => $id, 'litpic' => $firstpic, 'content' => $data['content']);
				if (empty($data['litpic']) && !empty($first_pic)) {
					if (!in_array(B_PIC, $flags)) {
						$updata['flag'] = array('exp', 'flag+' . B_PIC);
					}
				}
				M('article')->save($updata);

				//Tag
				update_tag_index($id, $data['cid'], $model_id, $data['keywords']);

				//SearchAll
				$data_search = array('arc_id' => $id, 'title' => $data['title'], 'litpic' => $data['litpic'], 'description' => $data['description'], 'jump_url' => $data['jump_url'], 'publish_time' => $data['publish_time'], 'cid' => $data['cid'], 'model_id' => $model_id, 'point' => $data['point'], 'delete_status' => $data['delete_status'], 'audit_status' => 1);
				//$data_search['jump_url'] = (($data['flag'] & B_JUMP) == B_JUMP) ? $data['jump_url'] : '';
				update_search_all($data_search);

			}

			//更新静态缓存---start
			$nav_cates = array();
			$nav_cates[] = $selfCate;
			//有父级
			if ($selfCate['pid']) {
				$nav_cates = Category::getParents(get_category(0), $selfCate['id']); //获取面包屑导航对应的栏目(多级栏目时使用)
			}

			foreach ($nav_cates as $val) {
				del_cache_html('List/index_' . $val['id'] . '_', false, 'list:index');
				del_cache_html('List/index_' . $val['ename'], false, 'list:index'); //还有只有名称
			}
			del_cache_html('Index_index', false, 'index:index');
			//更新静态缓存---end

			//Delete blog archive
			get_datelist($model_id, 2);

			$this->result['code'] = 1;
			$this->result['msg'] = '添加文章成功';
			$this->ajaxReturn($this->result);
		} else {
			$this->result['code'] = 0;
			$this->result['msg'] = '添加文章失败';
			$this->ajaxReturn($this->result);
		}
	}

	/**
	 * 添加留言
	 */
	public function addGuestbook() {

		$this->result['code'] = 0;
		if (!IS_POST) {
			$this->result['msg'] = '请求失败';
			$this->ajaxReturn($this->result);
		}

		$content = I('content', '');
		$data = I('post.');

		if (empty($data['username'])) {
			$this->result['msg'] = '姓名不能为空!';
			$this->ajaxReturn($this->result);
		}
		if (empty($data['content'])) {
			$this->result['msg'] = '留言内容不能为空!';
			$this->ajaxReturn($this->result);
		}
		if (check_badword($content)) {
			$this->result['msg'] = '留言内容包含非法信息，请认真填写!';
			$this->ajaxReturn($this->result);
		}
		if (isset($data['user_id'])) {
			unset($data['user_id']);
		}

		$data['post_time'] = date('Y-m-d H:i:s');
		$data['ip'] = get_client_ip();

		$stop = check_ip($data['ip']);
		if (!$stop['status']) {

			$this->result['msg'] = '留言失败，原因：' . $stop['info'];
			$this->ajaxReturn($this->result);
		}

		if ($id = M('guestbook')->add($data)) {
			$this->result['code'] = 1;
			$this->result['msg'] = '留言成功';
			$this->ajaxReturn($this->result);
		} else {
			$this->result['code'] = 0;
			$this->result['msg'] = '留言失败，请重试';
			$this->ajaxReturn($this->result);
		}
	}

	public function addReview() {

		$this->result['code'] = 0;
		if (!IS_POST) {
			$this->result['msg'] = '请求失败';
			$this->ajaxReturn($this->result);
		}
		//M验证
		$data = array();
		$data['post_id'] = I('post_id', 0, 'intval');
		$data['model_id'] = I('model_id', 0, 'intval');
		$data['pid'] = I('review_id', 0, 'intval'); //pid---review_id
		if (empty($data['pid'])) {
			$data['pid'] = I('pid', 0, 'intval');
		}
		$data['title'] = I('title', '');
		$data['content'] = I('content', '');
		$data['post_time'] = date('Y-m-d H:i:s');
		$data['user_id'] = I('user_id', 0, 'intval');
		$data['username'] = I('nickname', ''); //username---nickname
		if (empty($data['username'])) {
			$data['username'] = I('username', '游客');
		}
		if (empty($data['username'])) {
			$data['username'] = '游客';
		}
		$data['email'] = I('email', '', 'htmlspecialchars,trim');

		$data['ip'] = get_client_ip();
		$data['agent'] = htmlspecialchars($_SERVER['HTTP_USER_AGENT']);

		if (!empty($data['user_id'])) {
			$user = M('member')->where(array('id' => $data['user_id']))->find();
			if (!$user) {
				$data['user_id'] = 0;
				$data['email'] = '';
				$data['username'] = '游客';
			} else {
				$data['email'] = $user['email'];
				$data['username'] = $user['username'];
			}

		}

		if ($data['user_id'] == 0 && !C('CFG_FEEDBACK_GUEST')) {
			//允许匿名评论
			$this->result['msg'] = '请登录后评论';
			$this->ajaxReturn($this->result);
		}

		if (empty($data['post_id']) || empty($data['model_id'])) {
			$this->result['msg'] = '参数错误';
			$this->ajaxReturn($this->result);
		}

		if (empty($data['title'])) {
			$this->result['msg'] = '文章不正确，请刷新再评论';
			$this->ajaxReturn($this->result);
		}

		if (empty($data['content']) || mb_strlen($data['content'], 'utf-8') < 3) {
			$this->result['msg'] = '请填写评论内容，内容太短';
			$this->ajaxReturn($this->result);
		}

		if (check_badword($data['content'])) {
			$this->result['msg'] = '评论内容包含非法信息，请认真填写！';
			$this->ajaxReturn($this->result);
		}

		$stop = check_ip($data['ip']);
		if (!$stop['status']) {
			$this->result['msg'] = '评论失败，原因：' . $stop['info'];
			$this->ajaxReturn($this->result);
		}

		if ($id = M('comment')->add($data)) {
			$this->result['code'] = 1;
			$this->result['msg'] = '评论成功';
			$this->ajaxReturn($this->result);
		} else {
			$this->result['code'] = 0;
			$this->result['msg'] = '评论失败，原因：' . M('comment')->getError();
			$this->ajaxReturn($this->result);
		}

	}

	public function chkAdminLogin() {
		$result = array('code' => 0, 'msg' => '', 'data' => '');

		$username = I('username', '', 'htmlspecialchars,trim');
		$password = I('pss', '', 'base64_decode'); //md5的密码

		//安全验证
		$sign = I('sign', ''); //md5签名=md5(参数+软件的key)
		$sign_type = I('sign_type', 'md5');

		if (empty($username)) {
			$result['msg'] = '用户名不能为空';
			return $result;
		}

		if (strlen($password) != 32) {
			$result['msg'] = '密码不正确';
			return $result;
		}

		$ip = get_client_ip();
		$stop = check_ip($ip);
		if (!$stop['status']) {
			$result['msg'] = '登录失败，原因：' . $stop['info'];
			return $result;
		}

		$user = M('admin')->where(array('username' => $username))->find();
		if (!$user) {
			$result['msg'] = '您输入的账号不存在，请确认后输入';
			return $result;
		}
		if ($user['password'] != get_password_md5($password, $user['encrypt'])) {
			$result['msg'] = '您输入的密码不正确';
			return $result;
		}

		if ($user['is_lock']) {
			$result['msg'] = '用户被锁定!';
			return $result;
		}

		$this->uid = $user['id'];

		$result['code'] = 1;
		$result['msg'] = '登录成功';
		return $result;

	}
	

}

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
 * @Last Modified time: 2016-06-21 12:39:18
 */
namespace Home\Controller;

use Think\Controller;

class EmptyController extends Controller {

	public $result = array('code' => 0, 'msg' => '页面不存在', 'data' => array());

	public function _empty() {
		header("HTTP/1.1 404 Not Found");
		header("Status: 404 Not Found");
		$this->ajaxReturn($this->result);

	}

	public function index() {
		header("HTTP/1.1 404 Not Found");
		header("Status: 404 Not Found");
		$this->ajaxReturn($this->result);

	}
}

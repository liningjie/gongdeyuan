<?php if (!defined('THINK_PATH')) exit();?>﻿<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?php echo C('CFG_KEYWORDS');?>-<?php echo C('CFG_WEBNAME');?></title>
    <!--google fonts-->

	    <link href="https://fonts.googleapis.com/css?family=Roboto:100,300,400,500,700,900" rel="stylesheet">
    <!--favicon-->
    <link rel="icon" href="/Public/Home/default/assets/images/gongdeyuan.png">
    <!-- Lib & Custom Stylesheet Included -->
    <link rel="stylesheet" href="/Public/Home/default/assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="/Public/Home/default/assets/css/font-awesome.min.css">
    <link rel="stylesheet" href="/Public/Home/default/assets/css/fontello.css">
    <link rel="stylesheet" href="/Public/Home/default/assets/css/owl-carousel.min.css">
    <link rel="stylesheet" href="/Public/Home/default/assets/css/magnific.min.css">
    <link rel="stylesheet" href="/Public/Home/default/assets/css/animate.css">
    <link rel="stylesheet" href="/Public/Home/default/assets/source/jquery.fancybox.css" media="screen" />
    <link rel="stylesheet" href="/Public/Home/default/assets/css/style.css">
	<link rel="stylesheet" href="/Public/Home/default/assets/css/responsive.css">
	<link rel="stylesheet" href="/Public/Home/default/assets/css/respon.css">
	<link rel="stylesheet" href="/Public/Home/default/assets/css/jsmodern-4.1.4.min.css">
	<link rel="stylesheet" href="/Public/Home/default/assets/css/swiper-bundle.min.css">
</head>
<body>
  <body>
  <div class="main_menu_area">
    <div class="container-fluid">
      <div class="row">
        <div class="header_nav">
          <nav class="navbar navbar-default">
            <div class="logo_flex">
              <button type="button" class="navbar-toggle">
                <span class="icon-menu"
                  >导航<i class="fa fa-angle-down"></i
                ></span>
              </button>
              <a class="logo" href="<?php echo C('CFG_WEBURL');?>">
                <img src="/Public/Home/default/assets/images/logo.jpg" alt="logo" />
              </a>
            </div>
            <div class="navbar_flex responsive_menu">
              <div class="navbar-collapse">
                <ul class="nav navbar-nav">
                  <li>
                    <a href="/">首页</a
                    ><span
                      class="responsive_click_menu fa fa-angle-down"
                    ></span>
                  </li>
                  <?php
 $_typeid = intval('0'); if($_typeid == -1) $_typeid = I('cid', 0, 'intval'); $_navlist = get_category(1); if($_typeid == 0) { $_navlist = \Common\Lib\Category::toLayer($_navlist); }else { $_navlist = \Common\Lib\Category::toLayer($_navlist, 'child', $_typeid); } foreach($_navlist as $autoindex => $navlist): $navlist['url'] = get_url($navlist); ?><li>
                      <a href="<?php echo ($navlist["url"]); ?>"><?php echo ($navlist["name"]); ?></a>
                      <span
                        class="responsive_click_menu fa fa-angle-down"
                      ></span>
                    </li><?php endforeach;?>
                </ul>
              </div>
            </div>

            <div class="social_icon_flex">
              <div class="header-social-right">
                <span class="contact_us">
                  资讯热线<br />
                  <span>0510-88206258</span>
                </span>
              </div>
            </div>
          </nav>
        </div>
      </div>
    </div>
  </div>
</body>


	<!--start header Slider section -->
	<section class="header_slider_section">
        <div class="header_slider_area owl-carousel">
            <div class="header_slider_bg">
                <div class="container">
                    <div class="row">
                        <div class="col-md-7">
                            <div class="header_slide_text">
                               <!-- <p>源水取自翠屏山山涧四面原始森林薄盖的200米深基岩裂隙</p>-->
                                <h1>天生好水<bR>源自翠屏山天然水</h1>
									 
                                <a href="/index.php?s=/List/index/cid/13.html" class="btn-orange">查看更多</a>
                            </div><!--end .header_slide_text-->
                        </div><!--end .col-md-7-->
                    </div><!--end .row-->
                </div><!--end .container--> 
            </div><!--end .header_slider_bg-->
            <div class="header_slider_bg slider_bg_2">
                <div class="container">
                    <div class="row">
                        <div class="col-md-7">
                            <div class="header_slide_text">
                                <!--<p>全自动生产，无空气接触灌装生产，保障天然矿泉水的高品质</p>-->
                                <h1>品味来自<bR>大自然深处的味道</h1>
                                <a href="/index.php?s=/List/index/cid/13.html" class="btn-orange">查看更多</a>
                            </div><!--end .header_slide_text-->
                        </div><!--end .col-md-7-->
                    </div><!--end .row-->
                </div><!--end .container-->
            </div><!--end .header_slider_bg-->
				<div class="slider_bg_3 ">
                <div class="container">
                    <div class="row">
                        <div class="col-md-7">
                            <div class="header_slide_text">
                                <!--<p>全自动生产，无空气接触灌装生产，保障天然矿泉水的高品质</p>-->
                                <h1>天然纯净<bR>健康品质水中贵族</h1>
                                <a href="/index.php?s=/List/index/cid/13.html" class="btn-orange">查看更多</a>
                            </div><!--end .header_slide_text-->
                        </div><!--end .col-md-7-->
                    </div><!--end .row-->
                </div><!--end .container-->
            </div><!--end .header_slider_bg-->
            
        </div><!--end .header_slider_area-->
        <img class="header_slide_shape" src="/Public/Home/default/assets/images/header_slider_shape.png" alt="slider shape">
	</section><!--end .header_slider_section-->
	<!--end header Slider section -->

	<!--Start Slider Service section -->
	<section class="slider_service_area some_padding section_padding text-center xiugai">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<div class="hero-section-title tit">
						<h1>旗下产品</h1>
					</div><!--end .hero-section-title-->
				</div><!--end .col-md-12-->
			</div><!--end .row-->
			
			<div class="row">
				<div class="service_slider owl-carousel fimg">
					 <?php
 $_typeid = '13'; $_keyword = ''; if($_typeid == -1) $_typeid = I('cid', 0, 'intval'); $_table_name = ''; if (!empty($_typeid)) { $_typeid_arr = explode(',',$_typeid); $ids_arr = array(); foreach($_typeid_arr as $_typeid_key => $_typeid_val) { $_typeid_val = intval($_typeid_val); if (empty($_typeid_val)) { continue; } if (empty($_table_name)) { $_selfcate = \Common\Lib\Category::getSelf(get_category(10), $_typeid_val); $_table_name = strtolower($_selfcate['table_name']); } $_typeid_ids = \Common\Lib\Category::getChildsId(get_category(10), $_typeid_val, true); $ids_arr = array_merge($ids_arr,$_typeid_ids); } $ids_arr = array_unique($ids_arr); if ($_table_name == '') { $_table_name = 'article'; } $where = array($_table_name.'.delete_status' => 0, 'cate_status' => array('LT',2)); if (!empty($ids_arr)) { $where[$_table_name.'.cid'] = array('IN',$ids_arr); } }else { $_table_name = 'article'; $where = array($_table_name.'.delete_status' => 0, 'cate_status' => array('LT',2)); } if (0 > 0 && 0 > 0) { $where[$_table_name.'.point'] = array('between',array(0,0)); }else if (0 > 0) { $where[$_table_name.'.point'] = array('EGT', 0); }else if (0 > 0) { $where[$_table_name.'.point'] = array('ELT', 0); } if(0 == 1) { $where[$_table_name.'.audit_status'] = 0; } else if(0 == 2) { } else { $where[$_table_name.'.audit_status'] = 1; } if ($_keyword != '') { $where[$_table_name.'.title'] = array('like','%'.$_keyword.'%'); } if (0 > 0) { $where['_string'] = $_table_name.'.flag & 0 = 0 '; } if (!empty($_table_name) && $_table_name != 'page') { if (0 > 0) { $count = D2('ArcView',"$_table_name")->where($where)->count(); $ename = I('e', '', 'htmlspecialchars,trim'); if (!empty($ename) && C('URL_ROUTER_ON') == true) { $param['p'] = I('p', 1, 'intval'); $param_action = '/'.$ename; }else { $param = array(); $param_action = ''; } $thisPage = new \Common\Lib\Page($count, 0, $param, $param_action); $thisPage->rollPage = 5; $thisPage->setConfig('theme'," %FIRST% %UP_PAGE% %LINK_PAGE% %DOWN_PAGE% %END%"); $limit = $thisPage->firstRow. ',' .$thisPage->listRows; $page = $thisPage->show(); }else { $limit = "10"; } $_list = D2('ArcView',"$_table_name")->nofield('content,picture_urls')->where($where)->order("point DESC,id DESC")->limit($limit)->select(); if (empty($_list)) { $_list = array(); } }else { $_list = array(); } foreach($_list as $autoindex => $list): $_jumpflag = ($list['flag'] & B_JUMP) == B_JUMP? true : false; $list['url'] = get_content_url($list['id'], $list['cid'], $list['ename'], $_jumpflag, $list['jump_url']); if(0) $list['title'] = str2sub($list['title'], 0, 0); if(0) $list['description'] = str2sub($list['description'], 0, 0); if(isset($list['picture_urls'])) $list['picture_urls'] = get_picture_array($list['picture_urls']); ?><div class="slider_service_box box-width">
						<div class="slider_service_img ">
							<a href="<?php echo ($list["url"]); ?>"><img src="<?php echo ($list["litpic"]); ?>" alt="shape"></a>
						</div>
						<div class="slider_service_details">
							<a href="<?php echo ($list["url"]); ?>"><h2><?php echo ($list["title"]); ?></h2></a>
							<a class="btn-readmore" href="<?php echo ($list["url"]); ?>">查看更多</a>
						</div><!--end .slider_service_details-->
					</div><!--end .slider_service_box--><?php endforeach;?>
				</div><!--end .service_slider-->
				
			</div><!--end .row-->
			
		</div><!--end .container-->
	</section><!--end .slider_service_area-->
	<!--End Slider Service section -->

	<!--start about section -->
	<section class="about_area gray_bg bg1">
		<div class="container hisitem">
			<div class="row">
				<div class="about_flex">
					<div class="about_details" style="margin-top: -20px;">
						<div class="hero-section-title">
							
							<h4><?php echo C('CFG_WEBNAME');?></h4>
							<h1> <?php echo C('CFG_KEYWORDS');?></h1>
						</div><!--end .hero-section-title-->
						<p>
							无锡香逸矿泉饮料有限公司坐落于美丽富饶、风景秀丽的中国无锡锡东（翠屏山）旅游度假风景区。经香逸人多年勘察将水源地定位于西麓凤凰山生态景区的东南麓胶山主峰（海拔122.5米是天目山余脉东延的低山残丘。主要岩性为燕山期花岗岩）。源水取自翠屏山山坡，深层基岩裂隙水。经国家权威部分检测，此水源属偏硅酸型天然矿泉水无色、无味、透明、口感柔和、圆润，后味清冽、甘甜......
						</p>
						<?php
 $_typeid = intval('12'); $_level = "0"; $_category_all = get_category(0); if ($_level == 'parent') { $type = \Common\Lib\Category::getParent($_category_all, $_typeid, 1); } else if ($_level == 'top') { $type = \Common\Lib\Category::getParent($_category_all, $_typeid, 2); } else { $type = \Common\Lib\Category::getSelf($_category_all, $_typeid); } if (!empty($type)): $type['url'] = get_url($type); ?><a href="<?php echo ($type["url"]); ?>" class="btn-orange" style="padding: 10px 60px;">查看更多</a><?php endif;?>
					</div><!--end .about_details-->
					<div class="about_support ">
						<!-- <div id="video" >
							<video class="vd1" muted width="162%" height="100%" controls="controls" src="http://shipin.wxjoi.com/0290ee2ab8114d188d5f49f70a5e9ccd/a9dfb6148e13080e36278fb0c9c7311f-ld.mp4" id="videoShow"></video>
							
						</div> -->
						
					</div><!--end .about_support-->
				</div><!--end .about_flex-->
			</div><!--end .row-->
		</div><!--end .container-->
	</section><!--end .about_area-->
	<!--end about section -->



	<!--start why choose us section -->
	<section class="why_choose_us_area section_padding text-center content1" style="padding-top: 100px;">
		<div class="container">
			<div class="row" style="margin-top: -52px;">
				<div class="col-md-12">
					<div class="hero-section-title">
						<h1>源来自然 与你相伴</h1>
					</div><!--end .hero-section-title-->
				</div><!--end .col-md-12-->
			</div><!--end .row-->
			<div class="row">
				<div class="col-md-2 col-sm-6 col-xs-6">
					<div class="why_choose_us_details">
						<div style="margin-bottom: 40px;"><img src="/Public/Home/default/assets/images/in01.png" alt="blog img" style="width:58px; hight:55px;"></div>
						<p>无色无味</p>
					</div><!--end .why_choose_us_details-->
				</div><!--end .col-md-2-->
				<div class="col-md-2 col-sm-6 col-xs-6">
					<div class="why_choose_us_details">
						<div style="margin-bottom: 40px;"><img src="/Public/Home/default/assets/images/in02.png" alt="blog img" style="width:58px; hight:55px;"></div>
						<p>透明纯净</p>
					</div><!--end .why_choose_us_details-->
				</div><!--end .col-md-2-->
				<div class="col-md-2 col-sm-6 col-xs-6">
					<div class="why_choose_us_details">
						<div style="margin-bottom: 40px;"><img src="/Public/Home/default/assets/images/in03.png" alt="blog img" style="width:58px; hight:55px;"></div>
						<p>柔和圆润</p>
					</div><!--end .why_choose_us_details-->
				</div><!--end .col-md-2-->
				<div class="col-md-2 col-sm-6 col-xs-6">
					<div class="why_choose_us_details">
						<div style="margin-bottom: 40px;"><img src="/Public/Home/default/assets/images/in04.png" alt="blog img" style="width:58px; hight:55px;"></div>
						<p>20多种微量元素</p>
					</div><!--end .why_choose_us_details-->
				</div><!--end .col-md-2-->
				<div class="col-md-2 col-sm-6 col-xs-6">
					<div class="why_choose_us_details">
						<div style="margin-bottom: 40px;"><img src="/Public/Home/default/assets/images/in05.png" alt="blog img" style="width:58px; hight:55px;"></div>
						<p>天然弱碱性水</p>
					</div><!--end .why_choose_us_details-->
				</div><!--end .col-md-2-->
				<div class="col-md-2 col-sm-6 col-xs-6">
					<div class="why_choose_us_details">
						<div style="margin-bottom: 40px;"><img src="/Public/Home/default/assets/images/in06.png" alt="blog img" style="width:58px; hight:55px;"></div>
						<p>源于自然</p>
					</div><!--end .why_choose_us_details-->
				</div><!--end .col-md-2-->
            </div><!--end .row-->
        </div><!--end .container-->
	</section><!--end .why_choose_us_area-->
	<!--end why choose us section -->
<div class="container contenta">
	<div class="bannera" >
		<ul id="banner" class="">
			<?php
 $_typeid = '15'; $_keyword = ''; $_arcid = ""; if($_typeid == -1) $_typeid = I('cid', 0, 'intval'); $where = array('picture.delete_status' => 0,'cate_status' => array('LT',2)); if (!empty($_typeid)) { $_typeid_arr = explode(',',$_typeid); $ids_arr = array(); foreach($_typeid_arr as $_typeid_key => $_typeid_val) { $_typeid_val = intval($_typeid_val); if (empty($_typeid_val)) { continue; } $_typeid_ids = \Common\Lib\Category::getChildsId(get_category(10), $_typeid_val, true); $ids_arr = array_merge($ids_arr,$_typeid_ids); } $ids_arr = array_unique($ids_arr); if (!empty($ids_arr)) { $where['picture.cid'] = array('IN',$ids_arr); } } if (0 > 0 && 0 > 0) { $where['picture.point'] = array('between',array(0,0)); }else if (0 > 0) { $where['picture.point'] = array('EGT', 0); }else if (0 > 0) { $where['picture.point'] = array('ELT', 0); } if(0 == 1) { $where['picture.audit_status'] = 0; } else if(0 == 2) { } else { $where['picture.audit_status'] = 1; } if ($_keyword != '') { $where['picture.title'] = array('like','%'.$_keyword.'%'); } if (!empty($_arcid)) { $where['picture.id'] = array('IN', $_arcid); } if (0 > 0) { $where['_string'] = 'picture.flag & 0 = 0 '; } if (3 > 0) { $count = D2('ArcView','picture')->where($where)->count(); $ename = I('e', '', 'htmlspecialchars,trim'); if (!empty($ename) && C('URL_ROUTER_ON') == true) { $param['p'] = I('p', 1, 'intval'); $param_action = '/'.$ename; }else { $param = array(); $param_action = ''; } $thisPage = new \Common\Lib\Page($count, 3, $param, $param_action); $thisPage->rollPage = 5; $thisPage->setConfig('theme'," %FIRST% %UP_PAGE% %LINK_PAGE% %DOWN_PAGE% %END%"); $limit = $thisPage->firstRow. ',' .$thisPage->listRows; $page = $thisPage->show(); }else { $limit = "10"; } $_piclist = D2('ArcView','picture')->nofield('content,picture_urls')->where($where)->order("publish_time DESC")->limit($limit)->select(); if (empty($_piclist)) { $_piclist = array(); } foreach($_piclist as $autoindex => $piclist): $_jumpflag = ($piclist['flag'] & B_JUMP) == B_JUMP? true : false; $piclist['url'] = get_content_url($piclist['id'], $piclist['cid'], $piclist['ename'], $_jumpflag, $piclist['jump_url']); if(0) $piclist['title'] = str2sub($piclist['title'], 0, 0); if(0) $piclist['description'] = str2sub($piclist['description'], 0, 0); if(isset($piclist['picture_urls'])) $piclist['picture_urls'] = get_picture_array($piclist['picture_urls']); ?><li >
				 <img src="<?php echo ($piclist["litpic"]); ?>" alt="">
			</li><?php endforeach;?>
		
		</ul>
	
		<ul class="opc">
			<?php
 $_typeid = '15'; $_keyword = ''; $_arcid = ""; if($_typeid == -1) $_typeid = I('cid', 0, 'intval'); $where = array('picture.delete_status' => 0,'cate_status' => array('LT',2)); if (!empty($_typeid)) { $_typeid_arr = explode(',',$_typeid); $ids_arr = array(); foreach($_typeid_arr as $_typeid_key => $_typeid_val) { $_typeid_val = intval($_typeid_val); if (empty($_typeid_val)) { continue; } $_typeid_ids = \Common\Lib\Category::getChildsId(get_category(10), $_typeid_val, true); $ids_arr = array_merge($ids_arr,$_typeid_ids); } $ids_arr = array_unique($ids_arr); if (!empty($ids_arr)) { $where['picture.cid'] = array('IN',$ids_arr); } } if (0 > 0 && 0 > 0) { $where['picture.point'] = array('between',array(0,0)); }else if (0 > 0) { $where['picture.point'] = array('EGT', 0); }else if (0 > 0) { $where['picture.point'] = array('ELT', 0); } if(0 == 1) { $where['picture.audit_status'] = 0; } else if(0 == 2) { } else { $where['picture.audit_status'] = 1; } if ($_keyword != '') { $where['picture.title'] = array('like','%'.$_keyword.'%'); } if (!empty($_arcid)) { $where['picture.id'] = array('IN', $_arcid); } if (0 > 0) { $where['_string'] = 'picture.flag & 0 = 0 '; } if (3 > 0) { $count = D2('ArcView','picture')->where($where)->count(); $ename = I('e', '', 'htmlspecialchars,trim'); if (!empty($ename) && C('URL_ROUTER_ON') == true) { $param['p'] = I('p', 1, 'intval'); $param_action = '/'.$ename; }else { $param = array(); $param_action = ''; } $thisPage = new \Common\Lib\Page($count, 3, $param, $param_action); $thisPage->rollPage = 5; $thisPage->setConfig('theme'," %FIRST% %UP_PAGE% %LINK_PAGE% %DOWN_PAGE% %END%"); $limit = $thisPage->firstRow. ',' .$thisPage->listRows; $page = $thisPage->show(); }else { $limit = "10"; } $_piclist = D2('ArcView','picture')->nofield('content,picture_urls')->where($where)->order("publish_time ASC")->limit($limit)->select(); if (empty($_piclist)) { $_piclist = array(); } foreach($_piclist as $autoindex => $piclist): $_jumpflag = ($piclist['flag'] & B_JUMP) == B_JUMP? true : false; $piclist['url'] = get_content_url($piclist['id'], $piclist['cid'], $piclist['ename'], $_jumpflag, $piclist['jump_url']); if(0) $piclist['title'] = str2sub($piclist['title'], 0, 0); if(0) $piclist['description'] = str2sub($piclist['description'], 0, 0); if(isset($piclist['picture_urls'])) $piclist['picture_urls'] = get_picture_array($piclist['picture_urls']); ?><li >
				 <img src="<?php echo ($piclist["litpic"]); ?>" alt="">
			</li><?php endforeach;?>
		</ul>

	</div>
		
	<div class="iconlist">
		<ul id="list1">
			<li class="hoveractive"></li>
			<li></li>
			
		</ul>
	</div>

		<div class="swiper-container swiper1">
			<div class="swiper-wrapper">
				<?php
 $_typeid = '15'; $_keyword = ''; $_arcid = ""; if($_typeid == -1) $_typeid = I('cid', 0, 'intval'); $where = array('picture.delete_status' => 0,'cate_status' => array('LT',2)); if (!empty($_typeid)) { $_typeid_arr = explode(',',$_typeid); $ids_arr = array(); foreach($_typeid_arr as $_typeid_key => $_typeid_val) { $_typeid_val = intval($_typeid_val); if (empty($_typeid_val)) { continue; } $_typeid_ids = \Common\Lib\Category::getChildsId(get_category(10), $_typeid_val, true); $ids_arr = array_merge($ids_arr,$_typeid_ids); } $ids_arr = array_unique($ids_arr); if (!empty($ids_arr)) { $where['picture.cid'] = array('IN',$ids_arr); } } if (0 > 0 && 0 > 0) { $where['picture.point'] = array('between',array(0,0)); }else if (0 > 0) { $where['picture.point'] = array('EGT', 0); }else if (0 > 0) { $where['picture.point'] = array('ELT', 0); } if(0 == 1) { $where['picture.audit_status'] = 0; } else if(0 == 2) { } else { $where['picture.audit_status'] = 1; } if ($_keyword != '') { $where['picture.title'] = array('like','%'.$_keyword.'%'); } if (!empty($_arcid)) { $where['picture.id'] = array('IN', $_arcid); } if (0 > 0) { $where['_string'] = 'picture.flag & 0 = 0 '; } if (0 > 0) { $count = D2('ArcView','picture')->where($where)->count(); $ename = I('e', '', 'htmlspecialchars,trim'); if (!empty($ename) && C('URL_ROUTER_ON') == true) { $param['p'] = I('p', 1, 'intval'); $param_action = '/'.$ename; }else { $param = array(); $param_action = ''; } $thisPage = new \Common\Lib\Page($count, 0, $param, $param_action); $thisPage->rollPage = 5; $thisPage->setConfig('theme'," %FIRST% %UP_PAGE% %LINK_PAGE% %DOWN_PAGE% %END%"); $limit = $thisPage->firstRow. ',' .$thisPage->listRows; $page = $thisPage->show(); }else { $limit = "10"; } $_piclist = D2('ArcView','picture')->nofield('content,picture_urls')->where($where)->order("point DESC,id DESC")->limit($limit)->select(); if (empty($_piclist)) { $_piclist = array(); } foreach($_piclist as $autoindex => $piclist): $_jumpflag = ($piclist['flag'] & B_JUMP) == B_JUMP? true : false; $piclist['url'] = get_content_url($piclist['id'], $piclist['cid'], $piclist['ename'], $_jumpflag, $piclist['jump_url']); if(0) $piclist['title'] = str2sub($piclist['title'], 0, 0); if(0) $piclist['description'] = str2sub($piclist['description'], 0, 0); if(isset($piclist['picture_urls'])) $piclist['picture_urls'] = get_picture_array($piclist['picture_urls']); ?><div class="swiper-slide"><img src="<?php echo ($piclist["litpic"]); ?>" alt=""></div><?php endforeach;?>
			</div>
			<div class="swiper-pagination"></div>
		  </div>

		</div>

	<!--start blog section -->
	<section class="latest_blog_area section_padding gray_bg indxbottom" style="padding-top: 60px;">
		<div class="container newstitle">
			<div class="row">
				<div class="col-md-12">
					<div class="hero-section-title" style="text-align: center;">
					    <h1>新闻中心</h1>
					</div><!--end .hero-section-title-->
				</div><!--end .col-md-12-->
			</div><!--end .row-->
			<div class="row">
				  <?php
 $_typeid = $cid; $_keyword = ''; if($_typeid == -1) $_typeid = I('cid', 0, 'intval'); $_table_name = ''; if (!empty($_typeid)) { $_typeid_arr = explode(',',$_typeid); $ids_arr = array(); foreach($_typeid_arr as $_typeid_key => $_typeid_val) { $_typeid_val = intval($_typeid_val); if (empty($_typeid_val)) { continue; } if (empty($_table_name)) { $_selfcate = \Common\Lib\Category::getSelf(get_category(10), $_typeid_val); $_table_name = strtolower($_selfcate['table_name']); } $_typeid_ids = \Common\Lib\Category::getChildsId(get_category(10), $_typeid_val, true); $ids_arr = array_merge($ids_arr,$_typeid_ids); } $ids_arr = array_unique($ids_arr); if ($_table_name == '') { $_table_name = 'article'; } $where = array($_table_name.'.delete_status' => 0, 'cate_status' => array('LT',2)); if (!empty($ids_arr)) { $where[$_table_name.'.cid'] = array('IN',$ids_arr); } }else { $_table_name = 'article'; $where = array($_table_name.'.delete_status' => 0, 'cate_status' => array('LT',2)); } if (0 > 0 && 0 > 0) { $where[$_table_name.'.point'] = array('between',array(0,0)); }else if (0 > 0) { $where[$_table_name.'.point'] = array('EGT', 0); }else if (0 > 0) { $where[$_table_name.'.point'] = array('ELT', 0); } if(0 == 1) { $where[$_table_name.'.audit_status'] = 0; } else if(0 == 2) { } else { $where[$_table_name.'.audit_status'] = 1; } if ($_keyword != '') { $where[$_table_name.'.title'] = array('like','%'.$_keyword.'%'); } if (0 > 0) { $where['_string'] = $_table_name.'.flag & 0 = 0 '; } if (!empty($_table_name) && $_table_name != 'page') { if (3 > 0) { $count = D2('ArcView',"$_table_name")->where($where)->count(); $ename = I('e', '', 'htmlspecialchars,trim'); if (!empty($ename) && C('URL_ROUTER_ON') == true) { $param['p'] = I('p', 1, 'intval'); $param_action = '/'.$ename; }else { $param = array(); $param_action = ''; } $thisPage = new \Common\Lib\Page($count, 3, $param, $param_action); $thisPage->rollPage = 5; $thisPage->setConfig('theme'," %FIRST% %UP_PAGE% %LINK_PAGE% %DOWN_PAGE% %END%"); $limit = $thisPage->firstRow. ',' .$thisPage->listRows; $page = $thisPage->show(); }else { $limit = "10"; } $_list = D2('ArcView',"$_table_name")->nofield('content,picture_urls')->where($where)->order("point DESC,id DESC")->limit($limit)->select(); if (empty($_list)) { $_list = array(); } }else { $_list = array(); } foreach($_list as $autoindex => $list): $_jumpflag = ($list['flag'] & B_JUMP) == B_JUMP? true : false; $list['url'] = get_content_url($list['id'], $list['cid'], $list['ename'], $_jumpflag, $list['jump_url']); if(0) $list['title'] = str2sub($list['title'], 0, 0); if(0) $list['description'] = str2sub($list['description'], 0, 0); if(isset($list['picture_urls'])) $list['picture_urls'] = get_picture_array($list['picture_urls']); ?><div class="col-md-4 col-sm-6">
                    <div class="latest_share_blog_box mb_40">
                        <div class="latest_share_img_box">
                            <a href="<?php echo ($list["url"]); ?>">
                                <img src="<?php echo ($list["litpic"]); ?>" alt="blog image">
                            </a>
                            <span class="blog_date"><?php echo substr($list['publish_time'],0,10);?></span>
                        </div><!--end .latest_share_img_box-->

                        <a href="<?php echo ($list["url"]); ?>"><h1><?php echo ($list["title"]); ?></h1></a>
                        <p><?php echo ($list["short_title"]); ?></p>
                    </div><!--end .latest_share_blog_box-->

                </div><!--end .col-md-4--><?php endforeach;?>
            </div><!--end .row-->
        </div><!--end .container-->
	</section><!--end .latest_blog_area-->
	<!--end blog section -->

	<!--start contact section -->
	
	<!--end contact section -->




	<!-- Ajax Included -->
	<script src="/Public/Home/default/assets/js/jquery-3.5.1.min.js"></script>
	<script src="/Public/Home/default/assets/js/main.js"></script>
	<script src="/Public/Home/default/assets/js/jquery.min.js"></script>
    <script src="/Public/Home/default/assets/source/jquery.fancybox.pack.js"></script>
	<script src="/Public/Home/default/assets/js/bootstrap.min.js"></script>
	<script src="/Public/Home/default/assets/js/owl.carousel.min.js"></script>
    <script src="/Public/Home/default/assets/js/waypoint.js"></script>
    <script src="/Public/Home/default/assets/js/jquery.counter.min.js"></script>
	<script src="/Public/Home/default/assets/js/magnific.min.js"></script>
	<script src="/Public/Home/default/assets/js/custom.js"></script>
	<script src="/Public/Home/default/assets/js/jsmodern-4.1.4.min.js"></script>
	<script src="/Public/Home/default/assets/js/swiper-bundle.min.js"></script>
	

<!-- swiper -->
<!--start footer section -->
<footer class="footer_section section_padding">
  <img
    src="/Public/Home/default/assets/images/shape/test_footer_shape.png"
    alt="Footer shape"
    class="footer_shape"
  />
  <div class="container">
    <div class="row">
      <div class="col-md-6 col-sm-6">
        <div class="footer_box">
          <p>
            经国家权威部分检测，此水源属偏硅酸型天然矿泉水无色、无味、透明、口感柔和、圆润，后味清冽、甘甜，蕴含丰富人体所需的微量元素，pH值为7.32-8.0，天然弱碱性水。功德源整个生产线均引进先进的生产设备，全自动生产，无菌灌装生产，保持天然泉水的原有品质。
          </p>
        </div>
        <!--end .footer_box-->
      </div>
      <!--end .col-md-4-->
      <div class="col-md-3 col-sm-3">
        <div class="footer_box">
          <h3>快捷入口</h3>
          <ul>
            <?php
 $_typeid = intval('0'); if($_typeid == -1) $_typeid = I('cid', 0, 'intval'); $_navlist = get_category(1); if($_typeid == 0) { $_navlist = \Common\Lib\Category::toLayer($_navlist); }else { $_navlist = \Common\Lib\Category::toLayer($_navlist, 'child', $_typeid); } foreach($_navlist as $autoindex => $navlist): $navlist['url'] = get_url($navlist); ?><li>
                <a href="<?php echo ($navlist["url"]); ?>"><?php echo ($navlist["name"]); ?></a>
              </li><?php endforeach;?>
          </ul>
        </div>
        <!--end .footer_box-->
      </div>
      <!--end .col-md-4-->

      <div class="col-md-3 col-sm-3">
        <div class="footer_box">
          <h3>联系我们</h3>
          <p><?php echo C('CFG_ADDRESS');?></p>
          <span class="support_email"
            ><i class="fa fa-envelope"></i>
            <a href="mailto:layerdrops@gmail.com">联系人：王先生</a></span
          >
          <span class="support_num"
            ><i class="fa fa-phone-square"></i>
            <a href="">招商热线：<?php echo C('CFG_PHONE');?></a
          ></span>
        </div>
        <!--end .footer_box-->
      </div>
      <!--end .col-md-4-->
    </div>
    <!--end .row-->
  </div>
  <!--end .container-->

  <!-- copyright section -->
  <div class="copyright_area">
    <div class="container">
      <div class="row">
        <div class="col-md-12 col-sm-12">
          <p>
            &copy; <?php echo C('CFG_WEBNAME');?> © 2020 版权所有
            <a href="https://beian.miit.gov.cn/"><?php echo C('CFG_BEIAN');?></a>
            技术支持-君亿视觉
          </p>
        </div>

        <span style="text-align: center">
          友情链接：<?php
 $_type = intval('-1'); if ($_type == 0) { $where = array('is_check'=> 0); }else if ($_type == 1) { $where = array('is_check'=> 1); } else { $where = array('id' => array('gt',0)); } if (0 > 0) { $count = M('link')->where($where)->count(); $thisPage = new \Common\Lib\Page($count, 0); $thisPage->rollPage = 5; $thisPage->setConfig('theme'," %FIRST% %UP_PAGE% %LINK_PAGE% %DOWN_PAGE% %END%"); $limit = $thisPage->firstRow. ',' .$thisPage->listRows; $page = $thisPage->show(); }else { $limit = "10"; } $_flink = M('link')->where($where)->order("sort ASC")->limit($limit)->select(); if (empty($_flink)) { $_flink = array(); } foreach($_flink as $autoindex => $flink): ?><a href="<?php echo ($flink["url"]); ?>"><?php echo ($flink["name"]); ?></a>&nbsp<?php endforeach;?>
        </span>
      </div>
      <!--end .row-->
    </div>
    <!--end .container-->
  </div>
  <!--end .copyright_area-->
</footer>
<!--end .footer_section-->
<!--end footer section -->

<!-- Ajax Included -->


<script>
			var swiper = new Swiper('.swiper-container', {
  pagination: {
	el: '.swiper-pagination',
  },
});

	</script>
	
</body>
</html>
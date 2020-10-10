<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title><?php echo ($title); ?>-<?php echo C('CFG_WEBNAME');?></title>
    <!--google fonts-->
    <link
      href="https://fonts.googleapis.com/css?family=Roboto:100,300,400,500,700,900"
      rel="stylesheet"
    />
    <!--favicon-->
    <link rel="icon" href="/Public/Home/default/assets/images/gongdeyuan.png" />
    <!-- Lib & Custom Stylesheet Included -->
    <link rel="stylesheet" href="/Public/Home/default/assets/css/bootstrap.min.css" />
    <link rel="stylesheet" href="/Public/Home/default/assets/css/font-awesome.min.css" />
    <link rel="stylesheet" href="/Public/Home/default/assets/css/fontello.css" />
    <link rel="stylesheet" href="/Public/Home/default/assets/css/owl-carousel.min.css" />
    <link rel="stylesheet" href="/Public/Home/default/assets/css/magnific.min.css" />
    <link rel="stylesheet" href="/Public/Home/default/assets/css/animate.css" />
    <link
      rel="stylesheet"
      type="text/css"
      href="/Public/Home/default/assets/source/jquery.fancybox.css"
      media="screen"
    />
    <link rel="stylesheet" href="/Public/Home/default/assets/css/style.css" />
    <link rel="stylesheet" href="/Public/Home/default/assets/css/responsive.css" />
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


    <!--Start Breadcrumb Section -->
    <section class="breadcrumb_area text-center section_padding newkv">
      <?php
 $_typeid = intval('4'); if($_typeid == -1) $_typeid = I('cid', 0, 'intval'); $_navlist = get_category(1); if($_typeid == 0) { $_navlist = \Common\Lib\Category::toLayer($_navlist); }else { $_navlist = \Common\Lib\Category::toLayer($_navlist, 'child', $_typeid); } foreach($_navlist as $autoindex => $navlist): $navlist['url'] = get_url($navlist); ?><h1><?php echo ($navlist["name"]); ?></h1><?php endforeach;?>
      <img
        class="header_slide_shape"
        src="/Public/Home/default/assets/images/header_slider_shape.png"
        alt="shape"
      />
    </section>
    <!--end .breadcrumb_area-->
    <!--End Breadcrumb Section -->

    <!--Start Blog details Section -->
    <section class="blog_details_area section_padding newstop">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="blog_details_left">
              <div class="blog_left_box">
                <div class="blog_share_details">
                  <h1 style="text-align: center"><?php echo ($content["title"]); ?></h1>
                  <p style="text-align: center; margin: 10px 0">
                    <span
                      >发布时间：<?php echo ($content["publish_time"]); ?>
                      点击次数：<?php echo ($content["click"]); ?>次</span
                    >
                  </p>
                  <div><?php echo ($content["content"]); ?></div>
                </div>
                <!--end blog-share-details-->
                上一篇：<?php
 if(empty($content['id']) || empty($content['cid']) || empty($cate['table_name']) ) { echo 'Parameter error'; } else { $_vo= D2('ArcView', $cate['table_name'])->where(array($cate['table_name'].'.delete_status' => 0, 'cid' => $content['cid'], 'id' => array('lt',$content['id'])))->order('id desc')->find(); if ($_vo) { $_jumpflag = ($_vo['flag'] & B_JUMP) == B_JUMP? true : false; $_vo['url'] = get_content_url($_vo['id'], $_vo['cid'], $_vo['ename'], $_jumpflag, $_vo['jump_url']); if(0) $_vo['title'] = str2sub($_vo['title'], 0, 0); echo '<a href="'. $_vo['url'] .'">'. $_vo['title'] .'</a>'; } else { echo ""; } } ?><br />
                下一篇：<?php
 if(empty($content['id']) || empty($content['cid']) || empty($cate['table_name']) ) { echo 'Parameter error'; } else { $_vo= D2('ArcView',$cate['table_name'])->where(array($cate['table_name'].'.delete_status' => 0, 'cid' => $content['cid'], 'id' => array('gt',$content['id'])))->order('id ASC')->find(); if ($_vo) { $_jumpflag = ($_vo['flag'] & B_JUMP) == B_JUMP? true : false; $_vo['url'] = get_content_url($_vo['id'], $_vo['cid'], $_vo['ename'], $_jumpflag, $_vo['jump_url']); if(0) $_vo['title'] = str2sub($_vo['title'], 0, 0); echo '<a href="'. $_vo['url'] .'">'. $_vo['title'] .'</a>'; } else { echo ""; } } ?>
              </div>
              <!--end blog-left-box-->
            </div>
            <!--end blog-details-left-->
          </div>
          <!--end col-md-8-->
        </div>
        <!--end .row-->
      </div>
      <!--end .container-->
    </section>
    <!--end .blog_details_area-->
    <!--End Blog details Section -->

    <!-- Ajax Included -->
    <script src="/Public/Home/default/assets/js/jquery.min.js"></script>
    <script src="/Public/Home/default/assets/source/jquery.fancybox.pack.js"></script>
    <script src="/Public/Home/default/assets/js/bootstrap.min.js"></script>
    <script src="/Public/Home/default/assets/js/waypoint.js"></script>
    <script src="/Public/Home/default/assets/js/jquery.counter.min.js"></script>
    <script src="/Public/Home/default/assets/js/owl.carousel.min.js"></script>
    <script src="/Public/Home/default/assets/js/waypoint.js"></script>
    <script src="/Public/Home/default/assets/js/jquery.counter.min.js"></script>
    <script src="/Public/Home/default/assets/js/magnific.min.js"></script>
    <script src="/Public/Home/default/assets/js/custom.js"></script>
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

  </body>
</html>
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
    <link
      rel="stylesheet"
      href="/Public/Home/default/assets/css/jsmodern-4.1.4.min.css"
    />
    <link rel="stylesheet" href="/Public/Home/default/assets/css/respon.css" />
    <link rel="stylesheet" href="/Public/Home/default/assets/css/swiper-bundle.min.css" />
    <style>
      .container-fluid1 {
        padding: 3% 0px 8% 0px !important;

        background-color: #f1f1f1;
      }
      .picc {
        background-color: #f1f1f1;
        width: 100%;
      }
      .picc div {
        margin-top: 3%;
      }
      .swiper-slide {
        padding-left: 0;
        padding-right: 0;
      }
    </style>
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
    <section class="breadcrumb_area text-center section_padding abkv">
      <?php
 $_typeid = intval('12'); if($_typeid == -1) $_typeid = I('cid', 0, 'intval'); $_navlist = get_category(1); if($_typeid == 0) { $_navlist = \Common\Lib\Category::toLayer($_navlist); }else { $_navlist = \Common\Lib\Category::toLayer($_navlist, 'child', $_typeid); } foreach($_navlist as $autoindex => $navlist): $navlist['url'] = get_url($navlist); ?><h1><?php echo ($navlist["name"]); ?></h1><?php endforeach;?>
      <img
        class="header_slide_shape"
        src="/Public/Home/default/assets/images/header_slider_shape.png"
        alt="Shape Image"
      />
    </section>
    <!--end .breadcrumb_area-->
    <!--End Breadcrumb Section -->

    <!--start our repair section -->
    <section
      class="about_repair_style_2 repair_area section_padding xiugaiabout"
    >
      <div class="container">
        <div class="row">
          <div class="col-md-6">
            <div class="repair_details">
              <div class="hero-section-title">
                <h1>功德源</h1>
              </div>
              <!--end .hero-section-title-->
              <p>
                无锡香逸矿泉饮料有限公司坐落于美丽富饶、风景秀丽的中国无锡锡东（翠屏山）旅游度假风景区。经香逸人多年勘察将水源地定位于西麓凤凰山生态景区的东南麓胶山主峰（海拔122.5米是天目山余脉东延的低山残丘。主要岩性为燕山期花岗岩）。源水取自翠屏山山坡，深层基岩裂隙水。经国家权威部分检测，此水源属偏硅酸型天然矿泉水无色、无味、透明、口感柔和、圆润，后味清冽、甘甜，蕴含丰富人体所需的微量元素，pH值为7.32-8.0，天然弱碱性水。功德源整个生产线均引进先进的生产设备，全自动生产，无菌灌装生产，保持天然泉水的原有品质。
              </p>
            </div>
            <!--end .repair_details-->
          </div>
          <!--end .col-md-6-->
          <div class="col-md-6">
            <div class="repair_details_right text-right">
              <div id="video">
                <video
                  muted
                  width="140%"
                  controls="controls"
                  src="http://shipin.wxjoi.com/0290ee2ab8114d188d5f49f70a5e9ccd/a9dfb6148e13080e36278fb0c9c7311f-ld.mp4"
                  id="videoShow"
                ></video>
              </div>
            </div>
            <!--end .repair_details_right-->
          </div>
          <!--end .col-md-6-->
        </div>
        <!--end .row-->
      </div>
      <!--end .container-->
    </section>
    <!--end .about_repair_style_2-->
    <!--end our repair section -->

    <!--start about section -->
    <section class="about_area gray_bg">
      <div class="container">
        <div class="row">
          <div class="about_flex">
            <div class="about_details xgdetails">
              <p>
                现公司主要产品为399ml及599ml瓶装祈福饮用水，5L自立袋家庭烹饪用水，11.6L盒装真空越野户外用水、8升户外用水、婴幼儿用水等系列产品。瓶装饮用水外观时尚大方，干净环保是公司主打产品。5L自立袋是手拎袋饮用水，袋装水安全、卫生、灵活、方便，是家庭煮茶烧饭必需品。
                11.6L盒装水适合团体户外运动，房车专用水，携带便捷自带出水阀，随取随用，包装容器为一次性的，避免了桶装水在使用过程中容易出现的清洗灭菌不彻底情况，并且自带一次性取水阀门，无需与外部取水器具配合使用，避免了使用场所的限制和水质被取水器具造成二次污染的可能性，袋内水体始终不与外界空气接触，保证了最后一杯与第一杯同样新鲜、洁净，延长了开启使用后的保质期，也是当下高端用户热捧的产品。<br />
                11.6升软包装饮用水，可以配竹盒使用，并且自带一次性取水阀门，泡茶专用。
              </p>
            </div>
            <!--end .about_details-->
            <div class="about_support"></div>
            <!--end .about_support-->
          </div>
          <!--end .about_flex-->
        </div>
        <!--end .row-->
      </div>
      <!--end .container-->
    </section>
    <!--end .about_area-->
    <!--end about section -->

    <!-- 企业精神 -->
    <div class="container contents" style="margin-bottom: 0px">
      <div class="Enterprisespirit" style="margin-bottom: 50px">
        <div id="videos">
          <img src="/Public/Home/default/assets/images/ttt/4.png" alt="" />
          <img src="/Public/Home/default/assets/images/ttt/5.png" alt="" />
        </div>
        <div class="spirit_text">
          <h1>企业精神</h1>
          <p>
            弘扬囯学文化，匠心精神、以人为本，和人为善坚持<br />质量第一服务至上、刻守诚心为夲的宗旨
          </p>
        </div>
      </div>

      <div class="Enterprisespirit">
        <div class="spirit_text">
          <h1>服务宗旨</h1>
          <p>恪守质量第一、服务至上、诚信为本的宗旨</p>
        </div>
        <div id="videos">
          <img src="/Public/Home/default/assets/images/ttt/6.png" alt="" />
          <img src="/Public/Home/default/assets/images/ttt/8.png" alt="" />
        </div>
      </div>
    </div>
    <div class="container" style="margin-top: 45px">
      <div class="swppic">
        <img src="/Public/Home/default/assets/images/ttt/4.png" alt="" />
        <h1>服务宗旨</h1>
        <p>
          弘扬囯学文化，匠心精神、以人为本，和人为善坚持质量第一服务至上、刻守诚心为夲的宗旨
        </p>
      </div>
      <div class="swppic" style="margin-top: 60px; margin-bottom: 80px">
        <img src="/Public/Home/default/assets/images/ttt/6.png" alt="" />
        <h1>服务宗旨</h1>
        <p>恪守质量第一、服务至上、诚信为本的宗旨</p>
      </div>
    </div>
    <div class="container-fluid container-fluid1">
      <div class="container">
        <h1 style="text-align: center; margin-bottom: 3%">资质荣誉</h1>
        <div
          class="swiper-container"
          style="position: relative; padding-bottom: 60px"
        >
          <div class="swiper-wrapper swiper-wrapper1">
            
            <?php
 $_typeid = '18'; $_keyword = ''; if($_typeid == -1) $_typeid = I('cid', 0, 'intval'); $_table_name = ''; if (!empty($_typeid)) { $_typeid_arr = explode(',',$_typeid); $ids_arr = array(); foreach($_typeid_arr as $_typeid_key => $_typeid_val) { $_typeid_val = intval($_typeid_val); if (empty($_typeid_val)) { continue; } if (empty($_table_name)) { $_selfcate = \Common\Lib\Category::getSelf(get_category(10), $_typeid_val); $_table_name = strtolower($_selfcate['table_name']); } $_typeid_ids = \Common\Lib\Category::getChildsId(get_category(10), $_typeid_val, true); $ids_arr = array_merge($ids_arr,$_typeid_ids); } $ids_arr = array_unique($ids_arr); if ($_table_name == '') { $_table_name = 'article'; } $where = array($_table_name.'.delete_status' => 0, 'cate_status' => array('LT',2)); if (!empty($ids_arr)) { $where[$_table_name.'.cid'] = array('IN',$ids_arr); } }else { $_table_name = 'article'; $where = array($_table_name.'.delete_status' => 0, 'cate_status' => array('LT',2)); } if (0 > 0 && 0 > 0) { $where[$_table_name.'.point'] = array('between',array(0,0)); }else if (0 > 0) { $where[$_table_name.'.point'] = array('EGT', 0); }else if (0 > 0) { $where[$_table_name.'.point'] = array('ELT', 0); } if(0 == 1) { $where[$_table_name.'.audit_status'] = 0; } else if(0 == 2) { } else { $where[$_table_name.'.audit_status'] = 1; } if ($_keyword != '') { $where[$_table_name.'.title'] = array('like','%'.$_keyword.'%'); } if (0 > 0) { $where['_string'] = $_table_name.'.flag & 0 = 0 '; } if (!empty($_table_name) && $_table_name != 'page') { if (0 > 0) { $count = D2('ArcView',"$_table_name")->where($where)->count(); $ename = I('e', '', 'htmlspecialchars,trim'); if (!empty($ename) && C('URL_ROUTER_ON') == true) { $param['p'] = I('p', 1, 'intval'); $param_action = '/'.$ename; }else { $param = array(); $param_action = ''; } $thisPage = new \Common\Lib\Page($count, 0, $param, $param_action); $thisPage->rollPage = 5; $thisPage->setConfig('theme'," %FIRST% %UP_PAGE% %LINK_PAGE% %DOWN_PAGE% %END%"); $limit = $thisPage->firstRow. ',' .$thisPage->listRows; $page = $thisPage->show(); }else { $limit = "10"; } $_list = D2('ArcView',"$_table_name")->nofield('content,picture_urls')->where($where)->order("point DESC,id DESC")->limit($limit)->select(); if (empty($_list)) { $_list = array(); } }else { $_list = array(); } foreach($_list as $autoindex => $list): $_jumpflag = ($list['flag'] & B_JUMP) == B_JUMP? true : false; $list['url'] = get_content_url($list['id'], $list['cid'], $list['ename'], $_jumpflag, $list['jump_url']); if(0) $list['title'] = str2sub($list['title'], 0, 0); if(0) $list['description'] = str2sub($list['description'], 0, 0); if(isset($list['picture_urls'])) $list['picture_urls'] = get_picture_array($list['picture_urls']); ?><div class="swiper-slide">
              <div class="picc">
                <img src="<?php echo ($list["litpic"]); ?>" alt="" />
                <div><?php echo ($list["title"]); ?></div>
              </div>
            </div><?php endforeach;?>
           
          </div>
          <!-- Add Pagination -->
          <div class="swiper-pagination pagin1"></div>
          <!-- Add Arrows -->
          <!-- <div class="swiper-button-next"></div>
          <div class="swiper-button-prev"></div> -->
        </div>
      </div>
    </div>

    <!-- Ajax Included -->
    <script src="/Public/Home/default/assets/js/jquery.min.js"></script>
    <script src="/Public/Home/default/assets/source/jquery.fancybox.pack.js"></script>
    <script src="/Public/Home/default/assets/js/bootstrap.min.js"></script>
    <script src="/Public/Home/default/assets/js/owl.carousel.min.js"></script>
    <script src="/Public/Home/default/assets/js/waypoint.js"></script>
    <script src="/Public/Home/default/assets/js/jquery.counter.min.js"></script>
    <script src="/Public/Home/default/assets/js/magnific.min.js"></script>
    <script src="/Public/Home/default/assets/js/custom.js"></script>
    <script src="/Public/Home/default/assets/js/jsmodern-4.1.4.min.js"></script>
    <script src="/Public/Home/default/assets/js/main.js"></script>
    <script src="/Public/Home/default/assets/js/swiper-bundle.min.js"></script>

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
      var swiper = new Swiper(".swiper-container", {
        slidesPerView: 1, //试图
        spaceBetween: 30, //间距
        loop: true, //无线循环
        autoplay: {
          delay: 3000,
        },
        pagination: {
          el: ".swiper-pagination",
          clickable: true, //点击分页器的指示点分页器会控制Swiper切换。
        },
        navigation: {
          nextEl: ".swiper-button-next", //fales
          prevEl: ".swiper-button-prev",
        },
        breakpoints: {
          480: {
            //当屏幕大于等于48px
            slidesPerView: 3, //试图
            spaceBetween: 30, //间距
          },
        },
      });
    </script>
  </body>
</html>
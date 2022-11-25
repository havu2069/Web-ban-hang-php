<!doctype html>
<!--[if !IE]><!-->
<html lang="vi">
<!--<![endif]-->
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta http-equiv="x-ua-compatible" content="ie=edge">
<meta http-equiv="content-language" content="vi" />
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<meta name="robots" content="noodp,index,follow" />
<meta name='revisit-after' content='1 days' />
<meta name="keywords" content="">
<title>NGỌC QUỲNH</title>
<link href='assets/frontend/100/047/633/themes/517833/assets/font-awesome.min221b.css?1481775169361' rel='stylesheet' type='text/css' />
<link href='assets/frontend/100/047/633/themes/517833/assets/bootstrap.min221b.css?1481775169361' rel='stylesheet' type='text/css' />
<link href='assets/frontend/100/047/633/themes/517833/assets/owl.carousel221b.css?1481775169361' rel='stylesheet' type='text/css' />
<link href='assets/frontend/100/047/633/themes/517833/assets/responsive221b.css?1481775169361' rel='stylesheet' type='text/css' />
<link href='assets/frontend/100/047/633/themes/517833/assets/styles.scss221b.css?1481775169361' rel='stylesheet' type='text/css' />
<script src='assets/frontend/100/047/633/themes/517833/assets/jquery.min221b.js?1481775169361' type='text/javascript'></script>
<script src='assets/frontend/100/047/633/themes/517833/assets/bootstrap.min221b.js?1481775169361' type='text/javascript'></script>
<script src='assets/frontend/assets/themes_support/api.jquerya87f.js?4' type='text/javascript'></script>
<link href='assets/frontend/100/047/633/themes/517833/assets/bw-statistics-style221b.css?1481775169361' rel='stylesheet' type='text/css' />

</head>
<body class="index">
<!-- header -->
<!--Start of Tawk.to Script-->
<script type="text/javascript">
var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
(function(){
var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
s1.async=true;
s1.src='https://embed.tawk.to/6004051dc31c9117cb6f6c3e/1es7r7vsk';
s1.charset='UTF-8';
s1.setAttribute('crossorigin','*');
s0.parentNode.insertBefore(s1,s0);
})();
</script>
<!--End of Tawk.to Script-->
<?php 
    //load MVC bang tay
    //include file controller cua MVC
    include "controllers/HeaderController.php";
    //khoi tao object
    $obj = new HeaderController();
    //goi den ham ben trong class controller
    $obj->index();
 ?>
<!-- end header -->
<div class="content">
  <div class="container">
    <h1 style="display:none;">DELISA</h1>
    <div class="row">
      <div class="col-xs-12 col-md-3"> 
        <!-- end support -->
        <div class="online_support block">
          <div class="new_title">
            <h2>Hỗ trợ trực tuyến</h2>
          </div>
          <div class="block-content">
            <div class="sp_1">
              <p>Tư vấn bán hàng 1</p>
              <p>Mrs. Dung: (04) 3786 8904</p>
            </div>
            <div class="sp_1">
              <p>Tư vấn bán hàng 2</p>
              <p>Mr. Tuấn: (04) 3786 8904</p>
            </div>
            <div class="sp_1">
              <p>Email liên hệ</p>
              <p>support@mail.com</p>
            </div>
          </div>
        </div>
        <!-- end support online --> 
        <!-- box search -->
        <div class="panel panel-default" style="margin-top:15px;">
          <div class="panel-heading"> Tìm theo mức giá </div>
          <div class="panel-body">
            <ul class="list-group" style="border:0px;">
              <li class="list-group-item" style="border:0px;">Giá từ &nbsp;&nbsp;
                <input type="number" min="0" value="0" id="fromPrice" class="form-control" />
              </li>
              <li class="list-group-item" style="border:0px;">Đến &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <input type="number" min="0" value="0" id="toPrice" class="form-control"/>
              </li>
              <li class="list-group-item" style="border:0px; text-align:center">
                <input type="button" class="btn btn-warning" value="Tìm mức giá" onclick="location.href = 'index.php?controller=search&action=searchPrice&fromPrice=' + document.getElementById('fromPrice').value + '&toPrice=' + document.getElementById('toPrice').value;" />
              </li>
            </ul>
          </div>
        </div>
        <!-- end box search --> 
        
        <!-- hot news -->
        <div class="home-blog">
          <h2 class="title"> <span>Tin tức</span></h2>
          <div class="row">
            <div class="owl-home-blog owl-home-blog-sidebar"> 
              <!-- list hot news -->
              <div class="item">
                <div class="article"> <a href="index.php?controller=news_detail&id=20" class="image"> <img src="assets/frontend/images/blazer.jpg" class="img-responsive"> </a>
                  <div class="info">
                    <h3><a href="index.php?controller=news_detail&id=20">Tủ đồ thu đông mà vắng những mẫu áo blazer thì các nàng thật thiếu sót quá</a></h3>
                    <p class="desc">
                    <p>Áo blazer là một items vô cùng thời thượng và rất tiện dụng trong mọi hoàn cảnh với mọi tín đồ thời trang. Thu Đông năm nay, chiếc áo khoác này tiếp tục trở thành trang phục không thể thiếu trong tủ đồ của phái đẹp, đặc biệt là các quý cô công sở.</p>
                    </p>
                  </div>
                </div>
              </div>
              <!-- end list hot news --> 
              <!-- list hot news -->
              <div class="item">
                <div class="article"> <a href="index.php?controller=news_detail&id=19" class="image"> <img src="assets/frontend/images/tt2.jpg"  class="img-responsive"> </a>
                  <div class="info">
                    <h3><a href="index.php?controller=news_detail&id=19">Mau chào đón Nữ Hoàng của chúng ta đi, nào các cô gái lười biếng mà vẫn muốn mặc đẹp!</a></h3>
                    <p class="desc">
                    <p>Cô gái xứ Kim Chi đã tìm ra chiêu để mặc đẹp mà không mất nhiều thời gian, cũng chẳng tốn nhiều tiền...</p>
                    </p>
                  </div>
                </div>
              </div>
              <!-- end list hot news --> 
              <!-- list hot news -->
              <div class="item">
                <div class="article"> <a href="index.php?controller=news_detail&id=17" class="image"> <img src="assets/frontend/images/tt1.jpg"  class="img-responsive"> </a>
                  <div class="info">
                    <h3><a href="index.php?controller=news_detail&id=17">Bỏ túi 4 tips mix & match váy áo này, nàng tha hồ diện đẹp ngày Tết</a></h3>
                    <p class="desc">
                    <p>Những ngày sắp Tết thì đối với hội chị em, câu hỏi “Xuân này diện gì?” lại trở thành một vấn đề khiến các nàng băn khoăn và lo lắng. “Giáo trình” lên đồ ngày Tết đến đây, nàng lưu nhanh để các hôm đầu năm còn áp dụng nhé. Bỏ túi liền 4 tips mix đồ sang - xịn mà giá bao hợp lý, Tết nay nàng đẹp “thừa" luôn!</p>
                    </p>
                  </div>
                </div>
              </div>
              <!-- end list hot news --> 
              <!-- list hot news -->
              <div class="item">
                <div class="article"> <a href="index.php?controller=news_detail&id=16" class="image"> <img src="assets/frontend/images/tt3.jpg" class="img-responsive"> </a>
                  <div class="info">
                    <h3><a href="index.php?controller=news_detail&id=16">Tại sao thương hiệu giày dép Trung Hương Store lại đông đảo giới trẻ ưa chuộng?</a></h3>
                    <p class="desc">
                    <p>Tại Việt Nam, vẫn có rất nhiều người yêu thích đồ đẹp tuy nhiên giá cả phải phù hợp với túi tiền. Chính vì vậy Trung Hương Store là một lựa chọn phù hợp cho nhu cầu đó của bạn trẻ.</p>
                    </p>
                  </div>
                </div>
              </div>
              <!-- end list hot news --> 
              <!-- list hot news -->
              <div class="item">
                <div class="article"> <a href="index.php?controller=news_detail&id=15" class="image"> <img src="assets/frontend/images/tt4.jpg" class="img-responsive"> </a>
                  <div class="info">
                    <h3><a href="index.php?controller=news_detail&id=15">Giảm ngay 40% cho khách hàng có ngày sinh trong tháng khi mua sản phẩm thời trang Paltal</a></h3>
                    <p class="desc">
                    <p>Với mức giảm lên đến 40%++ các combo sản phẩm ưu đãi, chương trình “Tri Ân Tháng Sinh Nhật Khách Hàng – Ngập Tràn Ưu Đãi” thay cho lời tri ân đến các chị em có sinh nhật trong tháng vì đã tin dùng sản phẩm thời trang Paltal trong hơn 20 năm qua.</p>
                    </p>
                  </div>
                </div>
              </div>
              <!-- end list hot news --> 
            </div>
          </div>
        </div>
        <!-- end hot news --> 
        
      </div>
      <div class="col-xs-12 col-md-9"> 
        <!-- main -->
        
        <?php echo $this->view; ?>
        
        <!-- end main --> 
      </div>
    </div></div>
<div class="privacy">
  <div class="container">
    <div class="row">
      <div class="col-xs-12 col-sm-4">
        <div class="image"> <img src="assets/frontend/100/047/633/themes/517833/assets/ico-service-1221b.png?1481775169361" alt="Giao hàng miễn phí" title="Giao hàng miễn phí" class="img-responsive" > </div>
        <div class="info">
          <h3>Giao hàng miễn phí</h3>
          <p>Miễn phí giao hàng trong nội thành Hà Nội</p>
        </div>
      </div>
      <div class="col-xs-12 col-sm-4">
        <div class="image"> <img src="assets/frontend/100/047/633/themes/517833/assets/ico-service-2221b.png?1481775169361" class="img-responsive" alt="Khuyến mại" title="Khuyến mại"> </div>
        <div class="info">
          <h3>Khuyến mại</h3>
          <p>Khuyến mại sản phẩm nếu đơn hàng trên 1.000.000đ</p>
        </div>
      </div>
      <div class="col-xs-12 col-sm-4">
        <div class="image"> <img src="assets/frontend/100/047/633/themes/517833/assets/ico-service-3221b.png?1481775169361" class="img-responsive" alt="Hoàn trả lại tiền" title="Hoàn trả lại tiền"> </div>
        <div class="info">
          <h3>Hoàn trả lại tiền</h3>
          <p>Nếu sản phẩm không đảm bảo chất lượng hoặc sản phẩm không đúng miêu tả</p>
        </div>
      </div>
    </div>
  </div>
</div>
<footer id="footer">
  <div class="top-footer">
    <div class="container">
      <div class="row">
        <div class="col-xs-12 col-sm-3">
          <h3>Về chúng tôi</h3>
          <p>Dalisa chính thức cung cấp thời trang cao cấp, hứa hẹn sẽ đem đến cho bạn những sản phẩm ưu việt nhất!</p>
          <ul class="list-unstyled">
            <li>Điện thoại: 1900.57.57</li>
            <li>Email: thoitrangdelisa@gmail.com</li>
            <li>Website: www.delisa.vn</li>
          </ul>
        </div>
        <div class="col-xs-12 col-sm-3">
          <h3>Hướng dẫn</h3>
          <ul class="list-unstyled">
            <li><a href="huo-ng-da-n-mua-ha-ng">Hướng dẫn mua hàng</a></li>
            <li><a href="huong-dan">Giao nhận và thanh toán</a></li>
            <li><a href="do-i-tra-va-ba-o-ha-nh">Đổi trả và bảo hành</a></li>
            <li><a href="account/register">Đăng ký thành viên</a></li>
          </ul>
        </div>
        <div class="col-xs-12 col-sm-3">
          <h3>Chính sách</h3>
          <ul class="list-unstyled">
            <li><a href="chinh-sach">Chính sách thanh toán</a></li>
            <li><a href="chi-nh-sa-ch-va-n-chuye-n">Chính sách vận chuyển</a></li>
            <li><a href="chi-nh-sa-ch-do-i-tra">Chính sách đổi trả</a></li>
            <li><a href="chi-nh-sa-ch-ba-o-ha-nh">Chính sách bảo hành</a></li>
          </ul>
        </div>
        <div class="col-xs-12 col-sm-3">
          <h3>Điều khoản</h3>
          <ul class="list-unstyled">
            <li><a href="dieu-khoan">Điều khoản sử dụng</a></li>
            <li><a href="die-u-khoa-n-giao-di-ch">Điều khoản giao dịch</a></li>
            <li><a href="di-ch-vu-tie-n-i-ch">Dịch vụ tiện ích</a></li>
            <li><a href="quye-n-so-hu-u-tri-tue">Quyền sở hữu trí tuệ</a></li>
          </ul>
        </div>
      </div>
      <div class="payments-method"> <img src="assets/frontend/100/047/633/themes/517833/assets/payments-method221b.png?1481775169361" alt="Phương thức thanh toán" title="Phương thức thanh toán"> </div>
    </div>
  </div>

  </div>
</footer>
<script src='assets/frontend/100/047/633/themes/517833/assets/owl.carousel.min221b.js?1481775169361' type='text/javascript'></script> 
<script src='assets/frontend/100/047/633/themes/517833/assets/responsive-menu221b.js?1481775169361' type='text/javascript'></script> 
<script src='assets/frontend/100/047/633/themes/517833/assets/elevate-zoom221b.js?1481775169361' type='text/javascript'></script> 
<script src='assets/frontend/100/047/633/themes/517833/assets/main221b.js?1481775169361' type='text/javascript'></script> 
<script src='assets/frontend/100/047/633/themes/517833/assets/ajax-cart221b.js?1481775169361' type='text/javascript'></script>
</body>
</html>
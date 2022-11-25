<!-- header -->
<header id="header">
<!-- top header -->
<div class="top-header">
  <div class="container">
    <div class="row">
      <div class="col-xs-12 col-sm-6 col-md-6"> <span><i class="fa fa-phone"></i> (04) 6674 2332</span> <span><i class="fa fa-envelope-o"></i> <a href="mailto:support@mail.com">support@mail.com</a></span> </div>
      <?php if(isset($_SESSION["customer_email"])): ?>
      <div class="col-xs-12 col-sm-6 col-md-6 customer"> 
        <a href="#"><img src="assets/upload/products/dn.png" style="width:2.5em; background: #ffffff; border-radius: 20px;"> <?php echo $_SESSION["customer_email"]; ?></a>&nbsp; &nbsp;
        <a href="index.php?controller=account&action=orders">Thông tin đơn hàng</a>&nbsp; &nbsp;
        <a href="index.php?controller=account&action=logout">Đăng xuất</a> </div>
      <?php else: ?>
      <div class="col-xs-12 col-sm-6 col-md-6 customer"> <a href="index.php?controller=account&action=login">Đăng nhập</a>&nbsp; &nbsp;<a href="index.php?controller=account&action=register">Đăng ký</a> </div>
    <?php endif; ?>
    </div>
  </div>
</div>
<!-- end top header --> 
<!-- middle header -->
<div class="mid-header">
<div class="container">
  <div class="row">
    <div class="col-xs-12 col-sm-12 col-md-3 logo "> <a href="index.html"> <img src="assets/upload/products/Logo-1.png?1481775169361" alt="NGỌC QUỲNH" title="NGỌC QUỲNH" class="img-responsive"> </a> </div>
    <div class="col-xs-12 col-sm-12 col-md-6 header-search"> 
      <!--<form method="post" id="frm" action="">-->
      <div style="margin-top:25px; position: relative;">
        <input type="text" onkeyup="smartSearch();" value="" placeholder="Nhập từ khóa tìm kiếm..." id="key" class="input-control">
        <button style="margin-top:-7px;" type="submit"> <i class="fa fa-search" onclick="return search();"></i> </button>
        <div id="boxSearch">
          <ul>
            <li><img src="http://localhost/Project/assets/upload/products/q2.jpg"><a href="#">Quần culottes nữ Bella Moda xếp ly trước thời</a></li>
            <li><img src="http://localhost/Project/assets/upload/products/q2.jpg"><a href="#">Quần culottes nữ Bella Moda xếp ly trước thời</a></li>
            <li><img src="http://localhost/Project/assets/upload/products/q2.jpg"><a href="#">Quần culottes nữ Bella Moda xếp ly trước thời</a></li>
          </ul>
        </div>
      </div>
      <style type="text/css">
        #boxSearch{position: absolute; z-index: 1; width: 550px; background: white; display: none; height: 300px; overflow: scroll;}
        #boxSearch ul{padding:0px; margin:0px; list-style: none;}
        #boxSearch ul li{border-bottom: 1px solid #dddddd;}
        #boxSearch img{width: 70px; margin-right: 5px;}
      </style>
      <!--</form>--> 
    </div>
    <script type="text/javascript">      
      function search(){
        //lay gia tri cua id=key
        var key = document.getElementById("key").value;
        //den trang tim kiem
        location.href="index.php?controller=search&action=search&key="+key;
      }
      function smartSearch(){
        var key = document.getElementById("key").value;
        if(key != "")
          document.getElementById("boxSearch").setAttribute("style","display:block;");
        else
          document.getElementById("boxSearch").setAttribute("style","display:none;");
        //---
        $.ajax({
          url: "index.php?controller=search&action=smartSearch&key="+key,          
          success: function( result ) {
            $("#boxSearch ul").empty();
            $("#boxSearch ul").append(result);
          }
        });
        //---
      }
    </script>
    <?php 
        //lay so luong san pham trong gio hang
        $number = 0;
        if(isset($_SESSION["cart"])){
          foreach($_SESSION["cart"] as $product){
            $number++;
          }
        }
     ?>
    <div class="col-xs-12 col-sm-12 col-md-3 mini-cart">
      <div class="wrapper-mini-cart"> <span class="icon"><i class="fa fa-shopping-cart"></i></span> <a href="cart"> <span class="mini-cart-count"> <?php echo $number; ?> </span> sản phẩm <i class="fa fa-caret-down"></i></a>
        <div class="content-mini-cart">
          <div class="has-items">
            <ul class="list-unstyled">
              <?php if(isset($_SESSION["cart"])): ?>
                <?php foreach($_SESSION["cart"] as $product): ?>
              <li class="clearfix" id="item-1853038">
                <div class="image"> <a href="index.php?controller=product&action=detail&id=<?php echo $product["id"]; ?>"> <img alt="<?php echo $product["name"]; ?>" src="assets/upload/products/<?php echo $product["photo"]; ?>" title="<?php echo $product["name"]; ?>" class="img-responsive"> </a> </div>
                <div class="info">
                  <h3><a href="index.php?controller=product&action=detail&id=<?php echo $product["id"]; ?>"><?php echo $product["name"]; ?></a></h3>
                  <p><?php echo $product["number"]; ?> x <?php echo number_format($product["price"]); ?>₫</p>
                </div>
                <div> <a href="index.php?controller=cart&action=remove&id=<?php echo $product["id"]; ?>"> <i class="fa fa-times"></i></a> </div>
              </li>
              <?php endforeach; ?>
            <?php endif; ?>
            </ul>
            <a href="index.php?controller=cart&action=checkout" class="button">Thanh toán</a> </div>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- end middle header --> 
<!-- bottom header -->
<div class="bottom-header" style="height: 55px;">
  <div class="container">
    <div class="clearfix">
      <ul class="main-nav hidden-xs hidden-sm list-unstyled">
          <li class="active"><a href="index.php"><span>Trang chủ</span></a></li>
          <li class="has-submenu"> <a href="#"> <span><img src="assets/upload/products/DanhMuc_icon.png" style="width:1.8em;">Danh mục</span><i class="fa fa-caret-down" style="margin-left: 5px;"></i> </a>
            <ul class="list-unstyled level1">
              <?php 
                $categories = $this->modelListCategories();
              ?>
              <?php foreach($categories as $rows): ?>
              <li><a href="index.php?controller=products&action=categories&catid=<?php echo $rows->id; ?>"><img src="assets/upload/products/<?php echo $rows->icon; ?>" style="width:2.5em;" /><?php echo $rows->name; ?>
              <?php if($this->modelCheckCategorySub($rows->id) == true): ?>
            &nbsp;&nbsp;<span class="fa fa-arrow-down"></span>
            <?php endif; ?>
              </a></li>
              <?php endforeach; ?>
            </ul>
          </li>

          <li><a href="index.php?controller=cart"><img src="assets/upload/products/giohang.png" style="width:1.8em;">Giỏ hàng</a></li>
          <li id="menu-item-950" class="menu-item menu-item-type-taxonomy menu-item-object-category  menu-item-950"><a href="index.php?controller=bst" class="nav-top-link"><img src="assets/upload/products/album-1.png" class="_mi _before _svg" aria-hidden="true" style="width:1.8em;" /><span>Hướng dẫn</span></a></li>
          <li id="menu-item-771" class="menu-item menu-item-type-taxonomy menu-item-object-category  menu-item-771"><a href="index.php?controller=news" class="nav-top-link"><img src="assets/upload/products/newspaper-1-1.png" class="_mi _before _svg" aria-hidden="true" style="width:1.8em;" /><span>Tin tức</span></a></li>
          <li id="menu-item-950" class="menu-item menu-item-type-taxonomy menu-item-object-category  "><a href="index.php?controller=contact" class="nav-top-link"><img src="assets/upload/products/lh.png" class="_mi _before _svg" aria-hidden="true" style="width:1.8em;" /><span>Liên hệ</span></a></li>
      </ul>
    </div>
  </div>
</div>
<!-- end bottom header -->
</header>
<!-- end header -->
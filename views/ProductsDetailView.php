<?php 
  //load file layout vao day de do du lieu cua view vao file layout do
  $this->layoutPath = "LayoutTrangTrong.php";
 ?>
 <?php 
    $id = isset($_GET["id"])?$_GET["id"]:0; 
    //lay ban ghi
    $record = $this->modelGetRecord($id);   
  ?>
<div class="top">
  <div class="row">
    <div class="col-xs-12 col-md-6 product-image">
      <div class="featured-image"> 
        <img src="assets/upload/products/<?php echo $record->photo; ?>" style="width: 100%;" class="img-responsive"/>
      </div>
      <div class="box-image">
        <ul>
          <li><img src="assets/upload/products/<?php echo $record->photo; ?>" id="img-1"></li>
          <li><img src="assets/upload/products/<?php echo $record->photo; ?>" id="img-2"></li>
          <li><img src="assets/upload/products/<?php echo $record->photo; ?>" id="img-3"></li>
          <li><img src="assets/upload/products/<?php echo $record->photo; ?>" id="img-4"></li>
          <li><img src="assets/upload/products/<?php echo $record->photo; ?>" id="img-5"></li>
          <li><img src="assets/upload/products/<?php echo $record->photo; ?>" id="img-6"></li>
        </ul>
      </div>
      <script type="text/javascript">
        $(document).ready(function(){
                            //---
                            $("#img-1").click(function(){
                              $(".featured-image img").fadeOut(function(){
                                    //lay duong dan cua id=img-1
                                    var srcImg = $("#img-1").attr("src");
                                    $(".featured-image img").attr("src",srcImg);
                                    $(".featured-image img").fadeIn();
                                  });                                
                            });
                            //---
                            //---
                            $("#img-2").click(function(){
                              $(".featured-image img").fadeOut(function(){
                                    //lay duong dan cua id=img-2
                                    var srcImg = $("#img-2").attr("src");
                                    $(".featured-image img").attr("src",srcImg);
                                    $(".featured-image img").fadeIn();
                                  });                                
                            });
                            //---
                            //---
                            $("#img-3").click(function(){
                              $(".featured-image img").fadeOut(function(){
                                    //lay duong dan cua id=img-3
                                    var srcImg = $("#img-3").attr("src");
                                    $(".featured-image img").attr("src",srcImg);
                                    $(".featured-image img").fadeIn();
                                  });                                
                            });
                            //---
                            //---
                            $("#img-4").click(function(){
                              $(".featured-image img").fadeOut(function(){
                                    //lay duong dan cua id=img-4
                                    var srcImg = $("#img-4").attr("src");
                                    $(".featured-image img").attr("src",srcImg);
                                    $(".featured-image img").fadeIn();
                                  });                                
                            });
                            //---
                            //---
                            $("#img-5").click(function(){
                              $(".featured-image img").fadeOut(function(){
                                    //lay duong dan cua id=img-5
                                    var srcImg = $("#img-5").attr("src");
                                    $(".featured-image img").attr("src",srcImg);
                                    $(".featured-image img").fadeIn();
                                  });                                
                            });
                            //---
                            //---
                            $("#img-6").click(function(){
                              $(".featured-image img").fadeOut(function(){
                                    //lay duong dan cua id=img-6
                                    var srcImg = $("#img-6").attr("src");
                                    $(".featured-image img").attr("src",srcImg);
                                    $(".featured-image img").fadeIn();
                                  });                                
                            });
                            //---
                          });
                        </script>
                        <style type="text/css">
                          .box-image ul{padding:0px; margin:0px; list-style: none;}
                          .box-image ul li{display: inline; margin-right: 10px;;}
                          .box-image img{width: 50px; border:1px solid #dddddd; margin-bottom: 10px; cursor: pointer;}
                        </style>
                      </div>
                      <div class="col-xs-12 col-md-6 info">
                        <h1 itemprop="name"><?php echo $record->name; ?></h1>
                        <p class="vendor"> Category:&nbsp; <span> <?php echo $this->modelGetCategory($record->category_id)->name; ?> </span></p>
                        <p itemprop="price" class="price-box product-price-box"> <span class="special-price"> <span class="price product-price" style="text-decoration:line-through;"> <?php echo $record->price; ?>₫ </span></span></p>
                        <p itemprop="price" class="price-box product-price-box"> <span class="special-price"> <span class="price product-price"> <?php echo number_format($record->price - ($record->price*$record->discount)/100); ?> </span>₫ </span></span></p>
                      </p>
                      <a href="index.php?controller=cart&action=create&id=<?php echo $record->id; ?>" class="btn btn-primary">Cho vào giỏ hàng</a>
                      <!-- rating -->
                      <div style="border:1px solid #dddddd; margin-top: 15px;">
                        <h4 style="padding-left: 10px;">Rating</h4>
                        <table style="width: 100%;">
                          <tr>
                            <td style="width: 80%; padding-left: 10px;"><img src="assets/frontend/images/star.jpg"></td>
                            <td><span class="label label-primary"><?php echo $this->modelCountRating(1); ?> vote</span></td>
                          </tr>
                          <tr>
                            <td style="width: 80%; padding-left: 10px;"><img src="assets/frontend/images/star.jpg"> <img src="assets/frontend/images/star.jpg"></td>
                            <td><span class="label label-warning"><?php echo $this->modelCountRating(2); ?> vote</span></td>
                          </tr>
                          <tr>
                            <td style="width: 80%; padding-left: 10px;"><img src="assets/frontend/images/star.jpg"> <img src="assets/frontend/images/star.jpg"> <img src="assets/frontend/images/star.jpg"></td>
                            <td><span class="label label-danger"><?php echo $this->modelCountRating(3); ?> vote</span></td>
                          </tr>
                          <tr>
                            <td style="width: 80%; padding-left: 10px;"><img src="assets/frontend/images/star.jpg"> <img src="assets/frontend/images/star.jpg"> <img src="assets/frontend/images/star.jpg"> <img src="assets/frontend/images/star.jpg"></td>
                            <td><span class="label label-info"><?php echo $this->modelCountRating(4); ?> vote</span></td>
                          </tr>
                          <tr>
                            <td style="width: 80%; padding-left: 10px;"><img src="assets/frontend/images/star.jpg"> <img src="assets/frontend/images/star.jpg"> <img src="assets/frontend/images/star.jpg"> <img src="assets/frontend/images/star.jpg"> <img src="assets/frontend/images/star.jpg"></td>
                            <td><span class="label label-success"><?php echo $this->modelCountRating(5); ?> vote</span></td>
                          </tr>
                        </table>
                        <br>
                      </div>
                      <!-- /rating -->
                    </div>
                  </div>
                  <div class="middle" style="margin-top: 15px;">
                  <!-- chi tiet -->
                  <?php echo $record->description; ?>
                  <?php echo $record->content;; ?>
                  <!-- chi tiet -->
                </div>
<?php 
	//load file layout vao day de do du lieu cua view vao file layout do
	$this->layoutPath = "LayoutTrangChu.php";
 ?>
 <div class="special-collection">
          <div class="tabs-container">
            <div class="row" style="margin-top:10px;">
              <div class="col-lg-10">
                <h2>HOT PRODUCT</h2>
              </div>
              <div class="clearfix"></div>
            </div>
          </div>
          <div class="tabs-content row">
            <div id="content-tabb1" class="content-tab content-tab-proindex" style="display:none">
              <div class="clearfix"> 
              	<?php 
              		$hotProduct = $this->modelHotProduct();
              	 ?>
              	 <?php foreach($hotProduct as $rows): ?>
                <!-- box product -->
                <div class="col-xs-6 col-md-2 col-sm-6 ">
                  <div class="product-grid" id="product-1168979" style="height: 350px; overflow: hidden;">
                    <div class="image"> <a href="index.php?controller=products&action=detail&id=<?php echo $rows->id; ?>"><img src="assets/upload/products/<?php echo $rows->photo; ?>" title="<?php echo $rows->name; ?>" alt="<?php echo $rows->name; ?>" class="img-responsive"></a> </div>
                    <div class="info">
                      <h3 class="name"><a href="index.php?controller=products&action=detail&id=<?php echo $rows->id; ?>"><?php echo $rows->name; ?></a></h3>
                      <p class="price-box"> <span class="special-price"> <span class="price product-price" style="text-decoration:line-through;"> <?php echo $rows->price; ?> </span> ₫ </span> </p>
                      <p class="price-box"> <span class="special-price"> <span class="price product-price"> <?php echo number_format($rows->price - ($rows->price*$rows->discount)/100); ?> </span>₫ </span> </p>
                      <p class="price-box"> 
                      	<a href="index.php?controller=products&action=rating&id=<?php echo $rows->id; ?>&star=1"><img src="assets/frontend/images/star.jpg"></a> 
                      	<a href="index.php?controller=products&action=rating&id=<?php echo $rows->id; ?>&star=2"><img src="assets/frontend/images/star.jpg"></a> 
                      	<a href="index.php?controller=products&action=rating&id=<?php echo $rows->id; ?>&star=3"><img src="assets/frontend/images/star.jpg"></a> 
                      	<a href="index.php?controller=products&action=rating&id=<?php echo $rows->id; ?>&star=4"><img src="assets/frontend/images/star.jpg"></a> 
                      	<a href="index.php?controller=products&action=rating&id=<?php echo $rows->id; ?>&star=5"><img src="assets/frontend/images/star.jpg"></a> 
                      </p>
                      <div class="action-btn">
                        <form>
                          <a href="index.php?controller=cart&action=create&id=<?php echo $rows->id; ?>" class="button">Add to Cart</a>
                        </form>
                      </div>
                    </div>
                  </div>
                </div>
                <!-- end box product --> 
                 <?php endforeach; ?>
                
              </div>
            </div>
          </div>
        </div>
        <?php 
        	//lay cac danh muc co hienthitrangchu=1
        	$homeCategory = $this->modelCategoryDisplayHome();
         ?>
         <?php foreach($homeCategory as $rowsHome): ?>
        <!-- category product -->
        <div class="special-collection">
          <div class="tabs-container">
            <div class="row" style="margin-top:10px;">
              <div class="head-tabs head-tab1 col-lg-11">
                <h2><?php echo $rowsHome->name; ?></h2>
              </div>
              <div class="clearfix"></div>
            </div>
          </div>
          <div class="tabs-content row">
            <div id="content-taba4" class="content-tab content-tab-proindex"> 
              
            	<?php 
              		$products = $this->modelProductsInCategory($rowsHome->id);
              	 ?>
              	 <?php foreach($products as $rows): ?>
                <!-- box product -->
                <div class="col-xs-6 col-md-2 col-sm-6 ">
                  <div class="product-grid" id="product-1168979" style="height: 350px; overflow: hidden;">
                    <div class="image"> <a href="index.php?controller=products&action=detail&id=<?php echo $rows->id; ?>"><img src="assets/upload/products/<?php echo $rows->photo; ?>" title="<?php echo $rows->name; ?>" alt="<?php echo $rows->name; ?>" class="img-responsive"></a> </div>
                    <div class="info">
                      <h3 class="name"><a href="index.php?controller=products&action=detail&id=<?php echo $rows->id; ?>"><?php echo $rows->name; ?></a></h3>
                      <p class="price-box"> <span class="special-price"> <span class="price product-price" style="text-decoration:line-through;"> <?php echo $rows->price; ?> </span> ₫ </span> </p>
                      <p class="price-box"> <span class="special-price"> <span class="price product-price"> <?php echo number_format($rows->price - ($rows->price*$rows->discount)/100); ?> </span>₫ </span> </p>
                      <p class="price-box"> 
                      	<a href="index.php?controller=products&action=rating&id=<?php echo $rows->id; ?>&star=1"><img src="assets/frontend/images/star.jpg"></a> 
                      	<a href="index.php?controller=products&action=rating&id=<?php echo $rows->id; ?>&star=2"><img src="assets/frontend/images/star.jpg"></a> 
                      	<a href="index.php?controller=products&action=rating&id=<?php echo $rows->id; ?>&star=3"><img src="assets/frontend/images/star.jpg"></a> 
                      	<a href="index.php?controller=products&action=rating&id=<?php echo $rows->id; ?>&star=4"><img src="assets/frontend/images/star.jpg"></a> 
                      	<a href="index.php?controller=products&action=rating&id=<?php echo $rows->id; ?>&star=5"><img src="assets/frontend/images/star.jpg"></a> 
                      </p>
                      <div class="action-btn">
                        <form>
                          <a href="index.php?controller=cart&action=create&id=<?php echo $rows->id; ?>" class="button">Add to Cart</a>
                        </form>
                      </div>
                    </div>
                  </div>
                </div>
                <!-- end box product --> 
                 <?php endforeach; ?>
               
            </div>
          </div>
        </div>
        <!-- /category product --> 
        <?php endforeach; ?> 
        
        <!-- hot news -->
        <div class="home-blog">
          <h2 class="title"> <span>Tin tức</span></h2>
          <div class="row">
            <div class="owl-home-blog owl-home-blog-bottompage"> 
            <?php 
            	$news = $this->modelHotNews();
             ?>
             <?php foreach($news as $rows): ?>
              <!-- new item -->
              <div class="item">
                <div class="article"> <a href="index.php?controller=news&action=detail&id=<?php echo $rows->id; ?>" class="image"> <img src="assets/upload/news/<?php echo $rows->photo; ?>" alt="<?php echo $rows->name; ?>" title="<?php echo $rows->name; ?>" class="img-responsive"> </a>
                  <div class="info">
                    <h3><a class="text3line" href="index.php?controller=news&action=detail&id=<?php echo $rows->id; ?>" style="font-weight: bold;"><?php echo $rows->name; ?></a></h3>
                    <p class="desc"> <?php echo $rows->description; ?></p>
                  </div>
                </div>
              </div>
              <!-- /news item -->
              <?php endforeach; ?>
            </div>
          </div>
        </div>
        <!-- /hotnews -->
<?php 
  //load file layout vao day
  $this->layoutPath = "LayoutTrangTrong.php";
 ?>
 <?php 
    $id = isset($_GET["id"])?$_GET["id"]:0;    
  ?>
<div class="col-xs-12 col-md-9"> 
<!-- main -->
  <h1>Tin tức</h1>
  <div class="wrapper-blog"> 
  <?php 
      $news = $this->modelHotNews();
     ?>
     <?php foreach($news as $rows): ?>
      <!-- new item -->
      <div class="item">
        <div class="article"> <a href="index.php?controller=news&action=detail&id=<?php echo $rows->id; ?>" class="image"> <img src="assets/upload/news/<?php echo $rows->photo; ?>" alt="<?php echo $rows->name; ?>" title="<?php echo $rows->name; ?>" class="img-responsive"> </a>
          <div class="info">
            <h3><a class="text3line" href="#" style="font-weight: bold;"><?php echo $rows->name; ?></a></h3>
            <p class="desc"> <?php echo $rows->description; ?></p>
          </div>
        </div>
      </div>
      <!-- /news item -->
      <?php endforeach; ?>
  <ul class="pagination pull-right" style="margin-top: 0px !important">
    <li><a href="#">Trang</a></li>
    <li><a href="#">1</a></li>
    <li><a href="#">2</a></li>
    <li><a href="#">3</a></li>
  </ul>
  </div>

<!-- end main --> 
</div>
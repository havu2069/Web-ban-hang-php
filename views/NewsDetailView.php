<?php 
	//load file layout vao day
	$this->layoutPath = "LayoutTrangTrong.php";
 ?>
 <?php 
    $id = isset($_GET["id"])?$_GET["id"]:0; 
    //lay ban ghi
    $record = $this->modelGetRecord($id);   
  ?>
<?php foreach($news as $rows): ?>
<!-- start div #main -->
      <div id="main">
            <div class="main-content">
                <div class="left-container">
                      <div class="title-box">
                            <h1>The Hangover 3: The Trilogy Finale Teaser Trailer Leaked Online</h1>
                        </div>
                        <div class="post-thumb">
                          <img src="img/post-img-1.jpg" alt="">
                        </div>
                        <div class="post-content" style="margin-top: 10px;">
                            Câu chuyện về chiếc điện thoại Bphone từ 2 năm trước và phiên bản Bphone 2 sẽ ra mắt trong ngày 8/8 tới đã tốn rất nhiều giấy mực của báo giới. Không chỉ bởi Bkav là “tay ngang” trên thị trường vốn đã cạnh tranh đầy khốc liệt với không ít “lão tướng” dần phải rời bỏ cuộc chơi mà còn bởi vì Bkav đã chịu chi với bản hợp đồng lớn với Qualcomm. Năm 2015, ông Thiều Phương Nam, Tổng Giám đốc công ty Qualcomm khu vực Đông Dương, cho biết Bkav là công ty Đông Nam Á đầu tiên ký hợp đồng trực tiếp với tập đoàn này để sử dụng toàn bộ sáng chế của Qualcomm trong các dòng smartphone do họ sản xuất. Tất nhiên giá trị hợp đồng không bao giờ được tiết lộ nhưng giới công nghệ dự đoán Bkav phải bỏ ra nhiều triệu USD để tận dụng công nghệ của hãng sản xuất thiết bị bán dẫn lớn nhất thế giới.
                           
                        </div>  
                </div>
                <div class="clear"></div>
            </div>  
        </div>
      <!-- end div #main -->
<?php endforeach; ?>

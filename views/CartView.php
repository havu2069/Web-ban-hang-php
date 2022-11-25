<?php 
  //load file layout vao day de do du lieu cua view vao file layout do
  $this->layoutPath = "LayoutTrangTrong.php";
 ?>
<?php if(isset($_SESSION["cart"])): ?>
<div class="template-cart">
          <form action="index.php?controller=cart&action=update" method="post">
            <div class="table-responsive">
              <table class="table table-cart">
                <thead>
                  <tr>
                    <th class="image">Ảnh sản phẩm</th>
                    <th class="name">Tên sản phẩm</th>
                    <th class="price">Giá bán lẻ</th>
                    <th class="quantity">Số lượng</th>
                    <th class="price">Thành tiền</th>
                    <th>Xóa</th>
                  </tr>
                </thead>
                <tbody> 
                <?php foreach($_SESSION["cart"] as $product): ?>               
                  <tr>
                    <td><img src="assets/upload/products/<?php echo $product["photo"]; ?>" class="img-responsive" /></td>
                    <td><a href="index.php?controller=products&action=detail&id=<?php echo $product["id"]; ?>"><?php echo $product["name"]; ?></a></td>
                    <td> <?php echo number_format($product['price']-$product['price']*$product['discount']/100); ?>₫ </td>
                    <td><input type="number" id="qty" min="1" class="input-control" value="<?php echo $product["number"]; ?>" name="product_<?php echo $product["id"]; ?>" required="Không thể để trống"></td>
                    <td><p><b><?php echo number_format($product["number"]*($product['price']-$product['price']*$product['discount']/100)); ?>₫</b></p></td>
                    <td><a href="index.php?controller=cart&action=remove&id=<?php echo $product["id"]; ?>" data-id="2479395"><i class="fa fa-trash"></i></a></td>
                  </tr>
                <?php endforeach; ?>
                </tbody>
                <tfoot>
                  <tr>
                    <td colspan="6"><a href="index.php?controller=cart&action=destroy" class="button pull-left">Xóa toàn bộ</a> <a href="index.php" class="button pull-right black">Tiếp tục mua hàng</a>
                      <?php if($this->cartNumber() > 0): ?>
                      <input type="submit" class="button pull-right" value="Cập nhật">
                    <?php endif; ?>
                    </td>
                  </tr>
                </tfoot>
              </table>
            </div>
          </form>
          <div class="total-cart"> 
            <?php if($this->cartNumber() > 0): ?>
            Tổng tiền thanh toán:
            <?php echo number_format($this->cartTotal()); ?>₫ <br>
            <a href="index.php?controller=cart&action=checkout" class="button black">Thanh toán</a> </div>
          <?php endif; ?>
        </div>
<?php endif; ?>
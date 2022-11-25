<?php 
    //load file layout vao day de do du lieu cua view vao file layout do
$this->layoutPath = "Layout.php";
?>                    
<div class="col-md-12">
    <div style="margin-bottom:5px;">
        <a href="index.php?controller=products&action=create" class="btn btn-primary">Create</a>
    </div>
    <div class="panel panel-primary">
        <div class="panel-heading">List products</div>
        <div class="panel-body">
            <table class="table table-bordered table-hover">
                <tr>
                    <th style="width: 100px;">Image</th>
                    <th>Name</th>
                    <th style="width: 200px;">Category</th>
                    <th style="width: 120px; text-align: center;">Price</th>
                    <th style="width: 60px;">Discount</th>
                    <th style="width: 70px;">Hot</th>
                    <th style="width:100px;"></th>
                </tr>
                <?php foreach($data as $rows): ?>
                <tr>
                    <td style="text-align: center;">
                        <?php if(file_exists("../assets/upload/products/".$rows->photo)&&$rows->photo!=""): ?>
                            <img style="width:100px;" src="../assets/upload/products/<?php echo $rows->photo; ?>">
                        <?php endif; ?>
                    </td>
                    <td><?php echo $rows->name; ?></td>
                    <td>
                        <?php 
                            $category = $this->modelGetCategory($rows->category_id);
                            echo isset($category->name) ? $category->name : "";
                         ?>
                    </td>
                    <td style="text-align: center;"><?php echo number_format($rows->price); ?> VNĐ</td>
                    <td style="text-align: center;"><?php echo $rows->discount; ?> %</td>
                    <td style="text-align: center;">
                        <?php if($rows->hot == 1): ?>
                            <span class="fa fa-check"></span>
                        <?php endif; ?>
                    </td>
                    <td style="text-align:center;">
                        <a href="index.php?controller=products&action=update&id=<?php echo $rows->id; ?>">Edit</a>&nbsp;
                        <a href="index.php?controller=products&action=delete&id=<?php echo $rows->id; ?>" onclick="return window.confirm('Are you sure?');">Delete</a>
                    </td>
                </tr>
                <?php endforeach; ?>
            </table>
            <style type="text/css">
                .pagination{padding:0px; margin:0px;}
            </style>
            <ul class="pagination">
                <?php for($i = 1; $i <= $numPage; $i++): ?>
                <li><a href="index.php?controller=products&action=read&p=<?php echo $i; ?>"><?php echo $i; ?></a></li>
                <?php endfor; ?>
            </ul>
        </div>
    </div>
</div>
<?php 
    //load file layout vao day de do du lieu cua view vao file layout do
$this->layoutPath = "Layout.php";
?>                    
<div class="col-md-12">
    <div style="margin-bottom:5px;">
        <a href="index.php?controller=slides&action=create" class="btn btn-primary">Create</a>
    </div>
    <div class="panel panel-primary">
        <div class="panel-heading">List slide</div>
        <div class="panel-body">
            <table class="table table-bordered table-hover">
                <tr>
                	<th style="width: 50px;">Image</th>
                    <th style="width: 30px;">Hot</th>
                    <th style="width:60px;"></th>
                </tr>
                <?php foreach($data as $rows): ?>
                <tr>
                    <td style="text-align: center;">
                        <?php if(file_exists("../assets/upload/products/".$rows->photo)&&$rows->photo!=""): ?>
                            <img style="width:100px;" src="../assets/upload/products/<?php echo $rows->photo; ?>">
                        <?php endif; ?>
                    </td>
                    <td style="text-align: center;">
                        <?php if($rows->hot == 1): ?>
                            <span class="fa fa-check"></span>
                        <?php endif; ?>
                    </td>
                    <td style="text-align:center;">
                        <a href="index.php?controller=slides&action=update&id=<?php echo $rows->id; ?>">Edit</a>&nbsp;
                        <a href="index.php?controller=slides&action=delete&id=<?php echo $rows->id; ?>" onclick="return window.confirm('Are you sure?');">Delete</a>
                    </td>
                </tr>
                <?php endforeach; ?>
            </table>
            <style type="text/css">
                .pagination{padding:0px; margin:0px;}
            </style>
            <ul class="pagination">
                <?php for($i = 1; $i <= $numPage; $i++): ?>
                <li><a href="index.php?controller=slides&action=read&p=<?php echo $i; ?>"><?php echo $i; ?></a></li>
                <?php endfor; ?>
            </ul>
        </div>
    </div>
</div>
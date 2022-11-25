<?php 
    //load file layout vao day de do du lieu cua view vao file layout do
$this->layoutPath = "Layout.php";
?>                    
<div class="col-md-12">
    <div style="margin-bottom:5px;">
        <a href="index.php?controller=categories&action=create" class="btn btn-primary">Create category</a>
    </div>
    <div class="panel panel-primary">
        <div class="panel-heading">List categories</div>
        <div class="panel-body">
            <table class="table table-bordered table-hover">
                <tr>
                    <th>name</th>
                    <th style="width: 200px;">Hiển thị trang chủ</th>
                    <th style="width:100px;"></th>
                </tr>
                <?php foreach($data as $rows): ?>
                <tr>
                    <td><?php echo $rows->name; ?></td>
                    <td style="text-align: center;">
                        <?php if($rows->hienthitrangchu == 1): ?>
                            <span class="fa fa-check"></span>
                        <?php endif; ?>
                    </td>
                    <td style="text-align:center;">
                        <a href="index.php?controller=categories&action=update&id=<?php echo $rows->id; ?>">Edit</a>&nbsp;
                        <a href="index.php?controller=categories&action=delete&id=<?php echo $rows->id; ?>" onclick="return window.confirm('Are you sure?');">Delete</a>
                    </td>
                </tr>
                <!-- cap danh muc con -->
                <?php 
                    $categoriesSub = $this->modelListCategoriesSub($rows->id);
                 ?>
                 <?php foreach($categoriesSub as $rowsSub): ?>
                    <tr>
                        <td style="padding-left: 35px;"><?php echo $rowsSub->name; ?></td>
                        <td style="text-align: center;">
                            <?php if($rowsSub->hienthitrangchu == 1): ?>
                                <span class="fa fa-check"></span>
                            <?php endif; ?>
                        </td>
                        <td style="text-align:center;">
                            <a href="index.php?controller=categories&action=update&id=<?php echo $rowsSub->id; ?>">Edit</a>&nbsp;
                            <a href="index.php?controller=categories&action=delete&id=<?php echo $rowsSub->id; ?>" onclick="return window.confirm('Are you sure?');">Delete</a>
                        </td>
                    </tr>
                 <?php endforeach; ?>
                <!-- /cap danh muc con -->
                <?php endforeach; ?>
            </table>
            <style type="text/css">
                .pagination{padding:0px; margin:0px;}
            </style>
            <ul class="pagination">
                <?php for($i = 1; $i <= $numPage; $i++): ?>
                <li><a href="index.php?controller=categories&action=read&p=<?php echo $i; ?>"><?php echo $i; ?></a></li>
                <?php endfor; ?>
            </ul>
        </div>
    </div>
</div>
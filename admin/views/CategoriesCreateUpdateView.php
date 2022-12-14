<?php 
    //load file layout vao day de do du lieu cua view vao file layout do
    $this->layoutPath = "Layout.php";
 ?>
<div class="col-md-12">  
    <div class="panel panel-primary">
        <div class="panel-heading">create upate category</div>
        <div class="panel-body">
        <form method="post" action="<?php echo $action; ?>">
            <!-- rows -->
            <div class="row" style="margin-top:5px;">
                <div class="col-md-2">Name</div>
                <div class="col-md-10">
                    <input type="text" value="<?php echo isset($record->name)?$record->name:""; ?>" name="name" class="form-control" required>
                </div>
            </div>
            <!-- end rows -->
            <!-- rows -->
            <div class="row" style="margin-top:5px;">
                <div class="col-md-2">Hiển thị trang chủ</div>
                <div class="col-md-10">
                    <input type="checkbox" <?php if(isset($record->hienthitrangchu)&&$record->hienthitrangchu==1): ?> checked <?php endif; ?> id="hienthitrangchu" name="hienthitrangchu"> <label for="hienthitrangchu">Hiển thị trang chủ</label>
                </div>
            </div>
            <!-- end rows -->
            <!-- rows -->
            <div class="row" style="margin-top:5px;">
                <div class="col-md-2">Parent</div>
                <div class="col-md-10">
                    <select name="parent_id" class="form-control" style="width:300px;">
                        <option value="0"></option>
                        <?php 
                            //trong view cung co the goi duoc cac ham trong controller va model
                            $category_id = isset($record->id) ? $record->id:0;
                            $categories = $this->modelListCategories($category_id);
                         ?>
                         <?php foreach($categories as $rows): ?>
                         <option <?php if(isset($record->parent_id)&&$record->parent_id==$rows->id): ?> selected <?php endif; ?> value="<?php echo $rows->id; ?>"><?php echo $rows->name; ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
            </div>
            <!-- end rows -->            
            <!-- rows -->
            <div class="row" style="margin-top:5px;">
                <div class="col-md-2"></div>
                <div class="col-md-10">
                    <input type="submit" value="Process" class="btn btn-primary">
                </div>
            </div>
            <!-- end rows -->
        </form>
        </div>
    </div>
</div>
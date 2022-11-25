<?php 
//load file layout vao day de do du lieu cua view vao file layout do
$this->layoutPath = "Layout.php";
?> 
<div class="col-md-12">  
    <div class="panel panel-primary">
        <div class="panel-heading">Add edit slide</div>
        <div class="panel-body">
            <!-- muon upload file thi phai co thuoc tinh enctype="multipart/form-data" o trong the form -->
            <form method="post" enctype="multipart/form-data" action="<?php echo $action; ?>">
                <div class="row" style="margin-top:5px;">
                    <div class="col-md-2"></div>
                    <div class="col-md-10">
                        <input type="checkbox" <?php if(isset($record->hot)&&$record->hot==1): ?> checked <?php endif; ?> name="hot" id="hot"> <label for="hot">Hot products</label>
                    </div>
                </div>
                <!-- end rows -->
                <!-- rows -->
                <div class="row" style="margin-top:5px;">
                    <div class="col-md-2">Upload image</div>
                    <div class="col-md-10">
                        <input type="file" name="photo">
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
<?php 
//load file layout vao day de do du lieu cua view vao file layout do
$this->layoutPath = "Layout.php";
?> 
<div class="col-md-12">  
    <div class="panel panel-primary">
        <div class="panel-heading">Add edit products</div>
        <div class="panel-body">
            <!-- muon upload file thi phai co thuoc tinh enctype="multipart/form-data" o trong the form -->
            <form method="post" enctype="multipart/form-data" action="<?php echo $action; ?>">
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
                    <div class="col-md-2">Price</div>
                    <div class="col-md-10">
                        <input type="number" value="<?php echo isset($record->price)?$record->price:""; ?>" name="price" class="form-control" required>
                    </div>
                </div>
                <!-- end rows -->
                <!-- rows -->
                <div class="row" style="margin-top:5px;">
                    <div class="col-md-2">Discount (1-100%)</div>
                    <div class="col-md-10">
                        <input type="number" value="<?php echo isset($record->discount)?$record->discount:"0"; ?>" name="discount" class="form-control" required>
                    </div>
                </div>
                <!-- end rows -->
                <!-- rows -->
                <div class="row" style="margin-top:5px;">
                    <div class="col-md-2">Category</div>
                    <div class="col-md-10">
                        <select name="category_id" class="form-control" style="width: 200px;">   
                        <?php 
                            $categories = $this->modelListCategories();
                         ?>                         
                         <?php foreach($categories as $rows): ?>
                            <option <?php if(isset($record->category_id)&&$record->category_id==$rows->id): ?> selected <?php endif; ?> value="<?php echo $rows->id; ?>"><?php echo $rows->name; ?></option>
                            <?php 
                                $categoriesSub = $this->modelListCategoriesSub($rows->id);
                             ?>
                             <?php foreach($categoriesSub as $rowsSub): ?>
                                <option <?php if(isset($record->category_id)&&$record->category_id==$rowsSub->id): ?> selected <?php endif; ?> value="<?php echo $rowsSub->id; ?>">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $rowsSub->name; ?></option>
                            <?php endforeach; ?>
                         <?php endforeach; ?>
                        </select>
                    </div>
                </div>
                <!-- end rows --> 
                <!-- rows -->
                <div class="row" style="margin-top:5px;">
                    <div class="col-md-2">Color</div>
                    <div class="col-md-10">
                        <textarea name="color" id="color">
                            <?php echo isset($record->color)?$record->color:""; ?>
                        </textarea>
                        <script type="text/javascript">
                            CKEDITOR.replace("color");
                        </script>
                    </div>
                </div>
                <!-- end rows --> 
                <!-- rows -->
                <div class="row" style="margin-top:5px;">
                    <div class="col-md-2">Size</div>
                    <div class="col-md-10">
                        <textarea name="size" id="size">
                            <?php echo isset($record->size)?$record->size:""; ?>
                        </textarea>
                        <script type="text/javascript">
                            CKEDITOR.replace("size");
                        </script>
                    </div>
                </div>
                <!-- end rows -->    
                <!-- rows -->
                <div class="row" style="margin-top:5px;">
                    <div class="col-md-2">Chất liệu</div>
                    <div class="col-md-10">
                        <textarea name="chatlieu" id="chatlieu">
                            <?php echo isset($record->chatlieu)?$record->chatlieu:""; ?>
                        </textarea>
                        <script type="text/javascript">
                            CKEDITOR.replace("chatlieu");
                        </script>
                    </div>
                </div>
                <!-- end rows -->   
                <!-- rows -->
                <div class="row" style="margin-top:5px;">
                    <div class="col-md-2">Hướng dẫn</div>
                    <div class="col-md-10">
                        <textarea name="huongdan" id="huongdan">
                            <?php echo isset($record->huongdan)?$record->huongdan:""; ?>
                        </textarea>
                        <script type="text/javascript">
                            CKEDITOR.replace("huongdan");
                        </script>
                    </div>
                </div>
                <!-- end rows -->          
                <!-- rows -->
                <div class="row" style="margin-top:5px;">
                    <div class="col-md-2">Descripition</div>
                    <div class="col-md-10">
                        <textarea name="description" id="description">
                            <?php echo isset($record->description)?$record->description:""; ?>
                        </textarea>
                        <script type="text/javascript">
                            CKEDITOR.replace("description");
                        </script>
                    </div>
                </div>
                <!-- end rows -->
                <!-- rows -->
                <div class="row" style="margin-top:5px;">
                    <div class="col-md-2">Content</div>
                    <div class="col-md-10">
                        <textarea name="content" id="content">
                            <?php echo isset($record->content)?$record->content:""; ?>
                        </textarea>
                        <script type="text/javascript">
                            CKEDITOR.replace("content");
                        </script>
                    </div>
                </div>
                <!-- end rows -->
                <!-- rows -->
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
                    <div class="col-md-2">Upload imageSub</div>
                    <div class="col-md-10">
                        <input type="file" name="photosub">
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
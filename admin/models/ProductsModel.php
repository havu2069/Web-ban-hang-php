<?php 
	trait ProductsModel{
		//ham lay cac ban ghi co phan trang
		public function modelRead($recordPerPage){
			//tong so ban ghi
			$totalRecord = $this->modelTotalRecord();
			//tinh so trang
			//ham ceil la ham lay tran cua gia tri. VD: ceil(2.1) = 3
			//ham floor la ham lay san cua gia tri. VD: floor(2.6) = 2
			$numPage = ceil($recordPerPage/$totalRecord);
			//lay bien p truyen tu url
			$p = isset($_GET["p"])&&is_numeric($_GET["p"])&&$_GET["p"]>0 ? ($_GET["p"]-1):0;
			//lay tu ban ghi nao
			$from = $p * $recordPerPage;
			//thuc hien truy van
			$conn = Connection::getInstance();
			$query = $conn->query("select * from products order by id desc limit $from,$recordPerPage");
			//lay tat ca ban ghi tra ve
			$result = $query->fetchAll();
			return $result;
		}
		//tinh tong so ban ghi
		public function modelTotalRecord(){
			//lay bien ket noi
			$conn = Connection::getInstance();
			//thuc hien truy van
			$query = $conn->prepare("select id from products");
			//thuc thi truy van. Neu khong co tham so o cau truy van thi ghi array rong
			$query->execute(array());
			//tra ve so luong ban ghi
			return $query->rowCount();
		}
		//lay mot ban ghi
		public function modelGetRecord($id){
			//lay bien ket noi
			$conn = Connection::getInstance();
			//thuc hien truy van
			$query = $conn->prepare("select * from products where id=:_id");
			//thuc thi truy van. Neu khong co tham so o cau truy van thi ghi array rong
			$query->execute(array(":_id"=>$id));
			//tra ve mot ban ghi
			return $query->fetch();
		}
		public function modelUpdate($id){
			$name = $_POST["name"];					
			$description = $_POST["description"];
			$content = $_POST["content"];
			$hot = isset($_POST["hot"])?1:0;
			$category_id = $_POST["category_id"];
			$price = $_POST["price"];
			$discount = $_POST["discount"];
			//update name
			//lay bien ket noi
			$conn = Connection::getInstance();
			//thuc hien truy van
			$query = $conn->prepare("update products set name=:_name, description=:_description,content=:_content,hot=:_hot,category_id=:_category_id,price=:_price,discount=:_discount where id=:_id");
			//thuc thi truy van. Neu khong co tham so o cau truy van thi ghi array rong
			$query->execute(array(":_id"=>$id,":_name"=>$name,":_description"=>$description,":_content"=>$content,":_hot"=>$hot,":_category_id"=>$category_id,":_price"=>$price,":_discount"=>$discount));
			//-------
			//neu user upload anh
			if($_FILES["photo"]["name"] != ""){
				//---
				//lay anh cu de xoa di
				$oldImage = $conn->prepare("select photo from products where id=:_id");
				$oldImage->execute(array(":_id"=>$id));
				//lay mot ban ghi
				$result = $oldImage->fetch();
				if(isset($result->photo) && file_exists("../assets/upload/products/".$result->photo))
					unlink("../assets/upload/products/".$result->photo);
				//---
				//lay anh moi de update
				$photo = time().$_FILES["photo"]["name"];
				//upload anh
				move_uploaded_file($_FILES["photo"]["tmp_name"], "../assets/upload/products/$photo");
				//update truong photo trong talble products
				//thuc hien truy van
				$query = $conn->prepare("update products set photo=:_photo where id=:_id");
				//thuc thi truy van. Neu khong co tham so o cau truy van thi ghi array rong
				$query->execute(array(":_id"=>$id,":_photo"=>$photo));
				//---
			}		
			//-------
		}
		public function modelCreate(){
			$name = $_POST["name"];					
			$description = $_POST["description"];
			$content = $_POST["content"];
			$hot = isset($_POST["hot"])?1:0;
			$category_id = $_POST["category_id"];
			$photo = "";
			$price = $_POST["price"];
			$discount = $_POST["discount"];
			//---
			//neu user upload anh
			if($_FILES["photo"]["name"] != ""){				
				//lay anh moi de update
				$photo = time().$_FILES["photo"]["name"];
				//upload anh
				move_uploaded_file($_FILES["photo"]["tmp_name"], "../assets/upload/products/$photo");				
			}
			//---
			//update name
			//lay bien ket noi
			$conn = Connection::getInstance();
			//thuc hien truy van
			$query = $conn->prepare("insert into products set name=:_name, description=:_description,content=:_content,hot=:_hot,photo=:_photo,category_id=:_category_id,price=:_price,discount=:_discount");
			//thuc thi truy van. Neu khong co tham so o cau truy van thi ghi array rong
			$query->execute(array(":_photo"=>$photo,":_name"=>$name,":_description"=>$description,":_content"=>$content,":_hot"=>$hot,":_category_id"=>$category_id,":_price"=>$price,":_discount"=>$discount));
			//-------			
		}
		public function modelDelete($id){
			//lay bien ket noi
			$conn = Connection::getInstance();
			//---
			//lay anh cu de xoa di
			$oldImage = $conn->prepare("select photo from products where id=:_id");
			$oldImage->execute(array(":_id"=>$id));
			//lay mot ban ghi
			$result = $oldImage->fetch();
			if(isset($result->photo) && file_exists("../assets/upload/products/".$result->photo))
				unlink("../assets/upload/products/".$result->photo);
			//---
			//thuc hien truy van
			$query = $conn->prepare("delete from products where id=:_id");
			//thuc thi truy van. Neu khong co tham so o cau truy van thi ghi array rong
			$query->execute(array(":_id"=>$id));			
		}	
		public function modelGetCategory($category_id){
			//lay bien ket noi
			$conn = Connection::getInstance();
			//thuc hien truy van
			$query = $conn->prepare("select name from categories where id=:_category_id");
			//thuc thi truy van. Neu khong co tham so o cau truy van thi ghi array rong
			$query->execute(array(":_category_id"=>$category_id));
			//tra ve mot ban ghi
			return $query->fetch();
		}	
		public function modelListCategories(){
			//lay bien ket noi
			$conn = Connection::getInstance();
			//thuc hien truy van
			$query = $conn->prepare("select * from categories where parent_id = 0");
			//thuc thi truy van. Neu khong co tham so o cau truy van thi ghi array rong
			$query->execute();
			//lay tat ca ket qua tra ve
			$result = $query->fetchAll();
			return $result;
		}
		public function modelListCategoriesSub($category_id){
			//lay bien ket noi
			$conn = Connection::getInstance();
			//thuc hien truy van
			$query = $conn->prepare("select * from categories where parent_id = :_category_id");
			//thuc thi truy van. Neu khong co tham so o cau truy van thi ghi array rong
			$query->execute([":_category_id"=>$category_id]);
			//lay tat ca ket qua tra ve
			$result = $query->fetchAll();
			return $result;
		}
	}
 ?>
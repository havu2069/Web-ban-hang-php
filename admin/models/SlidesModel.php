<?php 
	trait SlidesModel{
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
			$query = $conn->query("select * from slides order by id desc limit $from,$recordPerPage");
			//lay tat ca ban ghi tra ve
			$result = $query->fetchAll();
			return $result;
		}
		//tinh tong so ban ghi
		public function modelTotalRecord(){
			//lay bien ket noi
			$conn = Connection::getInstance();
			//thuc hien truy van
			$query = $conn->prepare("select id from slides");
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
			$query = $conn->prepare("select * from slides where id=:_id");
			//thuc thi truy van. Neu khong co tham so o cau truy van thi ghi array rong
			$query->execute(array(":_id"=>$id));
			//tra ve mot ban ghi
			return $query->fetch();
		}
		public function modelUpdate($id){
			$hot = isset($_POST["hot"])?1:0;
			//lay bien ket noi
			$conn = Connection::getInstance();
			//thuc hien truy van
			$query = $conn->prepare("update slides set hot=:_hot where id=:_id");
			//thuc thi truy van. Neu khong co tham so o cau truy van thi ghi array rong
			$query->execute(array(":_id"=>$id,":_hot"=>$hot));
			//-------
			if($_FILES["photo"]["name"] != ""){
				//---
				//lay anh cu de xoa di
				$oldImage = $conn->prepare("select photo from slides where id=:_id");
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
				$query = $conn->prepare("update slides set photo=:_photo where id=:_id");
				//thuc thi truy van. Neu khong co tham so o cau truy van thi ghi array rong
				$query->execute(array(":_id"=>$id,":_photo"=>$photo));
				//---
			}		
			//-------
		}
		public function modelCreate(){
			if($_FILES["photo"] != ""){				
				//lay anh moi de update
				$photo = time().$_FILES["photo"];
				//upload anh
				move_uploaded_file($_FILES["photo"], "../assets/upload/products/$photo");				
			}
			//---
			//update name
			//lay bien ket noi
			$conn = Connection::getInstance();
			//thuc hien truy van
			$query = $conn->prepare("insert into slides set hot=:_hot,photo=:_photo");
			//thuc thi truy van. Neu khong co tham so o cau truy van thi ghi array rong
			$query->execute(array(":_photo"=>$photo,":_hot"=>$hot));
			//-------			
		}
		public function modelDelete($id){
			//lay bien ket noi
			$conn = Connection::getInstance();
			//---
			//lay anh cu de xoa di
			$oldImage = $conn->prepare("select photo from slides where id=:_id");
			$oldImage->execute(array(":_id"=>$id));
			//lay mot ban ghi
			$result = $oldImage->fetch();
			if(isset($result->photo) && file_exists("../assets/upload/products/".$result->photo))
				unlink("../assets/upload/products/".$result->photo);
			//---
			//thuc hien truy van
			$query = $conn->prepare("delete from slides where id=:_id");
			//thuc thi truy van. Neu khong co tham so o cau truy van thi ghi array rong
			$query->execute(array(":_id"=>$id));			
		}	
	}
 ?>
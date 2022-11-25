<?php 
	trait CategoriesModel{
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
			$query = $conn->query("select * from categories where parent_id = 0 order by id desc limit $from,$recordPerPage");
			//lay tat ca ban ghi tra ve
			$result = $query->fetchAll();
			return $result;
		}
		//tinh tong so ban ghi
		public function modelTotalRecord(){
			//lay bien ket noi
			$conn = Connection::getInstance();
			//thuc hien truy van
			$query = $conn->prepare("select id from categories where parent_id=0");
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
			$query = $conn->prepare("select * from categories where id=:_id");
			//thuc thi truy van. Neu khong co tham so o cau truy van thi ghi array rong
			$query->execute(array(":_id"=>$id));
			//tra ve mot ban ghi
			return $query->fetch();
		}
		public function modelUpdate($id){
			$name = $_POST["name"];					
			$parent_id = $_POST["parent_id"];
			$hienthitrangchu = isset($_POST["hienthitrangchu"])?1:0;
			//update name
			//lay bien ket noi
			$conn = Connection::getInstance();
			//thuc hien truy van
			$query = $conn->prepare("update categories set name=:_name, parent_id=:_parent_id,hienthitrangchu=:_hienthitrangchu where id=:_id");
			//thuc thi truy van. Neu khong co tham so o cau truy van thi ghi array rong
			$query->execute(array(":_id"=>$id,":_name"=>$name,":_parent_id"=>$parent_id,":_hienthitrangchu"=>$hienthitrangchu));			
		}
		public function modelCreate(){
			$name = $_POST["name"];
			$parent_id = $_POST["parent_id"];	
			$hienthitrangchu = isset($_POST["hienthitrangchu"])?1:0;				
			//lay bien ket noi
			$conn = Connection::getInstance();
			//thuc hien truy van
			$query = $conn->prepare("insert into categories set name=:_name, parent_id=:_parent_id,hienthitrangchu=:_hienthitrangchu");
			//thuc thi truy van. Neu khong co tham so o cau truy van thi ghi array rong
			$query->execute(array(":_parent_id"=>$parent_id,":_name"=>$name,":_hienthitrangchu"=>$hienthitrangchu));
		}
		public function modelDelete($id){
			//lay bien ket noi
			$conn = Connection::getInstance();
			//thuc hien truy van
			$query = $conn->prepare("delete from categories where id=:_id");
			//thuc thi truy van. Neu khong co tham so o cau truy van thi ghi array rong
			$query->execute(array(":_id"=>$id));			
		}
		public function modelListCategories($category_id){
			//lay bien ket noi
			$conn = Connection::getInstance();
			//thuc hien truy van
			$query = $conn->prepare("select * from categories where parent_id = 0 and id <> $category_id");
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
<?php 
	trait HeaderModel{
		//liet ke cac danh muc cap 0
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
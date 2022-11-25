<?php 
	trait ProductsModel{
		//ham lay cac ban ghi co phan trang
		public function modelRead($recordPerPage, $category_id){
			//-------------
			$order = isset($_GET["order"]) ? $_GET["order"] : "";
			//order by mac dinh neu khong co bien order truyen tu url
			$orderBy = " order by id desc ";
			switch($order){
				case "priceAsc":
				$orderBy = " order by price asc ";
				break;
				case "priceDesc":
				$orderBy = " order by price desc ";
				break;
				case "nameAsc":
				$orderBy = " order by name asc ";
				break;
				case "nameDesc":
				$orderBy = " order by name desc ";
				break;
			}
			//-------------
			//tong so ban ghi
			$totalRecord = $this->modelTotalRecord($category_id);
			//tinh so trang
			//ham ceil la ham lay tran cua gia tri. VD: ceil(2.1) = 3
			//ham floor la ham lay san cua gia tri. VD: floor(2.6) = 2
			//$numPage = ceil($recordPerPage/$totalRecord);
			//lay bien p truyen tu url
			$p = isset($_GET["p"])&&is_numeric($_GET["p"])&&$_GET["p"]>0 ? ($_GET["p"]-1):0;
			//lay tu ban ghi nao
			$from = $p * $recordPerPage;
			//thuc hien truy van
			$conn = Connection::getInstance();
			$query = $conn->query("select * from products where category_id=$category_id $orderBy limit $from,$recordPerPage");
			//lay tat ca ban ghi tra ve
			$result = $query->fetchAll();
			return $result;
		}
		//tinh tong so ban ghi
		public function modelTotalRecord($category_id){
			//lay bien ket noi
			$conn = Connection::getInstance();
			//thuc hien truy van
			$query = $conn->prepare("select id from products where category_id=$category_id");
			//thuc thi truy van. Neu khong co tham so o cau truy van thi ghi array rong
			$query->execute(array());
			//tra ve so luong ban ghi
			return $query->rowCount() > 0 ? $query->rowCount() : 1;
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
		public function modelRating(){
			$id = isset($_GET["id"])?$_GET["id"]:0;
			$star = isset($_GET["star"])?$_GET["star"]:0;
			//lay bien ket noi
			$conn = Connection::getInstance();
			//thuc hien truy van
			$query = $conn->prepare("insert into rating set product_id=:_product_id, star = :_star");
			//thuc thi truy van. Neu khong co tham so o cau truy van thi ghi array rong
			$query->execute(array(":_product_id"=>$id,":_star"=>$star));
		}
		//lay so luong rating
		public function modelCountRating($star){
			 $id = isset($_GET["id"])?$_GET["id"]:0;
			//lay bien ket noi
			$conn = Connection::getInstance();
			//thuc hien truy van
			$query = $conn->prepare("select product_id from rating where star = :_star and product_id=:_id");
			//thuc thi truy van. Neu khong co tham so o cau truy van thi ghi array rong
			$query->execute(array(":_id"=>$id,":_star"=>$star));
			//echo $result->rowCount();
			return $query->rowCount();
		}	
	}
 ?>
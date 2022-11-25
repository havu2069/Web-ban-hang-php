<?php 
	trait NewsModel{
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
			$query = $conn->query("select * from news order by id desc limit $from,$recordPerPage");
			//lay tat ca ban ghi tra ve
			$result = $query->fetchAll();
			return $result;
		}
		//tinh tong so ban ghi
		public function modelTotalRecord(){
			//lay bien ket noi
			$conn = Connection::getInstance();
			//thuc hien truy van
			$query = $conn->prepare("select id from news");
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
			$query = $conn->prepare("select * from news where id=:_id");
			//thuc thi truy van. Neu khong co tham so o cau truy van thi ghi array rong
			$query->execute(array(":_id"=>$id));
			//tra ve mot ban ghi
			return $query->fetch();
		}		
		//lay 6 tin tuc noi bat
		public function modelHotNews(){
			$conn = Connection::getInstance();
			$query = $conn->query("select * from news where hot=1 order by id desc limit 0,6");
			$result = $query->fetchAll();
			return $result;
		}
	}
 ?>
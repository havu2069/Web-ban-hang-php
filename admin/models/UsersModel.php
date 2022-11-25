<?php 
	trait UsersModel{
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
			$query = $conn->query("select * from users order by id desc limit $from,$recordPerPage");
			//lay tat ca ban ghi tra ve
			$result = $query->fetchAll();
			return $result;
		}
		//tinh tong so ban ghi
		public function modelTotalRecord(){
			//lay bien ket noi
			$conn = Connection::getInstance();
			//thuc hien truy van
			$query = $conn->prepare("select id from users");
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
			$query = $conn->prepare("select * from users where id=:_id");
			//thuc thi truy van. Neu khong co tham so o cau truy van thi ghi array rong
			$query->execute(array(":_id"=>$id));
			//tra ve mot ban ghi
			return $query->fetch();
		}
		public function modelUpdate($id){
			$name = $_POST["name"];
			$password = $_POST["password"];			
			//update name
			//lay bien ket noi
			$conn = Connection::getInstance();
			//thuc hien truy van
			$query = $conn->prepare("update users set name=:_name where id=:_id");
			//thuc thi truy van. Neu khong co tham so o cau truy van thi ghi array rong
			$query->execute(array(":_id"=>$id,":_name"=>$name));
			//neu password khong rong thi update password
			if($password != ""){
				//ma hoa password
				$password = md5($password);
				//thuc hien truy van
				$query = $conn->prepare("update users set password=:_password where id=:_id");
				//thuc thi truy van. Neu khong co tham so o cau truy van thi ghi array rong
				$query->execute(array(":_id"=>$id,":_password"=>$password));
			}
		}
		public function modelCreate(){
			$name = $_POST["name"];
			$email = $_POST["email"];
			$password = $_POST["password"];		
			//ma hoa password	
			$password = md5($password);
			//update name
			//lay bien ket noi
			$conn = Connection::getInstance();
			//thuc hien truy van
			$query = $conn->prepare("insert into users set name=:_name, email=:_email,password=:_password");
			//thuc thi truy van. Neu khong co tham so o cau truy van thi ghi array rong
			$query->execute(array(":_email"=>$email,":_password"=>$password,":_name"=>$name));
		}
		public function modelDelete($id){
			//lay bien ket noi
			$conn = Connection::getInstance();
			//thuc hien truy van
			$query = $conn->prepare("delete from users where id=:_id");
			//thuc thi truy van. Neu khong co tham so o cau truy van thi ghi array rong
			$query->execute(array(":_id"=>$id));			
		}
	}
 ?>
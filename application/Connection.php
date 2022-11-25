<?php 
	//ket noi csdl
	class Connection{
		//ham ket noi csdl, tra ket qua ve mot bien ket noi
		//chu static o day de thuc hien tenclass::tenham() ma khong can khoi tao object cua class
		public static function getInstance(){
			//su dung PDO de ket noi csdl mysql
			//new PDO("chuoi ket noi csdl","username","password")
			$connect = new PDO("mysql:host=localhost;dbname=mydata","root","");
			//xac lap lay du lieu theo chuan unicode (neu khong co dong nay thi se khong hien thi duoc tieng viet)
			$connect->exec("set names utf8");
			//xac lap cach duyet doi tuong o tap ket qua tra ve
			$connect->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
			//tra ket qua de cac noi khac nhan duoc
			return $connect;
		}
	}
 ?>
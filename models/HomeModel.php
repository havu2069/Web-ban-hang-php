<?php 
	trait HomeModel{
		//lay 6 san pham noi bat
		public function modelHotProduct(){
			$conn = Connection::getInstance();
			$query = $conn->query("select * from products where hot=1 order by id desc limit 0,6");
			$result = $query->fetchAll();
			return $result;
		}
		//lay cac danh muc co hienthitrangchu=1
		public function modelCategoryDisplayHome(){
			$conn = Connection::getInstance();
			$query = $conn->query("select * from categories where hienthitrangchu=1 order by id desc");
			$result = $query->fetchAll();
			return $result;
		}
		//lay 6 san pham thuoc danh muc
		public function modelProductsInCategory($category_id){
			$conn = Connection::getInstance();
			$query = $conn->query("select * from products where category_id=$category_id or category_id in (select id from categories where parent_id=$category_id) order by id desc limit 0,6");
			$result = $query->fetchAll();
			return $result;
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
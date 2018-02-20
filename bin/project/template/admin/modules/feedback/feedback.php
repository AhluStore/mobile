<?php
	class feedback{
		public function index(){
			$view = is_admin()?"":"_account";
			include_once "view/index{$view}.php";
		}
		public function profile($id=null){
			if(is_admin()){
				$query = "select * from view_customer_enterprise where customer_id='{$id}'";
			}else{
				$query = "select * from view_customer_enterprise where customer_id='{$id}'and enterprise_id='".id_user()."'";
			}
			$customer = query($query);
			if($customer){
				$customer = $customer[0];
				$view = is_admin()?"":"_account";
				include_once "view/profile{$view}.php";

			}else{
				AhluError()->get404("Can not find 'customer'.");
			}

			
		}

		public function add(){
			if(is_admin()){
				include_once "view/add.php";
			}else{
				AhluError()->get404("You can not access this function.");
			}
			
		}
		public function edit($id){
			if(is_admin()){
				include_once "view/edit.php";
			}else{
				AhluError()->get404("You can not access this function.");
			}
			
		}
		public function gift(){
			$view = is_admin()?"":"_account";
			include_once "view/gift{$view}.php";
		}
		public function coupon(){
			$view = is_admin()?"":"_account";
			include_once "view/coupon{$view}.php";
		}
		public function promotion(){
			include_once "view/promotion.php";
		}
	}
?>
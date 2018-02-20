<?php
	class home{
		public function index(){
			
			$this->dashboard();	
		}
		public function dashboard(){
			include_once "view/dashboard.php";
		}
		public function logout(){
			goto_url(site_url("api.php?c=account&m=logout",true));
		}
	}
?>
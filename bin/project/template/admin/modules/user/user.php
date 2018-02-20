<?php
/*
*
*
*/
	class user{
		public function __construct(){

		}
		public function index(){

			$view = is_admin()?"":"_account";
			include_once "view/index{$view}.php";
		}
		public function userList(){

			$view = is_admin()?"":"_account";
			include_once "view/index{$view}.php";
		}
		
	}
?>
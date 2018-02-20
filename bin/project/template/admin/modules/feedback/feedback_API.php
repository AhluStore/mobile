<?php
	class feedback_API{
		public function index(){
			
		
		}
		
		public function login(){
			$username = $this->ahlu->username;
			$pass = md5($this->ahlu->password);
			$data = query("select * from me_enterprise_account where account_user='{$username}' and account_pass='{$pass}'");
			if($data){
				//set
				$_SESSION["token"]= $data[0]->account_id;
				$_SESSION["token_access"]= $data[0]->account_user=="root"?1:0;

				echo json_encode(array(
					"d"=>array(
						"code"=>1,
						"data"=>$data[0]->account_id,
						"error"=>""
					)
				));
			}else{
				$_SESSION["token"]= null;
				unset($_SESSION["token"]);
				echo json_encode(array(
					"d"=>array(
						"code"=>0,
						"data"=>null,
						"error"=>"Tên đăng nhập hoặc password không đúng"
					)
				));
			}
		}
		public function logout(){
			//logout
			unset($_SESSION["token_access"]);
			unset($_SESSION["token"]);
			goto_url(site_url_admin("login.php",true));
		}
	}
?>
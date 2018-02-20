<?php
	function get_cus(){
		//get file
		$key = isset($_REQUEST["key"]);
		if($key){
			//get file store or in db
		}

		return null;
	}
	function get_cus_key($cus){
		if(empty($cus)) return null;
		if(!is_array($cus) && is_array($cus)) return null;
		//create key
		$key = md5($cus->id_customer."-".time()."-".$cus->id_vendor."-".$cus->id_app);
		//store key
		$file = date("Y/m/d")."/{$key}.key.ahlu";

		if(file_exists($file)){
			//check fired time
		}else{
			//create new key
		}
		return $key;
	}

	class user_API{
		public function __construct(){
			
		}
		public function login_sys(){
			
			$user = $this->ahlu->user_username;
			$pass = md5($this->ahlu->user_password);
			$project =$_GET["project"];
			$token =$_GET["token_access"];

			//check user
			$data = query("select u.*,b.name_branch from ".table_prefix("user")." u join ".table_prefix("branch")." b on b.id_branch=u.id_user_branch where username_user='{$user}' and password_user='{$pass}' and activated_user=1");
			$result = null;
			if($data){
				$data = $data[0];
				ob_clean();
				header('Content-type: application/json');
				$result = array(
					"project"=>$project,
					"token"=>$token,
					"displayName_user"=>$data->displayName_user,
					"fullname"=>$data->fullname_user,
					"customer_sex"=>$data->sex_user,
					"id_user"=>$data->id_user,
					"role"=>$data->id_role,
					"name_branch"=>$data->name_branch,
					"id_user_branch"=>$data->id_user_branch
				);

				echo json_encode($result);
			}else{
				
				$this->login_cus();
			}

			
		}
		/*
		* Login for user and customer
		*/
		public function login(){
			//user-app
			$what = $this->ahlu->what;


			switch ($what) {
				case 'admin':
				case 'guest':
				case 'shipper':
				case 'warehouse':
				case 'admin':
					$this->login_sys();
					break;
				
				default:
					//$this->login_cus();
					$this->login_sys();
					break;
			}
		}
		/*
		* Login for customer
		*/
		public function login_cus(){
			//user-app
			$user = $this->ahlu->user_username;
			$pass = md5($this->ahlu->user_password);
			$project =$_GET["project"];
			$token =$_GET["token_access"];

			//for customer
				// id_vendor
				//pass
				//username

				$data = query("select * from ".table_prefix("view_customer")." where username='{$user}' and password='{$pass}' and account_activated=1 and id_vendor='{$token}'");
				$result = null;
				if($data){
					$data = $data[0];
					ob_clean();
					header('Content-type: application/json');
					$result = array(
						//for layout guest app
						"project"=>$project,
						"token"=>$token,
						"role"=>"guest",

						"displayName_user"=>$user,
						"id_user"=>$data->id_customer,
						"id_user_branch"=>$data->id_branch,
						"key"=>get_cus_key($data),
						"member"=>$data->member
					);
				}

			echo json_encode($result);
		}
		/*
		* Outlet login
		*/
		public function login_oulet(){
			//user-app
			$user = $this->ahlu->user_username;
			$pass = md5($this->ahlu->user_password);
			$project =$_GET["project"];
			$token =$_GET["token_access"];

			//check user
			echo 
			$data = query("select * from ".table_prefix("enterprise_account")." where account_user='{$user}' and account_pass='{$pass}' and account_activated=1");
			$result = null;
			if($data){
				$data = $data[0];
				ob_clean();
				header('Content-type: application/json');
				$result = array(
					"project"=>$project,
					"token"=>$token,
					"displayName_user"=>$user,
					"id_user"=>$data->account_id,
					"enterprise_id"=>$data->enterprise_id,
					"role"=>"outlet"
				);
			}

			echo json_encode($result);
		}
	}
?>
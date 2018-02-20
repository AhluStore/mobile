<?php
	class setting_API{
		public function index(){
			
		
		}
		
		
		public function add($id_outlet=null){
			//get category type

			if(isset($this->ahlu->option_name)){
				if($this->exist($this->ahlu->option_name,$id_outlet)){
					query(sprintf("Update me_option set widget='%s' where who='%s' and option_name='%s'",$this->ahlu->widget,$id_outlet,$this->ahlu->option_name));
				}else{
					query(sprintf("insert into me_option(widget,who,option_name) value('%s','%s','%s')",$this->ahlu->widget,$id_outlet,$this->ahlu->option_name));
				}
			}else{
				echo -1;
			}

		}
		public function update($id=null){
			//get category type

			if($id && isset($this->ahlu)){
				
			}else{
				echo -1;
				die();
			}

		}
		public function delete($id=null){
			//get category type

			if($id && isset($this->ahlu)){
				
			}else{
				echo -1;
				die();
			}

		}
		public function exist($title,$id){
			if(!empty($title)){
				$title = db_escape_string($title);
				$data = query("select * from me_option where option_name='{$title}' and who='{$id}'");
				return is_array($data) && count($data)>0?1:0;
			}else{
				return 0;
			}
		}
	}
?>
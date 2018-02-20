<?php
	class setting{
		public function __construct(){
			$this->path =  __DIR__."/log/root/".date("Y/m/d");
			if(!is_dir($this->path)){
				mkdir($this->path,0775,true);
			}
			$this->path_copy =  __DIR__."/log/root/".date("Y/m/d")."/copy/";
			if(!is_dir($this->path_copy)){
				mkdir($this->path_copy,0775,true);
			}
		}

		public function load(){
			$list = array();
			foreach (glob("{$this->path}/*.table.ahlu") as $file) {
				$data = json_decode(file_get_contents($file));

				$list[] = $data;
			}
			echo json_encode($list);
		}
		public function save_item($id_table){
			if($id_table){
				$this->ahlu->id_table = $id_table;
				file_put_contents($this->path."/{$id_table}.table.ahlu", json_encode($this->ahlu));
				echo 1;
			}else{
				echo 0;
			}
		}
		public function delete_item($id_table){
			if($id_table){
				//force to delete if exist for merergin table
				if(file_exists($this->path."/{$id_table}.table.ahlu")){
					unlink($this->path."/{$id_table}.table.ahlu");
				}
				echo 1;
			}else{
				echo 0;
			}
		}
		public function save(){
			print_r($this->ahlu);	
		}
	}
?>
<?php
class page{
	private $_ext="html";

	public function __toString(){
		
	}
	public function __construct(){

	}
	public function help($inputs){

	}
	public function make($inputs){
		/*page:make project:hello role:name name:title_id display:normal*/
		$role =  isset($inputs["role"])?$inputs["role"]:"";
		$project =  isset($inputs["project"])?$inputs["project"]:"";

		$last =  $inputs["name"];
		$display =  isset($inputs["display"])?$inputs["display"]:"normal";
		
		//print_r($inputs);
		///die();
			switch($display){
				
				case "menu":
					include_once __DIR__."/view/menu.php";	
				break;
				case "scroll":
					include_once __DIR__."/view/scroll.php";
				break;
				case "panel":
					include_once __DIR__."/view/panel.php";
				break;
				case "tab":
					include_once __DIR__."/view/tab.php";
				break;
				case "list":
					$icon =  isset($inputs["icon"])?$inputs["icon"]=="true":false;
					include_once __DIR__."/view/list.php";
				break;
				default:
$html=<<<AHLU
<div id="{$last}" class="ahlu-page pt-page">
	<style type="text/css">
		#{$last}{
			
		}
	</style>
	<script type="text/javascript">
		window.window.AhluPage.events.on("on{$last}Before",function(e){
			var page = e.page;
			
		});
		window.window.AhluPage.events.on("on{$last}Init",function(e){
			var page = e.page;
			
		});
		window.window.AhluPage.events.on("on{$last}Leaving",function(e){
			var page = e.page;
			
		});
	</script>
	<div class="ahlu-header">
		<div class="row no-space">
			<div class="col-md-1 col-sm-1 col-xs-1 no-space"><i class="fa fa-arrow-left ahlu-back">&nbsp;</i></div> 
			<div class="col-md-8 col-sm-8 col-xs-8"><h1>{$last}</h1></div>
			<div class="no-space col-md-3 col-sm-3 col-xs-3 actions">
				<i class="fa fa-refresh" onclick="">&nbsp;</i> 
				<i class="fa fa-filter"  onclick="GoTo('');">&nbsp;</i>
			</div>
		</div>
	 </div>
	
	<div class="ahlu-body">
		Demo {$last}
	</div>
	<div class="ahlu-footer"></div>
</div>
AHLU;
					
				break;
				
			}
		
		

			$file = ROOT_APP."/{$project}/role/{$role}/{$last}.{$this->_ext}";
			if(!file_exists($file)){
				file_put_contents($file,$html);

				echo "Creating page '{$last}'...\n";
				flush();
				echo "Created page '{$last}' successfully.\n";
			}else{
				echo "Created page '{$last}' unsuccessfully.\n";
			}
			

	}	 
}
?>
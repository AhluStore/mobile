<?php
$li="";
for($i=1;$i<=10;$i++){
	$li.='<li>
		<a href="#" data-page="true" class="ahlu-button '.($icon?" icon ":"").'">Demo '.$i.'</a>
	</li>';
} 
$html=<<<AHLU
	<div id="{$last}" class="ahlu-page pt-page">
		<style type="text/css">
			#{$last}{
				
			}
			#{$last} .ahlu-listview{
				
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
				<div class="col-md-1 col-xs-1 no-space"><i class="fa fa-arrow-left ahlu-back">&nbsp;</i></div> 
				<div class="col-md-10 col-xs-10"><h1>{$last}</h1></div>
				<div class="no-space col-md-1 col-sm-1 col-xs-1 actions">
					
				</div>
			</div>
		 </div>
		
		<div class="ahlu-body">
			<ul class="ahlu-listview ahlu-listview-{$last}">
				{$li}
			</ul>
		</div>
		<div class="ahlu-footer"></div>
	</div>
AHLU;
?>
<?php
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
				<div class="col-md-1 col-xs-1 no-space"><i class="fa fa-arrow-left ahlu-back">&nbsp;</i></div> 
				<div class="col-md-10 col-xs-10"><h1>{$last}</h1></div>
				<div class="no-space col-md-1 col-sm-1 col-xs-1 actions">
					<div class="dropdown dropdown-right">
					  <button class="dropdown-toggle" type="button" data-toggle="dropdown" aria-expanded="false">
					  <span class="caret"></span></button>
					  <ul class="dropdown-menu">
						 <li>
							  <a href="#addExpense" data-page="true">Menu 1</a>
						  </li>
						  <li>
							  <a href="#addIncome" data-page="true">Menu 2</a>
						  </li>
					  </ul>
					</div>
				</div>
			</div>
		 </div>
		
		<div class="ahlu-body">
			Demo {$last}
		</div>
		<div class="ahlu-footer"></div>
	</div>
AHLU;
?>
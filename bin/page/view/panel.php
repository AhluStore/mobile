<?php
$html=<<<AHLU
	<div id="{$last}" class="ahlu-page pt-page">
		<script type="text/javascript">
        var {$last}Loaded = false;
        AhluPage.events.on("on{$last}Before",function(e){
           
        });
        AhluPage.events.on("on{$last}Leaving",function(e){
			 var page = e.page;
			setTimeout(function(){

				page.AhluPanelMenu("close");

			},1000);
        });   
		AhluPage.events.on("on{$last}Init",function(e){
			var page = e.page;

			page.AhluPanelMenu({
				handler : page.find("#left-panel")
			});
            
        });
    </script>
	 <div class="ahlu-header">
		<div class="row no-space">
			<div class="col-md-1 col-xs-1 no-space"><a href="#" id="left-panel"><i class="fa fa-bars">&nbsp;</i></a></div> 
			<div class="col-md-10 col-xs-10"><h1>{$last}</h1></div>
			<div class="no-space col-md-1 col-sm-1 col-xs-1 actions">
				
			</div>
		</div>
	 </div>
    
	<div class="ahlu-body">
		Demo {$last}
	</div>
	<div class="ahlu-footer"></div>
	<!-- format panel Left -->
    <div class="ahlu-menu-slide-overlay"></div>
    <div class="ahlu-menu-left">

        <div style="height:150px;background-color: #28b779!important;">



        </div>

        <ul class="ahlu-listview">
          <li><a href="#" data-page="true" class="ahlu-button">Account</a></li>
          <li><a href="#" data-page="true" class="ahlu-button">Setting</a></li>
          <li><a href="#" onclick="Logout();return false;" class="ahlu-button">Logout</a></li>
        </ul>
    </div>
</div>
AHLU;
?>
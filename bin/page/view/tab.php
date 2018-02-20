<?php_egg_logo_guid
$type =  isset($inputs["type"])?$inputs["type"]:"none";
						$pos =  isset($inputs["pos"])?$inputs["pos"]:"top";
	
	$menu_top = "";
	$menu_bottom = "";
	if($pos=="top"){
		$menu_top =<<<AHLU
		<!-- -->
			<div class="tabs-header white">
				<ul class="row no-space">
				  <li class="active col-md-15 col-xs-15">
				  	<span class="ahlu-icon ahlu-icon-home"></span>
				  	home
				  </li>
				  <li class="col-md-15 col-xs-15">
				  	<span class="ahlu-icon ahlu-icon-feed"></span>
				  	Xung quanh
				  </li>
				  <li class="col-md-15 col-xs-15"><span class="ahlu-icon ahlu-icon-sell"></span>
				  	Sell
				  </li>
				  <li class="col-md-15 col-xs-15"><span class="ahlu-icon ahlu-icon-notification"></span>
				  Thông báo
				  </li>
				  <li class="col-md-15 col-xs-15"><span class="ahlu-icon ahlu-icon-account"></span>
				  Tôi
				  </li>
				</ul>  
			</div>
AHLU;
	}else{
		$menu_bottom =<<<AHLU
		<!-- -->
			<div class="tabs-header white">
				<ul class="row no-space">
				  <li class="active col-md-4 col-xs-4">
				  	home
				  </li>
				  <li class="col-md-4 col-xs-4">
				  	<span class="ahlu-icon ahlu-icon-feed"></span>
				  	Xung quanh
				  </li>
				  <li class="col-md-4 col-xs-4">
				  	Sell
				  </li>
				 
				</ul>  
			</div>
AHLU;
	}
	
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

            page.find(".{$last}-tabs").AhluSwiperTab({
	        	viewport : page.find(".ahlu-body"),
	            onSlideChange : function(ui){
	            	console.log(ui);
	            },
	            onError : function(){

	            }
	        });
			$(window).bind('page.resize',function(){
				page.find(".home-tabs").AhluSwiperTab("resize");
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
		<div class="ahlu-tabs {$last}-tabs">
			{$menu_top}
			<div class="tabs-content">
				<div class="swiper-container">
					<div class="swiper-wrapper">
						<div class="swiper-slide tab-main " id="tab_1">
							<?php include_once "view/{$last}_tab_1.php"; ?>
						</div>
						 <div class="swiper-slide tab-main " id="tab_2">
							<?php include_once "view/{$last}_tab_2.php"; ?>
						</div>
						 <div class="swiper-slide tab-main " id="tab_3">
							<?php include_once "view/{$last}_tab_3.php"; ?>
						</div>
						<div class="swiper-slide tab-main " id="tab_4">
							<?php include_once "view/{$last}_tab_4.php"; ?>
						</div>
						<div class="swiper-slide tab-main " id="tab_5">
							<?php include_once "view/{$last}_tab_5.php"; ?>
						</div>
					</div>
				</div>
			</div>
			{$menu_bottom}
		</div>	
	</div>
	<div class="ahlu-footer"></div>
	
</div>
AHLU;
	//cetare view folder
		
		mkdir("../view/",0775,true);
		//create file seperate
			touch("../view/{$last}_tab_1.php");
			file_put_contents("../view/{$last}_tab_1.php",'
<script type="text/javascript">
	window.window.AhluPage.events.on("on'.{$last}.'Init",function(e){
		var page = e.page;
		var user = UserSystem();
		
		page.find(".customer-tabs").data("AhluSwiperTab").events.on("slide_0",function(){
			
		});
	});
	window.window.AhluPage.events.on("on'.{$last}.'Leaving",function(e){
		var page = e.page;
	});
</script>
	Data 1');
			touch("../view/{$last}_tab_2.php");
			file_put_contents("../view/{$last}_tab_2.php",'
<script type="text/javascript">
	window.window.AhluPage.events.on("on'.{$last}.'Init",function(e){
		var page = e.page;
		var user = UserSystem();
		
		page.find(".customer-tabs").data("AhluSwiperTab").events.on("slide_1",function(){
			
		});
	});
	window.window.AhluPage.events.on("on'.{$last}.'Leaving",function(e){
		var page = e.page;
	});
</script>			
Data 2');
			touch("../view/{$last}_tab_3.php");
			file_put_contents("../view/{$last}_tab_3.php",'
<script type="text/javascript">
	window.window.AhluPage.events.on("on'.{$last}.'Init",function(e){
		var page = e.page;
		var user = UserSystem();
		
		page.find(".customer-tabs").data("AhluSwiperTab").events.on("slide_2",function(){
			
		});
	});
	window.window.AhluPage.events.on("on'.{$last}.'Leaving",function(e){
		var page = e.page;
	});
</script>			
Data 3');
	$ext = "php";		
?>
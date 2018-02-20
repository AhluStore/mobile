<?php
$html=<<<AHLU
	<div id="{$last}" class="ahlu-page pt-page">
		<script type="text/javascript">
        var {$last}Loaded = false;
        AhluPage.events.on("on{$last}Before",function(e){
            var page = e.page;

            //reset list
            if({$last}Loaded){
	            page.find('.ahlu-list').data("AhluPull").reset();
	            page.find('.ahlu-list').data("AhluPull").excute();
            }
        });
        AhluPage.events.on("on{$last}Leaving",function(e){
			  var page = e.page;

			 setTimeout(function(){
           		page.find('.ahlu-list #touchlist').html("");
          	 },1000);
        });   
		AhluPage.events.on("on{$last}Init",function(e){
			{$last}Loaded =true;
            var page = e.page;
			var events = AhluPage.Component.listview("#{$last} .ahlu-list",{
				//autoload :true,
				onFinish : function(list){
					page.find('.ahlu-list li').longTap({
					    delay: 1000, // really long tap
					    onRelease: function(e) {
					       $(this).toggleClass("active");
					       
					    }
					});
				},
				onError : function(){
					
				},
				source :function(request,response){
					setTimeout(function(){
						response([
							{id:"1",title:"Product name 1",image:"http://lorempixel.com/400/400/food/"+getRandomInt(1, 10) +"/",address:"An Phú, Thu?n an, Bình Duong"},
							{id:"2",title:"Product name 2",image:"http://lorempixel.com/400/400/food/"+getRandomInt(1, 10) +"/",address:"An Phú, Thu?n an, Bình Duong"},
							{id:"3",title:"Product name 3",image:"http://lorempixel.com/400/400/food/"+getRandomInt(1, 10) +"/",address:"An Phú, Thu?n an, Bình Duong"},
							{id:"4",title:"Product name 4",image:"http://lorempixel.com/400/400/food/"+getRandomInt(1, 10) +"/",address:"An Phú, Thu?n an, Bình Duong"},
							{id:"5",title:"Product name 5",image:"http://lorempixel.com/400/400/food/"+getRandomInt(1, 10) +"/",address:"An Phú, Thu?n an, Bình Duong"},
							{id:"1",title:"Product name 1",image:"http://lorempixel.com/400/400/food/"+getRandomInt(1, 10) +"/",address:"An Phú, Thu?n an, Bình Duong"},
							{id:"2",title:"Product name 2",image:"http://lorempixel.com/400/400/food/"+getRandomInt(1, 10) +"/",address:"An Phú, Thu?n an, Bình Duong"},
							{id:"3",title:"Product name 3",image:"http://lorempixel.com/400/400/food/"+getRandomInt(1, 10) +"/",address:"An Phú, Thu?n an, Bình Duong"},
							{id:"4",title:"Product name 4",image:"http://lorempixel.com/400/400/food/"+getRandomInt(1, 10) +"/",address:"An Phú, Thu?n an, Bình Duong"},
							{id:"5",title:"Product name 5",image:"http://lorempixel.com/400/400/food/"+getRandomInt(1, 10) +"/",address:"An Phú, Thu?n an, Bình Duong"}
						]);

				   },2000);
				},
				template : {
					item : function(item){
						return "<li><div class='ahlu-button' ahlu-go='?id="+item.id+"#StaffInfo' data-page='true'>"+
							'<span class="img">'+
							 '<img class="" src="'+item.image+'" alt="">'+
							 '</span>'+
							 '<span class="product clearfix">'+
							 '<span class="name">'+item.title+
							 '</span>'+
							 '<span class="date">'+
								moment().format('LLL')
							 '</span>'+
							 '</span>'+
						"</div></li>";
					}
				},
				onMoving:function(y,dir){
					console.log(y);
				}
			});
        });
    </script>
    <style type="text/css">
        
    </style>
	 <div class="ahlu-header">
		<div class="row no-space">
			<div class="col-md-1 col-xs-1 no-space"><i class="ahlu-back fa fa-arrow-left">&nbsp;</i></div> 
			<div class="col-md-10 col-xs-10"><h1>{$last}</h1></div>
			<div class="no-space col-md-1 col-sm-1 col-xs-1 actions">
				<a href='#' data-page='true'><i class="fa fa-filter">&nbsp;</i></a>
			</div>
		</div>
	 </div>
    
	<div class="ahlu-body">
		<div class="ahlu-list" style="height: 100%;overflow: auto;">
			<div id="touchloader">
				<i class="fa fa-spin fa-spinner"></i> Ðang t?i d? li?u
			</div>
			<div id="touchloader_begin">
				begin.....
			</div>
			<ul id="touchlist" class="ahlu-listview ahlu-listview-product"></ul>
			 <div id="touchloader_bottom">
				<i class="fa fa-spin fa-spinner"></i> Ðang t?i d? li?u
			</div>
			<div id="touchloader_begin_bottom">
				begin.....
			</div>
		</div>
	</div>
	<div class="ahlu-footer"></div>
</div>
AHLU;

?>
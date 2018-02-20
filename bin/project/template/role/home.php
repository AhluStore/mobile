<div class="pt-page ahlu-page" id="home">
	<script>
		
		////////////////
		window.AhluPage.events.on("onHomeBefore",function(e){
		
		});
		
		window.AhluPage.events.on("onHomeLeaving",function(e){

			e.page.AhluSideSwipe("close");

		});


		window.AhluPage.events.on("onHomeInit",function(e){
			var page = e.page;

			
		});
	</script>
	
	<div class="ahlu-header row no-space color-bg">
		<div class="col-md-2 col-xs-1 no-space">&nbsp;</div>
		<div class="col-md-8 no-space col-xs-8">
			<h1>Staff</h1>
		</div>
		<div class="col-md-2 no-space col-xs-3 actions">
			<i class="fa fa-bell" onclick="GoTo('#Notification');" ontouchstart="GoTo('#Notification');">&nbsp;</i>  <i class="fa fa-qrcode scan-btn" data-type="table">&nbsp;</i>
		</div>
	</div>
	<div class="ahlu-body">
		<ul class="no-space menu">
			<li class="pos col-xs-6 col-md-3"><div class="ahlu-button" href="#pos" data-page="true"><span><img src="{_ROOT_APP_}/role/staff/image/table.png" style=" width: 45px;"></span><br><span>Bàn</span></div></li>
			<li class="pos_a col-xs-6 col-md-3"><div class="ahlu-button" href="?type=quick-payment#ProductQuick" data-page="true">
				<span><img src="{_ROOT_APP_}/role/staff/image/quick-payment.png" style=" width: 45px;"></span><br><span>Thanh toán nhanh</span>
				</div></li>
			<li class="pos_a col-xs-6 col-md-3"><div class="ahlu-button" href="#report" data-page="true">
				<span><img src="{_ROOT_APP_}/role/staff/image/history.png" style=" width: 45px;"></span><br><span>Lịch sử</span>
				</div></li>
		</ul>
	</div>

</div>
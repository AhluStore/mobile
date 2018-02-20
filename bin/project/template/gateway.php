<script>
window.onAhluComplete = function(ip){
	//if(!ip) return;
	//alert(ip);
	//change ip,..
};
window.AhluPage.events.on("ahluReady",function(e) {
    //if(!ip) return;
	//alert(ip);

    //check user
    window.AhluUser.check(); 
    //AhluPage.GoTo("#screenpassword");
    // AhluPage.history.clear("screenpassword");\

    //AhluPage.GoTo("#home");
    //AhluPage.history.clear("home");
});



var HAS_LOG = false;
function load_page(user,func){
	//Logout();
	console.log(user);
	//alert(WEBSITE_SERVER+"load.php");
    $.ajax({
        url: WEBSITE_SERVER+"load.php",
        type: "POST",
        data:{project:window.APP_NAME,token:user.token,id_user:user.id_user,role:user.role},
        async:true,
        success: function(data) {
           if(data){

                data = data.replace(/\{_WEBSITE_\}/ig,WEBSITE);
                data = data.replace(/\{_ROOT_APP_\}/ig,WEBSITE_ACCESS+"/"+user.token+"/"+window.APP_NAME+"/");
                data = data.replace(/\{_ROOT_APP_AJAX\}/ig,WEBSITE_ACCESS+"/"+user.token+"/"+window.APP_NAME+"/admin/api.php");
                data = data.replace(/\{_ROOT_APP_ADMIN\}/ig,WEBSITE_ACCESS+"/"+user.token+"/"+window.APP_NAME+"/admin/");
                data = data.replace(/\{_WEBSITE_ACCESS_\}/ig,WEBSITE_ACCESS);
                data = data.replace(/\{_ROOT_PATH_\}/ig,ROOT_PATH);
                data = data.replace(/\{_POINTER_\}/ig,POINTER);
                data = data.replace(/\{_WEBSITE_SERVER_\}/ig,WEBSITE_SERVER);
                // for(var i in data){
                //  if(data[i] instanceof Function)break;
                //    window.Page.Stack.addPage(WEBSITE+data[i]);
                //}
                try{
                	AhluPage.append(data);
                }catch(e){
                	console.log(e);
               	}
                
                //hide link log-out
                $(".user-logout").show();
                $(".user-login").hide();
                if(typeof func ==="function")
                	func();
            }
        },
        error : function(jqXHR,error, errorThrown){
       
            var msg = "";
            if (jqXHR.status === 0) {
                msg = ('Not connected.\nPlease verify your network connection.');
            } else if (jqXHR.status == 404) {
                msg = ('The requested page not found. [404]');
            } else if (jqXHR.status == 500) {
                msg = ('Internal Server Error [500].');
            } else if (exception === 'parsererror') {
                msg = ('Requested JSON parse failed.');
            } else if (exception === 'timeout') {
                msg = ('Time out error.');
            } else if (exception === 'abort') {
                msg = ('Ajax request aborted.');
            } else {
                msg = ('Uncaught Error.\n' + jqXHR.responseText);
            }
            showMessageBar("error: "+msg);
        }
    });
}
window.AhluUser.events.on("offline",function(){
   //hide link log-out
    $(".user-logout").hide();
    $(".user-login").show();

    //for tester first,it is vendor
    GoTo("#userLogin",{history:false});

    //open popup user login
    console.log("user offline");
    if(HAS_LOG)
        document.location.href= document.location.href;
});


window.AhluUser.events.on("online",function(user){
    HAS_LOG = true;
	window.APP_NAME = user.project;
    load_page(user,function(){
        //check hash
        //detech url in load
        var hash = document.location.hash.substr(1);
        var pointer= AhluAppConfig.pointer;
        if(hash!=undefined && hash!=""){
            AhluAppConfig.pointer = hash;
        }

        if($("#welcome").length!=0){
        	pointer ="welcome";
        }
      
        var id = setInterval(function(){
            if($("#"+pointer).length!=0){
                clearInterval(id);

                if(!$("#"+pointer).hasClass("pt-page") || pointer==AhluAppConfig.pointer){
                    GoTo(AhluAppConfig.pointer,{history:false});
                }
                else{
                	AhluPage.history.clear("home");
                    GoTo(pointer,{history:false});
                }

            }
        },100);

    });

  
});
</script>
<div id="userLogin" class="ahlu-page pt-page">
<style>
	
</style>

<script type="text/javascript">

   AhluPage.events.on("onUserLoginInit",function(e){
			var page = e.page;

			page.find(".big-checkbox").iCheck({
				checkboxClass: 'icheckbox_square-orange',
				radioClass: 'iradio_square ',
				increaseArea: '20%', // optional
				labelHover: false,
				cursor: true
			});

			///////////
			page.find("form").validate({
				
				submitHandler: function(form) {
				
					//form.submit();
					var data = $(form).serializeObject();
                    data.what = "<?php echo ROLE; ?>";
					loading($(form).find(".submit"));
					console.log("is logining...");
					post(site_url_ajax("c=user&m=login"),data,function(data){
						//alert(typeof data ==="object"?JSON.stringify(data):data);
						hide_loading($(form).find(".submit"));
						if(typeof data ==="object"){
							//store global user
							window.AhluUser.login(data);
							//save info 
							if(window.Config){
								window.Config.set("id_user",data.id_user);
							}
							//show message
							//showMessageBar("Welcome "+data.displayName_user +" back.");
						}else{
							bootbox.alert("Tài khoản không tồn tại", function(){
							
							});
							console.log(data);
						}
					},true);
			
				}
			});
			//cactch input submit
			page.find("form input").on("keypress",function(event){
				var code = event.keyCode ? event.keyCode : event.which;

                if (code == 13) {
                    page.find("form").submit();
                    return false;
                }
			});

			//cactch input submit
			$(document).on("click",".show-account a",function(e){
				e.preventDefault();
				var me = $(this);

				page.find("form").find(".phone_user").val(me.attr("data-id"));
				page.find("form").find(".password_user").val(me.attr("data-pass"));

			});
			

            page.find(".show-pass").on(window.AhluPage.CLICK,function(evt){
                if($(this).hasClass("fa-eye")){
                    //hide
                    $(this).removeClass("fa-eye").addClass("fa-eye-slash");
                    $(this).closest("div").find("input").attr("type","text");
                }else{
                    //show
                    $(this).removeClass("fa-eye-slash").addClass("fa-eye");
                    $(this).closest("div").find("input").attr("type","password");
                }

            });
	});
    
</script>
	<div class="ahlu-header">
		 <div class="row no-space">
			<div class="col-md-1 col-xs-1 no-space">&nbsp;</div>
		 	<div class="col-md-9 col-xs-9"><h1>Restaurant Gateway</h1></div>
		 	<div class="no-space col-md-2 col-sm-2 col-xs-2 actions">
				
			</div>
		 </div>
	</div>
	<div class="ahlu-body register">
        <div class="container">
    		<form action="" id="quick-register-form" method="post" style="overflow: hidden;">   
    			<input type="hidden" name="id_app" value="1" class="id_app" />
    			<input type="hidden" name="case" value="user" />
    			<input type="hidden" name="type" value="phone" />
    			<p style="text-align: center; margin-bottom: 15px;"><img src="data:image/png;base64,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
    " style="width: 70px;"></p>
    			<div class="text-center col-sm-10 col-sm-offset-1">

    			</div>
    			<div class="form-group">
    				<input class="form-control form-input required phone_user" title="Nhập vào tài khoản vendor" name="user_username" placeholder="Số điện thoại của bạn" type="text" value="">
    			</div>
    			
    			<div class="form-group" style="position: relative;">
    				<input class="form-control form-input required password_user" title="Nhập vào mật khẩu vendor" name="user_password" placeholder="Mật khẩu của bạn" value="" type="password">
                    <i class="fa fa-eye show-pass" style="position: absolute;
    display: block;
    right: 8px;
    top: 28%;">&nbsp;</i>
    			</div>

    			<div class="form-group">
    				<div class="row">
    					<div class="col-xs-12 col-sm-12 col-md-12" style="margin-top:10px;">
    						<a href="#Forgotpassword" data-page="true" class="left">Quên mật khẩu?</a>
    					</div>
    				</div>
    			</div>
    			<div class="text-center padding-md-top">
    				<div class="row">
    					<button class="btn-create btn btn-info submit" type="button" onclick="$(this).closest('form').submit();">Đăng nhập</button>
    				</div>
    			</div>

    			</form>
        </div>
	</div>
</div>

<!-- -->
<div id="Forgotpassword" class="ahlu-page pt-page">

<style type="text/css">

        

    </style>



<script type="text/javascript">
    window.AhluPage.events.on("onForgotpasswordBefore",function(e){

        var page = e.page;

        var u = UserSystem();


                

    });

    window.AhluPage.events.on("onForgotpasswordLeaving",function(e){

        var page = e.page;

            

    });

    window.AhluPage.events.on("onForgotpasswordInit",function(e){

        var page = e.page;

        page.find("form").validate({

            submitHandler:function(form){

                var data = $(form).serializeObject();



            }

        }); 

    });

</script>

    <div class="ahlu-header color-bg">

         <div class="row no-space">

            <div class="col-md-1 col-xs-1 no-space"><i class="ahlu-back fa fa-arrow-left">&nbsp;</i></div>

            <div class="col-md-8 col-xs-8 no-space"><h1>Khôi phục mật khẩu</h1></div>

            <div class="col-md-3 col-xs-3 actions">



            </div>

         </div>

    </div>

    <div class="ahlu-body">
        <div class="row">
            <div class="col-md-4 col-md-offset-4">
                <div class="panel panel-default">
                  <div class="panel-body">
                    <div class="text-center">
                      <h3 style="text-align: center;"><i class="fa fa-lock fa-4x"></i></h3>
                      <h2 class="text-center">Forgot Password?</h2>
                      <p>You can reset your password here.</p>
                      <div class="panel-body">
        
                        <form id="register-form" role="form" autocomplete="off" class="form" method="post">
        
                          <div class="form-group">
                            <div class="input-group">
                              <span class="input-group-addon"><i class="glyphicon glyphicon-envelope color-blue"></i></span>
                              <input id="email" name="email" placeholder="email address" class="form-control"  type="email">
                            </div>
                          </div>
                          <div class="form-group">
                            <input name="recover-submit" class="btn btn-lg btn-primary btn-block" value="Reset Password" type="submit">
                          </div>
                          
                          <input type="hidden" class="hide" name="token" id="token" value=""> 
                        </form>
        
                      </div>
                    </div>
                  </div>
                </div>
              </div>
        </div>
    </div>

    

</div>
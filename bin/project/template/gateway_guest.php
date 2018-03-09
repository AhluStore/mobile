<?php
if($role=="guest")$role="";

$path = __DIR__."/role/{$role}";
ob_clean();
ob_start();

    //echo $path;
    if(is_dir($path)){

        $data = array();
        foreach(glob("{$path}/*") as $item){
            if(is_file($item) && (stripos($item, ".html")!==FALSE || stripos($item, ".php")!==FALSE)){
                include_once $item;
            }
        }
        //header('Content-type: application/json');
        //echo json_encode($data);

    }

$content = ob_get_clean();
?>
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
    if(AhluAppConfig && AhluAppConfig.CheckUser && parseInt(AhluAppConfig.CheckUser)==1){
        window.AhluUser.check(); 
    }else{
        load_page({},function(){
            var hash = document.location.hash.substr(1);
            var pointer= AhluAppConfig.pointer;
            if(hash!=undefined && hash!=""){
                AhluAppConfig.pointer = hash;
            }
             //notified          
            window.AhluPage.Rendered = true;

        });
       // window.AhluPage.GoTo(AhluAppConfig.pointer);
        //window.AhluPage.history.clear(AhluAppConfig.pointer);
    }

});



var HAS_LOG = false;
function load_page(user,func){
<?php
echo 'var data = decodeURIComponent("'.rawurlencode($content).'");';
?>   
    //Logout();
console.log(user);
   if(data){

        data = data.replace(/\{_WEBSITE_\}/ig,WEBSITE);
        data = data.replace(/\{_SITE_URL_APP_\}/ig,"/vendor-front-"+window.APP_NAME+"-"+window.TOKEN_ACCESS+"/");
        data = data.replace(/\{_SITE_URL_APP_ADMIN_\}/ig,"/vendor-front-"+window.APP_NAME+"-"+window.TOKEN_ACCESS+"/admin/");
        data = data.replace(/\{_ROOT_APP_\}/ig,WEBSITE_ACCESS+"/"+window.TOKEN_ACCESS+"/"+window.APP_NAME+"/");
        data = data.replace(/\{_ROOT_APP_AJAX_\}/ig,WEBSITE_ACCESS+"/"+window.TOKEN_ACCESS+"/"+window.APP_NAME+"/admin/api.php");
        data = data.replace(/\{_ROOT_APP_ADMIN_\}/ig,WEBSITE_ACCESS+"/"+window.TOKEN_ACCESS+"/"+window.APP_NAME+"/admin/");
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

}
window.AhluUser.events.on("offline",function(){
   //hide link log-out
    $(".user-logout").hide();
    $(".user-login").show();

    //for tester first,it is vendor
    if(AhluAppConfig && AhluAppConfig.CheckUser && parseInt(AhluAppConfig.CheckUser)==1){
         GoTo("#UserLogin",{history:false}); 
    }
   

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
        var pointer = hash!=undefined && hash!="" ? hash:AhluAppConfig.pointer;

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
                	AhluPage.history.clear(AhluAppConfig.pointer);
                    GoTo(pointer,{history:false});
                }

            }
        },100);

    });

  
});
</script>


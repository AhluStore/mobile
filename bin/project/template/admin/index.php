<?php
include_once $_SERVER["DOCUMENT_ROOT"]."/vendor/api.php";


define('ROOT_WEB','/vendor-app-restaurant-63a9f0ea7bb98050796b649e85481845/admin/');

function registerDBMe(){

  $_file_config = json_decode(file_get_contents(current_app_request_admin()."/db.json"),true);
  $_config = array();
  $_config["host"]="localhost";
  $_config["username"]="root";
  $_config["password"]="";
  $_config["database"]="pgd";
  $_config["prefix"]="me_";

   $_config= array_merge( $_config,$_file_config);
  return $_config;
}
registerDB("registerDBMe");  


//now
define("MODULES",__DIR__."/modules/");

?>
<!doctype html>
<!--[if lt IE 8]><html class="no-js lt-ie8"> <![endif]-->
<html class="no-js">
    
<meta http-equiv="content-type" content="text/html;charset=UTF-8" />
<head>
<base href="/vendor/" />
        <meta charset="utf-8">
        <title>Trang quản trị | Yeahcheck</title>
        <!-- Mobile specific metas -->
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1 user-scalable=no">
        <!-- Force IE9 to render in normal mode -->
        <!--[if IE]><meta http-equiv="x-ua-compatible" content="IE=9" /><![endif]-->
        <meta name="author" content="" />
        <meta name="description" content="" />
        <meta name="keywords" content="" />
        <meta name="application-name" content="" />
        <!-- Import google fonts - Heading first/ text second -->
        <link href='http://fonts.googleapis.com/css?family=Quattrocento+Sans:400,700' rel='stylesheet' type='text/css'>
        <!-- Css files -->
        <!-- Icons -->
        <link href="assets/css/icons.css" rel="stylesheet" />
        <!-- Bootstrap stylesheets (included template modifications) -->
        <link href="assets/css/bootstrap.css" rel="stylesheet" />
        <!-- Plugins stylesheets (all plugin custom css) -->
        <link href="assets/css/plugins.css" rel="stylesheet" />
        <!-- Main stylesheets (template main css file) -->
        <link href="assets/css/main.css" rel="stylesheet" />
        <!-- Custom stylesheets ( Put your own changes here ) -->
        <link href="assets/css/custom.css" rel="stylesheet" />
        <!-- Fav and touch icons -->
        <link rel="apple-touch-icon-precomposed" sizes="144x144" href="assets/assets/img/ico/apple-touch-icon-144-precomposed.png">
        <link rel="apple-touch-icon-precomposed" sizes="114x114" href="assets/assets/img/ico/apple-touch-icon-114-precomposed.png">
        <link rel="apple-touch-icon-precomposed" sizes="72x72" href="assets/assets/img/ico/apple-touch-icon-72-precomposed.png">
        <link rel="apple-touch-icon-precomposed" href="assets/assets/img/ico/apple-touch-icon-57-precomposed.png">
        <link rel="icon" href="assets/assets/img/ico/favicon.ico" type="image/png">
        <!-- Windows8 touch icon ( http://www.buildmypinnedsite.com/ )-->
        <meta name="msapplication-TileColor" content="#3399cc" />

         <script src="js/jquery-2.1.1.min.js"></script>
        <script src="js/ahlu.js"></script>
        <script src="js/ahlu-helper.js"></script>
        <script src="js/ahlu-ui.js"></script>


        <script type="text/javascript">

// Detect Device Type https://github.com/scottjehl/Hide-Address-Bar/blob/master/demo.html
if (/Android|webOS|iPhone|iPod|BlackBerry/i.test(navigator.userAgent)) {
    // When ready, auto-scroll 1px to hide URL bar
    window.addEventListener("load", function () {
        // Set a timeout...
        setTimeout(function () {
            // Hide the address bar!
            window.scrollTo(0, 1);
        }, 0);
    });
}
    if(typeof userip!=="string") userip = "120.0.0.1";
    var DOMURL = URL.parse("http://mobile.ahlustore.co/vendor/");
        if(DOMURL.queries.ip){
            WEBSITE = decodeURIComponent(DOMURL.queries.ip);
        }else{
            //WEBSITE ="/";
            //WEBSITE ="http://ahlustore.localhost:2491/";
            WEBSITE ="http://mobile.ahlustore.co/vendor/";
        }

    //var WEBSITE_ACCESS =WEBSITE+"Dropbox/ahlu/vendor/application/";
    var WEBSITE_ACCESS ="<?php echo current_app_uri(); ?>";
    //var WEBSITE_SERVER =WEBSITE+"Dropbox/ahlu/vendor/server/";
    var WEBSITE_SERVER =WEBSITE+"server/";
    
    var POINTER = document.location.href;
    var ROOT_PATH = DOMURL.directory.replace("//","/");

    var CURRENT_LIB_JS_PATH = ROOT_PATH+"js/";
    var ROOT_LIB = ROOT_PATH+"lib/";

    //
    window.APP_NAME = "restaurant";
    function project_url(){
        return "project=<?php echo PROJECT; ?>&token_access=<?php echo TOKEN_ACCESS; ?>&userip="+userip+"&id_user="+id_user()+"&id_outlet="+UserSystem().id_outlet+"&t="+(new Date()).getTime();
    }
    function site_url_app(url){
        return WEBSITE_ACCESS+"/"+url+(url.indexOf("?")!=-1?"&":"?")+project_url();
    }
    function site_url_theme(url){
        return WEBSITE_ACCESS+"/themes/"+url+(url.indexOf("?")!=-1?"&":"?")+project_url();
    }
    function site_url_theme_upload(url){
        return WEBSITE_ACCESS+"/themes/upload/"+url;
    }
    function site_url_upload(){
        return WEBSITE_ACCESS+"upload.php";
    }
    function site_url_ajax(url){
        return "/vendor-api-"+window.APP_NAME+"-"+UserSystem().token+"/api.ahlu?"+url+(url?"&":"")+project_url();
    }
    function site_url_ajax_wp(data,f,async){
        if(!async){async=true;}
        //return WEBSITE_ACCESS+"ahluajax-"+url+(url.indexOf("?")!=-1?"&":"?")+project_url();
         $.ajax({                            
            url: "http://wp.ahlustore.co/wp-admin/admin-ajax.php",  
            type: "POST",
            //some times you cant try this method for sending action variable
            data:data,    
            async:async,    
            success: function(data){ 
               f(data);
            },
            error: function() {
                f("Error");            
            }
        });

    }
    function site_url(url){
        return WEBSITE_ACCESS+url+(url.indexOf("?")!=-1?"&":"?")+project_url();
    }
    function site_url_db(url){
        return WEBSITE_SERVER+"db.php?action="+url+"&"+project_url();
    }
    function site_url_entity(url){
        return WEBSITE_SERVER+"db.php?action=entity&call="+url+"&"+project_url();
    }

    function no_image(html){
        if(html)return '<img src="'+site_url_theme("no-image.png")+'" />';
        return site_url_theme("no-image.png");
    }
    function show_image(url,h,w){
        var url = site_url_theme(url?url:"no-image.png");
        return '<img src="'+url+'" style="height:'+h+';width:'+w+';" />';
    }

    //show message
    function showMessageBar(msg,time){
        if(time) time=3000;
        setTimeout(function() {
            if (typeof msg === "object") {
                msg = JSON.stringify(msg);
            }
            $.bootstrapGrowl(msg, { type: 'success' });
        }, time);
    }
    function messageBox(msg,title){
        if(!title){
            title = "Warning";
        }
         window.Page.Ahlu.UI.Modal(this,{
              init:function(me){

                //if(user.order[id]){
                  me.title.html(title);
                  me.ahlu-body.html(msg);
                //}
              }
          });
    }
    if(typeof CURRENCY==="undefined") CURRENCY = "$";
    function showMoney(money){
        return Currency.Format(money,CURRENCY)
    }

    function showAnimation(who){
        var cls =  who.attr("data-animation");
        if(cls)
         who.addClass(cls+" animated").one('webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend', function(){
            $(this).removeClass(cls+" animated");
         });
    }

    function loading(obj){
        obj.find('.loading').remove();
        obj.append('<span class="loading"><i class="fa fa-spin fa-spinner"></i></span>');
    }
    function hide_loading(obj){
        obj.find('.loading').remove();
    }
    function bootbox_loading(bootbox){
        bootbox.find('.modal-ahlu-footer .loading').remove();
        bootbox.find('.modal-ahlu-footer [data-bb-handler="confirm"]').append('<span class="loading"><i class="fa fa-spin fa-spinner"></i></span>');
    }
    function bootbox_loading_hide(bootbox){
        bootbox.find('.modal-ahlu-footer .loading').remove();
    }

    function ahlu_popup(title,obj,f,buttons){
        if(!buttons)buttons = {
            cancel: {
                label: 'Huỷ',
                className: 'btn-danger',
                callback : function(){
                    
                },
            },
            confirm: {
                label: 'Xác nhận',
                className: 'btn-success',
                callback : function(){
                    
                },
            }
        };
        var dialog = bootbox.dialog({
            title: title,
            message: '<p><i class="fa fa-spin fa-spinner"></i> Đang tải dữ liệu</p>',
            buttons: buttons
        });
        //result for searching customer
        dialog.init(function(){
            setTimeout(function(){

                dialog.find('.bootbox-body').html(typeof obj==="string"?obj:obj[0].outerHTML);
                if(f instanceof Function)f(dialog);
                setTimeout(function(){
                    dialog.find('.modal-dialog').css({
                        'margin-top': function () {
                            var modal_height = dialog.find('.modal-dialog').height();
                            var window_height = $(window).height();
                            return ((window_height/2) - (modal_height/2));
                        }
                    });
                },100);
            }, 200);
        });
    }

    function Logout(){
        window.AhluUser.logout();
    }

    function ShareApp(){
        try{
             window.Share.apply(null,arguments);
        }catch(e){
            console.log(e);
        }
    }
    </script>
    <!-- Javascripts -->
        <!-- Load pace first -->
        <script src="assets/global/plugins/core/pace/pace.min.js"></script>
        <!-- Important javascript libs(put in all pages) -->
     
        <script src="http://code.jquery.com/ui/1.10.4/jquery-ui.js"></script>
        <script>
        window.jQuery || document.write('<script src="assets/js/libs/jquery-ui-1.10.4.min.js">\x3C/script>')
        </script>
        <!--[if lt IE 9]>
  <script type="text/javascript" src="js/libs/excanvas.min.js"></script>
  <script type="text/javascript" src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
  <script type="text/javascript" src="js/libs/respond.min.js"></script>
<![endif]-->
        <!-- Bootstrap plugins -->
        <script src="assets/js/bootstrap/bootstrap.js"></script>
        <!-- Core plugins ( not remove ) -->
        <script src="assets/js/libs/modernizr.custom.js"></script>
        <!-- Handle responsive view functions -->
        <script src="assets/js/jRespond.min.js"></script>
        <!-- Custom scroll for sidebars,tables and etc. -->
        <script src="assets/global/plugins/core/slimscroll/jquery.slimscroll.min.js"></script>
        <script src="assets/global/plugins/core/slimscroll/jquery.slimscroll.horizontal.min.js"></script>
        <!-- Remove click delay in touch -->
        <script src="assets/global/plugins/core/fastclick/fastclick.js"></script>
        <!-- Increase jquery animation speed -->
        <script src="assets/global/plugins/core/velocity/jquery.velocity.min.js"></script>
        <!-- Quick search plugin (fast search for many widgets) -->
        <script src="assets/global/plugins/core/quicksearch/jquery.quicksearch.js"></script>
        <!-- Bootbox fast bootstrap modals -->
        <script src="assets/global/plugins/ui/bootbox/bootbox.js"></script>
        <!-- Other plugins ( load only nessesary plugins for every page) -->
        <script src="assets/js/libs/date.js"></script>
        <script src="assets/global/plugins/charts/flot/jquery.flot.custom.js"></script>
        <script src="assets/global/plugins/charts/flot/jquery.flot.pie.js"></script>
        <script src="assets/global/plugins/charts/flot/jquery.flot.resize.js"></script>
        <script src="assets/global/plugins/charts/flot/jquery.flot.time.js"></script>
        <script src="assets/global/plugins/charts/flot/jquery.flot.growraf.js"></script>
        <script src="assets/global/plugins/charts/flot/jquery.flot.categories.js"></script>
        <script src="assets/global/plugins/charts/flot/jquery.flot.stack.js"></script>
        <script src="assets/global/plugins/charts/flot/jquery.flot.orderBars.js"></script>
        <script src="assets/global/plugins/charts/flot/jquery.flot.tooltip.min.js"></script>
        <script src="assets/global/plugins/charts/flot/jquery.flot.curvedLines.js"></script>
        <script src="assets/global/plugins/charts/sparklines/jquery.sparkline.js"></script>
        <script src="assets/global/plugins/charts/progressbars/progressbar.js"></script>
        <script src="assets/global/plugins/ui/waypoint/waypoints.js"></script>
        <script src="assets/global/plugins/ui/weather/skyicons.js"></script>
        <script src="assets/global/plugins/ui/notify/jquery.gritter.js"></script>
        <script src="assets/global/plugins/misc/vectormaps/jquery-jvectormap-1.2.2.min.js"></script>
        <script src="assets/global/plugins/misc/vectormaps/maps/jquery-jvectormap-world-mill-en.js"></script>
        <script src="assets/global/plugins/misc/countTo/jquery.countTo.js"></script>
        <script src="assets/js/jquery.dynamic.js"></script>
        <script src="assets/js/main.js"></script>

        <script type="text/javascript" src="js/jquery.touchSwipe.min.js"></script>
        <script type="text/javascript" src="js/jquery.bootstrap-growl.js"></script>
          <script type="text/javascript" src="js/md5.min.js"></script>

               <!-- Other plugins ( load only nessesary plugins for every page) -->
        <script src="assets/global/plugins/forms/fancyselect/fancySelect.js"></script>
        <script src="assets/global/plugins/forms/select2/select2.js"></script>
        <script src="assets/global/plugins/forms/maskedinput/jquery.maskedinput.js"></script>
        <script src="assets/global/plugins/forms/dual-list-box/jquery.bootstrap-duallistbox.js"></script>
        <script src="assets/global/plugins/forms/spinner/jquery.bootstrap-touchspin.js"></script>
        <script src="assets/global/plugins/forms/bootstrap-datepicker/bootstrap-datepicker.js"></script>
        <script src="assets/global/plugins/forms/bootstrap-timepicker/bootstrap-timepicker.js"></script>
        <script src="assets/global/plugins/forms/bootstrap-colorpicker/bootstrap-colorpicker.js"></script>
        <script src="assets/global/plugins/forms/bootstrap-tagsinput/bootstrap-tagsinput.js"></script>
        <script src="assets/js/libs/typeahead.bundle.js"></script>
        <script src="assets/global/plugins/forms/summernote/summernote.js"></script>
        <script src="assets/global/plugins/forms/bootstrap-markdown/bootstrap-markdown.js"></script>
        <script src="assets/global/plugins/forms/dropzone/dropzone.js"></script>
         <script src="js/moment.min.js"></script>
        <script src="js/jquery.timeago.js"></script>

      

 <script src="js/bootbox.js"></script>
  <script src="js/jquery.validate.min.js"></script>
  <script src="js/jquery.serializeObject.min.js"></script>
<script type="text/javascript" src="server/db/assets/db.js"></script>

    <script src="js/lib/icheck/icheck.min.js"></script>
    <link href="js/lib/icheck/skins/all.css?v=1.0.1" rel="stylesheet">
    <script src="js/jquery.touchSwipe.min.js"></script>
    <script src="js/lib/swiper/swiper.min.js"></script>
    <link rel="stylesheet"  href="js/lib/swiper/swiper.min.css">
<script src="js/lib/jquery.countdown-2.2.0/lodash.min.js"></script>
<script src="js/lib/jquery.countdown-2.2.0/jquery.countdown.js"></script>

<script src="js/lib/scroll/jquery.jscroll.js"></script>
<script src='js/lib/scroll/jquery.p2r.min.js'></script>

<script src='js/lib/slick/slick.min.js'></script>
<link rel="stylesheet" type="text/css" href="js/lib/slick/slick.css">
<link rel="stylesheet" type="text/css" href="js/lib/slick/slick-theme.css" />

<link rel="stylesheet" type="text/css" href="js/lib/autocomplete/autocomplete.css" />
<script src='js/lib/autocomplete/jquery.ui.autocomplete.html.js'></script>

 <script src="assets/global/plugins/ckeditor/ckeditor.js"></script>
 <script type="text/javascript" src="assets/global/plugins/ckeditor/adapters/jquery.js"></script>   
    <script type="text/javascript">
        $(document).ready(function(){

            //File upload///////////////////////////////////
    var $frame = $('<iframe style="display:none;" class="image-picker">');
    $('body').append( $frame );
    setTimeout( function() {
        //
            var doc = $frame[0].contentWindow.document;
            var $body = $('body',doc);
            $body.html('<a class="popRightAway" href="#" onclick="return false;">Pop Now</a><input type="file" class="file-audio" accept="audio/*;capture=microphone"></input><input type="file" class="file-all"  accept="*/*"></input> <input type="file" class="file-img" accept="image/*;capture=camera"> <input type="file" class="file-imgs" multiple="multiple" accept="image/*;capture=camera"> </input><input class="file-video" type="file" accept="video/*;capture=camera"></input>');

        window.Ahlu.FileUpload = (function(){
            var callback = function(){

            };
            $body.find(".file-audio").on("change",function(e){
                callback.call(this,e)
            });
            $body.find(".file-video").on("change",function(e){
                callback.call(this,e)
            });
            $body.find(".file-img").on("change",function(e){
                callback.call(this,e)
            });
            $body.find(".file-imgs").on("change",function(e){
                callback.call(this,e)
            });
            $body.find(".popRightAway").on("click",function(e,data){

                var input = $body.find(data.target)[0];

                input.click();
            });
            return {
                Audio : function(f){
                    callback = f;
                    $body.find(".popRightAway").trigger('click',{target:".file-audio"});

                },
                Video : function(f){
                    callback = f;
                    $body.find(".popRightAway").trigger('click',{target:".file-video"});
                }
                ,
                Image : function(f){
                    callback = f;
                    $body.find(".popRightAway").trigger('click',{target:".file-img"});
                },
                Images : function(f){
                    callback = f;
                    $body.find(".popRightAway").trigger('click',{target:".file-imgs"});
                }
            };
        })();

    }, 1 );
        });
    </script>
    <style type="text/css">
    /*
    Tab new
    */
.tabs-container .tabs-menu {
  
}

.tabs-container .tabs-menu li {
    background-color: #ccc;
    border-top: 1px solid #d4d4d1;
    border-right: 1px solid #d4d4d1;
    border-left: 1px solid #d4d4d1;
}

.tabs-container .tabs-menu li.current {
    position: relative;
    background-color: #fff;
    border-bottom: 1px solid #fff;
    z-index: 5;
}

.tabs-container .tabs-menu li a {
        padding: 15px 0;
    text-transform: uppercase;
    color: #333;
    text-decoration: none;
    display: block;
    text-align: center; 
}

.tabs-menu li.current a {
    color: #2e7da3;
}

.tabs-container .tab {}


.tabs-container .tab .tab-content {
    display: none;
    overflow: auto;
    height: 100%;
}
.tabs-container .tab .tab-content.active {
    display: block;
}
.tabs-container,.tabs-container .tab{
    height: 100%;overflow: hidden;
}

.tabs-container div.scrollmenu {
    background-color: #333;
    overflow: auto;
    white-space: nowrap;
}

.tabs-container div.scrollmenu a {
    display: inline-block;
    color: white;
    text-align: center;
    padding: 14px;
    text-decoration: none;
}

.listview{list-style: none;}
.no-space{margin: 0!important;padding: 0!important;}
</style>
    </head>
    <body>
        <!--[if lt IE 9]>
      <p class="browsehappy">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
    <![endif]-->
        <!-- .page-navbar -->
        <div id="header" class="page-navbar">
            <!-- .navbar-brand -->
            <a href="index-2.html" class="navbar-brand hidden-xs hidden-sm">
                <img src="assets/img/logo.png" class="logo hidden-xs" alt="Dynamic logo">
                <img src="assets/img/logosm.png" class="logo-sm hidden-lg hidden-md" alt="Dynamic logo">
            </a>
            <!-- / navbar-brand -->
            <!-- .no-collapse -->
            <div id="navbar-no-collapse" class="navbar-no-collapse">
                <!-- top left nav -->
                <ul class="nav navbar-nav">
                    <li class="toggle-sidebar">
                        <a href="#">
                            <i class="fa fa-reorder"></i>
                            <span class="sr-only">Collapse sidebar</span>
                        </a>
                    </li>
                    <li>
                        <a href="#" class="reset-layout tipB" title="Reset panel position for this page"><i class="fa fa-history"></i></a>
                    </li>
                </ul>
                <!-- / top left nav -->
                <!-- top right nav -->
                <ul class="nav navbar-nav navbar-right">
                    <li class="dropdown">
                        <a href="#" data-toggle="dropdown">
                            <i class="fa fa-bell-o"></i>
                            <span class="sr-only">Notifications</span>
                            <span class="badge badge-danger">6</span>
                        </a>
                        <ul class="dropdown-menu right dropdown-notification" role="menu">
                            <li><a href="#" class="dropdown-menu-header">Notifications</a>
                            </li>
                            <li><a href="#"><i class="l-basic-life-buoy"></i> 2 support request</a>
                            </li>
                            <li><a href="#"><i class="l-basic-gear"></i> Settings is changed</a>
                            </li>
                            <li><a href="#"><i class="l-weather-lightning"></i> 5 min server downtime</a>
                            </li>
                            <li><a href="#"><i class="l-basic-server2"></i> Databse backup is complete</a>
                            </li>
                            <li><a href="#"><i class="l-basic-lightbulb"></i> SuggeElson push 1 commit</a>
                            </li>
                            <li><a href="#" class="view-all">View all <i class="l-arrows-right"></i> </a>
                            </li>
                        </ul>
                    </li>
                    <li class="dropdown">
                        <a href="#" data-toggle="dropdown">
                            <i class="fa fa-cog"></i>
                            <span class="sr-only">Settings</span>
                        </a>
                        <ul class="dropdown-menu dropdown-form dynamic-settings right" role="menu">
                            <li><a href="#" class="dropdown-menu-header">Template settings</a>
                            </li>
                            <li>
                                <div class="toggle-custom">
                                    <label class="toggle" data-on="ON" data-off="OFF">
                                        <input type="checkbox" id="fixed-header-toggle" name="fixed-header-toggle" checked>
                                        <span class="button-checkbox"></span>
                                    </label>
                                    <label for="fixed-header-toggle">Fixed header</label>
                                </div>
                            </li>
                            <li>
                                <div class="toggle-custom">
                                    <label class="toggle" data-on="ON" data-off="OFF">
                                        <input type="checkbox" id="fixed-left-sidebar" name="fixed-left-sidebar" checked>
                                        <span class="button-checkbox"></span>
                                    </label>
                                    <label for="fixed-left-sidebar">Fixed Left Sidebar</label>
                                </div>
                            </li>
                            <li>
                                <div class="toggle-custom">
                                    <label class="toggle" data-on="ON" data-off="OFF">
                                        <input type="checkbox" id="fixed-right-sidebar" name="fixed-right-sidebar" checked>
                                        <span class="button-checkbox"></span>
                                    </label>
                                    <label for="fixed-right-sidebar">Fixed Right Sidebar</label>
                                </div>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="login.html">
                            <i class="fa fa-power-off"></i>
                            <span class="sr-only">Logout</span>
                        </a>
                    </li>
                    <li>
                        <a id="toggle-right-sidebar" href="#" class="tipB" title="Toggle right sidebar">
                            <i class="l-software-layout-sidebar-right"></i>
                            <span class="sr-only">Toggle right sidebar</span>
                        </a>
                    </li>
                </ul>
                <!-- / top right nav -->
            </div>
            <!-- / collapse -->
        </div>
        <!-- / page-navbar -->
        <!-- #wrapper -->
        <div id="wrapper">
            <!-- .page-sidebar -->
            <aside id="sidebar" class="page-sidebar hidden-md hidden-sm hidden-xs">
                <!-- Start .sidebar-inner -->
                <div class="sidebar-inner">
                    <!-- Start .sidebar-scrollarea -->
                    <div class="sidebar-scrollarea">
                        <!--  .sidebar-panel -->
                        <div class="sidebar-panel">
                            <h5 class="sidebar-panel-title">Profile</h5>
                        </div>
                        <!-- / .sidebar-panel -->
                        <div class="user-info clearfix">
                            <img src="assets/img/avatars/128.jpg" alt="avatar">
                            <span class="name">Yeahcheck</span>
                            <div class="btn-group">
                                <button type="button" class="btn btn-default btn-xs"><i class="l-basic-gear"></i>
                                </button>
                                <button type="button" class="btn btn-default btn-xs dropdown-toggle" data-toggle="dropdown">Cài đặt <span class="caret"></span>
                                </button>
                                <ul class="dropdown-menu right" role="menu">
                                    <li><a href="?c=user&m=edit"><i class="fa fa-edit"></i>Sữa thông tin</a>
                                    </li>
                                    <li><a href="#"><i class="fa fa-money"></i>Windraws</a>
                                    </li>
                                    <li><a href="#"><i class="fa fa-credit-card"></i>Deposits</a>
                                    </li>
                                    <li class="divider"></li>
                                    <li><a href="?c=user&m=logout"><i class="fa fa-power-off"></i>Đăng xuất</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <!--  .sidebar-panel -->
                        <div class="sidebar-panel">
                            <h5 class="sidebar-panel-title">Menu</h5>
                        </div>
                        <!-- / .sidebar-panel -->
                        <!-- .side-nav -->
                        <div class="side-nav">
                            <?php include_once "menu.inc.php"; ?>
                        </div>
                     </div>
                    <!-- End .sidebar-scrollarea -->
                </div>
                <!-- End .sidebar-inner -->
            </aside>
            <!-- / page-sidebar -->
            <!-- Start #right-sidebar -->
            <script type="text/javascript">
                $(document).ready(function(){
                    setTimeout(function(){
                        $("#toggle-right-sidebar").click();
                    },10);
                });
            </script>
            <aside id="right-sidebar" class="right-sidebar hidden-md hidden-sm hidden-xs" style="display: none;">
                <!-- Start .sidebar-inner -->
                <div class="sidebar-inner">
                    <!-- Start .sidebar-scrollarea -->
                    <div class="sidebar-scrollarea">
                        <div class="tabs">
                            <!-- Start .rs tabs -->
                            <ul id="rstab" class="nav nav-tabs nav-justified">
                                <li class="active">
                                    <a href="#activity" data-toggle="tab"><i class="glyphicon glyphicon-bullhorn"></i> </a>
                                </li>
                                <li>
                                    <a href="#users" data-toggle="tab"><i class="fa fa-comments"></i> </a>
                                </li>
                            </ul>
                            <div id="rstab-content" class="tab-content">
                                <div class="tab-pane fade active in" id="activity">
                                    <ul class="timeline timeline-icons timeline-sm">
                                        <li>
                                            <p>
                                                <a href="#">Jonh Doe</a> attached new <a href="#">file</a>
                                                <span class="timeline-icon"><i class="fa fa-file-text-o"></i></span>
                                                <span class="timeline-date">Dec 10, 22:00</span>
                                            </p>
                                        </li>
                                        <li>
                                            <p>
                                                <a href="#">Admin</a> approved <a href="#">3 new comments</a>
                                                <span class="timeline-icon"><i class="fa fa-comment"></i></span>
                                                <span class="timeline-date">Dec 8, 13:35</span>
                                            </p>
                                        </li>
                                        <li>
                                            <p>
                                                <a href="#">Jonh Smith</a> deposit 300$
                                                <span class="timeline-icon"><i class="fa fa-money color-green"></i></span>
                                                <span class="timeline-date">Dec 6, 10:17</span>
                                            </p>
                                        </li>
                                        <li>
                                            <p>
                                                <a href="#">Serena Williams</a> purchase <a href="#">3 items</a>
                                                <span class="timeline-icon"><i class="fa fa-shopping-cart color-red"></i></span>
                                                <span class="timeline-date">Dec 5, 04:36</span>
                                            </p>
                                        </li>
                                        <li>
                                            <p>
                                                <a href="#">1 support </a> request is received from <a href="#">Klaudia Chambers</a>
                                                <span class="timeline-icon"><i class="fa fa-life-ring color-gray-light"></i></span>
                                                <span class="timeline-date">Dec 4, 18:40</span>
                                            </p>
                                        </li>
                                        <li>
                                            <p>
                                                You received 136 new likes for <a href="#">your page</a>
                                                <span class="timeline-icon"><i class="glyphicon glyphicon-thumbs-up"></i></span>
                                                <span class="timeline-date">Dec 4, 12:00</span>
                                            </p>
                                        </li>
                                        <li>
                                            <p>
                                                <a href="#">12 settings </a> are changed from <a href="#">Master Admin</a>
                                                <span class="timeline-icon"><i class="glyphicon glyphicon-cog"></i></span>
                                                <span class="timeline-date">Dec 3, 23:17</span>
                                            </p>
                                        </li>
                                        <li>
                                            <p>
                                                <a href="#">Klaudia Chambers</a> change your photo
                                                <span class="timeline-icon"><i class="l-basic-photo"></i></span>
                                                <span class="timeline-date">Dec 2, 05:17</span>
                                            </p>
                                        </li>
                                        <li>
                                            <p>
                                                <a href="#">Master server </a> is down for 10 min.
                                                <span class="timeline-icon"><i class="l-basic-server2"></i></span>
                                                <span class="timeline-date">Dec 2, 04:56</span>
                                            </p>
                                        </li>
                                        <li>
                                            <p>
                                                <a href="#">12 links </a> are broken
                                                <span class="timeline-icon"><i class="fa fa-unlink"></i></span>
                                                <span class="timeline-date">Dec 1, 22:13</span>
                                            </p>
                                        </li>
                                        <li>
                                            <p>
                                                <a href="#">Last backup </a> is restored by <a href="#">Master admin</a>
                                                <span class="timeline-icon"><i class="fa fa-undo color-red"></i></span>
                                                <span class="timeline-date">Dec 1, 17:42</span>
                                            </p>
                                        </li>
                                    </ul>
                                </div>
                                <div class="tab-pane fade" id="users">
                                    <div class="chat-user-list">
                                        <form class="form-vertical chat-search" role="form">
                                            <div class="form-group">
                                                <div class="input-group">
                                                    <input type="text" class="form-control input-sm" placeholder="Search ...">
                                                    <span class="input-group-btn">                                        
                                        <button class="btn btn-default btn-sm" type="submit"><i class="fa fa-search"></i></button>
                                    </span>
                                                </div>
                                            </div>
                                            <!-- End .form-group  -->
                                        </form>
                                        <ul class="user-list list-group">
                                            <li class="list-group-item clearfix">
                                                <a href="#">
                                                    <img src="assets/img/avatars/2.jpg" alt="avatar" class="avatar">
                                                    <span class="name">Dean Huges</span>
                                                    <span class="status status-online">online</span>
                                                </a>
                                                <div class="chat-messages">
                                                    <ul>
                                                        <li class="chat-back"><a href="#">Back <i class="fa fa-chevron-right ml5"></i> </a>
                                                        </li>
                                                        <li>
                                                            <div class="avatar">
                                                                <img src="assets/img/avatars/2.jpg" alt="@chadengle">
                                                            </div>
                                                            <p class="chat-name">Dean Huges <span class="chat-time">15 sec ago</span>
                                                            </p>
                                                            <div class="message">
                                                                <p class="chat-txt">We need to meet today. I have some things to show you.</p>
                                                            </div>
                                                        </li>
                                                        <li class="chat-me">
                                                            <div class="avatar">
                                                                <img src="assets/img/avatars/1.jpg" alt="@jonhdoe">
                                                            </div>
                                                            <p class="chat-name">SuggeElson <span class="chat-time">10 sec ago</span>
                                                            </p>
                                                            <div class="message message-info">
                                                                <p class="chat-txt">I have tons of work today maybe tomorrow will be fine</p>
                                                            </div>
                                                        </li>
                                                        <li>
                                                            <div class="avatar">
                                                                <img src="assets/img/avatars/2.jpg" alt="@chadengle">
                                                            </div>
                                                            <p class="chat-name">Dean Huges <span class="chat-time">just now</span>
                                                            </p>
                                                            <div class="message">
                                                                <p class="chat-txt">Okay i will wait..</p>
                                                            </div>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </li>
                                            <li class="list-group-item clearfix">
                                                <a href="#">
                                                    <img src="assets/img/avatars/4.jpg" alt="avatar" class="avatar">
                                                    <span class="name">Selena Jones</span>
                                                    <span class="status status-offline">offline from 1 Dec</span>
                                                </a>
                                                <div class="chat-messages">
                                                    <ul>
                                                        <li class="chat-back"><a href="#">Back <i class="fa fa-chevron-right ml5"></i> </a>
                                                        </li>
                                                        <li class="no-messages">
                                                            <p class="text-center color-red">No messages are found</p>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </li>
                                            <li class="list-group-item clearfix">
                                                <a href="#">
                                                    <img src="assets/img/avatars/5.jpg" alt="avatar" class="avatar">
                                                    <span class="name">Mike Tomas</span>
                                                    <span class="status status-online">online</span>
                                                </a>
                                                <div class="chat-messages">
                                                    <ul>
                                                        <li class="chat-back"><a href="#">Back <i class="fa fa-chevron-right ml5"></i> </a>
                                                        </li>
                                                        <li class="no-messages">
                                                            <p class="text-center color-red">No messages are found</p>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </li>
                                            <li class="list-group-item clearfix">
                                                <a href="#">
                                                    <img src="assets/img/avatars/6.jpg" alt="avatar" class="avatar">
                                                    <span class="name">Jim Kerry</span>
                                                    <span class="status status-online">online</span>
                                                </a>
                                                <div class="chat-messages">
                                                    <ul>
                                                        <li class="chat-back"><a href="#">Back <i class="fa fa-chevron-right ml5"></i> </a>
                                                        </li>
                                                        <li class="no-messages">
                                                            <p class="text-center color-red">No messages are found</p>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </li>
                                            <li class="list-group-item clearfix">
                                                <a href="#">
                                                    <img src="assets/img/avatars/7.jpg" alt="avatar" class="avatar">
                                                    <span class="name">Little Jonh</span>
                                                    <span class="status status-online">online</span>
                                                </a>
                                                <div class="chat-messages">
                                                    <ul>
                                                        <li class="chat-back"><a href="#">Back <i class="fa fa-chevron-right ml5"></i> </a>
                                                        </li>
                                                        <li class="no-messages">
                                                            <p class="text-center color-red">No messages are found</p>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </li>
                                            <li class="list-group-item clearfix">
                                                <a href="#">
                                                    <img src="assets/img/avatars/8.jpg" alt="avatar" class="avatar">
                                                    <span class="name">Keith Smith</span>
                                                    <span class="status status-online">online</span>
                                                </a>
                                                <div class="chat-messages">
                                                    <ul>
                                                        <li class="chat-back"><a href="#">Back <i class="fa fa-chevron-right ml5"></i> </a>
                                                        </li>
                                                        <li class="no-messages">
                                                            <p class="text-center color-red">No messages are found</p>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </li>
                                            <li class="list-group-item clearfix">
                                                <a href="#">
                                                    <img src="assets/img/avatars/9.jpg" alt="avatar" class="avatar">
                                                    <span class="name">Tracy Miller</span>
                                                    <span class="status status-online">online</span>
                                                </a>
                                                <div class="chat-messages">
                                                    <ul>
                                                        <li class="chat-back"><a href="#">Back <i class="fa fa-chevron-right ml5"></i> </a>
                                                        </li>
                                                        <li class="no-messages">
                                                            <p class="text-center color-red">No messages are found</p>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </li>
                                            <li class="list-group-item clearfix">
                                                <a href="#">
                                                    <img src="assets/img/avatars/10.jpg" alt="avatar" class="avatar">
                                                    <span class="name">Peter Petrovski</span>
                                                    <span class="status status-online">online</span>
                                                </a>
                                                <div class="chat-messages">
                                                    <ul>
                                                        <li class="chat-back"><a href="#">Back <i class="fa fa-chevron-right ml5"></i> </a>
                                                        </li>
                                                        <li class="no-messages">
                                                            <p class="text-center color-red">No messages are found</p>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </li>
                                            <li class="list-group-item clearfix">
                                                <a href="#">
                                                    <img src="assets/img/avatars/11.jpg" alt="avatar" class="avatar">
                                                    <span class="name">Kim Lee</span>
                                                    <span class="status status-online">online</span>
                                                </a>
                                                <div class="chat-messages">
                                                    <ul>
                                                        <li class="chat-back"><a href="#">Back <i class="fa fa-chevron-right ml5"></i> </a>
                                                        </li>
                                                        <li class="no-messages">
                                                            <p class="text-center color-red">No messages are found</p>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </li>
                                        </ul>
                                        <div id="chat-write">
                                            <form id="chat-write-form" class="form-vertical" role="form">
                                                <div class="form-group mb5">
                                                    <textarea name="writetext" id="chatwritearea" rows="3" class="form-control" placeholder="Type message ..."></textarea>
                                                </div>
                                                <!-- End .form-group  -->
                                                <div class="form-group mb0">
                                                    <a href="#" class="btn btn-link btn-sm p0 mr5 color-gray"><i class="fa fa-picture-o"></i> </a>
                                                    <a href="#" class="btn btn-link btn-sm p0 color-gray"><i class="fa fa-file"></i> </a>
                                                    <a href="#" class="btn btn-default btn-sm pull-right">Send</a>
                                                </div>
                                                <!-- End .form-group  -->
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- End .rs tabs -->
                    </div>
                    <!-- End .sidebar-scrollarea -->
                </div>
                <!-- End .sidebar-inner -->
            </aside>
            <!-- End #right-sidebar -->
            <!-- .page-content -->
            <div class="page-content sidebar-page right-sidebar-page clearfix">
                <!-- .page-content-wrapper -->
                <div class="page-content-wrapper">
                    <div class="page-content-inner">
                        <!-- .page-content-inner -->
                        
                        <?php
                            function AhluError(){
                                static $error=null ;
                                if(!class_exists("error")){
                                    include MODULES ."/error/error.php";
                                    $error= new error();
                                }
                                
                               return  $error;
                            }
                            $c = isset($_GET["c"])?$_GET["c"]:"home";
                            $m = isset($_GET["m"])?$_GET["m"]:"index";
                            $p = isset($_GET["p"])?explode("/", $_GET["p"]):array();


                            //check $c
                            $path_c = MODULES ."/{$c}/$c.php";
                            if(file_exists( $path_c)){
                                include $path_c;

                                if(class_exists($c)){
                                    $cls = new $c();

                                    if(method_exists($cls, $m)){
                                        call_user_func_array(array($cls,$m), $p);
                                    }else{
                                       AhluError()->get404("Can not find method $m in '$c' controller");
                                    }
                                    
                                }else{
                                    AhluError()->get404("Can not find '$c' controller");
                                }
                            }else{
                                AhluError()->get404("Can not find the page request for '{$c}'");
                            }
                        ?>




                    <!-- / .page-content-inner -->
                </div>
                <!-- / page-content-wrapper -->
            </div>
            <!-- / page-content -->
        </div>
        <!-- / #wrapper -->
        <div id="footer" class="clearfix sidebar-page right-sidebar-page">
            <!-- Start #footer  -->
            <p class="pull-left">
                Copyrights &copy; 2014 <a href="http://suggeelson.com/" class="color-blue strong" target="_blank">SuggeElson</a>. All rights reserved.
            </p>
            <p class="pull-right">
                <a href="#" class="mr5">Terms of use</a>
                |
                <a href="#" class="ml5 mr25">Privacy police</a>
            </p>
        </div>
        <!-- End #footer  -->
        <!-- Back to top -->
        <div id="back-to-top"><a href="#">Back to Top</a>
        </div>
        
    </body>
</html>
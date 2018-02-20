<div id="page-header" class="clearfix">
    <div class="page-header">
        <h2>Tổng quan</h2>
    </div>
</div>
<div class="row">
    <div class="bs-callout bs-callout-warning fade in">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            <h4>Cho phép duyệt tin tự động</h4>
            <p>Tính năng này cho phép người dùng đăng phản hồi ý kiến ngay lập trức trên cửa hàng.</p>
            <div>
                <div class="toggle-custom">
                    <label class="toggle" data-on="ON" data-off="OFF">
                        <input type="checkbox" class="setting-allow-comment" id="checkbox-toggle" name="checkbox-toggle" checked>
                        <span class="button-checkbox"></span>
                    </label>
                    <label for="checkbox-toggle">Cho Phép</label>
                </div>
            </div>
    </div>
</div>
<!-- .row -->
<div class="row">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 row-report no-space">
         <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
            <!-- .col-md-3 -->
            <div class="panel panel-info tile panelClose panelRefresh">
                <!-- Start .panel -->
                <div class="panel-heading">
                    <h4 class="panel-title">Today Sales</h4>
                </div>
                <div class="panel-body pt0">
                    <div class="progressbar-stats-1">
                        <div class="stats">
                            <i class="l-ecommerce-cart-content"></i> 
                            <div id="visitor_number" class="stats-number" data-from="0" data-to="76">0</div>
                        </div>
                        <div class="progress animated-bar flat transparent progress-bar-xs mb10 mt0">
                            <div class="progress-bar progress-bar-white" role="progressbar" data-transitiongoal="63"></div>
                        </div>
                        <div class="comparison">
                            <p class="mb0"><i class="fa fa-arrow-circle-o-up s20 mr5 pull-left"></i> 10% up from last month</p>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End .panel -->
        </div>
        <!-- / .col-md-3 -->
        <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
            <!-- .col-md-3 -->
            <div class="panel panel-success tile panelClose panelRefresh">
                <!-- Start .panel -->
                <div class="panel-heading">
                    <h4 class="panel-title">Today Visitors</h4>
                </div>
                <div class="panel-body pt0">
                    <div class="progressbar-stats-1">
                        <div class="stats">
                            <i class="l-basic-geolocalize-05"></i> 
                            <div class="stats-number" data-from="0" data-to="2547">0</div>
                        </div>
                        <div class="progress animated-bar flat transparent progress-bar-xs mb10 mt0">
                            <div class="progress-bar progress-bar-white" role="progressbar" data-transitiongoal="86"></div>
                        </div>
                        <div class="comparison">
                            <p class="mb0"><i class="fa fa-arrow-circle-o-up s20 mr5 pull-left"></i> 2% up from last month</p>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End .panel -->
        </div>
        <!-- / .col-md-3 -->
        <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
            <!-- .col-md-3 -->
            <div class="panel panel-danger tile panelClose panelRefresh">
                <!-- Start .panel -->
                <div class="panel-heading">
                    <h4 class="panel-title">Support Questions</h4>
                </div>
                <div class="panel-body pt0">
                    <div class="progressbar-stats-1">
                        <div class="stats">
                            <i class="l-basic-life-buoy"></i> 
                            <div class="stats-number" data-from="0" data-to="78">0</div>
                        </div>
                        <div class="progress animated-bar flat transparent progress-bar-xs mb10 mt0">
                            <div class="progress-bar progress-bar-white" role="progressbar" data-transitiongoal="35"></div>
                        </div>
                        <div class="comparison">
                            <p class="mb0"><i class="fa fa-arrow-circle-o-down s20 mr5 pull-left"></i> 2% down from last month</p>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End .panel -->
        </div>
        <!-- / .col-md-3 -->
        <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
            <!-- .col-md-3 -->
            <div class="panel panel-default tile panelClose panelRefresh">
                <!-- Start .panel -->
                <div class="panel-heading">
                    <h4 class="panel-title">Profit this month</h4>
                </div>
                <div class="panel-body pt0">
                    <div class="progressbar-stats-1 dark">
                        <div class="stats">
                            <i class="l-banknote"></i> 
                            <div class="stats-number money" data-from="0" data-to="24568">0</div>
                        </div>
                        <div class="progress animated-bar flat transparent progress-bar-xs mb10 mt0">
                            <div class="progress-bar progress-bar-white" role="progressbar" data-transitiongoal="55"></div>
                        </div>
                        <div class="comparison">
                            <p class="mb0"><i class="fa fa-arrow-circle-o-down s20 mr5 pull-left"></i> 1% down from last month</p>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End .panel -->
        </div>
    </div>
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <!-- .col-md-3 -->
        <div class="panel tile panelClose panelRefresh">
         <?php
         /*
                $data =query("select view,full_date from (SELECT count(enterprise_id) as 'view', DATE_FORMAT(register_date_create, '%m/%d/%Y') as full_date
    FROM me_register
    WHERE register_date_create BETWEEN NOW() - INTERVAL 15 DAY AND NOW()
    GROUP BY DATE_FORMAT(register_date_create, '%m/%d/%Y')) as tb
GROUP BY full_date");
                //
                $info = array(
                    "label"=>array(),
                    "dataset"=>array()
                );
                $count = 0;
                if(is_array($data) && count($data)>0){
                    foreach ($data as $i=> $u) {
                        $info["label"][] = $u->full_date;
                        $info["dataset"][] = $u->view;
                    }
                }
                */
            ?>
            <!-- Start .panel -->
            <div class="panel-heading">
                <h4 class="panel-title">Thống kê doanh thu(10/2017)</h4>
            </div>
            <div class="panel-body pt0">
            
                 <script src="assets/global/plugins/charts/chartjs/Chart.js"></script>
                 <script>
                    $(document).ready(function(){
                        //generate random number for charts
                        var randNum = function(){
                            //return Math.floor(Math.random()*101);
                            return (Math.floor( Math.random()* (1+40-20) ) ) + 20;
                        }

                        //------------- Bar chart  -------------//

                        var barChartData = {
                            labels :  ["10\/01\/2017","10\/02\/2017","10\/03\/2017","10\/04\/2017","10\/05\/2017","10\/01\/2017","10\/07\/2017","18\/09\/2017","10\/10\/2017","10\/05\/2017","10\/11\/2017","10\/12\/2017","10\/13\/2017","10\/14\/2017","10\/15\/2017","10\/16\/2017","10\/17\/2017","10\/18\/2017","10\/19\/2017","10\/20\/2017","10\/21\/2017","10\/22\/2017","10\/23\/2017","10\/24\/2017","10\/25\/2017","10\/26\/2017","10\/27\/2017","10\/28\/2017","10\/29\/2017","10\/30\/2017"],
                            datasets : [
                                {
                                    fillColor : "rgba(186,195,210,0.5)",
                                    strokeColor : "rgba(186,195,210,0.3)",
                                    highlightFill: "rgba(186,195,210,0.75)",
                                    highlightStroke: "rgba(186,195,210,1)",
                                    data : [randNum(),randNum(),randNum(),randNum(),randNum(),randNum(),randNum(),randNum(),randNum(),randNum(),randNum(),randNum(),randNum(),randNum(),randNum(),randNum(),randNum(),randNum(),randNum(),randNum(),randNum(),randNum(),randNum(),randNum(),randNum(),randNum(),randNum(),randNum(),randNum(),randNum()]
                                }
                            ]
                        }

                        var ctxBar = document.getElementById("bar-chartjs").getContext("2d");
                        myBar = new Chart(ctxBar).Bar(barChartData, {
                            responsive : true,
                            scaleShowGridLines : true,
                            scaleGridLineColor : "#bfbfbf",
                            scaleGridLineWidth : 0.2,
                            //bar options
                            barShowStroke : true,
                            barStrokeWidth : 2,
                            barValueSpacing : 5,
                            barDatasetSpacing : 2,
                            //animations
                            animation: true,
                            animationSteps: 60,
                            animationEasing: "easeOutQuart",
                            //scale
                            showScale: true,
                            scaleFontFamily: "'Roboto'",
                            scaleFontSize: 13,
                            scaleFontStyle: "normal",
                            scaleFontColor: "#333",
                            scaleBeginAtZero : true,
                            //tooltips
                            showTooltips: true,
                            tooltipFillColor: "#344154",
                            tooltipFontFamily: "'Roboto'",
                            tooltipFontSize: 13,
                            tooltipFontColor: "#fff",
                            tooltipYPadding: 8,
                            tooltipXPadding: 10,
                            tooltipCornerRadius: 2,
                            tooltipTitleFontFamily: "'Roboto'",
                            events: ["click"]

                        });

                        (ctxBar.canvas).onclick = function(evt) {
                             var activePoints = myBar.activeElements[0];
                             // let's say you wanted to perform different actions based on label selected
                             if (activePoints && activePoints.label) {
                                alert(activePoints && activePoints.label);
                             }
                        }
                    });
                </script>
                <div>
                    <canvas id="bar-chartjs" style="height:250px;width: 100%;"></canvas>
                </div> 
            </div>
        </div>
        <!-- End .panel -->
    </div>

</div>


<div class="row">
    <!-- .row -->
    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
        <!-- .col-md-3 -->
        <div class="panel tile panelClose panelRefresh">
            <!-- Start .panel -->
            <div class="panel-heading">
                <h4 class="panel-title">Người dùng mới tham gia</h4>
            </div>
            <div class="panel-body pt0">
                 <script>
                    $(document).ready(function(){
                                 
                    });
                </script>
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th class="per5">#</th>
                            <th class="per40">Tên khách hàng</th>
                            <th class="per40">Thời gian</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                    /*
                        $data = query("select count(view_cutomer_coupon.code_coupon) as total,me_customer.customer_fullname,view_cutomer_coupon.customer_id from view_cutomer_coupon join me_customer on me_customer.customer_id=view_cutomer_coupon.customer_id 
                            where view_cutomer_coupon.enterprise_id='".id_user()."'
                            GROUP BY view_cutomer_coupon.customer_id");
                        if(is_array($data) && count($data)>0){

                            foreach ($data as $i=> $u) {
                                $rand = $color[rand(0, count($color) - 1)];
                                $a_ =$i+1;
                                echo <<<AHLU
                               <tr>
                                <td>{$a_}</td>
                                <td>{$customer_fullname}</td>
                                <td>{$total}</td>
                            </tr>
AHLU;
                            }
                        }else{
                            echo <<<AHLU
                               <tr>
                                <td colspan="3">Hiện chưa có khách hàng.</td>
                              </tr>
AHLU;
                        }
                        */
                    ?>
                    </tbody>
                </table>
                <?php
                /*
                    if(is_array($data) && count($data)>0){
                    echo '<div style="text-align: center">
                        <a class="btn btn-info" href="?c=outlet&m=customer_has_coupon&p='.id_user().'">Xem thêm</a>
                    </div>';
                    }
                    */
                ?>
                
            </div>
        </div>
        <!-- End .panel -->
    </div>

    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
        <!-- .col-md-3 -->
        <div class="panel tile panelClose panelRefresh">
            <!-- Start .panel -->
            <div class="panel-heading">
                <h4 class="panel-title">Danh sách khách hàng có Coupon </h4>
            </div>
            <div class="panel-body pt0">
                 <script>
                    $(document).ready(function(){
                                 
                    });
                </script>
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th class="per5">#</th>
                            <th class="per40">Tên khách hàng</th>
                            <th class="per40">Số lượng coupon</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                    /*
                        $data = query("select count(view_cutomer_coupon.code_coupon) as total,me_customer.customer_fullname,view_cutomer_coupon.customer_id from view_cutomer_coupon join me_customer on me_customer.customer_id=view_cutomer_coupon.customer_id 
                            where view_cutomer_coupon.enterprise_id='".id_user()."'
                            GROUP BY view_cutomer_coupon.customer_id");
                        if(is_array($data) && count($data)>0){

                            foreach ($data as $i=> $u) {
                                $rand = $color[rand(0, count($color) - 1)];
                                $a_ =$i+1;
                                echo <<<AHLU
                               <tr>
                                <td>{$a_}</td>
                                <td>{$customer_fullname}</td>
                                <td>{$total}</td>
                            </tr>
AHLU;
                            }
                        }else{
                            echo <<<AHLU
                               <tr>
                                <td colspan="3">Hiện chưa có khách hàng.</td>
                              </tr>
AHLU;
                        }
                        */
                    ?>
                    </tbody>
                </table>
                <?php
                /*
                    if(is_array($data) && count($data)>0){
                    echo '<div style="text-align: center">
                        <a class="btn btn-info" href="?c=outlet&m=customer_has_coupon&p='.id_user().'">Xem thêm</a>
                    </div>';
                    }
                    */
                ?>
                
            </div>
        </div>
        <!-- End .panel -->
    </div>

</div>

 <script type="text/javascript">
     $(document).ready(function(){
        //with tabletools
        $('.setting-allow-comment').on("click",function(){
            post(site_url_ajax("c=setting&m=add&p="+id_user()),{option_name:"allow-comment",widget:this.checked?1:0})
        });
     })
 </script>
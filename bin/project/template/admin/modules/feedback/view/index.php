<script src="plugins/tables/datatables/jquery.dataTables.js"></script>
<script src="plugins/tables/datatables/dataTables.tableTools.js"></script>
<script src="plugins/tables/datatables/dataTables.bootstrap.js"></script>
<script src="plugins/tables/datatables/dataTables.responsive.js"></script>

<div id="page-header" class="clearfix">
    <div class="page-header">
        <h2>Thông tin phản hồi</h2>
    </div>

</div>
 <div class="row">
    <div class="col-md-12 sortable-layout">
        <div class="panel panel-default toggle panelMove panelClose panelRefresh">
            <!-- Start .panel -->
            <div class="panel-heading">
                <h4 class="panel-title">Danh sách</h4>
            </div>
            <div class="panel-body pb0">
                <div class="bs-callout bs-callout-info mt0" style="display: none;">
                    <p>Add class <code>.group-border .stripped</code> to your form.</p>
                </div>
                <table id="tabletools" class="table table-striped table-bordered" cellspacing="0" width="100%">
                    <thead>
                        <tr>
                            <th>Tiêu để</th>
                            <th>Nội dung</th>
                            <th>Customer .No</th>
                            <th>Thao tác</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>Tiêu để</th>
                            <th>Nội dung</th>
                            <th>Customer .No</th>
                            <th>Thao tác</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        <?php
                            $from = 0;
                            $to = 500;
                            $data = query("select * from view_outlet where enterprise_address_main=1 limit $from,$to");
                            if(is_array($data)){

                                foreach ($data as $u) {
                                      $img = $u->enterprise_image?'<img src="'.site_url_theme($u->enterprise_image).'" style="height:75px;" />':"";
                                       $url = site_url_admin("?c=outlet&m=edit&p={$u->enterprise_id}");
                                    echo <<<AHLU
                                    <tr>
                                        <td>{$u->enterprise_name}</td>
                                        <td>{$u->enterprise_phone}</td>
                                        <td>{$u->fullAddress}</td>
                                        <td><a href="{$url}" class="btn btn-info">Sửa</a> <a href="#{$u->enterprise_id}" class="btn btn-danger">Xóa</a></td>
                                    </tr>
AHLU;
                                }
                            }
                        ?>
                    </tbody>
                </table>
</div>
        </div>
        <!-- End .panel -->
    </div>
 </div>
 <script type="text/javascript">
     $(document).ready(function(){
        //with tabletools
        $('#tabletools').DataTable( {
            "oLanguage": {
                "sSearch": "",
                "sLengthMenu": "<span>_MENU_</span>"
            },
            "sDom": "T<'row'<'col-md-6 col-xs-12 'l><'col-md-6 col-xs-12'f>r>t<'row'<'col-md-4 col-xs-12'i><'col-md-8 col-xs-12'p>>",
            tableTools: {
                "sSwfPath": "http://cdn.datatables.net/tabletools/2.2.2/swf/copy_csv_xls_pdf.swf",
                "aButtons": [ 
                  "copy", 
                  "csv", 
                  "xls",
                  "print",
                  "select_all", 
                  "select_none" 
              ]
            }
        });
     })
 </script>
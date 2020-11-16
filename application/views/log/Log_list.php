        <div class="page-bar">
                            <ul class="page-breadcrumb">
                                <li>
                                    Log
                                </li>
                            </ul>
                            <div class="page-toolbar">
                                <form class="form-inline" method="post" action="<?php echo base_url().'log'?>" role="form">
                                        <div class="form-group">
                                        <label> Nama WP </label>
                                      </div>
                                      <div class="form-group">
                                        <input type="text" class="form-control" name="nama_wp" placeholder="Masukkan Nama WP" value="<?php if($nama_wp != 'all'){ echo $nama_wp; }?>"  required>
                                      </div>
                                      <button type="submit" class="btn purple"><i class="fa fa-refresh"></i> Cari</button>
                                    </form>
                                <div class="btn-group pull-right">
                                    
                                </div>
                            </div>
                        </div>
<div class="row">
    <div class="col-md-12">
            <div id="load" class="portlet box green">
                
                <div class="portlet-title">
                    <div class="caption">
                        <i class="fa fa-list"></i>
                    </div>
                </div>
                <div  align="center" class="portlet-body">
                    <div style="width: 700px;">
                        <table class="table table-striped table-bordered table-hover" id="tb">
                            <thead>
                                <tr>
                                    <th width="5%">No</th>
                                    <th>NPWP</th>
                                    <th>Nama WP</th>
                                    <th>Date Insert</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $start = 0;
                                foreach ($log as $a)
                                {
                                    ?>
                                    <tr>
                                <td align='center'><?php echo ++$start ?></td>
                                <td align="center"><?php echo $a->npwp ?></td>
                                <td align="center"><?php echo $a->nama_wp ?></td>
                                <td align="center"><?php echo date('Y-m-d H:i:s', strtotime($a->insert_date)) ?></td>
                                </tr>
                                    <?php
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
       </div>
       
</div>
<div class="modal fade" id="ajax" role="basic" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body text-center">
               <i class="fa fa-refresh fa-spin  fa-fw"></i>
                <span >Loading...</span>
            </div>
        </div>
    </div>
</div>
<!-- /.modal -->
<!-- <script type="text/javascript">
var auto_refresh = setInterval(
    function () {
    $('#load').load('<?php echo base_url()."rekap/ajaxdatarekapbulanan/".$bulan."/".$tahun."/".$nama_wp?>?_=' +Math.random()).fadeIn("slow");
    }, 30000); 


 </script> -->



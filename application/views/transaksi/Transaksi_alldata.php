        <div class="page-bar">
                            <ul class="page-breadcrumb">
                                <li>
                                    Transaksi
                                </li>
                                <li>
                                    <i class="fa fa-circle"></i>
                                    <span>Monitoring all data</span>
                                </li>
                            </ul>
                            <div class="page-toolbar">
                                 <form class="form-inline" method="post" action="<?php echo base_url().'transaksi/alldata'?>" role="form">
                                    
                                      <div class="form-group">
                                        <input type="text" class="form-control date-picker" name="tanggal" placeholder="Tanggal" value="<?php echo $tanggal ?>">
                                      </div>
                                        
                                      <button type="submit" class="btn purple"><i class="fa fa-refresh"></i> Cari</button>
                                      <?php echo anchor('transaksi/cetakalldata/'.$tanggal,'<i class="fa fa-print"></i>','class="btn btn-primary"'); ?>

                                    </form>
                            </div>
                        </div>
<div class="row">

       <div class="col-md-12">
            <div class="portlet box green">
                <div class="portlet-title">
                    <div class="caption">
                        <i class="fa fa-list"></i> All Data
                    </div>
                </div>
                <div class="portlet-body">
                 <table class="table table-striped table-bordered table-hover" id="tb" >
                        <thead>
                            <tr>
                                <th width="5%">No</th>
                                <th>Nama WP</th>
                                <th>Jenis Pajak</th>
                                <th>Waktu Trx</th>
                                <th>Nilai Trx</th>
                                <th>Disc Trx</th>
                                <th>Keterangan</th>
                            </tr>
                        </thead>
                    <tbody>
                        <?php
                        $start = 0;
                        foreach ($alldata as $alldata)
                        {
                            ?>
                            <tr>
                        <td align='center'><?php echo ++$start ?></td>
                        <td><?php echo $alldata->nama_wp ?></td>
                        <td><?php echo $alldata->jenis_pajak ?></td>
                        <td><?php echo $alldata->waktu_trx ?></td>
                        <td align="right"><?php echo number_format($alldata->nilai_trx,'0','','.') ?></td>
                        <td><?php echo $alldata->disc_trx ?></td>
                        <td><?php echo $alldata->keterangan ?></td>
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
 <script type="text/javascript">
var auto_refresh = setInterval(
    function () {
    $('#load').load('<?php echo base_url()."transaksi/ajaxdatatransaksi"?>?_=' +Math.random()).fadeIn("slow");
    }, 5000); 


 </script>
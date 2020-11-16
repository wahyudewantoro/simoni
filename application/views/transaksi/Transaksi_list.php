        <div class="page-bar">
                            <ul class="page-breadcrumb">
                                <li>
                                    Transaksi
                                </li>
                                <li>
                                    <i class="fa fa-circle"></i>
                                    <span>Monitoring Data Transaksi Wajib Pajak</span>
                                </li>
                            </ul>
                            <div class="page-toolbar">
                                <div class="btn-group pull-right">
                                    <?php echo anchor('transaksi/cetakharini','<i class="fa fa-print"></i>','class="btn btn-primary"'); ?>
                                </div>
                            </div>
                        </div>
<div class="row">
    <div class="col-md-12">
            <div class="portlet box green">
                <div class="portlet-title">
                    <div class="caption">
                        <i class="fa fa-list"></i> Data (<?php echo date('d-m-Y')?>)
                    </div>
                </div>
                <div class="portlet-body">
                    <div id="load"> 
                        <table class="table table-striped table-bordered table-hover" id="" >
                            <thead>
                                <tr>
                                    <th width="5%">No</th>
                                    <th>Nama WP</th>
                                    <th>Jenis Pajak</th>
                                    <th>Waktu Trx</th>
                                    <th>Nilai Trx</th>
                                    <th>Disc Trx</th>
                                    <th>Keterangan</th>
                                    <th>Insert</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $start = 0;
                                foreach ($transaksi_data as $transaksi)
                                {
                                    ?>
                                    <tr>
                                <td align='center'><?php echo ++$start ?></td>
                                <td><?php echo $transaksi->nama_wp ?></td>
                                <td><?php echo $transaksi->jenis_pajak ?></td>
                                <td><?php echo $transaksi->waktu_trx ?></td>
                                <td><?php echo number_format($transaksi->nilai_trx,'0','','.') ?></td>
                                <td><?php echo number_format($transaksi->disc_trx,'0','','.') ?></td>
                                <td><?php echo $transaksi->keterangan ?></td>
                                 <td><?php echo $transaksi->tanggal_insert ?></td>
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
 <script type="text/javascript">
var auto_refresh = setInterval(
    function () {
    $('#load').load('<?php echo base_url()."transaksi/ajaxdatatransaksi"?>?_=' +Math.random()).fadeIn("slow");
    }, 5000); 


 </script>
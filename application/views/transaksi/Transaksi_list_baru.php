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
                                <form class="form-inline" method="post" action="<?php echo base_url().'transaksi'?>" role="form">
                                      <div class="form-group">
                                        <label> Tgl Trx </label>
                                      </div>
                                      <div class="form-group">
                                        <input style="width: 120px;" type="text" class="form-control date-picker" name="tanggal" placeholder="Tanggal" value="<?php echo $tanggal ?>">
                                      </div>
                                        <div class="form-group">
                                        <label> Nama WP </label>
                                      </div>
                                      <div class="form-group">
                                        <input type="text" class="form-control" name="nama_wp" placeholder="Masukkan Nama WP" value="<?php if($nama_wp != 'all'){ echo $nama_wp; }?>" >
                                      </div>
                                      <button type="submit" class="btn purple"><i class="fa fa-search"></i> Cari</button>

                                      <?php if($jum_row!=0){ echo anchor('transaksi/cetakharini/'.$tanggal.'/'.$nama_wp,'<i class="fa fa-print"></i>','class="btn btn-primary"'); } ?>

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
                    <div class="caption pull-right">
                        Total : Rp. <?php echo number_format($total,'0','','.')?>
                    </div>
                </div>
                <div class="portlet-body">
                        <table class="table table-striped table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th width="5%">No</th>
                                    <th width="12%">NPWPD</th>
                                    <th>Nama WP</th>
                                    <th>Department</th>
                                    <!-- <th>PCID</th>
                                    <th width="8%">Bill No</th>
                                    <th width="8%">Room No</th>
                                    <th>Remark</th> -->
                                    <th>Jumlah</th>
                                    <th width="18%">Date Trx</th>
                                    <!-- <th width="15%">Date Insert</th> -->
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
                                <td align='center'><?php echo $transaksi->npwpd ?></td>
                                <td><?php echo $transaksi->nama_wp ?></td>
                                <td><?php echo $transaksi->keterangan ?></td>
                                <!-- <td><?php echo $transaksi->pcid ?></td>
                                <td><?php echo $transaksi->bill_no ?></td>
                                <td><?php echo $transaksi->room_no ?></td>
                                <td><?php echo $transaksi->remark ?></td> -->
                                <td align="right"><?php echo number_format($transaksi->jumlah,'0','','.') ?></td>
                                <td align='center'><?php echo $transaksi->tgl_transaksi ?></td>
                                <!--  <td align='center'><?php echo $transaksi->insert_data ?></td> -->
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
    $('#load').load('<?php echo base_url()."transaksi/ajaxdatatransaksi_baru/".$tanggal."/".$nama_wp?>?_=' +Math.random()).fadeIn("slow");
    }, 30000); 


 </script>



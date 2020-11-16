        <div class="page-bar">
                            <ul class="page-breadcrumb">
                                <li>
                                    Transaksi
                                </li>
                                <li>
                                    <i class="fa fa-circle"></i>
                                    <span>Transaksi Wajib Pajak</span>
                                </li>
                            </ul>
                            <div class="page-toolbar">
                               <form class="form-inline" method="post" role="form" action="<?php echo base_url().'transaksi/wp.html'?>">
                                      <div class="form-group">
                                        <label>Tgl Trx</label>
                                      </div>
                                      <div class="form-group">
                                        <input style="width: 100px;" type="text" class="form-control date-picker" name="tanggal1" placeholder="Tanggal" value="<?php echo $tanggal1 ?>">
                                      </div>
                                      <div class="form-group">
                                        <label>s/d</label>
                                      </div>
                                      <div class="form-group">
                                        <input style="width: 100px;" type="text" class="form-control date-picker" name="tanggal2" placeholder="Tanggal" value="<?php echo $tanggal2 ?>">
                                      </div>
                                      <div class="form-group">
                                        <label> Nama WP </label>
                                      </div>
                                      <div class="form-group">
                                         <input type="text" class="form-control" name="nama_wp" placeholder="Masukkan Nama WP" value="<?php if($nama_wp != 'all'){ echo $nama_wp; }?>" required>
                                      </div>
                                   <button name="submit" type="submit" class="btn purple"><i class="fa fa-search"></i> Cari</button>
                                   <?php if($submit==true){ echo anchor('transaksi/wpcetak/'.$tanggal1.'/'.$tanggal2.'/'.$nama_wp,'<i class="fa fa-print"></i>','class="btn btn-primary"'); } ?>
                               </form>
                            </div>
                        </div>
<div class="row">
    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
            
           <!--  <h4><i class="fa fa-user"></i> Nama Wajib Pajak</h4> -->
                    
       </div>

       <div class="col-md-12">
        <?php if(isset($data)){?>
        <div class="portlet box green">
                
                <div class="portlet-title">
                    <div class="caption">
                        <i class="fa fa-list"></i>
                    </div>
                    <div class="caption pull-right">
                        Total : Rp. <?php echo number_format($total,'0','','.')?>
                    </div>
                </div>
                <div class="portlet-body">
                        <table class="table table-striped table-bordered table-hover" id="tb">
                            <thead>
                                <tr>
                                    <th width="5%">No</th>
                                    <th>NPWPD</th>
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
                                foreach ($data as $transaksi)
                                {
                                    ?>
                                    <tr>
                                <td align='center'><?php echo ++$start ?></td>
                                <td><?php echo $transaksi->npwpd ?></td>
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
            <?php } ?> 
                
       </div>
       
</div>


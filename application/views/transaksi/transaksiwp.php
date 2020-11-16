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
                               
                            </div>
                        </div>
<div class="row">
    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
            
            <h4><i class="fa fa-user"></i> Nama Wajib Pajak</h4>
                    <form class="form-inline" method="post" role="form" action="<?php echo base_url().'transaksi/wp.html'?>">
                        <input value="<?= $cari ?>" type="text" class="form-control" id="nama_wp" name="nama_wp" placeholder="contoh : mashudi">
                        <button type="submit" class="btn btn-default"><i class="fa fa-search"></i> Cari</button>
                    </form>
       </div>

       <div class="col-md-12">
            <?php if(isset($data)){?>
            <hr>
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
                        foreach ($data as $alldata)
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
            <?php } ?>    
       </div>
       
</div>


        <div class="page-bar">
                            <ul class="page-breadcrumb">
                                <li>
                                    Transaksi
                                </li>
                                <li>
                                    <i class="fa fa-circle"></i>
                                    <span>Data WP Tidak Termonitor</span>
                                </li>
                            </ul>
                            <div class="page-toolbar">
                                <div class="btn-group pull-right">
                                    <?php echo anchor('transaksi/cetaktransaksigagal','<i class="fa fa-print"></i>','class="btn btn-primary"'); ?>
                                </div>
                            </div>
                        </div>
<div class="row">
    <divclass="col-md-12">
            <div class="portlet box green">
                <div class="portlet-title">
                    <div class="caption">
                        <i class="fa fa-list"></i> Data (<?php echo date('d-m-Y')?>)
                    </div>
                </div>
                <div  align="center" class="portlet-body">
                    <div style="width: 500px;" id="load"> 
                        <table class="table table-striped table-bordered table-hover" id="tb" >
                            <thead>
                                <tr>
                                    <th width="5%">No</th>
                                    <th>NPWPD</th>
                                    <th>Nama WP</th>
                                    <th>Tanggal terakhir</th>
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
                                <td><?php echo $transaksi->id_client ?></td>
                                <td><?php echo $transaksi->nama_wp ?></td>
                                <td><?php echo date('d/m/Y',strtotime($transaksi->tanggal_terakhir)) ?></td>
                                
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


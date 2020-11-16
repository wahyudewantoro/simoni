<div class="portlet box green">
                
                <div class="portlet-title">
                    <div class="caption">
                        <i class="fa fa-calendar"></i> 
                        <?php echo $tanggal;?>
                    </div>
                    <div class="caption pull-right">
                        Total : Rp. <?php echo number_format($total,'0','','.')?>  
                    </div>
                </div>
                <div align="center" class="portlet-body">
                        <table class="table table-striped table-bordered table-hover" id="tb">
                            <thead>
                                <tr>
                                    <th width="2%">No</th>
                                    <th>NPWPD</th>
                                    <th>Nama WP</th>
                                    <th>Department</th>
                                    <th>Jumlah</th>
                                    <th width="18%">Date Trx</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $start = 0;
                                foreach ($res as $transaksi)
                                {
                                    ?>
                                    <tr>
                                <td align='center'><?php echo ++$start ?></td>
                                <td align="center"><?php echo $transaksi->npwpd ?></td>
                                <td><?php echo $transaksi->nama_wp ?></td>
                                <td><?php echo $transaksi->keterangan ?></td>
                                <td align="right"><?php echo number_format($transaksi->jumlah,'0','','.') ?></td>
                                <td align='center'><?php echo $transaksi->tgl_transaksi ?></td>
                                </tr>
                                    <?php
                                }
                                ?>
                            </tbody>
                        </table>

                </div>
            </div>
            <script type="text/javascript">
                $(document).ready(function() {
    $('#tb').DataTable();
} );
            </script>
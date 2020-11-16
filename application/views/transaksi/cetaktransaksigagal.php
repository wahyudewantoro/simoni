<h3>Laporan WP gagal di monitoring<br>Tanggal : <?= $tanggal ?></h3>
                        <table class="table table-striped table-bordered table-hover" id="" border="1">
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
                                <td>`<?php echo $transaksi->id_client ?></td>
                                <td><?php echo $transaksi->nama_wp ?></td>
                                <td><?php echo date('d/m/Y',strtotime($transaksi->tanggal_terakhir)) ?></td>
                                
                                </tr>
                                    <?php
                                }
                                ?>
                            </tbody>
                        </table>
<?php
header("Content-type: application/vnd-ms-excel");
header("Content-Disposition: attachment; filename=datawptidaktermonitor.xls");
 
     ?>

                        <h3>Transaksi Tanggal : <?php echo $tanggal1.' - '.$tanggal2; ?>
                        <br>Nama WP           : <?php if($nama_wp=='all'){ echo 'Semua'; }else{ echo $nama_wp; } ?>
                        </h3>
                        <table class="table table-striped table-bordered table-hover" border="1" id="" >
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
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                 if(count($data)>0){
                                $start = 0;
                                foreach ($data as $transaksi)
                                {
                                    ?>
                                    <tr>
                                     <td align='center'><?php echo ++$start ?></td>
                                     <td><?php echo "'".$transaksi->npwpd ?></td>
                                     <td><?php echo $transaksi->nama_wp ?></td>
                                     <td><?php echo $transaksi->keterangan ?></td>
                                     <!-- <td><?php echo $transaksi->pcid ?></td>
                                     <td><?php echo $transaksi->bill_no ?></td>
                                     <td><?php echo $transaksi->room_no ?></td>
                                     <td><?php echo $transaksi->remark ?></td> -->
                                     <td align="right"><?php echo number_format($transaksi->jumlah,'0','','.') ?></td>
                                     <td align='center'><?php echo $transaksi->tgl_transaksi ?></td>
                                    </tr>
                                    <?php
                                } } else{
                                ?>
                                <tr>
                                    <td align='center'>-</td>
                                    <td>-</td>
                                    <td>-</td>
                                    <td>-</td>
                                    <td>-</td>
                                    <td>-</td>
                                    <td>-</td>
                                     <td>-</td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
<?php
header("Content-type: application/vnd-ms-excel");
header("Content-Disposition: attachment; filename=cetaktransaksiwp.xls");
 
     ?>
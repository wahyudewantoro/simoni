
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
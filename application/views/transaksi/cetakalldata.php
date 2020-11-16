<h3>Monitoring Transaksi <?php echo $tanggal?> </h3>

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
     
     <?php
header("Content-type: application/vnd-ms-excel");
header("Content-Disposition: attachment; filename=Monitoringtransaksi.xls");
 
     ?>

                        <h3>Rekap Bulanan <br>
                            Bulan   : <?php echo $tanggal?> <br>
                            Nama WP : <?php if($nama_wp=='all'){ echo 'Semua'; }else{ echo $nama_wp; } ?> 
                        </h3>
                        <table class="table table-striped table-bordered table-hover" border="1" id="" >
                            <thead>
                                <tr>
                                    <th width="5%">No</th>
                                    <th width="10%">Tanggal</th>
                                    <th>Omset</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                 if(count($rekap)>0){
                                $start = 0;
                                foreach ($rekap as $r)
                                {
                                    ?>
                                    <tr>
                                    <td align='center'><?php echo ++$start ?></td>
                                    <td align="center"><?php echo $r->tgl.'-'.$bulan.'-'.$tahun ?></td>
                                    <td align="right"><?php echo number_format($r->omset,'0','','.') ?></td>
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
header("Content-Disposition: attachment; filename=RekapBulanan.xls");
 
     ?>

                <div class="portlet-title">
                    <div class="caption">
                        <i class="fa fa-list"></i>
                    </div>
                    <div class="caption pull-right">
                        Total : Rp. <?php echo number_format($total,'0','','.')?>
                    </div>
                </div>
                <div align="center" class="portlet-body">
                        <table style="width: 300px;" class="table table-striped table-bordered table-hover" id="tb">
                            <thead>
                                <tr>
                                   <th width="5%">No</th>
                                    <th>Tanggal</th>
                                    <th>Omset</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
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
                                }
                                ?>
                            </tbody>
                        </table>

                </div>
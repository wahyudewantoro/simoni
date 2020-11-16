        <div class="page-bar">
                            <ul class="page-breadcrumb">
                                <li>
                                    Transaksis
                                </li>
                                <li>
                                    <i class="fa fa-circle"></i>
                                    <span>Rekap Bulanan</span>
                                </li>
                            </ul>
                            <div class="page-toolbar">
                                <form class="form-inline" method="post" action="<?php echo base_url().'rekap'?>" role="form">
                                      <div class="form-group">
                                        <label> Bulan </label>
                                      </div>
                                      <div class="form-group">
                                        <select name="bulan" class="form-control">
                                            <option value="">Pilih</option>
                                            <?php 
                                            foreach ($ref_bulan as $key => $value) {
                                            ?>
                                            <option <?php if($key==$bulan){ echo "selected"; }?> value="<?php echo $key ?>"><?php echo $value; ?></option>
                                            <?php
                                            } ?>
                                            
                                        </select>
                                      </div>
                                      <div class="form-group">
                                        <label> Tahun </label>
                                      </div>
                                      <div class="form-group">
                                        <select name="tahun" class="form-control">
                                            <option value="">Pilih</option>
                                            <?php 
                                            $thn = date('Y');
                                            for($i=0; $i<=10; $i++) {
                                            ?>
                                            <option <?php if(($thn-$i)==$tahun){ echo "selected"; }?> value="<?php echo $thn-$i; ?>"><?php echo $thn-$i; ?></option>
                                            <?php
                                            } ?>
                                            
                                        </select>
                                      </div>
                                        <div class="form-group">
                                        <label> Nama WP </label>
                                      </div>
                                      <div class="form-group">
                                        <input type="text" class="form-control" name="nama_wp" placeholder="Masukkan Nama WP" value="<?php if($nama_wp != 'all'){ echo $nama_wp; }?>"  required>
                                      </div>
                                      <button type="submit" class="btn purple"><i class="fa fa-refresh"></i> Cari</button>
                                      <!-- <?php if($nama_wp!='all'){ echo anchor('rekap/cetak_laporan/'.$bulan.'/'.$tahun.'/'.$nama_wp,'<i class="fa fa-print"></i>','class="btn btn-primary"'); }?>
 -->
                                    </form>
                                <div class="btn-group pull-right">
                                    
                                </div>
                            </div>
                        </div>
<div class="row">
    <div class="col-md-12">
            <div id="load" class="portlet box green">
                
                <div class="portlet-title">
                    <div class="caption">
                        <i class="fa fa-list"></i>
                    </div>
                    <div class="caption pull-right">
                        Total : Rp. <?php echo number_format($total,'0','','.')?>
                    </div>
                </div>
                <div align="center" class="portlet-body">
                        <table style="width: 450px;" class="table table-striped table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th width="5%">No</th>
                                    <th>Tanggal</th>
                                    <th>Omset</th>
                                    <th width="10%">Aksi</th>
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
                                <td align="center"><button <?php if($r->omset==0){ echo "disabled";}?> class="btn btn-xs btn-primary popup" data-tanggal="<?php echo $r->tgl.'-'.$bulan.'-'.$tahun;?>" data-namawp="<?php echo $nama_wp;?>"><i class="fa fa-search"></i> Detail</button></td>
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
<div class="modal fade" id="modalDetail" role="basic" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content" style="width: 750px">
            <div class="modal-body text-center">
                <div  id="detail"></div>
               <!-- <i class="fa fa-refresh fa-spin  fa-fw"></i>
                <span >Loading...</span> -->
            </div>
        </div>
    </div>
</div>
<!-- /.modal -->
<!-- <script type="text/javascript">
var auto_refresh = setInterval(
    function () {
    $('#load').load('<?php echo base_url()."rekap/ajaxdatarekapbulanan/".$bulan."/".$tahun."/".$nama_wp?>?_=' +Math.random()).fadeIn("slow");
    }, 30000); 


 </script> -->
 <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
 <script type="text/javascript">
     $(document).ready(function() {
    $(".popup").click(function(){
        $.ajax({
            url: "<?= base_url() ?>Rekap/ajaxDetail",
            method: 'POST',
            data: {
                tanggal: $(this).data("tanggal"),
                namawp:$(this).data("namawp")
            },
            success: function (data) {
                //alert(data);
                $('#detail').html(data);
                $('#modalDetail').modal('show');
            }
        });
    }); 
});
 </script>



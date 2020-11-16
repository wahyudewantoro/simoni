        <div class="page-bar">
                            <ul class="page-breadcrumb">
                                <li>
                                    Home
                                    <i class="fa fa-circle"></i>
                                </li>
                                <li>
                                    <span>Tb_transaksi</span>
                                    <i class="fa fa-circle"></i>
                                </li>
                                <li>
                                    <span><?php echo $button ?></span>
                                </li>
                            </ul>
                        </div>
                        <div class="portlet light bordered">
                            <div class="portlet-title">
                                <div class="caption font-green-haze">
                                    <i class="fa fa-file-text font-green-haze"></i>
                                    <span class="caption-subject bold"> <?php echo $button ?></span>
                                </div>
                            </div>
                            <div class="portlet-body form">
        <form action="<?php echo $action; ?>" method="post" class="form-horizontal">
	    <div class="form-group form-md-line-input  has-success">
            <label class="col-md-2 control-label" for="int">Kd Jenispajak <span class="required"> * </span></label>
            <div class="col-md-10">
                <input type="text" class="form-control" name="kd_jenispajak" id="kd_jenispajak"  value="<?php echo $kd_jenispajak; ?>" />
                <?php echo form_error('kd_jenispajak') ?>
            </div>
        </div>
	    <div class="form-group form-md-line-input  has-success">
            <label class="col-md-2 control-label" for="int">Id Transaksi <span class="required"> * </span></label>
            <div class="col-md-10">
                <input type="text" class="form-control" name="id_transaksi" id="id_transaksi"  value="<?php echo $id_transaksi; ?>" />
                <?php echo form_error('id_transaksi') ?>
            </div>
        </div>
	    <div class="form-group form-md-line-input  has-success">
            <label class="col-md-2 control-label" for="timestamp">Waktu Trx <span class="required"> * </span></label>
            <div class="col-md-10">
                <input type="text" class="form-control" name="waktu_trx" id="waktu_trx"  value="<?php echo $waktu_trx; ?>" />
                <?php echo form_error('waktu_trx') ?>
            </div>
        </div>
	    <div class="form-group form-md-line-input  has-success">
            <label class="col-md-2 control-label" for="int">Nilai Trx <span class="required"> * </span></label>
            <div class="col-md-10">
                <input type="text" class="form-control" name="nilai_trx" id="nilai_trx"  value="<?php echo $nilai_trx; ?>" />
                <?php echo form_error('nilai_trx') ?>
            </div>
        </div>
	    <div class="form-group form-md-line-input  has-success">
            <label class="col-md-2 control-label" for="int">Disc Trx <span class="required"> * </span></label>
            <div class="col-md-10">
                <input type="text" class="form-control" name="disc_trx" id="disc_trx"  value="<?php echo $disc_trx; ?>" />
                <?php echo form_error('disc_trx') ?>
            </div>
        </div>
	    <div class="form-group form-md-line-input  has-success">
            <label class="col-md-2 control-label" for="keterangan">Keterangan <span class="required"> * </span></label>
            <div class="col-md-10">
                <textarea class="form-control" rows="3" name="keterangan" id="keterangan" ><?php echo $keterangan; ?></textarea>
                 <?php echo form_error('keterangan') ?>
            </div>
        </div>
	   <div class="form-group"><div class="col-md-10 col-md-offset-2"> <input type="hidden" name="kd_trx" value="<?php echo $kd_trx; ?>" /> 
	    <button type="submit" class="btn btn-sm blue"><i class="fa fa-save"></i> Simpan</button> 
	    <a href="<?php echo site_url('transaksi') ?>" class="btn btn-sm red"><i class="fa fa-close"></i> Batal</a> </div></div>
	</form>
        </div>
</div>
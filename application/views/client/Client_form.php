        <div class="page-bar">
                            <ul class="page-breadcrumb">
                                <li>
                                    <span>Client</span>
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
                    	    <div class="form-group has-success">
                                <label class="col-md-2 control-label" for="int">Wajib Pajak <span class="required"> * </span></label>
                                <div class="col-md-10">
                                    <select  class="form-control select2" name="kd_client" id="kd_client">
                                        <option value=""></option>
                                        <?php foreach($client as $rc){?>
                                        <option <?php if($rc->kd_client==$kd_client){echo "selected";}?> value="<?php echo $rc->kd_client?>"><?php echo $rc->nama_wp?></option>
                                        <?php } ?>
                                    </select>
                                    <?php echo form_error('kd_client') ?>
                                </div>
                            </div>
                    	    <div class="form-group has-success">
                                <label class="col-md-2 control-label" for="int">Jenis Pajak <span class="required"> * </span></label>
                                <div class="col-md-10">
                                    <!-- <input type="text"   value="<?php echo $kd_jenispajak; ?>" /> -->
                                    <select class="select2 form-control" name="kd_jenispajak" id="kd_jenispajak">
                                        <option value=""></option>
                                        <?php foreach($pajak as $rp){?>
                                        <option <?php if($rp->kd_jenispajak==$kd_jenispajak){echo "selected";}?> value="<?php echo $rp->kd_jenispajak?>"><?php echo $rp->rekening.' / '.$rp->nama_pajak?></option>
                                        <?php } ?>
                                    </select>
                                    <?php echo form_error('kd_jenispajak') ?>
                                </div>
                            </div>
                    	   <div class="form-group"><div class="col-md-10 col-md-offset-2"> <input type="hidden" name="id_inc" value="<?php echo $id_inc; ?>" /> 
                    	    <button type="submit" class="btn btn-sm blue"><i class="fa fa-save"></i> Simpan</button> 
                    	    <a href="<?php echo site_url('client') ?>" class="btn btn-sm red"><i class="fa fa-close"></i> Batal</a> </div></div>
                    	</form>
        </div>
</div>
        <div class="page-bar">
                            <ul class="page-breadcrumb">
                                <li>
                                    Home
                                    <i class="fa fa-circle"></i>
                                </li>
                                <li>
                                    <span>Menu</span>
                                    <i class="fa fa-circle"></i>
                                </li>
                                <li>
                                    <span><?php echo $button?></span>
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
            <label class="col-md-2 control-label" for="varchar">Nama Menu <span class="required"> * </span></label>
            <div class="col-md-10">
                <input type="text" class="form-control" name="nama_menu" id="nama_menu"  value="<?php echo $nama_menu; ?>" />
                <?php echo form_error('nama_menu') ?>
            </div>
        </div>
	    <div class="form-group form-md-line-input  has-success">
            <label class="col-md-2 control-label" for="varchar">Link Menu <span class="required"> * </span></label>
            <div class="col-md-10">
                <input type="text" class="form-control" name="link_menu" id="link_menu"  value="<?php echo $link_menu; ?>" />
                <?php echo form_error('link_menu') ?>
            </div>
        </div>
	    <div class="form-group form-md-line-input  has-success">
            <label class="col-md-2 control-label" for="int">Parent <span class="required"> * </span></label>
            <div class="col-md-10">
                <select class="form-control" name="parent" id="parent" >
                    <option value="0">Is Parent</option>
                    <?php foreach($parentlist as $rp){?>
                    <option <?php if($rp->id_inc==$parent){echo "selected";}?> value="<?php echo $rp->id_inc?>"><?php echo $rp->nama_menu?></option>
                    <?php }?>
                </select>
                <?php echo form_error('parent') ?>
            </div>
        </div>
	    <div class="form-group form-md-line-input  has-success">
            <label class="col-md-2 control-label" for="int">Sort <span class="required"> * </span></label>
            <div class="col-md-10">
                <input type="text" class="form-control" name="sort" id="sort"  value="<?php echo $sort; ?>" />
                <?php echo form_error('sort') ?>
            </div>
        </div>
	    <div class="form-group form-md-line-input  has-success">
            <label class="col-md-2 control-label" for="varchar">Icon <span class="required"> * </span></label>
            <div class="col-md-10">
                <input type="text" class="form-control" name="icon" id="icon"  value="<?php echo $icon; ?>" />
                <?php echo form_error('icon') ?>
            </div>
        </div>
	   <div class="form-group"><div class="col-md-10 col-md-offset-2"> <input type="hidden" name="id_inc" value="<?php echo $id_inc; ?>" /> 
	    <button type="submit" class="btn btn-sm blue"><i class="fa fa-save"></i> Simpan</button> 
	    <a href="<?php echo site_url('menu') ?>" class="btn btn-sm red"><i class="fa fa-close"></i> Batal</a> </div></div>
	</form>
        </div>
</div>
    </body>
</html>
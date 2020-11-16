        <div class="page-bar">
                            <ul class="page-breadcrumb">
                                <li>
                                    Home
                                    <i class="fa fa-circle"></i>
                                </li>
                                <li>
                                    <span>Pengguna</span>
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
            <label class="col-md-2 control-label" for="varchar">Nama <span class="required"> * </span></label>
            <div class="col-md-10">
                <input type="text" class="form-control" name="nama" id="nama"  value="<?php echo $nama; ?>"  required/>
                <?php echo form_error('nama') ?>
            </div>
        </div>
	    <div class="form-group form-md-line-input  has-success">
            <label class="col-md-2 control-label" for="varchar">Username <span class="required"> * </span></label>
            <div class="col-md-10">
                <input type="text" class="form-control" name="username" id="username"  value="<?php echo $username; ?>" required/>
                <?php echo form_error('username') ?>
            </div>
        </div>
        <div class="form-group form-md-line-input  has-success">
            <label class="col-md-2 control-label" for="varchar">Password <?php if($disabled==true){ echo "Lama"; }?>
                <?php if($disabled==false){ ?> <span class="required"> * </span> <?php } ?></label>
            <div class="col-md-10">
                <input type="text" class="form-control" name="password" id="password"  <?php if($disabled==false){ ?> value="<?php echo $password; ?>" <?php echo " required"; } ?> />
                <?php echo form_error('password') ?>
            </div>
        </div>
        <?php 
        if($disabled==true){
        ?>
        <div class="form-group form-md-line-input  has-success">
            <label class="col-md-2 control-label" for="varchar">Password Baru</label>
            <div class="col-md-10">
                <input type="text" class="form-control" name="password_new" id="password_new" />
            </div>
        </div>
        <?php
        }
        ?>        
	    <div class="form-group form-md-line-input  has-success">
            <label class="col-md-2 control-label" for="int">Role <span class="required"> * </span></label>
            <div class="col-md-10">
                <select class="form-control" name="role" id="role" required>
                    <option value="0">Pilih</option>
                    <?php foreach($m_role as $r){?>
                    <option <?php if($r->id_inc==$ms_role_id){echo "selected";}?> value="<?php echo $r->id_inc?>"><?php echo $r->nama_role?></option>
                    <?php }?>
                </select>
                <?php echo form_error('role') ?>
            </div>
        </div>
	   <div class="form-group"><div class="col-md-10 col-md-offset-2"> <input type="hidden" name="id_inc" value="<?php echo $id_inc; ?>" /> 
	    <button type="submit" class="btn btn-sm blue"><i class="fa fa-save"></i> Simpan</button> 
	    <a href="<?php echo site_url('pengguna') ?>" class="btn btn-sm red"><i class="fa fa-close"></i> Batal</a> </div></div>
	</form>
        </div>
</div>
    </body>
</html>
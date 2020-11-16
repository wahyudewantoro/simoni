        <div class="page-bar">
                            <ul class="page-breadcrumb">
                                <li>
                                    Master
                                    <i class="fa fa-circle"></i>
                                </li>
                                <li>
                                    <span>Konfigurasi</span>
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
        <form action="<?php echo $action; ?>" method="post" class="form-horizontal" name="randform">
	    <div class="form-group form-md-line-input  has-success">
            <label class="col-md-2 control-label" for="varchar">Nama WP <span class="required"> * </span></label>
            <div class="col-md-10">
                <!-- <?php
                    if(isset($nama_wp)){
                ?>
                        <input type="text" class="form-control" name="nama_wp" id="nama_wp"  value="<?php echo $nama_wp; ?>" readonly="" />
                <?php
                    }else{
                ?>
                        <select class="form-control" name="nama_wp" id="nama_wp">
                            <option value="">-- Pilih WP --</option>
                            <?php
                                foreach($wp as $wp){
                            ?>
                            <option value="<?php echo $wp->nama_wp?>"><?php echo $wp->nama_wp?></option>
                            <?php
                                }
                            ?>
                        </select>
                <?php  
                    }
                ?> -->
                <input type="text" class="form-control" name="nama_wp" id="nama_wp"  value="<?php echo $nama_wp; ?>" required />
                
                <!--<input type="text" class="form-control" name="rekening" id="rekening"  value="<?php echo $rekening; ?>" />-->
                <!--<?php echo form_error('rekening') ?>-->
            </div>
        </div>
        <div class="form-group form-md-line-input  has-success">
            <label class="col-md-2 control-label" for="varchar">Last ID Database <span class="required"> * </span></label>
            <div class="col-md-10">
                <input type="text" class="form-control" name="last_id_database" id="last_id_database" value="<?php echo $last_id_database; ?>"/>
                <?php echo form_error('last_id_database') ?>
            </div>
        </div>
        <div class="form-group form-md-line-input  has-success">
            <label class="col-md-2 control-label" for="varchar">Kode Jenis Pajak <span class="required"> * </span></label>
            <div class="col-md-10">
                <input type="text" class="form-control" name="kd_jenispajak" id="kd_jenispajak" value="<?php echo $kd_jenispajak; ?>"/>
                <?php echo form_error('kd_jenispajak') ?>
            </div>
        </div>
        <div class="form-group form-md-line-input  has-success">
            <label class="col-md-2 control-label" for="varchar">ID Client <span class="required"> * </span></label>
            <div class="col-md-10">
                <input type="text" class="form-control" name="id_client" id="id_client" value="<?php echo $id_client; ?>"/>
                <?php echo form_error('id_client') ?>
            </div>
        </div>
        <div class="form-group form-md-line-input  has-success">
            <label class="col-md-2 control-label" for="varchar">Username <span class="required"> * </span></label>
            <div class="col-md-10">
                <input type="text" class="form-control" name="username" id="username" value="<?php echo $username; ?>"/>
                <?php echo form_error('username') ?>
            </div>
        </div>
        <div class="form-group form-md-line-input  has-success">
            <label class="col-md-2 control-label" for="varchar">Password</label>
            <div class="col-md-10">
                <input type="password" class="form-control" name="password" id="password" value="<?php echo $password; ?>"/>
                <!--<?php echo form_error('password') ?>-->
            </div>
        </div>
        <div class="form-group form-md-line-input  has-success">
            <label class="col-md-2 control-label" for="varchar">Database Client <span class="required"> * </span></label>
            <div class="col-md-10">
                <input type="text" class="form-control" name="database_client" id="database_client"  value="<?php echo $database_client; ?>"/>
                <?php echo form_error('database_client') ?>
            </div>
        </div>
        <div class="form-group form-md-line-input  has-success">
            <label class="col-md-2 control-label" for="varchar">Interval Process <span class="required"> * </span></label>
            <div class="col-md-10">
                <input type="number" class="form-control" name="interval_process" id="interval_process" value="<?php echo $interval_process; ?>"/>
                <?php echo form_error('interval_process') ?>
            </div>
        </div>
        <div class="form-group form-md-line-input  has-success">
            <label class="col-md-2 control-label" for="varchar">Path Root <span class="required"> * </span></label>
            <div class="col-md-10">
                <input type="text" class="form-control" name="path_csv" id="path_csv" value="<?php echo $path_csv; ?>"/>
                <?php echo form_error('path_csv') ?>
            </div>
        </div>
        <div class="form-group form-md-line-input  has-success">
            <label class="col-md-2 control-label" for="varchar">String Query <span class="required"> * </span></label>
            <div class="col-md-10">
                <input type="text" class="form-control" name="string_query" id="string_query" value="<?php echo $string_query; ?>"/>
                <?php echo form_error('string_query') ?>
            </div>
        </div>
        <div class="form-group form-md-line-input  has-success">
            <label class="col-md-2 control-label" for="varchar">String Query Dept <span class="required"> * </span></label>
            <div class="col-md-10">
                <input type="text" class="form-control" name="string_query_dept" id="string_query_dept" value="<?php echo $string_query_dept; ?>"/>
                <?php echo form_error('string_query_dept') ?>
            </div>
        </div>
        <div class="form-group form-md-line-input  has-success">
            <label class="col-md-2 control-label" for="varchar">Tipe Database <span class="required"> * </span></label>
            <div class="col-md-10">
                <select class="form-control" name="tipe_db" id="tipe_db">
                    <option value="">-- Pilih Tipe Database --</option>
                    <?php
                    foreach($ref_tipe_db as $td){
                    ?>
                    <option <?php if($td->id==$tipe_db){ echo "selected"; }?> value="<?php echo $td->id?>"><?php echo $td->tipe_db?></option>
                    <?php
                    }
                    ?>
                </select>
                <?php echo form_error('tipe_db') ?>
            </div>
        </div>
        <!-- <div class="form-group form-md-line-input  has-success">
            <label class="col-md-2 control-label" for="varchar">Path Move <span class="required"> * </span></label>
            <div class="col-md-10">
                <input type="text" class="form-control" name="path_move" id="path_move" value="<?php echo $path_move; ?>"/>
                <?php echo form_error('path_move') ?>
            </div>
        </div> -->
        <div class="form-group form-md-line-input  has-success">
            <label class="col-md-2 control-label" for="varchar">URL Server <span class="required"> * </span></label>
            <div class="col-md-10">
                <input type="text" class="form-control" name="url_server" id="url_server" value="<?php echo $url_server; ?>"/>
                <?php echo form_error('url_server') ?>
            </div>
        </div>
	    <div class="form-group form-md-line-input  has-success">
            <label class="col-md-2 control-label" for="varchar">Kode Aktivasi <span class="required"> * </span></label>
            <div class="col-md-6">
                <input type="text" class="form-control" name="kode_aktivasi" id="kode_aktivasi" readonly="" value="<?php echo $kode_aktivasi; ?>"/>
                <?php echo form_error('kode_aktivasi') ?>
            </div>
            <div class="col-md-4">
                <button type="button" class="btn btn-sm yellow" onClick="randomString();"><i class="fa fa-refresh"></i> Generate</button> 
            </div>
        </div>
	   <div class="form-group"><div class="col-md-10 col-md-offset-2"> <input type="hidden" name="kd_config" value="<?php echo $kd_config; ?>" /> 
	    <button type="submit" class="btn btn-sm blue"><i class="fa fa-save"></i> Simpan</button> 
	    <a href="<?php echo site_url('konfigurasi') ?>" class="btn btn-sm red"><i class="fa fa-close"></i> Batal</a> </div></div>
	</form>
        </div>
</div>
<script language="javascript" type="text/javascript">
function randomString() {
    // alert('tes');
	var chars = "0123456789";
	var string_length = 5;
	var randomstring = '';
	for (var i=0; i<string_length; i++) {
		var rnum = Math.floor(Math.random() * chars.length);
		randomstring += chars.substring(rnum,rnum+1);
	}
	
	//alert(randomstring);
	
	document.randform.kode_aktivasi.value = randomstring;
}
</script>
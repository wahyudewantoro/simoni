<form method="post" action="<?php echo base_url().'role/prosessettingrole'?>">
	<div class="page-bar">
	    <ul class="page-breadcrumb">
	        <li>
	            Sistem
	            <i class="fa fa-circle"></i>
	        </li>
	        <li>
	            Role
	            <i class="fa fa-circle"></i>
	        </li>
	        	Setting Privilege
	    </ul>
	    <div class="page-toolbar">
	        <div class="btn-group pull-right">
	        	<button class="btn green btn-sm btn-outline"><i class="fa fa-save"></i> Submit</button>
	            <?php echo anchor(site_url('role '), '<i class="fa fa-list"></i> List','class="btn purple btn-sm btn-outline"'); ?>
	        </div>
	    </div>
	</div>
	<div class="portlet box green">
        <div class="portlet-title">
            <div class="caption">
                <i class="fa fa-user"></i> <?= $nama_role?></div>
        </div>
        <div class="portlet-body">
        	<input type="hidden" name="kode_group"  value="<?php echo $kode_groupq;?>">
            <table class='table table-striped table-bordered dt-responsive nowrap' cellspacing='0' width='100%'>
              <thead>
                <tr>
                  <th width="4%">No</th>
                  
                  <th colspan="2">Menu</th>
                  <th>Parent</th>
                </tr>
              </thead>
              <tbody>
                <?php $no=1;
                  foreach($role as $row){?>
                <tr>
                  <td align="center"><?php echo $no;?></td>
                  <td width="3%" align="center"><input <?php if($row['STATUS']==1){ echo "checked";}?> type="checkbox" name="role[]" value="<?php echo $row['kode_role']; ?>"></td>
                  <td><?php echo ucwords($row['nama_menu']);?></td>
                  <td><?php echo ucwords($row['parent']);?></td>
                </tr>
                <?php $no++;}?>
              </tbody>
            </table>
	    </div>
	</div>
</form>
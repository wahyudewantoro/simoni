        <div class="page-bar">
                            <ul class="page-breadcrumb">
                                <li>
                                    Sistem
                                    <i class="fa fa-circle"></i>
                                </li>
                                <li>
                                    <span>Role</span>
                                </li>
                            </ul>
                            <div class="page-toolbar">
                                <div class="btn-group pull-right">
                                    <?php echo anchor(site_url('role/create'), '<i class="fa fa-plus"></i> Tambah','class="btn purple btn-sm btn-outline"'); ?>
                                </div>
                            </div>
                        </div>
        <div class="portlet box green">
                                    <div class="portlet-title">
                                        <div class="caption">
                                            <i class="fa fa-list"></i>Data</div>
                                    </div>
                                    <div class="portlet-body">
                                        
        <table class="table table-striped table-bordered table-hover" id="tb" >
            <thead>
                <tr>
                    <th width="5%">No</th>
		    <th> Role</th>
		    <th>Aksi</th>
                </tr>
            </thead>
	    <tbody>
            <?php
            $start = 0;
            foreach ($role_data as $role)
            {
                ?>
                <tr>
        		    <td align='center'><?php echo ++$start ?></td>
        		    <td><?php echo $role->nama_role ?></td>
        		    <td style="text-align:center" width="10%"><?php 
        			echo anchor(site_url('role/settingPrivilege/'.$role->id_inc),'<i class="fa fa-lock"></i>','class="btn btn-xs btn-info"'); 
                    echo anchor(site_url('role/update/'.$role->id_inc),'<i class="fa fa-edit"></i>','class="btn btn-xs btn-success"'); 
        			echo anchor(site_url('role/delete/'.$role->id_inc),'<i class="fa fa-trash"></i>','onclick="javasciprt: return confirm(\'apakah anda yakin hapus ?\')" class="btn btn-xs btn-danger"'); 
        			?></td>
    	        </tr>
                <?php
            }
            ?>
            </tbody>
        </table>
       
    </div>
</div>
       
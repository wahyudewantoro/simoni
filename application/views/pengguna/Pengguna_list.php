        <div class="page-bar">
                            <ul class="page-breadcrumb">
                                <li>
                                    Home
                                    <i class="fa fa-circle"></i>
                                </li>
                                <li>
                                    <span>Pengguna</span>
                                </li>
                            </ul>
                            <div class="page-toolbar">
                                <div class="btn-group pull-right">
                                    <?php echo anchor(site_url('pengguna/create'), '<i class="fa fa-plus"></i> Tambah','class="btn purple btn-sm btn-outline"'); ?>
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
		    <th>Nama</th>
		    <th>Username</th>
		    <th>Role</th>
		    <th>Aksi</th>
                </tr>
            </thead>
	    <tbody>
            <?php
            $start = 0;
            foreach ($menu_data as $a)
            {
                ?>
                <tr>
		    <td align='center'><?php echo ++$start ?></td>
		    <td><?php echo $a->nama ?></td>
		    <td><?php echo $a->username ?></td>
		    <td><?php echo $a->nama_role ?></td>
		    <td style="text-align:center" width="10%"><?php 
			echo anchor(site_url('pengguna/update/'.$a->id_inc),'<i class="fa fa-edit"></i>','class="btn btn-xs btn-success"'); 
			echo anchor(site_url('pengguna/delete/'.$a->id_inc),'<i class="fa fa-trash"></i>','onclick="javasciprt: return confirm(\'apakah anda yakin hapus ('.$a->nama.') ?\')" class="btn btn-xs btn-danger"'); 
			?></td>
	        </tr>
                <?php
            }
            ?>
            </tbody>
        </table>
       
    </div>
</div>
       
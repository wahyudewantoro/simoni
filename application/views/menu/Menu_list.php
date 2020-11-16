        <div class="page-bar">
                            <ul class="page-breadcrumb">
                                <li>
                                    Home
                                    <i class="fa fa-circle"></i>
                                </li>
                                <li>
                                    <span>Menu</span>
                                </li>
                            </ul>
                            <div class="page-toolbar">
                                <div class="btn-group pull-right">
                                    <?php echo anchor(site_url('menu/create'), '<i class="fa fa-plus"></i> Tambah','class="btn purple btn-sm btn-outline"'); ?>
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
		    <th>Nama Menu</th>
		    <th>Link Menu</th>
		    <th>Parent</th>
		    <th>Sort</th>
		    <th>Icon</th>
		    <th>Aksi</th>
                </tr>
            </thead>
	    <tbody>
            <?php
            $start = 0;
            foreach ($menu_data as $menu)
            {
                ?>
                <tr>
		    <td align='center'><?php echo ++$start ?></td>
		    <td><?php echo $menu->nama_menu ?></td>
		    <td><?php echo $menu->link_menu ?></td>
		    <td><?php echo $menu->parent ?></td>
		    <td><?php echo $menu->sort ?></td>
		    <td><?php echo $menu->icon ?></td>
		    <td style="text-align:center" width="10%"><?php 
			echo anchor(site_url('menu/update/'.$menu->id_inc),'<i class="fa fa-edit"></i>','class="btn btn-xs btn-success"'); 
			echo anchor(site_url('menu/delete/'.$menu->id_inc),'<i class="fa fa-trash"></i>','onclick="javasciprt: return confirm(\'apakah anda yakin hapus ('.$menu->nama_menu.') ?\')" class="btn btn-xs btn-danger"'); 
			?></td>
	        </tr>
                <?php
            }
            ?>
            </tbody>
        </table>
       
    </div>
</div>
       
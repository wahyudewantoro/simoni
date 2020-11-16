        <div class="page-bar">
                            <ul class="page-breadcrumb">
                                <li>
                                    Client
                                </li>
                                
                            </ul>
                            <div class="page-toolbar">
                                <div class="btn-group pull-right">
                                    <?php echo anchor(site_url('client/create'), '<i class="fa fa-plus"></i> Tambah','class="btn purple btn-sm btn-outline"'); ?>
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
                    <th width ="5%">No</th>
                    <th>Nama WP</th>
                    <th>Pajak</th>
                    <th>Rekening</th>
                    <th>Aksi</th>
                </tr>
            </thead>
	    <tbody>
            <?php
            $start = 0;
            foreach ($client_data as $client)
            {
                ?>
                <tr>
		    <td align='center'><?php echo ++$start ?></td>
		    <td><?php echo $client->nama_wp ?></td>
		    <td><?php echo $client->nama_pajak ?></td>
            <td><?php echo $client->rekening ?></td>
		    <td style="text-align:center" width="10%"><?php 
			echo anchor(site_url('client/update/'.$client->id_inc),'<i class="fa fa-edit"></i>','class="btn btn-xs btn-success"'); 
			echo anchor(site_url('client/delete/'.$client->id_inc),'<i class="fa fa-trash"></i>','onclick="javasciprt: return confirm(\'apakah anda yakin hapus ?\')" class="btn btn-xs btn-danger"'); 
			?></td>
	        </tr>
                <?php
            }
            ?>
            </tbody>
        </table>
       
    </div>
</div>
       
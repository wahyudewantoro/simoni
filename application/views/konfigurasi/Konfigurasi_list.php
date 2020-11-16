        <div class="page-bar">
                            <ul class="page-breadcrumb">
                                <li>
                                    Master
                                    <i class="fa fa-circle"></i>
                                </li>
                                <li>
                                    <span>Konfigurasi</span>
                                </li>
                            </ul>
                            <div class="page-toolbar">
                                <div class="btn-group pull-right">
                                    <?php echo anchor(site_url('konfigurasi/create'), '<i class="fa fa-plus"></i> Tambah','class="btn purple btn-sm btn-outline"'); ?>
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
		    <th>Nama WP</th>
		    <th>Kode Aktivasi</th>
		    <th>ID Client</th>
		    <th>Database Client</th>
		    <th>Versi</th>
		    <th>URL Server</th>
		    <th>Aksi</th>
                </tr>
            </thead>
	    <tbody>
            <?php
            $start = 0;
            foreach ($konfigurasi_data as $konfigurasi)
            {
                ?>
                <tr>
		    <td align='center'><?php echo ++$start ?></td>
		    <td><?php echo $konfigurasi->nama_wp ?></td>
		    <td><?php echo $konfigurasi->kode_aktivasi ?></td>
		    <td><?php echo $konfigurasi->id_client ?></td>
		    <td><?php echo $konfigurasi->database_client ?></td>
		    <td><?php echo $konfigurasi->versi_etax ?></td>
		    <td><?php echo $konfigurasi->url_server ?></td>
		    <td style="text-align:center" width="10%"><?php 
			echo anchor(site_url('konfigurasi/update/'.$konfigurasi->kd_config),'<i class="fa fa-edit"></i>','class="btn btn-xs btn-success"'); 
			echo anchor(site_url('konfigurasi/delete/'.$konfigurasi->kd_config),'<i class="fa fa-trash"></i>','onclick="javasciprt: return confirm(\'apakah anda yakin hapus ?\')" class="btn btn-xs btn-danger"'); 
			?></td>
	        </tr>
                <?php
            }
            ?>
            </tbody>
        </table>
       
    </div>
</div>
       
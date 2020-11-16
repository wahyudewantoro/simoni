        <div class="page-bar">
                            <ul class="page-breadcrumb">
                                <li>
                                    Master
                                    <i class="fa fa-circle"></i>
                                </li>
                                <li>
                                    <span>Jenis Pajak</span>
                                </li>
                            </ul>
                            <div class="page-toolbar">
                                <div class="btn-group pull-right">
                                    <?php echo anchor(site_url('refjenispajak/create'), '<i class="fa fa-plus"></i> Tambah','class="btn purple btn-sm btn-outline"'); ?>
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
		    <th>Rekening</th>
		    <th>Nama Pajak</th>
		    <th>Aksi</th>
                </tr>
            </thead>
	    <tbody>
            <?php
            $start = 0;
            foreach ($refjenispajak_data as $refjenispajak)
            {
                ?>
                <tr>
		    <td align='center'><?php echo ++$start ?></td>
		    <td><?php echo $refjenispajak->rekening ?></td>
		    <td><?php echo $refjenispajak->nama_pajak ?></td>
		    <td style="text-align:center" width="10%"><?php 
			echo anchor(site_url('refjenispajak/update/'.$refjenispajak->kd_jenispajak),'<i class="fa fa-edit"></i>','class="btn btn-xs btn-success"'); 
			echo anchor(site_url('refjenispajak/delete/'.$refjenispajak->kd_jenispajak),'<i class="fa fa-trash"></i>','onclick="javasciprt: return confirm(\'apakah anda yakin hapus ?\')" class="btn btn-xs btn-danger"'); 
			?></td>
	        </tr>
                <?php
            }
            ?>
            </tbody>
        </table>
       
    </div>
</div>
       
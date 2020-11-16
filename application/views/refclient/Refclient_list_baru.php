        <div class="page-bar">
                            <ul class="page-breadcrumb">
                                <li>
                                    Master
                                    <i class="fa fa-circle"></i>
                                </li>
                                <li>
                                    <span>Wajib Pajak</span>
                                </li>
                            </ul>
                            <div class="page-toolbar">
                                <div class="btn-group pull-right">
                                    <!-- <?php echo anchor(site_url('refclient/create'), '<i class="fa fa-plus"></i> Tambah','class="btn purple btn-sm btn-outline"'); ?> -->
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
            <th>NPWP</th>
		    <th>Nama WP</th>
            <th>Alamat</th>
            <th>Telepon</th>
                </tr>
            </thead>
	    <tbody>
            <?php
            $start = 1;
            foreach ($refclient_data as $refclient)
            {
                ?>
                <tr>
		    <td align='center'><?php echo $start++ ?></td>
		    <td><?php echo $refclient->NPWP ?></td>
		    <td><?php echo $refclient->NAMA ?></td>
            <td><?php echo $refclient->ALAMAT ?></td>
            <td><?php echo $refclient->NO_TELP ?></td>
		    
	        </tr>
                <?php
            }
            ?>
            </tbody>
        </table> 

       
    </div>
</div>

       
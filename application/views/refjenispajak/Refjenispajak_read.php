<!doctype html>
<html>
    <head>
        <title>harviacode.com - codeigniter crud generator</title>
        <link rel="stylesheet" href="<?php echo base_url('assets/bootstrap/css/bootstrap.min.css') ?>"/>
        <style>
            body{
                padding: 15px;
            }
        </style>
    </head>
    <body>
        <h2 style="margin-top:0px">Ref_jenispajak Read</h2>
        <table class="table">
	    <tr><td>Rekening</td><td><?php echo $rekening; ?></td></tr>
	    <tr><td>Nama Pajak</td><td><?php echo $nama_pajak; ?></td></tr>
	    <tr><td></td><td><a href="<?php echo site_url('refjenispajak') ?>" class="btn btn-default">Cancel</a></td></tr>
	</table>
        </body>
</html>
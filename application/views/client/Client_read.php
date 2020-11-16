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
        <h2 style="margin-top:0px">Tb_client Read</h2>
        <table class="table">
	    <tr><td>Kd Client</td><td><?php echo $kd_client; ?></td></tr>
	    <tr><td>Kd Jenispajak</td><td><?php echo $kd_jenispajak; ?></td></tr>
	    <tr><td></td><td><a href="<?php echo site_url('client') ?>" class="btn btn-default">Cancel</a></td></tr>
	</table>
        </body>
</html>
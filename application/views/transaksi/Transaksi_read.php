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
        <h2 style="margin-top:0px">Tb_transaksi Read</h2>
        <table class="table">
	    <tr><td>Kd Jenispajak</td><td><?php echo $kd_jenispajak; ?></td></tr>
	    <tr><td>Id Transaksi</td><td><?php echo $id_transaksi; ?></td></tr>
	    <tr><td>Waktu Trx</td><td><?php echo $waktu_trx; ?></td></tr>
	    <tr><td>Nilai Trx</td><td><?php echo $nilai_trx; ?></td></tr>
	    <tr><td>Disc Trx</td><td><?php echo $disc_trx; ?></td></tr>
	    <tr><td>Keterangan</td><td><?php echo $keterangan; ?></td></tr>
	    <tr><td></td><td><a href="<?php echo site_url('transaksi') ?>" class="btn btn-default">Cancel</a></td></tr>
	</table>
        </body>
</html>
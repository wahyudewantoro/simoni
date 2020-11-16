 

<table class="table table-striped table-bordered table-hover" >

            <thead>

                <tr>

                    <th width="5%">No</th>

                    <th>Nama WP</th>

                    <th>Jenis Pajak</th>

                    <th>Waktu Trx</th>

                    <th>Nilai Trx</th>

                    <th>Disc Trx</th>

                    <th>Keterangan</th>

                    <th>Insert</th>

                </tr>

            </thead>

	    <tbody>

            <?php

            $start = 0;

            foreach ($transaksi_data as $transaksi)

            {

                ?>

                <tr>

		    <td align='center'><?php echo ++$start ?></td>

		    <td><?php echo $transaksi->nama_wp ?></td>

            <td><?php echo $transaksi->jenis_pajak ?></td>

		    <td><?php echo $transaksi->waktu_trx ?></td>

		    <td><?php echo number_format($transaksi->nilai_trx,'0','','.') ?></td>

		    <td><?php echo number_format($transaksi->disc_trx,'0','','.') ?></td>

		    <td><?php echo $transaksi->keterangan ?></td>

		    <td><?php echo $transaksi->tanggal_insert ?></td>

	        </tr>

                <?php

            }

            ?>

            </tbody>

        </table>
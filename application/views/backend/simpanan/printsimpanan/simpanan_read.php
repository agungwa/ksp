<style>
 	table{margin: auto;}
 	td,th{padding: 5px;text-align: justify; }
 	h2{text-align: center}
 	h3{text-align: center}
 	th{background-color: #95a5a6; padding: 10px;color: #fff}
 </style>
 <h2><b>Rincian Rekening Simpanan</b></h2>
        <table class="table">
	    <tr text-align="justify"><td>Kode Simpanan</td><td><?php echo $sim_kode; ?></td></tr>
	    <tr text-align="justify"><td>Angggota</td><td><?php echo $ang_no; ?></td></tr>
	    <tr text-align="justify"><td>Alamat</td><td><?php echo $alamat_ang_no; ?></td></tr>
	    <tr text-align="justify"><td>Wilayah</td><td><?php echo $wil_kode; ?></td></tr>
	    <tr text-align="justify"><td>Jenis Simpanan</td><td><?php echo $jsi_id,' bulan'; ?></td></tr>
	    <tr text-align="justify"><td>Jenis Setoran</td><td><?php echo $jse_id; ?></td></tr>
	    <tr text-align="justify"><td>Tanggal Pendaftaran</td><td><?php echo $sim_tglpendaftaran; ?></td></tr>
	    <tr text-align="justify"><td>Status</td><td><?php echo $sim_status; ?></td></tr>
	</table>
    <table class="table table-bordered table-hover table-condensed" style="margin-bottom: 10px">
            <thead class="thead-light">
            <tr>
                <th class="text-center">No</th>
        <th class="text-center">Setoran</th>
		<th class="text-center">Tanggal Setoran</th>
		<th class="text-center">Saldo</th>
            </tr>
            </thead>
			<tbody><?php
            $no = 1;
            $total_setoran = 0;
            foreach ($setoran_data as $setoran)
            {
                $total_setoran += $setoran->ssi_jmlsetor;
            ?>
            <tr>
			<td width="80px"><?php echo $no ?></td>
			<td><?php echo rupiahsimpanan($setoran->ssi_jmlsetor) ?></td>
			<td><?php echo dateFormataja($setoran->ssi_tglsetor) ?></td>
			<td><?php echo rupiahsimpanan($total_setoran) ?></td>
		</tr>

            <?php
			$no++;
            }
            ?>
            </tbody>
        </table>
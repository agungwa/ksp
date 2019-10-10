<style>
	table{margin: auto;}
	td,th{padding: 5px;text-align: center; }
	h2{text-align: center}
	h3{text-align: center}
	th{background-color: #95a5a6; padding: 10px;color: #fff}
</style>
<h2><b>List Investasi Berjangka</b></h2>
<?php $wil_kode = $this->db->get_where('wilayah', array('wil_kode' => $w))->row(); ?>

<h3><b>Rentang Tanggal : <?=dateFormataja($f)?> Sampai <?=dateFormataja($t)?> </b></h3>
<p style="margin-top:0pt; margin-bottom:0pt; text-align:center; font-size:11pt"><span
    style="font-family:Cambria">Wilayah : <?php if($w!='all'){echo $wil_kode->wil_nama;} else if ($w='all') {echo 'Semua Wilayah';}?></p>
        
    <table class="table table-bordered table-hover table-condensed" style="margin-bottom: 10px">
        <thead class="thead-light">
			<tr>
				<th>No</th>
				<th>Rekening Investasi</th>
				<th>Anggota</th>
				<th>Nama Anggota</th>
				<th>Wilayah</th>
				<th>Jangka Waktu</th>
				<th>Jasa</th>
				<th>Bunga</th>
				<th>Investasi</th>
				<th>Tanggal Pendaftaran</th>
				<th>Tanggal Jatuh Tempo</th>
				<th>Status</th>
			</tr>
        </thead>
		<tbody><?php $temp = 0;
			foreach ($datainvest as $key=>$item){ ?>
				<tr>
					<td width="80px"><?php echo ++$start ?></td>
					<td><?php echo $item['ivb_kode'] ?></td>
					<td><?php echo $item['ang_no'] ?></td>
					<td><?php echo $item['nama_ang_no'] ?></td>
					<td><?php echo $item['wil_kode'] ?></td>
					<td><?php echo $item['jwi_id'] , " Bulan" ?></td>
					<td><?php echo $item['jiv_id'] ?></td>
					<td><?php echo $item['biv_id'] ," %" ?></td>
					<td><?php echo rupiahsimpanan($item['ivb_jumlah']) ?></td>
					<td><?php echo dateFormataja($item['ivb_tglpendaftaran']) ?></td>
					<td><?php echo dateFormataja($item['jatuhtempo']) ?></td>
					<td><?php echo $item['ivb_status'] ?></td>
				</tr><?php
				
				$temp += $item['ivb_jumlah'];
			} ?>
			<tr><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td>Total Investasi</td><td><?= rupiahsimpanan($temp) ?></td></tr>
		</tbody>
    </table>
<style>
table {
  border-collapse: collapse;
  width: 100%;
}

th, td {
  text-align: left;
  padding: 8px;
}

tr:nth-child(even){background-color: #f2f2f2}

th {
  background-color: #4CAF50;
  color: white;
}
 	h2{text-align: center}
 	h3{text-align: center}
 </style>
<h2><b>Data Penagihan Awal</b></h2>
<h3><b>Rentang Tanggal : <?=dateFormataja($t)?> Sampai <?=dateFormataja($y)?> </b></h3>
<h3><b>Wilayah <?=$w?> <!--<?php //if($w='all'){echo 'semua wilayah';}else {echo $wil_kode->wil_nama;}?>--></b></h3>
        
        <table>
            <thead>
            <tr>
                <th>No</th>
        <th>Rekening Pinjaman</th>
		<th>Wilayah</th>
		<th>Angsuranke</th>
		<th>Jatuh Tempo</th>
		<th>Tanggal Bayar</th>
		<th>Jumlah Pokok</th>
		<th>Jumlah Bunga</th>
		<th>Status</th>
            </tr>
            </thead>
			<tbody><?php
            $no=1;
            foreach ($dataangsuran as $key=>$item)
            { 
                ?>
                <tr>
			<td width="80px"><?php echo $no ?></td>
			<td><?php echo $item['pin_id'] ?></td>
			<td><?php echo $item['wil_kode'] ?></td>
			<td><?php echo $item['ang_angsuranke'] ?></td>
			<td><?php echo dateFormataja($item['ags_tgljatuhtempo']) ?></td>
			<td><?php echo dateFormataja($item['ags_tglbayar']) ?></td>
			<td><?php echo $item['ags_jmlpokok'] ?></td>
			<td><?php echo $item['ags_jmlbunga'] ?></td>
			<td><?php echo $item['ags_status'] ?></td>
		</tr>
                
                <?php
                $no++;
            }
            ?>
            </tbody>
        </table>
	   
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
    tr#01{background-color: #eb3131;color: white;}
    tr#02{background-color: #536fee;color: white;}
 </style>
  <?php
 $wil_kode = $this->db->get_where('wilayah', array('wil_kode' => $w))->row();
 ?>
<h2><b>Data Penagihan Kolektor</b></h2>
<h3><b>Rentang Tanggal : <?=dateFormataja($t)?> Sampai <?=dateFormataja($y)?> </b></h3>
<h3><b>Wilayah <?php if($w!='all'){echo $wil_kode->wil_nama;} else if ($w='all') {echo 'Semua Wilayah';}?></b></h3>
        
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
            $total = 0 ;
            foreach ($dataangsuran as $key=>$item)
            { 
              $totalbayar = $item['ags_jmlpokok'] + $item['ags_jmlbunga'];
              $total += $totalbayar;
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
        <table>
            <tr id="01"><td width="600px" >Total Angsuran</td><td width="200px"><?php echo rupiah($total) ?></td></tr>
        </table>
	   
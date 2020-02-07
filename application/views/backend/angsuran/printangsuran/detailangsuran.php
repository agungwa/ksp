<style>
#customers {
  font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

#customers td, #customers th {
  border: 1px solid #ddd;
  padding: 8px;
}

#customers tr:nth-child(even){background-color: #f2f2f2;}

#customers tr:hover {background-color: #ddd;}

#customers th {
  padding-top: 12px;
  padding-bottom: 12px;
  text-align: left;
  background-color: #4CAF50;
  color: white;
}

 	table{margin: auto;}
 	td,th{padding: 5px;text-align: center; }
 	h2{text-align: center}
 	h3{text-align: center}
 	th{background-color: #95a5a6; padding: 10px;color: #fff}
 </style> 
	        	<?php
	        	if ($angsuran != null) {
					$agsb = $this->Angsuranbayar_model->get_angsuran_ags($angsuran['ags_id']);
					if ($agsb == NULL){
						$pokok = 0;
						$bunga = 0;
						$denda = 0; 
					} else {
						$pokok = $agsb->{'agb_pokok'};
						$bunga = $agsb->{'agb_bunga'}; 
						$denda = $agsb->{'agb_denda'};
					}

					$pin_id = $this->db->get_where('pinjaman', array('pin_id' => $angsuran['pin_id']))->row();
					$ang_no = $this->db->get_where('anggota', array('ang_no' => $pin_id->ang_no))->row();
					$sea_id = $this->db->get_where('settingangsuran', array('sea_id' => $pin_id->sea_id))->row();
					$bup_id = $this->db->get_where('bungapinjaman', array('bup_id' => $pin_id->bup_id))->row();
					?>
				
	        	<table id="customers">
				    <tr><td>Rekening Pinjaman</td><td><?php echo $angsuran['pin_id']; ?></td></tr>
					<tr><td>Anggota</td><td><?php echo $ang_no->ang_nama; ?></td></tr>
					<tr><td>Tenor</td><td><?php echo $sea_id->sea_tenor," Bulan"; ?></td></tr>
					<tr><td>Pinjaman</td><td><?php echo rupiah($pin_id->pin_pinjaman); ?></td></tr>
					<tr><td>Bunga/Bulan</td><td><?php echo $bup_id->bup_bunga," % (Bunga/bulan ",rupiah(($pin_id->pin_pinjaman*$bup_id->bup_bunga)/100),")"; ?></td></tr>
					<tr><td>Pokok/Bulan</td><td><?php echo rupiah($pin_id->pin_pinjaman/$sea_id->sea_tenor); ?></td></tr>
					<tr><td>Tanggal Pencairan</td><td><?php echo dateFormataja($pin_id->pin_tglpencairan); ?></td></tr>
				</table>
	        	<?php
	        	} ?>
		
        <h3>Histori Angsuran</h3>

	        	<table>
		            <thead >
		            <tr>
						<th >Angsuranke</th>
						<th >Jatuh Tempo</th>
						<th >Tanggal Bayar</th>
						<th >Jumlah Pokok</th>
						<th >Jumlah Bunga</th>
						<th >Total</th>
						<th >Pokok Bayar</th>
						<th >Bunga Bayar</th>
						<th >Kurang Setor</th>
						<th >Denda Bayar</th>
						<th >Status</th>
		            </tr>
		            </thead>
					<tbody><?php
					if ($histori != null) {
					$i = 1;
					$denda=0;
					foreach ($histori as $item)
		            {
						$d=2;
						$m=1;
						$dendajatuhtempo = date("Y-m-d", strtotime($item->ags_tgljatuhtempo.' + '.$d.' days'));
						$nextjatuhtempo = date("Y-m-d", strtotime($item->ags_tgljatuhtempo.' + '.$m.' months'));
						$tanggalnext = new DateTime($nextjatuhtempo); 
						$tanggala = new DateTime($dendajatuhtempo); 
						$sekarang = new DateTime();
						if ($this->tgl < $nextjatuhtempo){
						$perbedaan = $tanggala->diff($sekarang);
						}else if ($this->tgl >= $nextjatuhtempo){
						$perbedaan = $tanggala->diff($tanggalnext);
						}
						$totalbayar = $item->ags_jmlpokok + $item->ags_jmlbunga;
						if ($item->ags_jmlbayar < 1){
							$kurangsetor = $totalbayar; 
						}else {
							$kurangsetor = $totalbayar-$item->ags_jmlbayar;
						}
						if ($kurangsetor < 0){
							$kurangsetor = 0;
						}
						if ($this->tgl > $dendajatuhtempo && $item->ags_jmlbayar < $totalbayar && $item->ags_status < 2 ){
							$denda = ($kurangsetor * ($settingdenda_data->sed_denda/100))*$perbedaan->d;
						}
						$angsuranbayar = $this->Angsuranbayar_model->get_angsuran_ags($item->ags_id);
						if ($angsuranbayar == NULL){
							$pokok = 0;
							$bunga = 0;
							$denda = 0;
						} else {
							$pokok = $angsuranbayar->{'agb_pokok'};
							$bunga = $angsuranbayar->{'agb_bunga'};
							$denda = $angsuranbayar->{'agb_denda'};
						}
		                ?>
		                <tr>
							<td><?php echo $item->ang_angsuranke ?></td>
							<td><?php echo date("Y-m-d",strtotime($item->ags_tgljatuhtempo)) ?></td>
							<td><?php echo dateFormataja($item->ags_tglbayar)?></td>
							<td><?php echo rupiah($item->ags_jmlpokok) ?></td>
							<td><?php echo rupiah($item->ags_jmlbunga) ?></td>
							<td><?php echo rupiah($totalbayar) ?></td>
							<td><?php echo rupiah($pokok) ?></td>
							<td><?php echo rupiah($bunga) ?></td>
							<td><?php echo rupiah($kurangsetor) ?></td>
							<td><?php echo rupiah($denda) ?></td>
							<td ><?php echo $this->statusAngsuran[$item->ags_status] ?></td>
							
						</tr>
		                
		                <?php
		            }
		        }
		            ?>
		        </table>

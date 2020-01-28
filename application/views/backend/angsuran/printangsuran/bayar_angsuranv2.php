
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
					?>
				
	        	<table class="table">
				    <tr><td>Rekening Pinjaman</td><td><?php echo $angsuran['pin_id']; ?></td></tr>
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
						if ($item->ags_bayartunggakan <= 0) {
							$totalkekurangan = $kurangsetor + $denda;
							} else {
							$totalkekurangan = $kurangsetor + $item->ags_denda - $item->ags_bayartunggakan;
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

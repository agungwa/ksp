<div class="row">
<div class="col-lg-12">
    <div class="ibox">
        <div class="ibox-content">
        <div class="jumbotron">
        <div class="row" style="margin-bottom: 10px, margin-top:10px">
            <form action="<?php echo site_url('angsuran'); ?>" class="form-inline" method="get">
            	<input type="hidden" name="p" value="1">
            	<div class="col-md-8">
            		
	            	<div class="form-group">
			            <label for="int">Angsuranke</label>
			            <div class="input-group">
			            <input type="text" class="form-control" name="k"placeholder="Ang Angsuranke" value="<?= $k?>" />
			        	</div>
			        </div>
            	</div>
            <div class="col-md-4 text-left">
			        <div class="form-group">
                    <div class="input-group">
                        <input type="text" class="form-control" name="q" value="<?php echo $q; ?>" placeholder="No Pinjaman">
                        <span class="input-group-btn">
                            <?php 
                                if ($q <> '')
                                {
                                    ?>
                                    <a href="<?php echo site_url('angsuran/?p=2'); ?>" class="btn btn-default">Reset</a>
                                    <?php
                                }
                            ?>
                          <button class="btn btn-primary" type="submit">Tampilkan</button>
                        </span>
                    </div>
                    </div>
            </div>
		</div>
		
		</form>
	    <div class="row" style="margin-top: 10px">
	        	<?php
	        	if ($angsuran != null) {
					$agsb = $this->Angsuranbayar_model->get_angsuran_ags($angsuran['ags_id']);
					if ($agsb == NULL){
						$pokok = 0; $tglpokok = $this->tgl;
						$bunga = 0; $tglbunga = $this->tgl;
						$denda = 0; $tgldenda = $this->tgl;
					} else {
						$pokok = $agsb->{'agb_pokok'}; $tglpokok = $agsb->{'agb_tglpokok'};
						$bunga = $agsb->{'agb_bunga'}; $tglbunga = $agsb->{'agb_tglbunga'};
						$denda = $agsb->{'agb_denda'}; $tgldenda = $agsb->{'agb_tgldenda'};
					}
					?>
				
		<form action="<?php echo site_url('angsuran/bayarAngsuranv2_action/'.$angsuran['ags_id']); ?>" method="post">
				
	        	<table class="table">
				    <tr><td>Rekening Pinjaman</td><td><?php echo $angsuran['pin_id']; ?></td></tr>
				    <tr><td>Angsuranke</td><td><?php echo $angsuran['ang_angsuranke']; ?></td></tr>
				    <tr><td>Jatuh Tempo</td><td><?php echo $angsuran['ags_tgljatuhtempo']; ?></td></tr>
				    <tr><td>Tanggal Bayar</td><td><?php echo $angsuran['ags_tglbayar']; ?></td></tr>
					
					<?php if ($pokok < $angsuran['ags_jmlpokok'] ) {
						?>
						<tr><td>Jumlah Pokok</td>
						<td>
						<input type="text" class="form-control numeric" name="agb_pokok" id="agb_pokok" placeholder="<?php echo rupiah($angsuran['ags_jmlpokok']-$pokok); ?>" />
						<input type="date" class="form-control" name="agb_tglpokok" id="todays-date" placeholder="tanggal pokok" />
						<?php echo 'Pokok Bayar = ',rupiah($pokok),' , Pokok Kurang = ',rupiah($angsuran['ags_jmlpokok']-$pokok) ?></td>
						</td>
						</tr>
						
					<?php } else {
						?>
						<tr><td>Jumlah Pokok</td>
						<td>
						<input type="hidden" class="form-control numeric" name="agb_pokok" id="agb_pokok" value="<?php echo $pokok; ?>" readonly />
						<input type="hidden" class="form-control" name="agb_tglpokok" value="<?php echo $tglpokok; ?>" />
						<?php echo rupiah($pokok) ?></td>
						</tr>
						<?php
					}
					?>
					</tr>

					<?php if ($bunga > 0 ) {
						?>
					<tr><td>Jumlah Bunga</td>
					<td>
					<input type="hidden" class="form-control numeric" name="agb_bunga" id="agb_bunga" value="<?php echo $bunga; ?>" readonly />
					<input type="hidden" class="form-control" name="agb_tglbunga" value="<?php echo $tglbunga; ?>" readonly />
					<?php echo rupiah($bunga) ?></td>
					</td></tr>
					<?php } else {
						?>
					<tr><td>Jumlah Bunga</td>
					<td>
					<input type="text" class="form-control numeric" name="agb_bunga" id="searchTxt" placeholder="<?php echo rupiah($angsuran['ags_jmlbunga']); ?>" />
					<input type="date" readon class="form-control" name="agb_tglbunga" id="todays-date1" placeholder="tanggal bunga" required />
					</td>
					</td>
					</tr><?php
					}
					?>

					<?php /*if ($angsuran['ags_id'] > 0 && $this->tgl < $angsuran['tgldenda']) {
					echo '<tr><td>Input Angsuran</td><td><input type="number" class="form-control" name="ags_jmlbayar" id="searchTxt" placeholder="Bayar" value="" required autofocus /></td></tr>';
					} else if ($angsuran['ags_status'] < 2 && $this->tgl < $angsuran['tgldenda']) {
					echo '<tr><td>Input Tambahan</td><td><input type="number" class="form-control" name="tambah" id="searchTxt" placeholder="Bayar" value="" required autofocus /></td></tr>';
					}*/
					?>

					<?php if ($denda < $angsuran['denda'] ) {
						?>
						<tr><td>Denda</td>
						<td>
						<input type="text" class="form-control numeric" name="agb_denda" id="agb_denda" placeholder="<?php echo rupiah($angsuran['denda']-$denda); ?>" />
						<input type="date" class="form-control" name="agb_tgldenda" id="todays-date2" placeholder="tanggal denda"  />
						<?php echo 'Denda Bayar = ',rupiah($denda),' , Denda Kurang = ',rupiah($angsuran['denda']-$denda) ?></td>
						</td>
						</tr>
					<?php } else {
						?>
						<tr><td>Denda</td>
						<td>
						<input type="hidden" class="form-control numeric" name="agb_denda" id="agb_denda" value="<?php echo $denda; ?>" readonly />
						<input type="hidden" class="form-control" name="agb_tgldenda"  value="<?php echo $tgldenda; ?>" readonly />
						<?php echo rupiah($denda) ?></td>
						</td>
						</tr>
						<?php
					}
					?>

					<tr><td>Status</td><td><?php echo $this->statusAngsuran[$angsuran['ags_status']]; ?></td></tr>
					
					<input type="hidden" class="form-control" name="pin_id" id="pin_id" placeholder="pin_id" value="<?php echo $angsuran['pin_id']; ?>" required="required" />
					<input type="hidden" class="form-control" name="ags_id" id="ags_id" placeholder="ags_id" value="<?php echo $angsuran['ags_id']; ?>" required="required" />
					<tr><td></td><td><a href="<?php echo site_url('angsuran/?p=4') ?>" class="btn btn-default">Batal</a>
					<?php if ($denda < $angsuran['denda']) {
						
						?>
					<button type="submit" onclick="return confirm('Click OK jika benar menyetor sejumlah Rp ' + rubah(searchTxt.value))" class="btn btn-primary">Setor</button></td></tr>
						<?php
					}
					?>
				
				</table>
	        	<?php
	        	} ?>
	    </div>
		</div>
		
		</form>
		
        <h3>Histori Angsuran</h3>

	        	<table class="table table-bordered table-hover table-condensed" style="margin-bottom: 10px">
		            <thead class="thead-light">
		            <tr>
						<th class="text-center">Angsuranke</th>
						<th class="text-center">Jatuh Tempo</th>
						<th class="text-center">Tanggal Bayar</th>
						<th class="text-center">Jumlah Pokok</th>
						<th class="text-center">Jumlah Bunga</th>
						<th class="text-center">Total</th>
						<th class="text-center">Pokok Bayar</th>
						<th class="text-center">Bunga Bayar</th>
						<th class="text-center">Denda Bayar</th>
						<th class="text-center">Kurang Setor</th>
						<th class="text-center">Denda</th>
						<th class="text-center">Bayar Tunggakan</th>
						<th class="text-center">Kekurangan Tunggakan</th>
						<th class="text-center">Status</th>
		            </tr>
		            </thead>
					<tbody><?php
					if ($histori != null) {
					$i = 1;
					$denda=0;
					
					//var_dump($angsuranbayar['agb_pokok']);
					//$angsuranbayar->{'agb_pokok'} = $angsuranbayar->{'agb_pokok'} = $angsuranbayar->{'agb_pokok'} = 0;
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
							<td><?php echo $item->ags_tglbayar?></td>
							<td><?php echo rupiah($item->ags_jmlpokok) ?></td>
							<td><?php echo rupiah($item->ags_jmlbunga) ?></td>
							<td><?php echo rupiah($totalbayar) ?></td>
							<td><?php echo rupiah($pokok) ?></td>
							<td><?php echo rupiah($bunga) ?></td>
							<td><?php echo rupiah($denda) ?></td>
							<td><?php echo rupiah($kurangsetor) ?></td>
							<?php
							echo '<td>'.rupiah($denda).'</td>';
							?>
							<td><?php echo rupiah($item->ags_bayartunggakan)?></td>
							<td class='danger'><?php echo rupiah($totalkekurangan) ?></td>
							<td><?php 
							if ($totalkekurangan > 0 && $denda > 0 && $this->tgl > $item->ags_tgljatuhtempo){
								echo anchor(site_url('angsuran/denda/'.$item->ags_id),'Bayar','class="text-navy"');
							} else {
							echo $this->statusAngsuran[$item->ags_status];
							} ?></td>
							
						</tr>
		                
		                <?php
		            }
		        }
		            ?>
		            </tbody>
		        </table>
        </div>
    </div>
</div>
</div>

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
                                    <a href="<?php echo site_url('pinjaman/?p=2'); ?>" class="btn btn-default">Reset</a>
                                    <?php
                                }
                            ?>
                          <button class="btn btn-primary" type="submit">Tampilkan</button>
                        </span>
                    </div>
                    </div>
            </div>
            </form>
        </div>

	    <div class="row" style="margin-top: 10px">
	        	<?php 
	        	if ($angsuran != null) {
	        	?>
	        	<table class="table">
				    <tr><td>Rekening Pinjaman</td><td><?php echo $angsuran['pin_id']; ?></td></tr>
				    <tr><td>Angsuranke</td><td><?php echo $angsuran['ang_angsuranke']; ?></td></tr>
				    <tr><td>Jatuh Tempo</td><td><?php echo $angsuran['ags_tgljatuhtempo']; ?></td></tr>
				    <tr><td>Tanggal Bayar</td><td><?php echo $angsuran['ags_tglbayar']; ?></td></tr>
				    <tr><td>Jumlah Pokok</td><td><?php echo $angsuran['ags_jmlpokok']; ?></td></tr>
				    <tr><td>Jumlah Bunga</td><td><?php echo $angsuran['ags_jmlbunga']; ?></td></tr>
				    <tr><td>Status</td><td><?php echo $this->statusAngsuran[$angsuran['ags_status']]; ?></td></tr>
				    <tr><td></td><td><a href="<?php echo site_url('angsuran') ?>" class="btn btn-default">Batal</a></td></tr>
				</table>
	        	<?php
	        	} ?>
	    </div>
        </div>
        <h3>Histori Angsuran</h3>

	        	<table class="table table-bordered table-hover table-condensed" style="margin-bottom: 10px">
		            <thead class="thead-light">
		            <tr>
						<th class="text-center">Angsuranke</th>
						<th class="text-center">Jatuh Tempo</th>
						<th class="text-center">Tanggal Bayar</th>
						<th class="text-center">Jumlah Pokok</th>
						<th class="text-center">Jumlah Bunga</th>
						<th class="text-center">Status</th>
		            </tr>
		            </thead>
					<tbody><?php
					if ($histori != null) {
					$i = 1;
		            foreach ($histori as $item)
		            {
		                ?>
		                <tr>
							<td><?php echo $item->ang_angsuranke ?></td>
							<td><?php echo dateFormat($item->ags_tgljatuhtempo) ?></td>
							<td><?php echo dateFormat($item->ags_tglbayar) ?></td>
							<td><?php echo $item->ags_jmlpokok ?></td>
							<td><?php echo $item->ags_jmlbunga ?></td>
							<td><?php echo $this->statusAngsuran[$item->ags_status] ?></td>
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
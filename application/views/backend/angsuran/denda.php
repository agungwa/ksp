<div class="col-lg-12">
    <div class="ibox float-e-margins">
        <div class="ibox-title">
            <h2 style="margin-top:0px">Angsuran Denda</h2>
            <div class="ibox-tools">
            </div>
        </div>
        
		
        <div class="ibox-content">
        <table class="table">
        <form action="<?php echo site_url('angsuran/denda_action/'.$ags_id); ?>" method="post">       
	    <tr><td>Rekening Pinjaman</td><td><?php echo $pin_id; ?></td></tr>
	    <tr><td>Angsuranke</td><td><?php echo $ang_angsuranke; ?></td></tr>
	    <tr><td>Jatuh Tempo</td><td><?php echo $ags_tgljatuhtempo; ?></td></tr>
	    <tr><td>Tanggal Bayar</td><td><?php echo $ags_tglbayar; ?></td></tr>
	    <tr><td>Jumlah Pokok</td><td><?php echo rupiah($ags_jmlpokok); ?></td></tr>
	    <tr><td>Jumlah Bunga</td><td><?php echo rupiah($ags_jmlbunga); ?></td></tr>
	    <tr><td>Total Angsuran</td><td><?php echo rupiah($totalbayar); ?></td></tr>
	    <tr><td>Jumlah Bayar</td><td><?php echo rupiah($ags_jmlbayar); ?></td></tr>
	    <tr><td>Tanggal Bayar</td><td><input type="date" class="form-control" name="ags_tglbayar" id="todays-date" placeholder="ags_tglbayar" required="required" /></td></tr>
	    <tr><td>Kurang Angsuran</td><td><?php echo rupiah($kurangsetor); ?></td></tr>        
        <tr><td>Denda</td><td><input type="float" class="form-control" name="ags_denda" id="ags_denda" placeholder="ags_denda" value="<?php echo $denda ?> " required="required" /></td></tr>
	    <tr><td>Bayar Tunggakan</td><td><?php echo rupiah($ags_bayartunggakan); ?></td></tr>
	    <tr><td>Total Kekurangan</td><td><?php echo rupiah($totalkekurangan); ?></td></tr>
        <tr><td>Status</td><td><?php echo $this->statusAngsuran[$ags_status]; ?></td></tr>
		<input type="hidden" class="form-control" name="ags_id" id="ags_id" placeholder="ags_id" value="<?php echo $ags_id; ?>" required="required" />
        <?php if ($ags_jmlbayar < $totalkekurangan && $ags_bayartunggakan <= 0) {
					echo '<tr><td>Input Kekurangan</td><td><input type="number" class="form-control" name="ags_bayartunggakan" id="ags_bayartunggakan" placeholder="Bayar" value="" required="required" /></td></tr>';
					} else {
					echo '<tr><td>Input Kekurangan</td><td><input type="number" class="form-control" name="tambah" id="tambah" placeholder="tambah" value="" required="tambah" /></td></tr>';
                    }
                    ?>
	    <tr><td></td><td><a href="<?php echo site_url('angsuran') ?>" class="btn btn-default">Batal</a><button type="submit" class="btn btn-primary">Setor</button></td></tr></td></tr>
    </table>
                </form>
            </div>
        </div>
    </div>
    </div>
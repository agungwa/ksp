<div class="col-lg-12">
    <div class="ibox float-e-margins">
        <div class="ibox-title">
            <h2 style="margin-top:0px">Angsuran Denda</h2>
            <div class="ibox-tools">
            </div>
        </div>
        
		
        <div class="ibox-content">
        <table class="table">
		<form action="<?php echo site_url('angsuran/denda_action/'); ?>" method="get">        
	    <tr><td>Rekening Pinjaman</td><td><?php echo $pin_id; ?></td></tr>
	    <tr><td>Angsuranke</td><td><?php echo $ang_angsuranke; ?></td></tr>
	    <tr><td>Jatuh Tempo</td><td><?php echo $ags_tgljatuhtempo; ?></td></tr>
	    <tr><td>Tanggal Bayar</td><td><?php echo $ags_tglbayar; ?></td></tr>
	    <tr><td>Jumlah Pokok</td><td><?php echo $ags_jmlpokok; ?></td></tr>
	    <tr><td>Jumlah Bunga</td><td><?php echo $ags_jmlbunga; ?></td></tr>
	    <tr><td>Jumlah Bayar</td><td><?php echo $ags_jmlbayar; ?></td></tr>
	    <tr><td>Total Angsuran</td><td><?php echo $totalbayar; ?></td></tr>
	    <tr><td>Kurang Angsuran</td><td><?php echo $kurangsetor; ?></td></tr>
	    <tr><td>Denda</td><td><?php echo $denda; ?></td></tr>
	    <tr><td>Total + Denda</td><td><?php echo $totald; ?></td></tr>
        <tr><td>Status</td><td><?php echo $this->statusAngsuran[$ags_status]; ?></td></tr>
		<input type="hidden" class="form-control" name="ags_id" id="ags_id" placeholder="ags_id" value="<?php echo $ags_id; ?>" required="required" />
        <input type="hidden" class="form-control" name="b" id="b" placeholder="ags_jmlbayar" value="<?php echo $ags_jmlbayar ?> " required="required" />
        <?php if ($ags_jmlbayar < $totald) {
					echo '<tr><td>Input Kekurangan</td><td><input type="number" class="form-control" name="i" id="i" placeholder="Bayar" value="" required="required" /></td></tr>';
					}
                    ?>
        </form>
        
        <form action="<?php echo site_url('angsuran/denda_action/'); ?>" method="post">   
	    <tr><td></td><td><a href="<?php echo site_url('angsuran') ?>" class="btn btn-default">Batal</a><button type="submit" class="btn btn-primary">Setor</button></td></tr></td></tr>
    </table>
                </form>
            </div>
        </div>
    </div>
    </div>
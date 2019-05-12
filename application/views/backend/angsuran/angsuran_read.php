<!doctype html>
<html>
    <head>
        <title></title>
    </head>
    <body>
    <div class="col-lg-12">
    <div class="ibox float-e-margins">
        <div class="ibox-title">
            <h2 style="margin-top:0px">Angsuran Read</h2>
            <div class="ibox-tools">
            </div>
        </div>
        <div class="ibox-content">
        
        <table class="table">
	    <tr><td>Rekening Pinjaman</td><td><?php echo $pin_id; ?></td></tr>
	    <tr><td>Angsuranke</td><td><?php echo $ang_angsuranke; ?></td></tr>
	    <tr><td>Jatuh Tempo</td><td><?php echo $ags_tgljatuhtempo; ?></td></tr>
	    <tr><td>Tanggal Bayar</td><td><?php echo $ags_tglbayar; ?></td></tr>
	    <tr><td>Jumlah Pokok</td><td><?php echo $ags_jmlpokok; ?></td></tr>
	    <tr><td>Jumlah Bunga</td><td><?php echo $ags_jmlbunga; ?></td></tr>
	    <tr><td>Status</td><td><?php echo $this->statusAngsuran[$ags_status]; ?></td></tr>
	    <tr><td></td><td><a href="<?php echo site_url('angsuran') ?>" class="btn btn-default">Batal</a></td></tr>
	</table>
            </div>
        </div>
    </div>
    </div>
    </body>
</html>
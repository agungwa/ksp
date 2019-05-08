<!doctype html>
<html>
    <head>
        <title></title>
    </head>
    <body>
    <div class="col-lg-12">
    <div class="ibox float-e-margins">
        <div class="ibox-title">
            <h2 style="margin-top:0px">Simpananwajib Read</h2>
            <div class="ibox-tools">
            </div>
        </div>
        <div class="ibox-content">
        
        <table class="table">
	    <tr><td>Anggota</td><td><?php echo $ang_no; ?></td></tr>
	    <tr><td>Setting Simpanan</td><td><?php echo $ses_id; ?></td></tr>
	    <tr><td>Tanggal Bayar</td><td><?php echo $siw_tglbayar; ?></td></tr>
	    <tr><td>Status</td><td><?php echo $siw_status; ?></td></tr>
	    <tr><td>Tanggal Ambil</td><td><?php echo $siw_tglambil; ?></td></tr>
	    <tr><td></td><td><a href="<?php echo site_url('simpananwajib') ?>" class="btn btn-default">Cancel</a></td></tr>
	</table>
            </div>
        </div>
    </div>
    </div>
    </body>
</html>
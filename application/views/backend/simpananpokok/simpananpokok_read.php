<!doctype html>
<html>
    <head>
        <title></title>
    </head>
    <body>
    <div class="col-lg-12">
    <div class="ibox float-e-margins">
        <div class="ibox-title">
            <h2 style="margin-top:0px">Simpananpokok Read</h2>
            <div class="ibox-tools">
            </div>
        </div>
        <div class="ibox-content">
        
        <table class="table">
	    <tr><td>Anggota</td><td><?php echo $ang_no; ?></td></tr>
	    <tr><td>Setting Simpanan</td><td><?php echo $ses_id; ?></td></tr>
	    <tr><td>Tanggal Bayar</td><td><?php echo $sip_tglbayar; ?></td></tr>
	    <tr><td></td><td><a href="<?php echo site_url('simpananpokok') ?>" class="btn btn-default">Batal</a></td></tr>
	</table>
            </div>
        </div>
    </div>
    </div>
    </body>
</html>
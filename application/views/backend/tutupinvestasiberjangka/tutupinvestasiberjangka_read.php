<!doctype html>
<html>
    <head>
        <title></title>
    </head>
    <body>
    <div class="col-lg-12">
    <div class="ibox float-e-margins">
        <div class="ibox-title">
            <h2 style="margin-top:0px">Tutupinvestasiberjangka Read</h2>
            <div class="ibox-tools">
            </div>
        </div>
        <div class="ibox-content">
        
        <table class="table">
	    <tr><td>Rekening Investasi</td><td><?php echo $ivb_kode; ?></td></tr>
	    <tr><td>Tanggal Tutup</td><td><?php echo $tib_tgltutup; ?></td></tr>
	    <tr><td>Catatan</td><td><?php echo $tib_catatan; ?></td></tr>
	    <tr><td></td><td><a href="<?php echo site_url('tutupinvestasiberjangka') ?>" class="btn btn-default">Batal</a></td></tr>
	</table>
            </div>
        </div>
    </div>
    </div>
    </body>
</html>
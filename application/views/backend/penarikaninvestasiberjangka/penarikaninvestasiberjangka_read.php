<!doctype html>
<html>
    <head>
        <title></title>
    </head>
    <body>
    <div class="col-lg-12">
    <div class="ibox float-e-margins">
        <div class="ibox-title">
            <h2 style="margin-top:0px">Penarikan Investasi Berjangka Read</h2>
            <div class="ibox-tools">
            </div>
        </div>
        <div class="ibox-content">
        
        <table class="table">
	    <tr><td>Rekening Investasi</td><td><?php echo $ivb_kode; ?></td></tr>
	    <tr><td>Penarikanke</td><td><?php echo $pib_penarikanke; ?></td></tr>
	    <tr><td>Jumlah Keuntungan</td><td><?php echo $pib_jmlkeuntungan; ?></td></tr>
	    <tr><td>Jumlah Diterima</td><td><?php echo $pib_jmlditerima; ?></td></tr>
	    <tr><td></td><td><a href="<?php echo site_url('penarikaninvestasiberjangka') ?>" class="btn btn-default">Batal</a></td></tr>
	</table>
            </div>
        </div>
    </div>
    </div>
    </body>
</html>
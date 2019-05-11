<!doctype html>
<html>
    <head>
        <title></title>
    </head>
    <body>
    <div class="col-lg-12">
    <div class="ibox float-e-margins">
        <div class="ibox-title">
            <h2 style="margin-top:0px">Keuntunganinvestasi Read</h2>
            <div class="ibox-tools">
            </div>
        </div>
        <div class="ibox-content">
        
        <table class="table">
	    <tr><td>Penarikan Investasi</td><td><?php echo $pib_id; ?></td></tr>
	    <tr><td>Jumlah Keuntungan</td><td><?php echo $kiv_jmlkeuntungan; ?></td></tr>
	    <tr><td>Tanggal</td><td><?php echo $kiv_tglkeuntungan; ?></td></tr>
	    <tr><td></td><td><a href="<?php echo site_url('keuntunganinvestasi') ?>" class="btn btn-default">Cancel</a></td></tr>
	</table>
            </div>
        </div>
    </div>
    </div>
    </body>
</html>
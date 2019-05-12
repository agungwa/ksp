<!doctype html>
<html>
    <head>
        <title></title>
    </head>
    <body>
    <div class="col-lg-12">
    <div class="ibox float-e-margins">
        <div class="ibox-title">
            <h2 style="margin-top:0px">Penarikan Simpanan Wajib</h2>
            <div class="ibox-tools">
            </div>
        </div>
        <div class="ibox-content">
        
        <table class="table">
	    <tr><td>Simpanan Wajib</td><td><?php echo $siw_id; ?></td></tr>
	    <tr><td>Tanggal Penarikan</td><td><?php echo $psw_tglpenarikan; ?></td></tr>
	    <tr><td>Jumlah</td><td><?php echo $psw_jumlah; ?></td></tr>
	    <tr><td></td><td><a href="<?php echo site_url('penarikansimpananwajib') ?>" class="btn btn-default">Batal</a></td></tr>
	</table>
            </div>
        </div>
    </div>
    </div>
    </body>
</html>
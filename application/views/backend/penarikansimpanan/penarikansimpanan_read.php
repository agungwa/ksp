<!doctype html>
<html>
    <head>
        <title></title>
    </head>
    <body>
    <div class="col-lg-12">
    <div class="ibox float-e-margins">
        <div class="ibox-title">
            <h2 style="margin-top:0px">Penarikan Simpanan Read</h2>
            <div class="ibox-tools">
            </div>
        </div>
        <div class="ibox-content">
        
        <table class="table">
	    <tr><td>Rekening Simpanan</td><td><?php echo $sim_kode; ?></td></tr>
	    <tr><td>Tanggal Penarikan</td><td><?php echo $pes_tglpenarikan; ?></td></tr>
	    <tr><td>Jumlah</td><td><?php echo $pes_jumlah; ?></td></tr>
	    <tr><td></td><td><a href="<?php echo site_url('penarikansimpanan') ?>" class="btn btn-default">Batal</a></td></tr>
	</table>
            </div>
        </div>
    </div>
    </div>
    </body>
</html>
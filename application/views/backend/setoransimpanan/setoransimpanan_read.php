<!doctype html>
<html>
    <head>
        <title></title>
    </head>
    <body>
    <div class="col-lg-12">
    <div class="ibox float-e-margins">
        <div class="ibox-title">
            <h2 style="margin-top:0px">Setoran Simpanan Read</h2>
            <div class="ibox-tools">
            </div>
        </div>
        <div class="ibox-content">
        
        <table class="table">
	    <tr><td>Rekening Simpanan</td><td><?php echo $sim_kode; ?></td></tr>
	    <tr><td>Tanggal Setor</td><td><?php echo $ssi_tglsetor; ?></td></tr>
	    <tr><td>Jumlah Setor</td><td><?php echo $ssi_jmlsetor; ?></td></tr>
	    <tr><td>Jumlah Bunga</td><td><?php echo $ssi_jmlbunga; ?></td></tr>
	    <tr><td></td><td><a href="<?php echo site_url('setoransimpanan') ?>" class="btn btn-default">Cancel</a></td></tr>
	</table>
            </div>
        </div>
    </div>
    </div>
    </body>
</html>
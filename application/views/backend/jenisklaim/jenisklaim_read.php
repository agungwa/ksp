<!doctype html>
<html>
    <head>
        <title></title>
    </head>
    <body>
    <div class="col-lg-12">
    <div class="ibox float-e-margins">
        <div class="ibox-title">
            <h2 style="margin-top:0px">Jenis Klaim Read</h2>
            <div class="ibox-tools">
            </div>
        </div>
        <div class="ibox-content">
        
        <table class="table">
	    <tr><td>Keuntungan</td><td><?php echo $jkl_keuntungan; ?></td></tr>
	    <tr><td>Plan Simkesan</td><td><?php echo $jkl_plan; ?></td></tr>
	    <tr><td>Tahunke</td><td><?php echo $jkl_tahunke; ?></td></tr>
	    <tr><td>Nominal</td><td><?php echo $jkl_nominal; ?></td></tr>
	    <tr><td>Keterangan</td><td><?php echo $jkl_keterangan; ?></td></tr>
	    <tr><td>Administrasi</td><td><?php echo $jkl_administrasi; ?></td></tr>
	    <tr><td></td><td><a href="<?php echo site_url('jenisklaim') ?>" class="btn btn-default">Batal</a></td></tr>
	</table>
            </div>
        </div>
    </div>
    </div>
    </body>
</html>
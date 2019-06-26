<!doctype html>
<html>
    <head>
        <title></title>
    </head>
    <body>
    <div class="col-lg-12">
    <div class="ibox float-e-margins">
        <div class="ibox-title">
            <h2 style="margin-top:0px">Histori bunga simpanan Read</h2>
            <div class="ibox-tools">
            </div>
        </div>
        <div class="ibox-content">
        
        <table class="table">
	    <tr><td>Kode Anggota</td><td><?php echo $ang_no; ?></td></tr>
	    <tr><td>Tanggal Terakhir</td><td><?php echo $hbs_tglterakhir; ?></td></tr>
	    <tr><td></td><td><a href="<?php echo site_url('historibungasimpanan') ?>" class="btn btn-default">Cancel</a></td></tr>
	</table>
            </div>
        </div>
    </div>
    </div>
    </body>
</html>
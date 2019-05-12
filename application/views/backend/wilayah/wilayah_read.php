<!doctype html>
<html>
    <head>
        <title></title>
    </head>
    <body>
    <div class="col-lg-12">
    <div class="ibox float-e-margins">
        <div class="ibox-title">
            <h2 style="margin-top:0px">Wilayah Read</h2>
            <div class="ibox-tools">
            </div>
        </div>
        <div class="ibox-content">
        
        <table class="table">
        <tr><td>Kode Wilayah</td><td><?php echo $wil_kode; ?></td></tr>
	    <tr><td>Nama Wilayah</td><td><?php echo $wil_nama; ?></td></tr>
	    <tr><td>Tanggal</td><td><?php echo $wil_tgl; ?></td></tr>
	    <tr><td></td><td><a href="<?php echo site_url('wilayah') ?>" class="btn btn-default">Batal</a></td></tr>
	</table>
            </div>
        </div>
    </div>
    </div>
    </body>
</html>
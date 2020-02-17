<!doctype html>
<html>
    <head>
        <title></title>
    </head>
    <body>
    <div class="col-lg-12">
    <div class="ibox float-e-margins">
        <div class="ibox-title">
            <h2 style="margin-top:0px">Kasbon Read</h2>
            <div class="ibox-tools">
            </div>
        </div>
        <div class="ibox-content">
        
        <table class="table">
	    <tr><td>Jumlah</td><td><?php echo $ksb_jumlah; ?></td></tr>
	    <tr><td>Wilayah</td><td><?php echo $wil_kode; ?></td></tr>
	    <tr><td>Karyawan</td><td><?php echo $kar_kode; ?></td></tr>
	    <tr><td>Keterangan</td><td><?php echo $ksb_keterangan; ?></td></tr>
	    <tr><td>Tanggal</td><td><?php echo $ksb_tanggal; ?></td></tr>
	    <tr><td></td><td><a href="<?php echo site_url('kasbon') ?>" class="btn btn-default">Cancel</a></td></tr>
	</table>
            </div>
        </div>
    </div>
    </div>
    </body>
</html>
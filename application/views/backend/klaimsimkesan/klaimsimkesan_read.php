<!doctype html>
<html>
    <head>
        <title></title>
    </head>
    <body>
    <div class="col-lg-12">
    <div class="ibox float-e-margins">
        <div class="ibox-title">
            <h2 style="margin-top:0px">Klaimsimkesan Read</h2>
            <div class="ibox-tools">
            </div>
        </div>
        <div class="ibox-content">
        
        <table class="table">
	    <tr><td>Rekening Simkesan</td><td><?php echo $sik_kode; ?></td></tr>
	    <tr><td>Jenis Klaim</td><td><?php echo $jkl_id; ?></td></tr>
	    <tr><td>Tanggal Klaim</td><td><?php echo $ksi_tglklaim; ?></td></tr>
	    <tr><td>Jumlah Klaim</td><td><?php echo $ksi_jmlklaim; ?></td></tr>
	    <tr><td>Jumlah Tunggakan</td><td><?php echo $ksi_jmltunggakan; ?></td></tr>
	    <tr><td>Jumlah Terima</td><td><?php echo $ksi_jmlditerima; ?></td></tr>
	    <tr><td>Status</td><td><?php echo $ksi_status; ?></td></tr>
	    <tr><td></td><td><a href="<?php echo site_url('klaimsimkesan') ?>" class="btn btn-default">Cancel</a></td></tr>
	</table>
            </div>
        </div>
    </div>
    </div>
    </body>
</html>
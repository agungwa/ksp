<!doctype html>
<html>
    <head>
        <title></title>
    </head>
    <body>
    <div class="col-lg-12">
    <div class="ibox float-e-margins">
        <div class="ibox-title">
            <h2 style="margin-top:0px">Penarikan Simkesan Read</h2>
            <div class="ibox-tools">
            </div>
        </div>
        <div class="ibox-content">
        
        <table class="table">
	    <tr><td>Penarikan ID</td><td><?php echo $pns_id; ?></td></tr>
	    <tr><td>Rekening Simkesan</td><td><?php echo $sik_kode; ?></td></tr>
	    <tr><td>Jenis Penarikan</td><td><?php echo $jps_id; ?></td></tr>
	    <tr><td>Tanggal Penarikan</td><td><?php echo $pns_tglpenarikan; ?></td></tr>
	    <tr><td>Jumlah Simkesan</td><td><?php echo $pns_jmlsimkesan; ?></td></tr>
	    <tr><td>Jumlah Penarikan</td><td><?php echo $pns_jmlpenarikan; ?></td></tr>
	    <tr><td>Catatan</td><td><?php echo $pns_catatan; ?></td></tr>
	    <tr><td></td><td><a href="<?php echo site_url('penarikansimkesan') ?>" class="btn btn-default">Cancel</a></td></tr>
	</table>
            </div>
        </div>
    </div>
    </div>
    </body>
</html>
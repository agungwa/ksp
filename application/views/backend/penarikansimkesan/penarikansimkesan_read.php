<!doctype html>
<html>
    <head>
        <title></title>
    </head>
    <body>
    <div class="col-lg-12">
    <div class="ibox float-e-margins">
        <div class="ibox-title">
            <h2 style="margin-top:0px">Penarikansimkesan Read</h2>
            <div class="ibox-tools">
            </div>
        </div>
        <div class="ibox-content">
        
        <table class="table">
	    <tr><td>Pns Id</td><td><?php echo $pns_id; ?></td></tr>
	    <tr><td>Sik Kode</td><td><?php echo $sik_kode; ?></td></tr>
	    <tr><td>Jps Id</td><td><?php echo $jps_id; ?></td></tr>
	    <tr><td>Pns Tglpenarikan</td><td><?php echo $pns_tglpenarikan; ?></td></tr>
	    <tr><td>Pns Jmlsimkesan</td><td><?php echo $pns_jmlsimkesan; ?></td></tr>
	    <tr><td>Pns Jmlpenarikan</td><td><?php echo $pns_jmlpenarikan; ?></td></tr>
	    <tr><td>Pns Catatan</td><td><?php echo $pns_catatan; ?></td></tr>
	    <tr><td>Pns Tgl</td><td><?php echo $pns_tgl; ?></td></tr>
	    <tr><td>Pns Flag</td><td><?php echo $pns_flag; ?></td></tr>
	    <tr><td>Pns Info</td><td><?php echo $pns_info; ?></td></tr>
	    <tr><td></td><td><a href="<?php echo site_url('penarikansimkesan') ?>" class="btn btn-default">Cancel</a></td></tr>
	</table>
            </div>
        </div>
    </div>
    </div>
    </body>
</html>
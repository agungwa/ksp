<!doctype html>
<html>
    <head>
        <title></title>
    </head>
    <body>
    <div class="col-lg-12">
    <div class="ibox float-e-margins">
        <div class="ibox-title">
            <h2 style="margin-top:0px">Simkesan Read</h2>
            <div class="ibox-tools">
            </div>
        </div>
        <div class="ibox-content">
        
        <table class="table">
	    <tr><td>Ang No</td><td><?php echo $ang_no; ?></td></tr>
	    <tr><td>Kar Kode</td><td><?php echo $kar_kode; ?></td></tr>
	    <tr><td>Psk Id</td><td><?php echo $psk_id; ?></td></tr>
	    <tr><td>Wil Kode</td><td><?php echo $wil_kode; ?></td></tr>
	    <tr><td>Sik Tglpendaftaran</td><td><?php echo $sik_tglpendaftaran; ?></td></tr>
	    <tr><td>Sik Tglberakhir</td><td><?php echo $sik_tglberakhir; ?></td></tr>
	    <tr><td>Sik Status</td><td><?php echo $sik_status; ?></td></tr>
	    <tr><td></td><td><a href="<?php echo site_url('simkesan') ?>" class="btn btn-default">Cancel</a></td></tr>
	</table>
            </div>
        </div>
    </div>
    </div>
    </body>
</html>
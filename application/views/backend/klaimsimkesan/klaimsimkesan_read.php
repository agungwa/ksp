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
	    <tr><td>Sik Kode</td><td><?php echo $sik_kode; ?></td></tr>
	    <tr><td>Jkl Id</td><td><?php echo $jkl_id; ?></td></tr>
	    <tr><td>Ksi Tglklaim</td><td><?php echo $ksi_tglklaim; ?></td></tr>
	    <tr><td>Ksi Jmlklaim</td><td><?php echo $ksi_jmlklaim; ?></td></tr>
	    <tr><td>Ksi Jmltunggakan</td><td><?php echo $ksi_jmltunggakan; ?></td></tr>
	    <tr><td>Ksi Jmlditerima</td><td><?php echo $ksi_jmlditerima; ?></td></tr>
	    <tr><td>Ksi Status</td><td><?php echo $ksi_status; ?></td></tr>
	    <tr><td>Ksi Tgl</td><td><?php echo $ksi_tgl; ?></td></tr>
	    <tr><td>Ksi Flag</td><td><?php echo $ksi_flag; ?></td></tr>
	    <tr><td>Ksi Info</td><td><?php echo $ksi_info; ?></td></tr>
	    <tr><td></td><td><a href="<?php echo site_url('klaimsimkesan') ?>" class="btn btn-default">Cancel</a></td></tr>
	</table>
            </div>
        </div>
    </div>
    </div>
    </body>
</html>
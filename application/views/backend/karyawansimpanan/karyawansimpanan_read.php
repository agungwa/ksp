<!doctype html>
<html>
    <head>
        <title></title>
    </head>
    <body>
    <div class="col-lg-12">
    <div class="ibox float-e-margins">
        <div class="ibox-title">
            <h2 style="margin-top:0px">Karyawansimpanan Read</h2>
            <div class="ibox-tools">
            </div>
        </div>
        <div class="ibox-content">
        
        <table class="table">
	    <tr><td>Kar Kode</td><td><?php echo $kar_kode; ?></td></tr>
	    <tr><td>Ksi Simpanan</td><td><?php echo $ksi_simpanan; ?></td></tr>
	    <tr><td>Ksi Status</td><td><?php echo $ksi_status; ?></td></tr>
	    <tr><td>Ksi Tgl</td><td><?php echo $ksi_tgl; ?></td></tr>
	    <tr><td>Ksi Flag</td><td><?php echo $ksi_flag; ?></td></tr>
	    <tr><td>Ksi Info</td><td><?php echo $ksi_info; ?></td></tr>
	    <tr><td></td><td><a href="<?php echo site_url('karyawansimpanan') ?>" class="btn btn-default">Cancel</a></td></tr>
	</table>
            </div>
        </div>
    </div>
    </div>
    </body>
</html>
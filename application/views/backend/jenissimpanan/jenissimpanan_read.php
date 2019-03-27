<!doctype html>
<html>
    <head>
        <title></title>
    </head>
    <body>
    <div class="col-lg-12">
    <div class="ibox float-e-margins">
        <div class="ibox-title">
            <h2 style="margin-top:0px">Jenissimpanan Read</h2>
            <div class="ibox-tools">
            </div>
        </div>
        <div class="ibox-content">
        
        <table class="table">
	    <tr><td>Jsi Simpanan</td><td><?php echo $jsi_simpanan; ?></td></tr>
	    <tr><td>Jsi Keterangan</td><td><?php echo $jsi_keterangan; ?></td></tr>
	    <tr><td>Jsi Tgl</td><td><?php echo $jsi_tgl; ?></td></tr>
	    <tr><td>Jsi Flag</td><td><?php echo $jsi_flag; ?></td></tr>
	    <tr><td>Jsi Info</td><td><?php echo $jsi_info; ?></td></tr>
	    <tr><td></td><td><a href="<?php echo site_url('jenissimpanan') ?>" class="btn btn-default">Cancel</a></td></tr>
	</table>
            </div>
        </div>
    </div>
    </div>
    </body>
</html>
<!doctype html>
<html>
    <head>
        <title></title>
    </head>
    <body>
    <div class="col-lg-12">
    <div class="ibox float-e-margins">
        <div class="ibox-title">
            <h2 style="margin-top:0px">Jenispelunasan Read</h2>
            <div class="ibox-tools">
            </div>
        </div>
        <div class="ibox-content">
        
        <table class="table">
	    <tr><td>Jep Jenis</td><td><?php echo $jep_jenis; ?></td></tr>
	    <tr><td>Jep Keterangan</td><td><?php echo $jep_keterangan; ?></td></tr>
	    <tr><td>Jep Tgl</td><td><?php echo $jep_tgl; ?></td></tr>
	    <tr><td>Jep Flag</td><td><?php echo $jep_flag; ?></td></tr>
	    <tr><td>Jep Info</td><td><?php echo $jep_info; ?></td></tr>
	    <tr><td></td><td><a href="<?php echo site_url('jenispelunasan') ?>" class="btn btn-default">Cancel</a></td></tr>
	</table>
            </div>
        </div>
    </div>
    </div>
    </body>
</html>
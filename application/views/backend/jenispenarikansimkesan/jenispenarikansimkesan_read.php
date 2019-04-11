<!doctype html>
<html>
    <head>
        <title></title>
    </head>
    <body>
    <div class="col-lg-12">
    <div class="ibox float-e-margins">
        <div class="ibox-title">
            <h2 style="margin-top:0px">Jenispenarikansimkesan Read</h2>
            <div class="ibox-tools">
            </div>
        </div>
        <div class="ibox-content">
        
        <table class="table">
	    <tr><td>Jps Jenis</td><td><?php echo $jps_jenis; ?></td></tr>
	    <tr><td>Jps Administrasi</td><td><?php echo $jps_administrasi; ?></td></tr>
	    <tr><td>Jps Persenpenarikan</td><td><?php echo $jps_persenpenarikan; ?></td></tr>
	    <tr><td></td><td><a href="<?php echo site_url('jenispenarikansimkesan') ?>" class="btn btn-default">Cancel</a></td></tr>
	</table>
            </div>
        </div>
    </div>
    </div>
    </body>
</html>
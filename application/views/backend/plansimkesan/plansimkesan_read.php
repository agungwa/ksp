<!doctype html>
<html>
    <head>
        <title></title>
    </head>
    <body>
    <div class="col-lg-12">
    <div class="ibox float-e-margins">
        <div class="ibox-title">
            <h2 style="margin-top:0px">Plansimkesan Read</h2>
            <div class="ibox-tools">
            </div>
        </div>
        <div class="ibox-content">
        
        <table class="table">
	    <tr><td>Psk Plan</td><td><?php echo $psk_plan; ?></td></tr>
	    <tr><td>Psk Setoran</td><td><?php echo $psk_setoran; ?></td></tr>
	    <tr><td>Psk Keterangan</td><td><?php echo $psk_keterangan; ?></td></tr>
	    <tr><td></td><td><a href="<?php echo site_url('plansimkesan') ?>" class="btn btn-default">Cancel</a></td></tr>
	</table>
            </div>
        </div>
    </div>
    </div>
    </body>
</html>
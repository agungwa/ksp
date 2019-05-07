<!doctype html>
<html>
    <head>
        <title></title>
    </head>
    <body>
    <div class="col-lg-12">
    <div class="ibox float-e-margins">
        <div class="ibox-title">
            <h2 style="margin-top:0px">Setting Simpanan Read</h2>
            <div class="ibox-tools">
            </div>
        </div>
        <div class="ibox-content">
        
        <table class="table">
	    <tr><td>Nama</td><td><?php echo $ses_nama; ?></td></tr>
	    <tr><td>Minimal</td><td><?php echo $ses_min; ?></td></tr>
	    <tr><td>Maximal</td><td><?php echo $ses_max; ?></td></tr>
	    <tr><td></td><td><a href="<?php echo site_url('settingsimpanan') ?>" class="btn btn-default">Cancel</a></td></tr>
	</table>
            </div>
        </div>
    </div>
    </div>
    </body>
</html>
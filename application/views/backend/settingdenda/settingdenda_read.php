<!doctype html>
<html>
    <head>
        <title></title>
    </head>
    <body>
    <div class="col-lg-12">
    <div class="ibox float-e-margins">
        <div class="ibox-title">
            <h2 style="margin-top:0px">Settingdenda Read</h2>
            <div class="ibox-tools">
            </div>
        </div>
        <div class="ibox-content">
        
        <table class="table">
	    <tr><td>Sed Hari</td><td><?php echo $sed_hari; ?></td></tr>
	    <tr><td>Sed Denda</td><td><?php echo $sed_denda; ?></td></tr>
	    <tr><td>Sed Tgl</td><td><?php echo $sed_tgl; ?></td></tr>
	    <tr><td>Sed Flag</td><td><?php echo $sed_flag; ?></td></tr>
	    <tr><td>Sed Info</td><td><?php echo $sed_info; ?></td></tr>
	    <tr><td></td><td><a href="<?php echo site_url('settingdenda') ?>" class="btn btn-default">Cancel</a></td></tr>
	</table>
            </div>
        </div>
    </div>
    </div>
    </body>
</html>
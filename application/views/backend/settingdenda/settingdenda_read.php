<!doctype html>
<html>
    <head>
        <title></title>
    </head>
    <body>
    <div class="col-lg-12">
    <div class="ibox float-e-margins">
        <div class="ibox-title">
            <h2 style="margin-top:0px">Setting Denda Read</h2>
            <div class="ibox-tools">
            </div>
        </div>
        <div class="ibox-content">
        
        <table class="table">
    	    <tr><td>Hari</td><td><?php echo $sed_hari; ?></td></tr>
    	    <tr><td>Denda (dalam persen)</td><td><?php echo $sed_denda; ?></td></tr>
    	    <tr><td></td><td><a href="<?php echo site_url('settingdenda') ?>" class="btn btn-default">Batal</a></td></tr>
	</table>
            </div>
        </div>
    </div>
    </div>
    </body>
</html>
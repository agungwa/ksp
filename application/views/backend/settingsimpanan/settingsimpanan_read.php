<!doctype html>
<html>
    <head>
        <title></title>
    </head>
    <body>
    <div class="col-lg-12">
    <div class="ibox float-e-margins">
        <div class="ibox-title">
            <h2 style="margin-top:0px">Settingsimpanan Read</h2>
            <div class="ibox-tools">
            </div>
        </div>
        <div class="ibox-content">
        
        <table class="table">
	    <tr><td>Ses Nama</td><td><?php echo $ses_nama; ?></td></tr>
	    <tr><td>Ses Min</td><td><?php echo $ses_min; ?></td></tr>
	    <tr><td>Ses Max</td><td><?php echo $ses_max; ?></td></tr>
	    <tr><td>Ses Tgl</td><td><?php echo $ses_tgl; ?></td></tr>
	    <tr><td>Ses Flag</td><td><?php echo $ses_flag; ?></td></tr>
	    <tr><td>Ses Info</td><td><?php echo $ses_info; ?></td></tr>
	    <tr><td></td><td><a href="<?php echo site_url('settingsimpanan') ?>" class="btn btn-default">Cancel</a></td></tr>
	</table>
            </div>
        </div>
    </div>
    </div>
    </body>
</html>
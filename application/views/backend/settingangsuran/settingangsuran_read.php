<!doctype html>
<html>
    <head>
        <title></title>
    </head>
    <body>
    <div class="col-lg-12">
    <div class="ibox float-e-margins">
        <div class="ibox-title">
            <h2 style="margin-top:0px">Settingangsuran Read</h2>
            <div class="ibox-tools">
            </div>
        </div>
        <div class="ibox-content">
        
        <table class="table">
	    <tr><td>Sea Tenor</td><td><?php echo $sea_tenor; ?></td></tr>
	    <tr><td>Sea Tgl</td><td><?php echo $sea_tgl; ?></td></tr>
	    <tr><td>Sea Flag</td><td><?php echo $sea_flag; ?></td></tr>
	    <tr><td>Sea Info</td><td><?php echo $sea_info; ?></td></tr>
	    <tr><td></td><td><a href="<?php echo site_url('settingangsuran') ?>" class="btn btn-default">Cancel</a></td></tr>
	</table>
            </div>
        </div>
    </div>
    </div>
    </body>
</html>
<!doctype html>
<html>
    <head>
        <title></title>
    </head>
    <body>
    <div class="col-lg-12">
    <div class="ibox float-e-margins">
        <div class="ibox-title">
            <h2 style="margin-top:0px">Settingstatuspeminjam Read</h2>
            <div class="ibox-tools">
            </div>
        </div>
        <div class="ibox-content">
        
        <table class="table">
	    <tr><td>Ssp Namastatus</td><td><?php echo $ssp_namastatus; ?></td></tr>
	    <tr><td>Ssp Tgl</td><td><?php echo $ssp_tgl; ?></td></tr>
	    <tr><td>Ssp Flag</td><td><?php echo $ssp_flag; ?></td></tr>
	    <tr><td>Ssp Info</td><td><?php echo $ssp_info; ?></td></tr>
	    <tr><td></td><td><a href="<?php echo site_url('settingstatuspeminjam') ?>" class="btn btn-default">Cancel</a></td></tr>
	</table>
            </div>
        </div>
    </div>
    </div>
    </body>
</html>
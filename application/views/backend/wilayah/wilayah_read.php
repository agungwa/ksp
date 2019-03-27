<!doctype html>
<html>
    <head>
        <title></title>
    </head>
    <body>
    <div class="col-lg-12">
    <div class="ibox float-e-margins">
        <div class="ibox-title">
            <h2 style="margin-top:0px">Wilayah Read</h2>
            <div class="ibox-tools">
            </div>
        </div>
        <div class="ibox-content">
        
        <table class="table">
	    <tr><td>Wil Nama</td><td><?php echo $wil_nama; ?></td></tr>
	    <tr><td>Wil Tgl</td><td><?php echo $wil_tgl; ?></td></tr>
	    <tr><td>Wil Flag</td><td><?php echo $wil_flag; ?></td></tr>
	    <tr><td>Wil Info</td><td><?php echo $wil_info; ?></td></tr>
	    <tr><td></td><td><a href="<?php echo site_url('wilayah') ?>" class="btn btn-default">Cancel</a></td></tr>
	</table>
            </div>
        </div>
    </div>
    </div>
    </body>
</html>
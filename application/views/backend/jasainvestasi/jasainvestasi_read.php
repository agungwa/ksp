<!doctype html>
<html>
    <head>
        <title></title>
    </head>
    <body>
    <div class="col-lg-12">
    <div class="ibox float-e-margins">
        <div class="ibox-title">
            <h2 style="margin-top:0px">Jasainvestasi Read</h2>
            <div class="ibox-tools">
            </div>
        </div>
        <div class="ibox-content">
        
        <table class="table">
	    <tr><td>Jiv Jasa</td><td><?php echo $jiv_jasa; ?></td></tr>
	    <tr><td>Jiv Keterangan</td><td><?php echo $jiv_keterangan; ?></td></tr>
	    <tr><td>Jiv Tgl</td><td><?php echo $jiv_tgl; ?></td></tr>
	    <tr><td>Jiv Flag</td><td><?php echo $jiv_flag; ?></td></tr>
	    <tr><td>Jiv Info</td><td><?php echo $jiv_info; ?></td></tr>
	    <tr><td></td><td><a href="<?php echo site_url('jasainvestasi') ?>" class="btn btn-default">Cancel</a></td></tr>
	</table>
            </div>
        </div>
    </div>
    </div>
    </body>
</html>
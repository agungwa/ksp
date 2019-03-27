<!doctype html>
<html>
    <head>
        <title></title>
    </head>
    <body>
    <div class="col-lg-12">
    <div class="ibox float-e-margins">
        <div class="ibox-title">
            <h2 style="margin-top:0px">Bungapinjaman Read</h2>
            <div class="ibox-tools">
            </div>
        </div>
        <div class="ibox-content">
        
        <table class="table">
	    <tr><td>Bup Bunga</td><td><?php echo $bup_bunga; ?></td></tr>
	    <tr><td>Bub Tgl</td><td><?php echo $bub_tgl; ?></td></tr>
	    <tr><td>Bub Flag</td><td><?php echo $bub_flag; ?></td></tr>
	    <tr><td>Bup Info</td><td><?php echo $bup_info; ?></td></tr>
	    <tr><td></td><td><a href="<?php echo site_url('bungapinjaman') ?>" class="btn btn-default">Cancel</a></td></tr>
	</table>
            </div>
        </div>
    </div>
    </div>
    </body>
</html>
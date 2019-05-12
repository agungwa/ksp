<!doctype html>
<html>
    <head>
        <title></title>
    </head>
    <body>
    <div class="col-lg-12">
    <div class="ibox float-e-margins">
        <div class="ibox-title">
            <h2 style="margin-top:0px">Pelunasan Read</h2>
            <div class="ibox-tools">
            </div>
        </div>
        <div class="ibox-content">
        
        <table class="table">
	    <tr><td>Jenis Pelunasan</td><td><?php echo $jep_id; ?></td></tr>
	    <tr><td>Rekening Pinjaman</td><td><?php echo $pin_id; ?></td></tr>
	    <tr><td></td><td><a href="<?php echo site_url('pelunasan') ?>" class="btn btn-default">Cancel</a></td></tr>
	</table>
            </div>
        </div>
    </div>
    </div>
    </body>
</html>
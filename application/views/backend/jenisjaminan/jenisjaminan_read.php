<!doctype html>
<html>
    <head>
        <title></title>
    </head>
    <body>
    <div class="col-lg-12">
    <div class="ibox float-e-margins">
        <div class="ibox-title">
            <h2 style="margin-top:0px">Jenis Jaminan Read</h2>
            <div class="ibox-tools">
            </div>
        </div>
        <div class="ibox-content">
        
        <table class="table">
	    <tr><td>Jaminan</td><td><?php echo $jej_jaminan; ?></td></tr>
	    <tr><td>Keterangan</td><td><?php echo $jej_keterangan; ?></td></tr>
	    <tr><td></td><td><a href="<?php echo site_url('jenisjaminan') ?>" class="btn btn-default">Cancel</a></td></tr>
	</table>
            </div>
        </div>
    </div>
    </div>
    </body>
</html>
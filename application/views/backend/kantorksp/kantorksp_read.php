<!doctype html>
<html>
    <head>
        <title></title>
    </head>
    <body>
    <div class="col-lg-12">
    <div class="ibox float-e-margins">
        <div class="ibox-title">
            <h2 style="margin-top:0px">Kantorksp Read</h2>
            <div class="ibox-tools">
            </div>
        </div>
        <div class="ibox-content">
        
        <table class="table">
	    <tr><td>Kks Nama</td><td><?php echo $kks_nama; ?></td></tr>
	    <tr><td>Kks Alamat</td><td><?php echo $kks_alamat; ?></td></tr>
	    <tr><td>Kks Kode</td><td><?php echo $kks_kode; ?></td></tr>
	    <tr><td></td><td><a href="<?php echo site_url('kantorksp') ?>" class="btn btn-default">Cancel</a></td></tr>
	</table>
            </div>
        </div>
    </div>
    </div>
    </body>
</html>
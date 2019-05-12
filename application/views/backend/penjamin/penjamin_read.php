<!doctype html>
<html>
    <head>
        <title></title>
    </head>
    <body>
    <div class="col-lg-12">
    <div class="ibox float-e-margins">
        <div class="ibox-title">
            <h2 style="margin-top:0px">Penjamin Read</h2>
            <div class="ibox-tools">
            </div>
        </div>
        <div class="ibox-content">
        
        <table class="table">
	    <tr><td>No KTP</td><td><?php echo $pen_noktp; ?></td></tr>
	    <tr><td>Nama</td><td><?php echo $pen_nama; ?></td></tr>
	    <tr><td>Alamat</td><td><?php echo $pen_alamat; ?></td></tr>
	    <tr><td>No Handphone</td><td><?php echo $pen_nohp; ?></td></tr>
	    <tr><td></td><td><a href="<?php echo site_url('penjamin') ?>" class="btn btn-default">Batal</a></td></tr>
	</table>
            </div>
        </div>
    </div>
    </div>
    </body>
</html>
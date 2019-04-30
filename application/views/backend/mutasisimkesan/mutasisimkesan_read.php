<!doctype html>
<html>
    <head>
        <title></title>
    </head>
    <body>
    <div class="col-lg-12">
    <div class="ibox float-e-margins">
        <div class="ibox-title">
            <h2 style="margin-top:0px">Mutasisimkesan Read</h2>
            <div class="ibox-tools">
            </div>
        </div>
        <div class="ibox-content">
        
        <table class="table">
	    <tr><td>Sik Kode</td><td><?php echo $sik_kode; ?></td></tr>
	    <tr><td>Msk Tglmutasi</td><td><?php echo $msk_tglmutasi; ?></td></tr>
	    <tr><td>Msk Asal</td><td><?php echo $msk_asal; ?></td></tr>
	    <tr><td>Msk Tujuan</td><td><?php echo $msk_tujuan; ?></td></tr>
	    <tr><td>Msk Status</td><td><?php echo $msk_status; ?></td></tr>
	    <tr><td></td><td><a href="<?php echo site_url('mutasisimkesan') ?>" class="btn btn-default">Cancel</a></td></tr>
	</table>
            </div>
        </div>
    </div>
    </div>
    </body>
</html>
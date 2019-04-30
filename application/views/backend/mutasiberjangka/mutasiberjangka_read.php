<!doctype html>
<html>
    <head>
        <title></title>
    </head>
    <body>
    <div class="col-lg-12">
    <div class="ibox float-e-margins">
        <div class="ibox-title">
            <h2 style="margin-top:0px">Mutasiberjangka Read</h2>
            <div class="ibox-tools">
            </div>
        </div>
        <div class="ibox-content">
        
        <table class="table">
	    <tr><td>Ivb Kode</td><td><?php echo $ivb_kode; ?></td></tr>
	    <tr><td>Mib Tglmutasi</td><td><?php echo $mib_tglmutasi; ?></td></tr>
	    <tr><td>Mib Asal</td><td><?php echo $mib_asal; ?></td></tr>
	    <tr><td>Mib Tujuan</td><td><?php echo $mib_tujuan; ?></td></tr>
	    <tr><td>Mib Status</td><td><?php echo $mib_status; ?></td></tr>
	    <tr><td></td><td><a href="<?php echo site_url('mutasiberjangka') ?>" class="btn btn-default">Cancel</a></td></tr>
	</table>
            </div>
        </div>
    </div>
    </div>
    </body>
</html>
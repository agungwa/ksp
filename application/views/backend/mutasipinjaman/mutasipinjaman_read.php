<!doctype html>
<html>
    <head>
        <title></title>
    </head>
    <body>
    <div class="col-lg-12">
    <div class="ibox float-e-margins">
        <div class="ibox-title">
            <h2 style="margin-top:0px">Mutasi Pinjaman Read</h2>
            <div class="ibox-tools">
            </div>
        </div>
        <div class="ibox-content">
        
        <table class="table">
	    <tr><td>Rekening Pinjaman</td><td><?php echo $pin_id; ?></td></tr>
	    <tr><td>Tanggal Mutasi</td><td><?php echo $mup_tglmutasi; ?></td></tr>
	    <tr><td>Asal</td><td><?php echo $mup_asal; ?></td></tr>
	    <tr><td>Tujuan</td><td><?php echo $mup_tujuan; ?></td></tr>
	    <tr><td>Status</td><td><?php echo $mup_status; ?></td></tr>
	    <tr><td></td><td><a href="<?php echo site_url('mutasipinjaman') ?>" class="btn btn-default">Cancel</a></td></tr>
	</table>
            </div>
        </div>
    </div>
    </div>
    </body>
</html>
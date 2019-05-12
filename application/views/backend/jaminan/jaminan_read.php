<!doctype html>
<html>
    <head>
        <title></title>
    </head>
    <body>
    <div class="col-lg-12">
    <div class="ibox float-e-margins">
        <div class="ibox-title">
            <h2 style="margin-top:0px">Jaminan Read</h2>
            <div class="ibox-tools">
            </div>
        </div>
        <div class="ibox-content">
        
        <table class="table">
	    <tr><td>Rekening Jaminan</td><td><?php echo $pin_id; ?></td></tr>
	    <tr><td>Jenis Jaminan</td><td><?php echo $jej_id; ?></td></tr>
	    <tr><td>Nomor Jaminan</td><td><?php echo $jam_nomor; ?></td></tr>
	    <tr><td>Keterangan</td><td><?php echo $jam_keterangan; ?></td></tr>
	    <tr><td></td><td><a href="<?php echo site_url('jaminan') ?>" class="btn btn-default">Batal</a></td></tr>
	</table>
            </div>
        </div>
    </div>
    </div>
    </body>
</html>
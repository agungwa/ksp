<!doctype html>
<html>
    <head>
        <title></title>
    </head>
    <body>
    <div class="col-lg-12">
    <div class="ibox float-e-margins">
        <div class="ibox-title">
            <h2 style="margin-top:0px">Setoransimkesan Read</h2>
            <div class="ibox-tools">
            </div>
        </div>
        <div class="ibox-content">
        
        <table class="table">
	    <tr><td>Rekening Simkesan</td><td><?php echo $sik_kode; ?></td></tr>
	    <tr><td>Tanggal Setoran</td><td><?php echo $ssk_tglsetoran; ?></td></tr>
	    <tr><td>Tanggal Bayar</td><td><?php echo $ssk_tglbayar; ?></td></tr>
	    <tr><td>Jumlah Setor</td><td><?php echo $ssk_jmlsetor; ?></td></tr>
	    <tr><td>Status</td><td><?php echo $ssk_status; ?></td></tr>
	    <tr><td></td><td><a href="<?php echo site_url('setoransimkesan') ?>" class="btn btn-default">Batal</a></td></tr>
	</table>
            </div>
        </div>
    </div>
    </div>
    </body>
</html>
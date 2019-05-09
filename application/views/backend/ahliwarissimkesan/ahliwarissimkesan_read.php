<!doctype html>
<html>
    <head>
        <title></title>
    </head>
    <body>
    <div class="col-lg-12">
    <div class="ibox float-e-margins">
        <div class="ibox-title">
            <h2 style="margin-top:0px">Ahliwarissimkesan Read</h2>
            <div class="ibox-tools">
            </div>
        </div>
        <div class="ibox-content">
        
        <table class="table">
	    <tr><td>Rekening Simkesan</td><td><?php echo $sik_kode; ?></td></tr>
	    <tr><td>Ahliwaris ID</td><td><?php echo $aws_noid; ?></td></tr>
	    <tr><td>Jenis ID</td><td><?php echo $aws_jenisid; ?></td></tr>
	    <tr><td>Nama</td><td><?php echo $aws_nama; ?></td></tr>
	    <tr><td>Alamat</td><td><?php echo $aws_alamat; ?></td></tr>
	    <tr><td>Hubungan</td><td><?php echo $aws_hubungan; ?></td></tr>
	    <tr><td>Lampiran</td><td><?php echo $aws_lampiran; ?></td></tr>
	    <tr><td></td><td><a href="<?php echo site_url('ahliwarissimkesan') ?>" class="btn btn-default">Cancel</a></td></tr>
	</table>
            </div>
        </div>
    </div>
    </div>
    </body>
</html>
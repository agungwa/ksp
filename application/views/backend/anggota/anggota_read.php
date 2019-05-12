<!doctype html>
<html>
    <head>
        <title></title>
    </head>
    <body>
    <div class="col-lg-12">
    <div class="ibox float-e-margins">
        <div class="ibox-title">
            <h2 style="margin-top:0px">Anggota Read</h2>
            <div class="ibox-tools">
            </div>
        </div>
        <div class="ibox-content">
        
        <table class="table">
        <tr><td>Nomor Anggota</td><td><?php echo $ang_no; ?></td></tr>
	    <tr><td>Nama</td><td><?php echo $ang_nama; ?></td></tr>
	    <tr><td>Alamat</td><td><?php echo $ang_alamat; ?></td></tr>
	    <tr><td>Nomor KTP</td><td><?php echo $ang_noktp; ?></td></tr>
	    <tr><td>Nomor KK</td><td><?php echo $ang_nokk; ?></td></tr>
	    <tr><td>Nomor Handphone</td><td><?php echo $ang_nohp; ?></td></tr>
	    <tr><td>Tanggal Lahir</td><td><?php echo $ang_tgllahir; ?></td></tr>
	    <tr><td>Status</td><td><?php echo $ang_status; ?></td></tr>
	    <tr><td></td><td><a href="<?php echo site_url('anggota') ?>" class="btn btn-default">Batal</a></td></tr>
	</table>
            </div>
        </div>
    </div>
    </div>
    </body>
</html>
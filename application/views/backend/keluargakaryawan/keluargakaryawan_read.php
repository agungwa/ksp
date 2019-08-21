<!doctype html>
<html>
    <head>
        <title></title>
    </head>
    <body>
    <div class="col-lg-12">
    <div class="ibox float-e-margins">
        <div class="ibox-title">
            <h2 style="margin-top:0px">Keluargakaryawan Read</h2>
            <div class="ibox-tools">
            </div>
        </div>
        <div class="ibox-content">
        
        <table class="table">
	    <tr><td>Kar Kode</td><td><?php echo $kar_kode; ?></td></tr>
	    <tr><td>Kka Nama</td><td><?php echo $kka_nama; ?></td></tr>
	    <tr><td>Kka Alamat</td><td><?php echo $kka_alamat; ?></td></tr>
	    <tr><td>Kka Nohp</td><td><?php echo $kka_nohp; ?></td></tr>
	    <tr><td>Kka Tgl</td><td><?php echo $kka_tgl; ?></td></tr>
	    <tr><td>Kka Flag</td><td><?php echo $kka_flag; ?></td></tr>
	    <tr><td>Kka Info</td><td><?php echo $kka_info; ?></td></tr>
	    <tr><td></td><td><a href="<?php echo site_url('keluargakaryawan') ?>" class="btn btn-default">Cancel</a></td></tr>
	</table>
            </div>
        </div>
    </div>
    </div>
    </body>
</html>
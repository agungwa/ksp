<!doctype html>
<html>
    <head>
        <title></title>
    </head>
    <body>
    <div class="col-lg-12">
    <div class="ibox float-e-margins">
        <div class="ibox-title">
            <h2 style="margin-top:0px">Karyawan Read</h2>
            <div class="ibox-tools">
            </div>
        </div>
        <div class="ibox-content">
        
        <table class="table">
	    <tr><td>Kar Nama</td><td><?php echo $kar_nama; ?></td></tr>
	    <tr><td>Jab Kode</td><td><?php echo $jab_kode; ?></td></tr>
	    <tr><td>Wil Kode</td><td><?php echo $wil_kode; ?></td></tr>
	    <tr><td>Kar Alamat</td><td><?php echo $kar_alamat; ?></td></tr>
	    <tr><td>Kar Nohp</td><td><?php echo $kar_nohp; ?></td></tr>
	    <tr><td>Kar Tgl</td><td><?php echo $kar_tgl; ?></td></tr>
	    <tr><td>Kar Flag</td><td><?php echo $kar_flag; ?></td></tr>
	    <tr><td>Kar Info</td><td><?php echo $kar_info; ?></td></tr>
	    <tr><td></td><td><a href="<?php echo site_url('karyawan') ?>" class="btn btn-default">Cancel</a></td></tr>
	</table>
            </div>
        </div>
    </div>
    </div>
    </body>
</html>
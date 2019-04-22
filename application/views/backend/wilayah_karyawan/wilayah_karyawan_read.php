<!doctype html>
<html>
    <head>
        <title></title>
    </head>
    <body>
    <div class="col-lg-12">
    <div class="ibox float-e-margins">
        <div class="ibox-title">
            <h2 style="margin-top:0px">Wilayah_karyawan Read</h2>
            <div class="ibox-tools">
            </div>
        </div>
        <div class="ibox-content">
        
        <table class="table">
	    <tr><td>Wil Kode</td><td><?php echo $wil_kode; ?></td></tr>
	    <tr><td>Status</td><td><?php echo $status; ?></td></tr>
	    <tr><td>Kar Kode</td><td><?php echo $kar_kode; ?></td></tr>
	    <tr><td>Wik Tgl</td><td><?php echo $wik_tgl; ?></td></tr>
	    <tr><td>Wik Flag</td><td><?php echo $wik_flag; ?></td></tr>
	    <tr><td>Wik Info</td><td><?php echo $wik_info; ?></td></tr>
	    <tr><td></td><td><a href="<?php echo site_url('wilayah_karyawan') ?>" class="btn btn-default">Cancel</a></td></tr>
	</table>
            </div>
        </div>
    </div>
    </div>
    </body>
</html>
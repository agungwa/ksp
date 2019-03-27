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
	    <tr><td>Ang Nama</td><td><?php echo $ang_nama; ?></td></tr>
	    <tr><td>Ang Alamat</td><td><?php echo $ang_alamat; ?></td></tr>
	    <tr><td>Ang Noktp</td><td><?php echo $ang_noktp; ?></td></tr>
	    <tr><td>Ang Nokk</td><td><?php echo $ang_nokk; ?></td></tr>
	    <tr><td>Ang Nohp</td><td><?php echo $ang_nohp; ?></td></tr>
	    <tr><td>Ang Tgllahir</td><td><?php echo $ang_tgllahir; ?></td></tr>
	    <tr><td>Ang Tgl</td><td><?php echo $ang_tgl; ?></td></tr>
	    <tr><td>Ang Flag</td><td><?php echo $ang_flag; ?></td></tr>
	    <tr><td>Ang Info</td><td><?php echo $ang_info; ?></td></tr>
	    <tr><td></td><td><a href="<?php echo site_url('anggota') ?>" class="btn btn-default">Cancel</a></td></tr>
	</table>
            </div>
        </div>
    </div>
    </div>
    </body>
</html>
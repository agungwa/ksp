<!doctype html>
<html>
    <head>
        <title></title>
    </head>
    <body>
    <div class="col-lg-12">
    <div class="ibox float-e-margins">
        <div class="ibox-title">
            <h2 style="margin-top:0px">Rekap Read</h2>
            <div class="ibox-tools">
            </div>
        </div>
        <div class="ibox-content">
        
        <table class="table">
	    <tr><td>Rek Jenis</td><td><?php echo $rek_jenis; ?></td></tr>
	    <tr><td>Wil Kode</td><td><?php echo $wil_kode; ?></td></tr>
	    <tr><td>Kar Kode</td><td><?php echo $kar_kode; ?></td></tr>
	    <tr><td>Rek Lainlainmasuk</td><td><?php echo $rek_lainlainmasuk; ?></td></tr>
	    <tr><td>Rek Lainlainkeluar</td><td><?php echo $rek_lainlainkeluar; ?></td></tr>
	    <tr><td>Rek Jumlah</td><td><?php echo $rek_jumlah; ?></td></tr>
	    <tr><td>Rek Tanggal</td><td><?php echo $rek_tanggal; ?></td></tr>
	    <tr><td>Rek Tgl</td><td><?php echo $rek_tgl; ?></td></tr>
	    <tr><td>Rek Flag</td><td><?php echo $rek_flag; ?></td></tr>
	    <tr><td>Rek Info</td><td><?php echo $rek_info; ?></td></tr>
	    <tr><td></td><td><a href="<?php echo site_url('rekap') ?>" class="btn btn-default">Cancel</a></td></tr>
	</table>
            </div>
        </div>
    </div>
    </div>
    </body>
</html>
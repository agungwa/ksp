<!doctype html>
<html>
    <head>
        <title></title>
    </head>
    <body>
    <div class="col-lg-12">
    <div class="ibox float-e-margins">
        <div class="ibox-title">
            <h2 style="margin-top:0px">Shu simkesan Read</h2>
            <div class="ibox-tools">
            </div>
        </div>
        <div class="ibox-content">
        
        <table class="table">
	    <tr><td>Shus Pendapatan</td><td><?php echo $shus_pendapatan; ?></td></tr>
	    <tr><td>Shus Pengeluaran</td><td><?php echo $shus_pengeluaran; ?></td></tr>
	    <tr><td>Shus Jumlah</td><td><?php echo $shus_jumlah; ?></td></tr>
	    <tr><td>Shus Tgl</td><td><?php echo $shus_tgl; ?></td></tr>
	    <tr><td></td><td><a href="<?php echo site_url('shusimkesan') ?>" class="btn btn-default">Cancel</a></td></tr>
	</table>
            </div>
        </div>
    </div>
    </div>
    </body>
</html>
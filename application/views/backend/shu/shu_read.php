<!doctype html>
<html>
    <head>
        <title></title>
    </head>
    <body>
    <div class="col-lg-12">
    <div class="ibox float-e-margins">
        <div class="ibox-title">
            <h2 style="margin-top:0px">Shu Read</h2>
            <div class="ibox-tools">
            </div>
        </div>
        <div class="ibox-content">
        
        <table class="table">
	    <tr><td>Shu Pendapatan</td><td><?php echo $shu_pendapatan; ?></td></tr>
	    <tr><td>Shu Pengeluaran</td><td><?php echo $shu_pengeluaran; ?></td></tr>
	    <tr><td>Shu Jumlah</td><td><?php echo $shu_jumlah; ?></td></tr>
	    <tr><td>Shu Tanggal</td><td><?php echo $shu_tanggal; ?></td></tr>
	    <tr><td>Shu Tgl</td><td><?php echo $shu_tgl; ?></td></tr>
	    <tr><td>Shu Flag</td><td><?php echo $shu_flag; ?></td></tr>
	    <tr><td>Shu Info</td><td><?php echo $shu_info; ?></td></tr>
	    <tr><td>Phu Id</td><td><?php echo $phu_id; ?></td></tr>
	    <tr><td>Psis Id</td><td><?php echo $psis_id; ?></td></tr>
	    <tr><td></td><td><a href="<?php echo site_url('shu') ?>" class="btn btn-default">Cancel</a></td></tr>
	</table>
            </div>
        </div>
    </div>
    </div>
    </body>
</html>
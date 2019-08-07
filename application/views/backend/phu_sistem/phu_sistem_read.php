<!doctype html>
<html>
    <head>
        <title></title>
    </head>
    <body>
    <div class="col-lg-12">
    <div class="ibox float-e-margins">
        <div class="ibox-title">
            <h2 style="margin-top:0px">Phu_sistem Read</h2>
            <div class="ibox-tools">
            </div>
        </div>
        <div class="ibox-content">
        
        <table class="table">
	    <tr><td>Psis Pendapatan</td><td><?php echo $psis_pendapatan; ?></td></tr>
	    <tr><td>Psis Pengeluaran</td><td><?php echo $psis_pengeluaran; ?></td></tr>
	    <tr><td>Psis Tgl</td><td><?php echo $psis_tgl; ?></td></tr>
	    <tr><td>Psis Flag</td><td><?php echo $psis_flag; ?></td></tr>
	    <tr><td>Psis Info</td><td><?php echo $psis_info; ?></td></tr>
	    <tr><td></td><td><a href="<?php echo site_url('phu_sistem') ?>" class="btn btn-default">Cancel</a></td></tr>
	</table>
            </div>
        </div>
    </div>
    </div>
    </body>
</html>
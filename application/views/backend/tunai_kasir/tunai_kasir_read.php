<!doctype html>
<html>
    <head>
        <title></title>
    </head>
    <body>
    <div class="col-lg-12">
    <div class="ibox float-e-margins">
        <div class="ibox-title">
            <h2 style="margin-top:0px">Tunai_kasir Read</h2>
            <div class="ibox-tools">
            </div>
        </div>
        <div class="ibox-content">
        
        <table class="table">
	    <tr><td>Tun Jumlah</td><td><?php echo $tun_jumlah; ?></td></tr>
	    <tr><td>Tun Jenis</td><td><?php echo $tun_jenis; ?></td></tr>
	    <tr><td>Tun Kantor</td><td><?php echo $tun_kantor; ?></td></tr>
	    <tr><td>Tun Tanggal</td><td><?php echo $tun_tanggal; ?></td></tr>
	    <tr><td>Tun Tgl</td><td><?php echo $tun_tgl; ?></td></tr>
	    <tr><td>Tun Flag</td><td><?php echo $tun_flag; ?></td></tr>
	    <tr><td>Tun Info</td><td><?php echo $tun_info; ?></td></tr>
	    <tr><td></td><td><a href="<?php echo site_url('tunai_kasir') ?>" class="btn btn-default">Cancel</a></td></tr>
	</table>
            </div>
        </div>
    </div>
    </div>
    </body>
</html>
<!doctype html>
<html>
    <head>
        <title></title>
    </head>
    <body>
    <div class="col-lg-12">
    <div class="ibox float-e-margins">
        <div class="ibox-title">
            <h2 style="margin-top:0px">Phu simkesan pendapatan Read</h2>
            <div class="ibox-tools">
            </div>
        </div>
        <div class="ibox-content">
        
        <table class="table">
	    <tr><td>Phsp Klaim</td><td><?php echo $phsp_klaim; ?></td></tr>
	    <tr><td>Phsp Tarik</td><td><?php echo $phsp_tarik; ?></td></tr>
	    <tr><td>Phsp Gugur</td><td><?php echo $phsp_gugur; ?></td></tr>
	    <tr><td>Phsp Administrasi</td><td><?php echo $phsp_administrasi; ?></td></tr>
	    <tr><td>Phsp Lainlain</td><td><?php echo $phsp_lainlain; ?></td></tr>
	    <tr><td>Phsp Tgl</td><td><?php echo $phsp_tgl; ?></td></tr>
	    <tr><td></td><td><a href="<?php echo site_url('phusimkesanpendapatan') ?>" class="btn btn-default">Cancel</a></td></tr>
	</table>
            </div>
        </div>
    </div>
    </div>
    </body>
</html>
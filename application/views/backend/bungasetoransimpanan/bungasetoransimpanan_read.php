<!doctype html>
<html>
    <head>
        <title></title>
    </head>
    <body>
    <div class="col-lg-12">
    <div class="ibox float-e-margins">
        <div class="ibox-title">
            <h2 style="margin-top:0px">Bungasetoransimpanan Read</h2>
            <div class="ibox-tools">
            </div>
        </div>
        <div class="ibox-content">
        
        <table class="table">
	    <tr><td>Sim Kode</td><td><?php echo $sim_kode; ?></td></tr>
	    <tr><td>Bss Saldosimpanan</td><td><?php echo $bss_saldosimpanan; ?></td></tr>
	    <tr><td>Bss Saldobulanini</td><td><?php echo $bss_saldobulanini; ?></td></tr>
	    <tr><td>Bss Tglbunga</td><td><?php echo $bss_tglbunga; ?></td></tr>
	    <tr><td>Bss Tgl</td><td><?php echo $bss_tgl; ?></td></tr>
	    <tr><td>Bss Flag</td><td><?php echo $bss_flag; ?></td></tr>
	    <tr><td>Bss Info</td><td><?php echo $bss_info; ?></td></tr>
	    <tr><td></td><td><a href="<?php echo site_url('bungasetoransimpanan') ?>" class="btn btn-default">Cancel</a></td></tr>
	</table>
            </div>
        </div>
    </div>
    </div>
    </body>
</html>
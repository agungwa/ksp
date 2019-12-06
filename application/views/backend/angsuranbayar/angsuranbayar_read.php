<!doctype html>
<html>
    <head>
        <title></title>
    </head>
    <body>
    <div class="col-lg-12">
    <div class="ibox float-e-margins">
        <div class="ibox-title">
            <h2 style="margin-top:0px">Angsuranbayar Read</h2>
            <div class="ibox-tools">
            </div>
        </div>
        <div class="ibox-content">
        
        <table class="table">
	    <tr><td>Angsuran</td><td><?php echo $ags_id; ?></td></tr>
	    <tr><td>Bayar Pokok</td><td><?php echo $agb_pokok; ?></td></tr>
	    <tr><td>Bayar Bunga</td><td><?php echo $agb_bunga; ?></td></tr>
	    <tr><td>Bayar Denda</td><td><?php echo $agb_denda; ?></td></tr>
	    <tr><td>Bayar Status</td><td><?php echo $agb_status; ?></td></tr>
	    <tr><td>Bayar Tglpokok</td><td><?php echo $agb_tglpokok; ?></td></tr>
	    <tr><td>Bayar Tglbunga</td><td><?php echo $agb_tglbunga; ?></td></tr>
	    <tr><td>Bayar Tgllunas</td><td><?php echo $agb_tgllunas; ?></td></tr>
	    <tr><td></td><td><a href="<?php echo site_url('angsuranbayar') ?>" class="btn btn-default">Cancel</a></td></tr>
	</table>
            </div>
        </div>
    </div>
    </div>
    </body>
</html>
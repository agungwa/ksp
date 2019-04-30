<!doctype html>
<html>
    <head>
        <title></title>
    </head>
    <body>
    <div class="col-lg-12">
    <div class="ibox float-e-margins">
        <div class="ibox-title">
            <h2 style="margin-top:0px">Mutasisimpanan Read</h2>
            <div class="ibox-tools">
            </div>
        </div>
        <div class="ibox-content">
        
        <table class="table">
	    <tr><td>Sim Kode</td><td><?php echo $sim_kode; ?></td></tr>
	    <tr><td>Mus Tglmutasi</td><td><?php echo $mus_tglmutasi; ?></td></tr>
	    <tr><td>Mus Asal</td><td><?php echo $mus_asal; ?></td></tr>
	    <tr><td>Mus Tujuan</td><td><?php echo $mus_tujuan; ?></td></tr>
	    <tr><td>Mus Status</td><td><?php echo $mus_status; ?></td></tr>
	    <tr><td></td><td><a href="<?php echo site_url('mutasisimpanan') ?>" class="btn btn-default">Cancel</a></td></tr>
	</table>
            </div>
        </div>
    </div>
    </div>
    </body>
</html>
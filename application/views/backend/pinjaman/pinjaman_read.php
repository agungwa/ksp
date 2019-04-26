<!doctype html>
<html>
    <head>
        <title></title>
    </head>
    <body>
    <div class="col-lg-12">
    <div class="ibox float-e-margins">
        <div class="ibox-title">
            <h2 style="margin-top:0px">Pinjaman Read</h2>
            <div class="ibox-tools">
            </div>
        </div>
        <div class="ibox-content">
        
        <table class="table">
	    <tr><td>Pin Id</td><td><?php echo $pin_id; ?></td></tr>
	    <tr><td>Ang No</td><td><?php echo $ang_no; ?></td></tr>
	    <tr><td>Sea Id</td><td><?php echo $sea_id; ?></td></tr>
	    <tr><td>Bup Id</td><td><?php echo $bup_id; ?></td></tr>
	    <tr><td>Pop Id</td><td><?php echo $pop_id; ?></td></tr>
	    <tr><td>Wil Kode</td><td><?php echo $wil_kode; ?></td></tr>
	    <tr><td>Skp Id</td><td><?php echo $skp_id; ?></td></tr>
	    <tr><td>Pen Id</td><td><?php echo $pen_id; ?></td></tr>
	    <tr><td>Pin Pengajuan</td><td><?php echo $pin_pengajuan; ?></td></tr>
	    <tr><td>Pin Pinjaman</td><td><?php echo $pin_pinjaman; ?></td></tr>
	    <tr><td>Pin Tglpengajuan</td><td><?php echo dateFormat($pin_tglpengajuan); ?></td></tr>
	    <tr><td>Pin Tglpencairan</td><td><?php echo dateFormat($pin_tglpencairan); ?></td></tr>
	    <tr><td>Pin Marketing</td><td><?php echo $pin_marketing; ?></td></tr>
	    <tr><td>Pin Surveyor</td><td><?php echo $pin_surveyor; ?></td></tr>
	    <tr><td>Pin Survey</td><td><?php echo $pin_survey; ?></td></tr>
	    <tr><td>Pin Statuspinjaman</td><td><?php echo $pin_statuspinjaman; ?></td></tr>
	    <tr><td></td><td><a href="<?php echo site_url('pinjaman') ?>" class="btn btn-default">Cancel</a></td></tr>
	</table>
            </div>
        </div>
    </div>
    </div>
    </body>
</html>
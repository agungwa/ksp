<!doctype html>
<html>
    <head>
        <title></title>
    </head>
    <body>
    <div class="col-lg-12">
    <div class="ibox float-e-margins">
        <div class="ibox-title">
            <h2 style="margin-top:0px">Pelunasan Read</h2>
            <div class="ibox-tools">
            </div>
        </div>
        <div class="ibox-content">
        
        <table class="table">
	    <tr><td>Pin Id</td><td><?php echo $pin_id; ?></td></tr>
	    <tr><td>Pel Jenis</td><td><?php echo $pel_jenis; ?></td></tr>
	    <tr><td>Pel Tenor</td><td><?php echo $pel_tenor; ?></td></tr>
	    <tr><td>Pel Angsuran</td><td><?php echo $pel_angsuran; ?></td></tr>
	    <tr><td>Pel Bungaangsuran</td><td><?php echo $pel_bungaangsuran; ?></td></tr>
	    <tr><td>Pel Totalkekuranganpokok</td><td><?php echo $pel_totalkekuranganpokok; ?></td></tr>
	    <tr><td>Pel Totalbungapokok</td><td><?php echo $pel_totalbungapokok; ?></td></tr>
	    <tr><td>Pel Bungatambahan</td><td><?php echo $pel_bungatambahan; ?></td></tr>
	    <tr><td>Pel Totaldenda</td><td><?php echo $pel_totaldenda; ?></td></tr>
	    <tr><td>Pel Tglpelunasan</td><td><?php echo $pel_tglpelunasan; ?></td></tr>
	    <tr><td>Pel Tgl</td><td><?php echo $pel_tgl; ?></td></tr>
	    <tr><td>Pel Flag</td><td><?php echo $pel_flag; ?></td></tr>
	    <tr><td>Pel Info</td><td><?php echo $pel_info; ?></td></tr>
	    <tr><td></td><td><a href="<?php echo site_url('pelunasan') ?>" class="btn btn-default">Cancel</a></td></tr>
	</table>
            </div>
        </div>
    </div>
    </div>
    </body>
</html>
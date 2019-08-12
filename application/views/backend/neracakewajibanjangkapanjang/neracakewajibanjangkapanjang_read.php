<!doctype html>
<html>
    <head>
        <title></title>
    </head>
    <body>
    <div class="col-lg-12">
    <div class="ibox float-e-margins">
        <div class="ibox-title">
            <h2 style="margin-top:0px">Neraca Kewajiban Jangka Panjang Read</h2>
            <div class="ibox-tools">
            </div>
        </div>
        <div class="ibox-content">
        
        <table class="table">
	    <tr><td>Tanggal</td><td><?php echo $njp_tanggal; ?></td></tr>
	    <tr><td>Rekeningkoran</td><td><?php echo $njp_rekeningkoran; ?></td></tr>
	    <tr><td>Modalpenyertaan</td><td><?php echo $njp_modalpenyertaan; ?></td></tr>
	    <tr><td></td><td><a href="<?php echo site_url('neracakewajibanjangkapanjang') ?>" class="btn btn-default">Cancel</a></td></tr>
	</table>
            </div>
        </div>
    </div>
    </div>
    </body>
</html>
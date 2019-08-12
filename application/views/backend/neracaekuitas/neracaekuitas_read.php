<!doctype html>
<html>
    <head>
        <title></title>
    </head>
    <body>
    <div class="col-lg-12">
    <div class="ibox float-e-margins">
        <div class="ibox-title">
            <h2 style="margin-top:0px">Neraca Ekuitas Read</h2>
            <div class="ibox-tools">
            </div>
        </div>
        <div class="ibox-content">
        
        <table class="table">
	    <tr><td>Tanggal</td><td><?php echo $nek_tanggal; ?></td></tr>
	    <tr><td>Simpanancdr</td><td><?php echo $nek_simpanancdr; ?></td></tr>
	    <tr><td>Donasi</td><td><?php echo $nek_donasi; ?></td></tr>
	    <tr><td></td><td><a href="<?php echo site_url('neracaekuitas') ?>" class="btn btn-default">Cancel</a></td></tr>
	</table>
            </div>
        </div>
    </div>
    </div>
    </body>
</html>
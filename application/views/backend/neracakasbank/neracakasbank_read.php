<!doctype html>
<html>
    <head>
        <title></title>
    </head>
    <body>
    <div class="col-lg-12">
    <div class="ibox float-e-margins">
        <div class="ibox-title">
            <h2 style="margin-top:0px">Neraca Kas Bank Read</h2>
            <div class="ibox-tools">
            </div>
        </div>
        <div class="ibox-content">
        
        <table class="table">
	    <tr><td>Tanggal</td><td><?php echo $nkb_tanggal; ?></td></tr>
	    <tr><td>umlah</td><td><?php echo $nkb_jumlah; ?></td></tr>
	    <tr><td></td><td><a href="<?php echo site_url('neracakasbank') ?>" class="btn btn-default">Cancel</a></td></tr>
	</table>
            </div>
        </div>
    </div>
    </div>
    </body>
</html>
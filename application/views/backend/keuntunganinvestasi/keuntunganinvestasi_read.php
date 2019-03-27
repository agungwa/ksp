<!doctype html>
<html>
    <head>
        <title></title>
    </head>
    <body>
    <div class="col-lg-12">
    <div class="ibox float-e-margins">
        <div class="ibox-title">
            <h2 style="margin-top:0px">Keuntunganinvestasi Read</h2>
            <div class="ibox-tools">
            </div>
        </div>
        <div class="ibox-content">
        
        <table class="table">
	    <tr><td>Pib Id</td><td><?php echo $pib_id; ?></td></tr>
	    <tr><td>Kiv Jmlkeuntungan</td><td><?php echo $kiv_jmlkeuntungan; ?></td></tr>
	    <tr><td>Kiv Tglkeuntungan</td><td><?php echo $kiv_tglkeuntungan; ?></td></tr>
	    <tr><td>Kiv Tgl</td><td><?php echo $kiv_tgl; ?></td></tr>
	    <tr><td>Kiv Flag</td><td><?php echo $kiv_flag; ?></td></tr>
	    <tr><td>Kiv Info</td><td><?php echo $kiv_info; ?></td></tr>
	    <tr><td></td><td><a href="<?php echo site_url('keuntunganinvestasi') ?>" class="btn btn-default">Cancel</a></td></tr>
	</table>
            </div>
        </div>
    </div>
    </div>
    </body>
</html>
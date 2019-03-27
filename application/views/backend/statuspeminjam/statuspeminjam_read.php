<!doctype html>
<html>
    <head>
        <title></title>
    </head>
    <body>
    <div class="col-lg-12">
    <div class="ibox float-e-margins">
        <div class="ibox-title">
            <h2 style="margin-top:0px">Statuspeminjam Read</h2>
            <div class="ibox-tools">
            </div>
        </div>
        <div class="ibox-content">
        
        <table class="table">
	    <tr><td>Ang No</td><td><?php echo $ang_no; ?></td></tr>
	    <tr><td>Ssp Id</td><td><?php echo $ssp_id; ?></td></tr>
	    <tr><td>Pin Id</td><td><?php echo $pin_id; ?></td></tr>
	    <tr><td>Stp Tgl</td><td><?php echo $stp_tgl; ?></td></tr>
	    <tr><td>Stp Flag</td><td><?php echo $stp_flag; ?></td></tr>
	    <tr><td>Stp Info</td><td><?php echo $stp_info; ?></td></tr>
	    <tr><td></td><td><a href="<?php echo site_url('statuspeminjam') ?>" class="btn btn-default">Cancel</a></td></tr>
	</table>
            </div>
        </div>
    </div>
    </div>
    </body>
</html>
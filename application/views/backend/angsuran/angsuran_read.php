<!doctype html>
<html>
    <head>
        <title></title>
    </head>
    <body>
    <div class="col-lg-12">
    <div class="ibox float-e-margins">
        <div class="ibox-title">
            <h2 style="margin-top:0px">Angsuran Read</h2>
            <div class="ibox-tools">
            </div>
        </div>
        <div class="ibox-content">
        
        <table class="table">
	    <tr><td>Pin Id</td><td><?php echo $pin_id; ?></td></tr>
	    <tr><td>Ang Angsuranke</td><td><?php echo $ang_angsuranke; ?></td></tr>
	    <tr><td>Ags Tgljatuhtempo</td><td><?php echo $ags_tgljatuhtempo; ?></td></tr>
	    <tr><td>Ags Tglbayar</td><td><?php echo $ags_tglbayar; ?></td></tr>
	    <tr><td>Ags Jmlpokok</td><td><?php echo $ags_jmlpokok; ?></td></tr>
	    <tr><td>Ags Jmlbunga</td><td><?php echo $ags_jmlbunga; ?></td></tr>
	    <tr><td>Ags Status</td><td><?php echo $ags_status; ?></td></tr>
	    <tr><td>Ags Tgl</td><td><?php echo $ags_tgl; ?></td></tr>
	    <tr><td>Ags Flag</td><td><?php echo $ags_flag; ?></td></tr>
	    <tr><td>Ags Info</td><td><?php echo $ags_info; ?></td></tr>
	    <tr><td></td><td><a href="<?php echo site_url('angsuran') ?>" class="btn btn-default">Cancel</a></td></tr>
	</table>
            </div>
        </div>
    </div>
    </div>
    </body>
</html>
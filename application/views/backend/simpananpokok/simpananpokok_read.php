<!doctype html>
<html>
    <head>
        <title></title>
    </head>
    <body>
    <div class="col-lg-12">
    <div class="ibox float-e-margins">
        <div class="ibox-title">
            <h2 style="margin-top:0px">Simpananpokok Read</h2>
            <div class="ibox-tools">
            </div>
        </div>
        <div class="ibox-content">
        
        <table class="table">
	    <tr><td>Ang No</td><td><?php echo $ang_no; ?></td></tr>
	    <tr><td>Ses Id</td><td><?php echo $ses_id; ?></td></tr>
	    <tr><td>Sip Tglbayar</td><td><?php echo $sip_tglbayar; ?></td></tr>
	    <tr><td>Sip Tgl</td><td><?php echo $sip_tgl; ?></td></tr>
	    <tr><td>Sip Flag</td><td><?php echo $sip_flag; ?></td></tr>
	    <tr><td>Sip Info</td><td><?php echo $sip_info; ?></td></tr>
	    <tr><td></td><td><a href="<?php echo site_url('simpananpokok') ?>" class="btn btn-default">Cancel</a></td></tr>
	</table>
            </div>
        </div>
    </div>
    </div>
    </body>
</html>
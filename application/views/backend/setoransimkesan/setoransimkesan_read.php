<!doctype html>
<html>
    <head>
        <title></title>
    </head>
    <body>
    <div class="col-lg-12">
    <div class="ibox float-e-margins">
        <div class="ibox-title">
            <h2 style="margin-top:0px">Setoransimkesan Read</h2>
            <div class="ibox-tools">
            </div>
        </div>
        <div class="ibox-content">
        
        <table class="table">
	    <tr><td>Sik Kode</td><td><?php echo $sik_kode; ?></td></tr>
	    <tr><td>Ssk Tglsetoran</td><td><?php echo $ssk_tglsetoran; ?></td></tr>
	    <tr><td>Ssk Tglbayar</td><td><?php echo $ssk_tglbayar; ?></td></tr>
	    <tr><td>Ssk Jmlsetor</td><td><?php echo $ssk_jmlsetor; ?></td></tr>
	    <tr><td>Ssk Status</td><td><?php echo $ssk_status; ?></td></tr>
	    <tr><td>Ssk Tgl</td><td><?php echo $ssk_tgl; ?></td></tr>
	    <tr><td>Ssk Flag</td><td><?php echo $ssk_flag; ?></td></tr>
	    <tr><td>Ssk Info</td><td><?php echo $ssk_info; ?></td></tr>
	    <tr><td></td><td><a href="<?php echo site_url('setoransimkesan') ?>" class="btn btn-default">Cancel</a></td></tr>
	</table>
            </div>
        </div>
    </div>
    </div>
    </body>
</html>
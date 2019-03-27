<!doctype html>
<html>
    <head>
        <title></title>
    </head>
    <body>
    <div class="col-lg-12">
    <div class="ibox float-e-margins">
        <div class="ibox-title">
            <h2 style="margin-top:0px">Jabatan Read</h2>
            <div class="ibox-tools">
            </div>
        </div>
        <div class="ibox-content">
        
        <table class="table">
	    <tr><td>Jab Nama</td><td><?php echo $jab_nama; ?></td></tr>
	    <tr><td>Jab Tgl</td><td><?php echo $jab_tgl; ?></td></tr>
	    <tr><td>Jab Flag</td><td><?php echo $jab_flag; ?></td></tr>
	    <tr><td>Jab Info</td><td><?php echo $jab_info; ?></td></tr>
	    <tr><td></td><td><a href="<?php echo site_url('jabatan') ?>" class="btn btn-default">Cancel</a></td></tr>
	</table>
            </div>
        </div>
    </div>
    </div>
    </body>
</html>
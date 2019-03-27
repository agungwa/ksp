<!doctype html>
<html>
    <head>
        <title></title>
    </head>
    <body>
    <div class="col-lg-12">
    <div class="ibox float-e-margins">
        <div class="ibox-title">
            <h2 style="margin-top:0px">Mutasipinjaman Read</h2>
            <div class="ibox-tools">
            </div>
        </div>
        <div class="ibox-content">
        
        <table class="table">
	    <tr><td>Pin Id</td><td><?php echo $pin_id; ?></td></tr>
	    <tr><td>Mup Tglmutasi</td><td><?php echo $mup_tglmutasi; ?></td></tr>
	    <tr><td>Mup Asal</td><td><?php echo $mup_asal; ?></td></tr>
	    <tr><td>Mup Tujuan</td><td><?php echo $mup_tujuan; ?></td></tr>
	    <tr><td>Mup Status</td><td><?php echo $mup_status; ?></td></tr>
	    <tr><td>Mup Tgl</td><td><?php echo $mup_tgl; ?></td></tr>
	    <tr><td>Mup Flag</td><td><?php echo $mup_flag; ?></td></tr>
	    <tr><td>Mup Info</td><td><?php echo $mup_info; ?></td></tr>
	    <tr><td></td><td><a href="<?php echo site_url('mutasipinjaman') ?>" class="btn btn-default">Cancel</a></td></tr>
	</table>
            </div>
        </div>
    </div>
    </div>
    </body>
</html>
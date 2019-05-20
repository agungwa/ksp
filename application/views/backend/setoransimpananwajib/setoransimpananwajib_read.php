<!doctype html>
<html>
    <head>
        <title></title>
    </head>
    <body>
    <div class="col-lg-12">
    <div class="ibox float-e-margins">
        <div class="ibox-title">
            <h2 style="margin-top:0px">Setoran Simpanan Wajib Read</h2>
            <div class="ibox-tools">
            </div>
        </div>
        <div class="ibox-content">
        
        <table class="table">
	    <tr><td>Simpanan Wajib</td><td><?php echo $siw_id; ?></td></tr>
	    <tr><td>Tanggal Setor</td><td><?php echo $ssw_tglsetor; ?></td></tr>
	    <tr><td>Jumlah Setor</td><td><?php echo $ssw_jmlsetor; ?></td></tr>
	    <tr><td></td><td><a href="<?php echo site_url('setoransimpananwajib') ?>" class="btn btn-default">Cancel</a></td></tr>
	</table>
            </div>
        </div>
    </div>
    </div>
    </body>
</html>
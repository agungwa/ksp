<!doctype html>
<html>
    <head>
        <title></title>
    </head>
    <body>
    <div class="col-lg-12">
    <div class="ibox float-e-margins">
        <div class="ibox-title">
            <h2 style="margin-top:0px">Penarikansimpanan Read</h2>
            <div class="ibox-tools">
            </div>
        </div>
        <div class="ibox-content">
        
        <table class="table">
	    <tr><td>Sim Kode</td><td><?php echo $sim_kode; ?></td></tr>
	    <tr><td>Siw Id</td><td><?php echo $siw_id; ?></td></tr>
	    <tr><td>Pes Tglpenarikan</td><td><?php echo $pes_tglpenarikan; ?></td></tr>
	    <tr><td>Pes Jumlah</td><td><?php echo $pes_jumlah; ?></td></tr>
	    <tr><td>Pes Tgl</td><td><?php echo $pes_tgl; ?></td></tr>
	    <tr><td>Pes Flag</td><td><?php echo $pes_flag; ?></td></tr>
	    <tr><td>Pes Info</td><td><?php echo $pes_info; ?></td></tr>
	    <tr><td></td><td><a href="<?php echo site_url('penarikansimpanan') ?>" class="btn btn-default">Cancel</a></td></tr>
	</table>
            </div>
        </div>
    </div>
    </div>
    </body>
</html>
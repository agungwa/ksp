<!doctype html>
<html>
    <head>
        <title></title>
    </head>
    <body>
    <div class="col-lg-12">
    <div class="ibox float-e-margins">
        <div class="ibox-title">
            <h2 style="margin-top:0px">Simpanan Read</h2>
            <div class="ibox-tools">
            </div>
        </div>
        <div class="ibox-content">
        
        <table class="table">
	    <tr><td>Sim Kode</td><td><?php echo $sim_kode; ?></td></tr>
	    <tr><td>Ang No</td><td><?php echo $ang_no; ?></td></tr>
	    <tr><td>Kar Kode</td><td><?php echo $kar_kode; ?></td></tr>
	    <tr><td>Bus Id</td><td><?php echo $bus_id; ?></td></tr>
	    <tr><td>Jsi Id</td><td><?php echo $jsi_id; ?></td></tr>
	    <tr><td>Jse Id</td><td><?php echo $jse_id; ?></td></tr>
	    <tr><td>Wil Kode</td><td><?php echo $wil_kode; ?></td></tr>
	    <tr><td>Sim Tglpendaftaran</td><td><?php echo $sim_tglpendaftaran; ?></td></tr>
	    <tr><td>Sim Status</td><td><?php echo $sim_status; ?></td></tr>
	    <tr><td>Sim Tgl</td><td><?php echo $sim_tgl; ?></td></tr>
	    <tr><td>Sim Flag</td><td><?php echo $sim_flag; ?></td></tr>
	    <tr><td>Sim Info</td><td><?php echo $sim_info; ?></td></tr>
	    <tr><td></td><td><a href="<?php echo site_url('simpanan') ?>" class="btn btn-default">Cancel</a></td></tr>
	</table>
            </div>
        </div>
    </div>
    </div>
    </body>
</html>
<!doctype html>
<html>
    <head>
        <title></title>
    </head>
    <body>
    <div class="row">
        <div class="col-lg-12">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h2 style="margin-top:0px"><?php echo $button ?> Jenispenarikan Simkesan </h2>
                </div>
        
        <form action="<?php echo $action; ?>" method="post">
        <div class="ibox-content col-md-12">
        <div class="col-md-3">
	    <div class="form-group">
            <label for="varchar">Jenis Penarikan <?php echo form_error('jps_jenis') ?></label>
            <input type="text" class="form-control" name="jps_jenis" id="jps_jenis" placeholder="Jenis Penarikan" value="<?php echo $jps_jenis; ?>" />
        </div>
	    <div class="form-group">
            <label for="float">Administrasi <?php echo form_error('jps_administrasi') ?></label>
            <input type="number" class="form-control" name="jps_administrasi" id="jps_administrasi" placeholder="Administrasi" value="<?php echo $jps_administrasi; ?>" />
        </div>
	    <div class="form-group">
            <label for="float">Persen Penarikan <?php echo form_error('jps_persenpenarikan') ?></label>
            <input type="number" step="0.01" class="form-control" name="jps_persenpenarikan" id="jps_persenpenarikan" placeholder="Persen Penarikan" value="<?php echo $jps_persenpenarikan; ?>" />
        </div>
	    <input type="hidden" name="jps_id" value="<?php echo $jps_id; ?>" /> 
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('jenispenarikansimkesan') ?>" class="btn btn-default">Batal</a>
        </div>
	</div>
            </form>
        </div>
        </div>
    </body>
</html>
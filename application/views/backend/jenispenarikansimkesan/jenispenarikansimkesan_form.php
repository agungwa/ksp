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
                    <h2 style="margin-top:0px"><?php echo $button ?> Jenispenarikansimkesan </h2>
                </div>
        
        <form action="<?php echo $action; ?>" method="post">
        <div class="ibox-content">
	    <div class="form-group">
            <label for="varchar">Jps Jenis <?php echo form_error('jps_jenis') ?></label>
            <input type="text" class="form-control" name="jps_jenis" id="jps_jenis" placeholder="Jps Jenis" value="<?php echo $jps_jenis; ?>" />
        </div>
	    <div class="form-group">
            <label for="float">Jps Administrasi <?php echo form_error('jps_administrasi') ?></label>
            <input type="text" class="form-control" name="jps_administrasi" id="jps_administrasi" placeholder="Jps Administrasi" value="<?php echo $jps_administrasi; ?>" />
        </div>
	    <div class="form-group">
            <label for="float">Jps Persenpenarikan <?php echo form_error('jps_persenpenarikan') ?></label>
            <input type="text" class="form-control" name="jps_persenpenarikan" id="jps_persenpenarikan" placeholder="Jps Persenpenarikan" value="<?php echo $jps_persenpenarikan; ?>" />
        </div>
	    <div class="form-group">
            <label for="datetime">Jps Tgl <?php echo form_error('jps_tgl') ?></label>
            <input type="text" class="form-control" name="jps_tgl" id="jps_tgl" placeholder="Jps Tgl" value="<?php echo $jps_tgl; ?>" />
        </div>
	    <div class="form-group">
            <label for="tinyint">Jps Flag <?php echo form_error('jps_flag') ?></label>
            <input type="text" class="form-control" name="jps_flag" id="jps_flag" placeholder="Jps Flag" value="<?php echo $jps_flag; ?>" />
        </div>
	    <div class="form-group">
            <label for="jps_info">Jps Info <?php echo form_error('jps_info') ?></label>
            <textarea class="form-control" rows="3" name="jps_info" id="jps_info" placeholder="Jps Info"><?php echo $jps_info; ?></textarea>
        </div>
	    <input type="hidden" name="jps_id" value="<?php echo $jps_id; ?>" /> 
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('jenispenarikansimkesan') ?>" class="btn btn-default">Cancel</a>
	</div>
            </form>
        </div>
        </div>
    </body>
</html>
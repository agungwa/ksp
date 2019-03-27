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
                    <h2 style="margin-top:0px"><?php echo $button ?> Jenispelunasan </h2>
                </div>
        
        <form action="<?php echo $action; ?>" method="post">
        <div class="ibox-content">
	    <div class="form-group">
            <label for="varchar">Jep Jenis <?php echo form_error('jep_jenis') ?></label>
            <input type="text" class="form-control" name="jep_jenis" id="jep_jenis" placeholder="Jep Jenis" value="<?php echo $jep_jenis; ?>" />
        </div>
	    <div class="form-group">
            <label for="jep_keterangan">Jep Keterangan <?php echo form_error('jep_keterangan') ?></label>
            <textarea class="form-control" rows="3" name="jep_keterangan" id="jep_keterangan" placeholder="Jep Keterangan"><?php echo $jep_keterangan; ?></textarea>
        </div>
	    <div class="form-group">
            <label for="datetime">Jep Tgl <?php echo form_error('jep_tgl') ?></label>
            <input type="text" class="form-control" name="jep_tgl" id="jep_tgl" placeholder="Jep Tgl" value="<?php echo $jep_tgl; ?>" />
        </div>
	    <div class="form-group">
            <label for="tinyint">Jep Flag <?php echo form_error('jep_flag') ?></label>
            <input type="text" class="form-control" name="jep_flag" id="jep_flag" placeholder="Jep Flag" value="<?php echo $jep_flag; ?>" />
        </div>
	    <div class="form-group">
            <label for="jep_info">Jep Info <?php echo form_error('jep_info') ?></label>
            <textarea class="form-control" rows="3" name="jep_info" id="jep_info" placeholder="Jep Info"><?php echo $jep_info; ?></textarea>
        </div>
	    <input type="hidden" name="jep_id" value="<?php echo $jep_id; ?>" /> 
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('jenispelunasan') ?>" class="btn btn-default">Cancel</a>
	</div>
            </form>
        </div>
        </div>
    </body>
</html>
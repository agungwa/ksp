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
                    <h2 style="margin-top:0px"><?php echo $button ?> Jenissimpanan </h2>
                </div>
        
        <form action="<?php echo $action; ?>" method="post">
        <div class="ibox-content">
	    <div class="form-group">
            <label for="varchar">Jsi Simpanan <?php echo form_error('jsi_simpanan') ?></label>
            <input type="text" class="form-control" name="jsi_simpanan" id="jsi_simpanan" placeholder="Jsi Simpanan" value="<?php echo $jsi_simpanan; ?>" />
        </div>
	    <div class="form-group">
            <label for="jsi_keterangan">Jsi Keterangan <?php echo form_error('jsi_keterangan') ?></label>
            <textarea class="form-control" rows="3" name="jsi_keterangan" id="jsi_keterangan" placeholder="Jsi Keterangan"><?php echo $jsi_keterangan; ?></textarea>
        </div>
	    <div class="form-group">
            <label for="datetime">Jsi Tgl <?php echo form_error('jsi_tgl') ?></label>
            <input type="text" class="form-control" name="jsi_tgl" id="jsi_tgl" placeholder="Jsi Tgl" value="<?php echo $jsi_tgl; ?>" />
        </div>
	    <div class="form-group">
            <label for="tinyint">Jsi Flag <?php echo form_error('jsi_flag') ?></label>
            <input type="text" class="form-control" name="jsi_flag" id="jsi_flag" placeholder="Jsi Flag" value="<?php echo $jsi_flag; ?>" />
        </div>
	    <div class="form-group">
            <label for="jsi_info">Jsi Info <?php echo form_error('jsi_info') ?></label>
            <textarea class="form-control" rows="3" name="jsi_info" id="jsi_info" placeholder="Jsi Info"><?php echo $jsi_info; ?></textarea>
        </div>
	    <input type="hidden" name="jsi_id" value="<?php echo $jsi_id; ?>" /> 
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('jenissimpanan') ?>" class="btn btn-default">Cancel</a>
	</div>
            </form>
        </div>
        </div>
    </body>
</html>
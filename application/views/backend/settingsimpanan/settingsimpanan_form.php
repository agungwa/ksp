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
                    <h2 style="margin-top:0px"><?php echo $button ?> Settingsimpanan </h2>
                </div>
        
        <form action="<?php echo $action; ?>" method="post">
        <div class="ibox-content">
	    <div class="form-group">
            <label for="varchar">Ses Nama <?php echo form_error('ses_nama') ?></label>
            <input type="text" class="form-control" name="ses_nama" id="ses_nama" placeholder="Ses Nama" value="<?php echo $ses_nama; ?>" />
        </div>
	    <div class="form-group">
            <label for="float">Ses Min <?php echo form_error('ses_min') ?></label>
            <input type="text" class="form-control" name="ses_min" id="ses_min" placeholder="Ses Min" value="<?php echo $ses_min; ?>" />
        </div>
	    <div class="form-group">
            <label for="float">Ses Max <?php echo form_error('ses_max') ?></label>
            <input type="text" class="form-control" name="ses_max" id="ses_max" placeholder="Ses Max" value="<?php echo $ses_max; ?>" />
        </div>
	    <div class="form-group">
            <label for="datetime">Ses Tgl <?php echo form_error('ses_tgl') ?></label>
            <input type="text" class="form-control" name="ses_tgl" id="ses_tgl" placeholder="Ses Tgl" value="<?php echo $ses_tgl; ?>" />
        </div>
	    <div class="form-group">
            <label for="tinyint">Ses Flag <?php echo form_error('ses_flag') ?></label>
            <input type="text" class="form-control" name="ses_flag" id="ses_flag" placeholder="Ses Flag" value="<?php echo $ses_flag; ?>" />
        </div>
	    <div class="form-group">
            <label for="ses_info">Ses Info <?php echo form_error('ses_info') ?></label>
            <textarea class="form-control" rows="3" name="ses_info" id="ses_info" placeholder="Ses Info"><?php echo $ses_info; ?></textarea>
        </div>
	    <input type="hidden" name="ses_id" value="<?php echo $ses_id; ?>" /> 
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('settingsimpanan') ?>" class="btn btn-default">Cancel</a>
	</div>
            </form>
        </div>
        </div>
    </body>
</html>
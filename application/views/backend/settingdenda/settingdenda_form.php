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
                    <h2 style="margin-top:0px"><?php echo $button ?> Settingdenda </h2>
                </div>
        
        <form action="<?php echo $action; ?>" method="post">
        <div class="ibox-content">
	    <div class="form-group">
            <label for="tinyint">Sed Hari <?php echo form_error('sed_hari') ?></label>
            <input type="text" class="form-control" name="sed_hari" id="sed_hari" placeholder="Sed Hari" value="<?php echo $sed_hari; ?>" />
        </div>
	    <div class="form-group">
            <label for="float">Sed Denda <?php echo form_error('sed_denda') ?></label>
            <input type="text" class="form-control" name="sed_denda" id="sed_denda" placeholder="Sed Denda" value="<?php echo $sed_denda; ?>" />
        </div>
	    <div class="form-group">
            <label for="datetime">Sed Tgl <?php echo form_error('sed_tgl') ?></label>
            <input type="text" class="form-control" name="sed_tgl" id="sed_tgl" placeholder="Sed Tgl" value="<?php echo $sed_tgl; ?>" />
        </div>
	    <div class="form-group">
            <label for="tinyint">Sed Flag <?php echo form_error('sed_flag') ?></label>
            <input type="text" class="form-control" name="sed_flag" id="sed_flag" placeholder="Sed Flag" value="<?php echo $sed_flag; ?>" />
        </div>
	    <div class="form-group">
            <label for="sed_info">Sed Info <?php echo form_error('sed_info') ?></label>
            <textarea class="form-control" rows="3" name="sed_info" id="sed_info" placeholder="Sed Info"><?php echo $sed_info; ?></textarea>
        </div>
	    <input type="hidden" name="sed_id" value="<?php echo $sed_id; ?>" /> 
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('settingdenda') ?>" class="btn btn-default">Cancel</a>
	</div>
            </form>
        </div>
        </div>
    </body>
</html>
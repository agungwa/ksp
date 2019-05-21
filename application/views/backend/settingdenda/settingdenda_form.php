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
                    <h2 style="margin-top:0px"><?php echo $button ?> Setting Denda </h2>
                </div>
        
        <form action="<?php echo $action; ?>" method="post">
        <div class="ibox-content col-md-12">
        <div class="col-md-12">
	    <div class="form-group">
            <label for="tinyint">Hari<?php echo form_error('sed_hari') ?></label>
            <input type="number" class="form-control" name="sed_hari" id="sed_hari" placeholder="Hari" value="<?php echo $sed_hari; ?>" />
        </div>
	    <div class="form-group">
            <label for="float">Denda (dalam persen)<?php echo form_error('sed_denda') ?></label>
            <input type="number" step='0.01' class="form-control" name="sed_denda" id="sed_denda" placeholder="Denda" value="<?php echo $sed_denda; ?>" />
        </div>
	    <input type="hidden" name="sed_id" value="<?php echo $sed_id; ?>" /> 
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('settingdenda') ?>" class="btn btn-default">Batal</a>
        </div>
	</div>
            </form>
        </div>
        </div>
    </body>
</html>
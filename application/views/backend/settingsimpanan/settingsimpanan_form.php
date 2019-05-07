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
                    <h2 style="margin-top:0px"><?php echo $button ?> Setting Simpanan </h2>
                </div>
        
        <form action="<?php echo $action; ?>" method="post">
        <div class="ibox-content col-md-3">
	    <div class="form-group col-md-12">
            <label for="varchar">Nama <?php echo form_error('ses_nama') ?></label>
            <input type="text" class="form-control" name="ses_nama" id="ses_nama" placeholder="Nama" value="<?php echo $ses_nama; ?>" />
        </div>
        
	    <div class="form-group col-md-12">
            <label for="float">Minimal<?php echo form_error('ses_min') ?></label>
            <input type="number" class="form-control" name="ses_min" id="ses_min" placeholder="Min" value="<?php echo $ses_min; ?>" />
        </div>
        
	    <div class="form-group col-md-12">
            <label for="float">Maximal<?php echo form_error('ses_max') ?></label>
            <input type="number" class="form-control" name="ses_max" id="ses_max" placeholder="Max" value="<?php echo $ses_max; ?>" />
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
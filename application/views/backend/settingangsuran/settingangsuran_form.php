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
                    <h2 style="margin-top:0px"><?php echo $button ?> Settingangsuran </h2>
                </div>
        
        <form action="<?php echo $action; ?>" method="post">
        <div class="ibox-content">
	    <div class="form-group">
            <label for="tinyint">Sea Tenor <?php echo form_error('sea_tenor') ?></label>
            <input type="text" class="form-control" name="sea_tenor" id="sea_tenor" placeholder="Sea Tenor" value="<?php echo $sea_tenor; ?>" />
        </div>
	    <div class="form-group">
            <label for="datetime">Sea Tgl <?php echo form_error('sea_tgl') ?></label>
            <input type="text" class="form-control" name="sea_tgl" id="sea_tgl" placeholder="Sea Tgl" value="<?php echo $sea_tgl; ?>" />
        </div>
	    <div class="form-group">
            <label for="tinyint">Sea Flag <?php echo form_error('sea_flag') ?></label>
            <input type="text" class="form-control" name="sea_flag" id="sea_flag" placeholder="Sea Flag" value="<?php echo $sea_flag; ?>" />
        </div>
	    <div class="form-group">
            <label for="sea_info">Sea Info <?php echo form_error('sea_info') ?></label>
            <textarea class="form-control" rows="3" name="sea_info" id="sea_info" placeholder="Sea Info"><?php echo $sea_info; ?></textarea>
        </div>
	    <input type="hidden" name="sea_id" value="<?php echo $sea_id; ?>" /> 
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('settingangsuran') ?>" class="btn btn-default">Cancel</a>
	</div>
            </form>
        </div>
        </div>
    </body>
</html>
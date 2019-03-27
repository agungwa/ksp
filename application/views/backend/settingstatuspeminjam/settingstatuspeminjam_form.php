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
                    <h2 style="margin-top:0px"><?php echo $button ?> Settingstatuspeminjam </h2>
                </div>
        
        <form action="<?php echo $action; ?>" method="post">
        <div class="ibox-content">
	    <div class="form-group">
            <label for="varchar">Ssp Namastatus <?php echo form_error('ssp_namastatus') ?></label>
            <input type="text" class="form-control" name="ssp_namastatus" id="ssp_namastatus" placeholder="Ssp Namastatus" value="<?php echo $ssp_namastatus; ?>" />
        </div>
	    <div class="form-group">
            <label for="datetime">Ssp Tgl <?php echo form_error('ssp_tgl') ?></label>
            <input type="text" class="form-control" name="ssp_tgl" id="ssp_tgl" placeholder="Ssp Tgl" value="<?php echo $ssp_tgl; ?>" />
        </div>
	    <div class="form-group">
            <label for="tinyint">Ssp Flag <?php echo form_error('ssp_flag') ?></label>
            <input type="text" class="form-control" name="ssp_flag" id="ssp_flag" placeholder="Ssp Flag" value="<?php echo $ssp_flag; ?>" />
        </div>
	    <div class="form-group">
            <label for="ssp_info">Ssp Info <?php echo form_error('ssp_info') ?></label>
            <textarea class="form-control" rows="3" name="ssp_info" id="ssp_info" placeholder="Ssp Info"><?php echo $ssp_info; ?></textarea>
        </div>
	    <input type="hidden" name="ssp_id" value="<?php echo $ssp_id; ?>" /> 
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('settingstatuspeminjam') ?>" class="btn btn-default">Cancel</a>
	</div>
            </form>
        </div>
        </div>
    </body>
</html>
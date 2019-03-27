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
                    <h2 style="margin-top:0px"><?php echo $button ?> Pelunasan </h2>
                </div>
        
        <form action="<?php echo $action; ?>" method="post">
        <div class="ibox-content">
	    <div class="form-group">
            <label for="tinyint">Jep Id <?php echo form_error('jep_id') ?></label>
            <input type="text" class="form-control" name="jep_id" id="jep_id" placeholder="Jep Id" value="<?php echo $jep_id; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Pin Id <?php echo form_error('pin_id') ?></label>
            <input type="text" class="form-control" name="pin_id" id="pin_id" placeholder="Pin Id" value="<?php echo $pin_id; ?>" />
        </div>
	    <div class="form-group">
            <label for="datetime">Pel Tgl <?php echo form_error('pel_tgl') ?></label>
            <input type="text" class="form-control" name="pel_tgl" id="pel_tgl" placeholder="Pel Tgl" value="<?php echo $pel_tgl; ?>" />
        </div>
	    <div class="form-group">
            <label for="tinyint">Pel Flag <?php echo form_error('pel_flag') ?></label>
            <input type="text" class="form-control" name="pel_flag" id="pel_flag" placeholder="Pel Flag" value="<?php echo $pel_flag; ?>" />
        </div>
	    <div class="form-group">
            <label for="pel_info">Pel Info <?php echo form_error('pel_info') ?></label>
            <textarea class="form-control" rows="3" name="pel_info" id="pel_info" placeholder="Pel Info"><?php echo $pel_info; ?></textarea>
        </div>
	    <input type="hidden" name="pel_id" value="<?php echo $pel_id; ?>" /> 
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('pelunasan') ?>" class="btn btn-default">Cancel</a>
	</div>
            </form>
        </div>
        </div>
    </body>
</html>
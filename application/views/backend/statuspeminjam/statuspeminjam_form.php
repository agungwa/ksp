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
                    <h2 style="margin-top:0px"><?php echo $button ?> Statuspeminjam </h2>
                </div>
        
        <form action="<?php echo $action; ?>" method="post">
        <div class="ibox-content">
	    <div class="form-group">
            <label for="varchar">Ang No <?php echo form_error('ang_no') ?></label>
            <input type="text" class="form-control" name="ang_no" id="ang_no" placeholder="Ang No" value="<?php echo $ang_no; ?>" />
        </div>
	    <div class="form-group">
            <label for="int">Ssp Id <?php echo form_error('ssp_id') ?></label>
            <input type="text" class="form-control" name="ssp_id" id="ssp_id" placeholder="Ssp Id" value="<?php echo $ssp_id; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Pin Id <?php echo form_error('pin_id') ?></label>
            <input type="text" class="form-control" name="pin_id" id="pin_id" placeholder="Pin Id" value="<?php echo $pin_id; ?>" />
        </div>
	    <div class="form-group">
            <label for="datetime">Stp Tgl <?php echo form_error('stp_tgl') ?></label>
            <input type="text" class="form-control" name="stp_tgl" id="stp_tgl" placeholder="Stp Tgl" value="<?php echo $stp_tgl; ?>" />
        </div>
	    <div class="form-group">
            <label for="tinyint">Stp Flag <?php echo form_error('stp_flag') ?></label>
            <input type="text" class="form-control" name="stp_flag" id="stp_flag" placeholder="Stp Flag" value="<?php echo $stp_flag; ?>" />
        </div>
	    <div class="form-group">
            <label for="stp_info">Stp Info <?php echo form_error('stp_info') ?></label>
            <textarea class="form-control" rows="3" name="stp_info" id="stp_info" placeholder="Stp Info"><?php echo $stp_info; ?></textarea>
        </div>
	    <input type="hidden" name="stp_id" value="<?php echo $stp_id; ?>" /> 
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('statuspeminjam') ?>" class="btn btn-default">Cancel</a>
	</div>
            </form>
        </div>
        </div>
    </body>
</html>
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
                    <h2 style="margin-top:0px"><?php echo $button ?> Simpananpokok </h2>
                </div>
        
        <form action="<?php echo $action; ?>" method="post">
        <div class="ibox-content">
	    <div class="form-group">
            <label for="varchar">Ang No <?php echo form_error('ang_no') ?></label>
            <input type="text" class="form-control" name="ang_no" id="ang_no" placeholder="Ang No" value="<?php echo $ang_no; ?>" />
        </div>
	    <div class="form-group">
            <label for="int">Ses Id <?php echo form_error('ses_id') ?></label>
            <input type="text" class="form-control" name="ses_id" id="ses_id" placeholder="Ses Id" value="<?php echo $ses_id; ?>" />
        </div>
	    <div class="form-group">
            <label for="datetime">Sip Tglbayar <?php echo form_error('sip_tglbayar') ?></label>
            <input type="text" class="form-control" name="sip_tglbayar" id="sip_tglbayar" placeholder="Sip Tglbayar" value="<?php echo $sip_tglbayar; ?>" />
        </div>
	    <div class="form-group">
            <label for="datetime">Sip Tgl <?php echo form_error('sip_tgl') ?></label>
            <input type="text" class="form-control" name="sip_tgl" id="sip_tgl" placeholder="Sip Tgl" value="<?php echo $sip_tgl; ?>" />
        </div>
	    <div class="form-group">
            <label for="tinyint">Sip Flag <?php echo form_error('sip_flag') ?></label>
            <input type="text" class="form-control" name="sip_flag" id="sip_flag" placeholder="Sip Flag" value="<?php echo $sip_flag; ?>" />
        </div>
	    <div class="form-group">
            <label for="sip_info">Sip Info <?php echo form_error('sip_info') ?></label>
            <textarea class="form-control" rows="3" name="sip_info" id="sip_info" placeholder="Sip Info"><?php echo $sip_info; ?></textarea>
        </div>
	    <input type="hidden" name="sip_id" value="<?php echo $sip_id; ?>" /> 
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('simpananpokok') ?>" class="btn btn-default">Cancel</a>
	</div>
            </form>
        </div>
        </div>
    </body>
</html>
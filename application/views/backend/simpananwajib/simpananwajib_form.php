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
                    <h2 style="margin-top:0px"><?php echo $button ?> Simpananwajib </h2>
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
            <label for="datetime">Siw Tglbayar <?php echo form_error('siw_tglbayar') ?></label>
            <input type="text" class="form-control" name="siw_tglbayar" id="siw_tglbayar" placeholder="Siw Tglbayar" value="<?php echo $siw_tglbayar; ?>" />
        </div>
	    <div class="form-group">
            <label for="tinyint">Siw Status <?php echo form_error('siw_status') ?></label>
            <input type="text" class="form-control" name="siw_status" id="siw_status" placeholder="Siw Status" value="<?php echo $siw_status; ?>" />
        </div>
	    <div class="form-group">
            <label for="datetime">Siw Tglambil <?php echo form_error('siw_tglambil') ?></label>
            <input type="text" class="form-control" name="siw_tglambil" id="siw_tglambil" placeholder="Siw Tglambil" value="<?php echo $siw_tglambil; ?>" />
        </div>
	    <div class="form-group">
            <label for="datetime">Siw Tgl <?php echo form_error('siw_tgl') ?></label>
            <input type="text" class="form-control" name="siw_tgl" id="siw_tgl" placeholder="Siw Tgl" value="<?php echo $siw_tgl; ?>" />
        </div>
	    <div class="form-group">
            <label for="tinyint">Siw Flag <?php echo form_error('siw_flag') ?></label>
            <input type="text" class="form-control" name="siw_flag" id="siw_flag" placeholder="Siw Flag" value="<?php echo $siw_flag; ?>" />
        </div>
	    <div class="form-group">
            <label for="siw_info">Siw Info <?php echo form_error('siw_info') ?></label>
            <textarea class="form-control" rows="3" name="siw_info" id="siw_info" placeholder="Siw Info"><?php echo $siw_info; ?></textarea>
        </div>
	    <input type="hidden" name="siw_id" value="<?php echo $siw_id; ?>" /> 
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('simpananwajib') ?>" class="btn btn-default">Cancel</a>
	</div>
            </form>
        </div>
        </div>
    </body>
</html>
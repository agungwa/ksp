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
                    <h2 style="margin-top:0px"><?php echo $button ?> Bungapinjaman </h2>
                </div>
        
        <form action="<?php echo $action; ?>" method="post">
        <div class="ibox-content">
	    <div class="form-group">
            <label for="float">Bup Bunga <?php echo form_error('bup_bunga') ?></label>
            <input type="text" class="form-control" name="bup_bunga" id="bup_bunga" placeholder="Bup Bunga" value="<?php echo $bup_bunga; ?>" />
        </div>
	    <div class="form-group">
            <label for="datetime">Bub Tgl <?php echo form_error('bub_tgl') ?></label>
            <input type="text" class="form-control" name="bub_tgl" id="bub_tgl" placeholder="Bub Tgl" value="<?php echo $bub_tgl; ?>" />
        </div>
	    <div class="form-group">
            <label for="tinyint">Bub Flag <?php echo form_error('bub_flag') ?></label>
            <input type="text" class="form-control" name="bub_flag" id="bub_flag" placeholder="Bub Flag" value="<?php echo $bub_flag; ?>" />
        </div>
	    <div class="form-group">
            <label for="bup_info">Bup Info <?php echo form_error('bup_info') ?></label>
            <textarea class="form-control" rows="3" name="bup_info" id="bup_info" placeholder="Bup Info"><?php echo $bup_info; ?></textarea>
        </div>
	    <input type="hidden" name="bup_id" value="<?php echo $bup_id; ?>" /> 
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('bungapinjaman') ?>" class="btn btn-default">Cancel</a>
	</div>
            </form>
        </div>
        </div>
    </body>
</html>
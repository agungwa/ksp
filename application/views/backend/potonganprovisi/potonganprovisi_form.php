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
                    <h2 style="margin-top:0px"><?php echo $button ?> Potonganprovisi </h2>
                </div>
        
        <form action="<?php echo $action; ?>" method="post">
        <div class="ibox-content">
	    <div class="form-group">
            <label for="float">Pop Potongan <?php echo form_error('pop_potongan') ?></label>
            <input type="text" class="form-control" name="pop_potongan" id="pop_potongan" placeholder="Pop Potongan" value="<?php echo $pop_potongan; ?>" />
        </div>
	    <div class="form-group">
            <label for="datetime">Pop Tgl <?php echo form_error('pop_tgl') ?></label>
            <input type="text" class="form-control" name="pop_tgl" id="pop_tgl" placeholder="Pop Tgl" value="<?php echo $pop_tgl; ?>" />
        </div>
	    <div class="form-group">
            <label for="tinyint">Pop Flag <?php echo form_error('pop_flag') ?></label>
            <input type="text" class="form-control" name="pop_flag" id="pop_flag" placeholder="Pop Flag" value="<?php echo $pop_flag; ?>" />
        </div>
	    <div class="form-group">
            <label for="pop_info">Pop Info <?php echo form_error('pop_info') ?></label>
            <textarea class="form-control" rows="3" name="pop_info" id="pop_info" placeholder="Pop Info"><?php echo $pop_info; ?></textarea>
        </div>
	    <input type="hidden" name="pop_id" value="<?php echo $pop_id; ?>" /> 
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('potonganprovisi') ?>" class="btn btn-default">Cancel</a>
	</div>
            </form>
        </div>
        </div>
    </body>
</html>
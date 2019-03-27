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
                    <h2 style="margin-top:0px"><?php echo $button ?> Tutupinvestasiberjangka </h2>
                </div>
        
        <form action="<?php echo $action; ?>" method="post">
        <div class="ibox-content">
	    <div class="form-group">
            <label for="varchar">Ivb Kode <?php echo form_error('ivb_kode') ?></label>
            <input type="text" class="form-control" name="ivb_kode" id="ivb_kode" placeholder="Ivb Kode" value="<?php echo $ivb_kode; ?>" />
        </div>
	    <div class="form-group">
            <label for="datetime">Tib Tgltutup <?php echo form_error('tib_tgltutup') ?></label>
            <input type="text" class="form-control" name="tib_tgltutup" id="tib_tgltutup" placeholder="Tib Tgltutup" value="<?php echo $tib_tgltutup; ?>" />
        </div>
	    <div class="form-group">
            <label for="tib_catatan">Tib Catatan <?php echo form_error('tib_catatan') ?></label>
            <textarea class="form-control" rows="3" name="tib_catatan" id="tib_catatan" placeholder="Tib Catatan"><?php echo $tib_catatan; ?></textarea>
        </div>
	    <div class="form-group">
            <label for="datetime">Tib Tgl <?php echo form_error('tib_tgl') ?></label>
            <input type="text" class="form-control" name="tib_tgl" id="tib_tgl" placeholder="Tib Tgl" value="<?php echo $tib_tgl; ?>" />
        </div>
	    <div class="form-group">
            <label for="tinyint">Tib Flag <?php echo form_error('tib_flag') ?></label>
            <input type="text" class="form-control" name="tib_flag" id="tib_flag" placeholder="Tib Flag" value="<?php echo $tib_flag; ?>" />
        </div>
	    <div class="form-group">
            <label for="tib_info">Tib Info <?php echo form_error('tib_info') ?></label>
            <textarea class="form-control" rows="3" name="tib_info" id="tib_info" placeholder="Tib Info"><?php echo $tib_info; ?></textarea>
        </div>
	    <input type="hidden" name="tib_id" value="<?php echo $tib_id; ?>" /> 
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('tutupinvestasiberjangka') ?>" class="btn btn-default">Cancel</a>
	</div>
            </form>
        </div>
        </div>
    </body>
</html>
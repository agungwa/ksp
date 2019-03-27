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
                    <h2 style="margin-top:0px"><?php echo $button ?> Mutasipinjaman </h2>
                </div>
        
        <form action="<?php echo $action; ?>" method="post">
        <div class="ibox-content">
	    <div class="form-group">
            <label for="varchar">Pin Id <?php echo form_error('pin_id') ?></label>
            <input type="text" class="form-control" name="pin_id" id="pin_id" placeholder="Pin Id" value="<?php echo $pin_id; ?>" />
        </div>
	    <div class="form-group">
            <label for="datetime">Mup Tglmutasi <?php echo form_error('mup_tglmutasi') ?></label>
            <input type="text" class="form-control" name="mup_tglmutasi" id="mup_tglmutasi" placeholder="Mup Tglmutasi" value="<?php echo $mup_tglmutasi; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Mup Asal <?php echo form_error('mup_asal') ?></label>
            <input type="text" class="form-control" name="mup_asal" id="mup_asal" placeholder="Mup Asal" value="<?php echo $mup_asal; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Mup Tujuan <?php echo form_error('mup_tujuan') ?></label>
            <input type="text" class="form-control" name="mup_tujuan" id="mup_tujuan" placeholder="Mup Tujuan" value="<?php echo $mup_tujuan; ?>" />
        </div>
	    <div class="form-group">
            <label for="tinyint">Mup Status <?php echo form_error('mup_status') ?></label>
            <input type="text" class="form-control" name="mup_status" id="mup_status" placeholder="Mup Status" value="<?php echo $mup_status; ?>" />
        </div>
	    <div class="form-group">
            <label for="datetime">Mup Tgl <?php echo form_error('mup_tgl') ?></label>
            <input type="text" class="form-control" name="mup_tgl" id="mup_tgl" placeholder="Mup Tgl" value="<?php echo $mup_tgl; ?>" />
        </div>
	    <div class="form-group">
            <label for="tinyint">Mup Flag <?php echo form_error('mup_flag') ?></label>
            <input type="text" class="form-control" name="mup_flag" id="mup_flag" placeholder="Mup Flag" value="<?php echo $mup_flag; ?>" />
        </div>
	    <div class="form-group">
            <label for="mup_info">Mup Info <?php echo form_error('mup_info') ?></label>
            <textarea class="form-control" rows="3" name="mup_info" id="mup_info" placeholder="Mup Info"><?php echo $mup_info; ?></textarea>
        </div>
	    <input type="hidden" name="mup_id" value="<?php echo $mup_id; ?>" /> 
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('mutasipinjaman') ?>" class="btn btn-default">Cancel</a>
	</div>
            </form>
        </div>
        </div>
    </body>
</html>
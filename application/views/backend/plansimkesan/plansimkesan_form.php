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
                    <h2 style="margin-top:0px"><?php echo $button ?> Plansimkesan </h2>
                </div>
        
        <form action="<?php echo $action; ?>" method="post">
        <div class="ibox-content">
	    <div class="form-group">
            <label for="varchar">Psk Plan <?php echo form_error('psk_plan') ?></label>
            <input type="text" class="form-control" name="psk_plan" id="psk_plan" placeholder="Psk Plan" value="<?php echo $psk_plan; ?>" />
        </div>
	    <div class="form-group">
            <label for="float">Psk Setoran <?php echo form_error('psk_setoran') ?></label>
            <input type="text" class="form-control" name="psk_setoran" id="psk_setoran" placeholder="Psk Setoran" value="<?php echo $psk_setoran; ?>" />
        </div>
	    <div class="form-group">
            <label for="psk_keterangan">Psk Keterangan <?php echo form_error('psk_keterangan') ?></label>
            <textarea class="form-control" rows="3" name="psk_keterangan" id="psk_keterangan" placeholder="Psk Keterangan"><?php echo $psk_keterangan; ?></textarea>
        </div>
	    <div class="form-group">
            <label for="datetime">Psk Tgl <?php echo form_error('psk_tgl') ?></label>
            <input type="text" class="form-control" name="psk_tgl" id="psk_tgl" placeholder="Psk Tgl" value="<?php echo $psk_tgl; ?>" />
        </div>
	    <div class="form-group">
            <label for="tinyint">Psk Flag <?php echo form_error('psk_flag') ?></label>
            <input type="text" class="form-control" name="psk_flag" id="psk_flag" placeholder="Psk Flag" value="<?php echo $psk_flag; ?>" />
        </div>
	    <div class="form-group">
            <label for="psk_info">Psk Info <?php echo form_error('psk_info') ?></label>
            <textarea class="form-control" rows="3" name="psk_info" id="psk_info" placeholder="Psk Info"><?php echo $psk_info; ?></textarea>
        </div>
	    <input type="hidden" name="psk_id" value="<?php echo $psk_id; ?>" /> 
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('plansimkesan') ?>" class="btn btn-default">Cancel</a>
	</div>
            </form>
        </div>
        </div>
    </body>
</html>
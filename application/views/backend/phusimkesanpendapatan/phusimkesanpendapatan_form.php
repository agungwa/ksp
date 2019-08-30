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
                    <h2 style="margin-top:0px"><?php echo $button ?> Phu simkesan pendapatan </h2>
                </div>
        
        <form action="<?php echo $action; ?>" method="post">
        <div class="ibox-content">
	    <div class="form-group">
            <label for="float">Phsp Klaim <?php echo form_error('phsp_klaim') ?></label>
            <input type="text" class="form-control" name="phsp_klaim" id="phsp_klaim" placeholder="Phsp Klaim" value="<?php echo $phsp_klaim; ?>" />
        </div>
	    <div class="form-group">
            <label for="float">Phsp Tarik <?php echo form_error('phsp_tarik') ?></label>
            <input type="text" class="form-control" name="phsp_tarik" id="phsp_tarik" placeholder="Phsp Tarik" value="<?php echo $phsp_tarik; ?>" />
        </div>
	    <div class="form-group">
            <label for="float">Phsp Gugur <?php echo form_error('phsp_gugur') ?></label>
            <input type="text" class="form-control" name="phsp_gugur" id="phsp_gugur" placeholder="Phsp Gugur" value="<?php echo $phsp_gugur; ?>" />
        </div>
	    <div class="form-group">
            <label for="float">Phsp Administrasi <?php echo form_error('phsp_administrasi') ?></label>
            <input type="text" class="form-control" name="phsp_administrasi" id="phsp_administrasi" placeholder="Phsp Administrasi" value="<?php echo $phsp_administrasi; ?>" />
        </div>
	    <div class="form-group">
            <label for="float">Phsp Lainlain <?php echo form_error('phsp_lainlain') ?></label>
            <input type="text" class="form-control" name="phsp_lainlain" id="phsp_lainlain" placeholder="Phsp Lainlain" value="<?php echo $phsp_lainlain; ?>" />
        </div>
	    <input type="hidden" name="phsp_id" value="<?php echo $phsp_id; ?>" /> 
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('phusimkesanpendapatan') ?>" class="btn btn-default">Cancel</a>
	</div>
            </form>
        </div>
        </div>
    </body>
</html>
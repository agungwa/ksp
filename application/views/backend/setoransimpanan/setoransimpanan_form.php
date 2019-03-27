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
                    <h2 style="margin-top:0px"><?php echo $button ?> Setoransimpanan </h2>
                </div>
        
        <form action="<?php echo $action; ?>" method="post">
        <div class="ibox-content">
	    <div class="form-group">
            <label for="varchar">Sim Kode <?php echo form_error('sim_kode') ?></label>
            <input type="text" class="form-control" name="sim_kode" id="sim_kode" placeholder="Sim Kode" value="<?php echo $sim_kode; ?>" />
        </div>
	    <div class="form-group">
            <label for="datetime">Ssi Tglsetor <?php echo form_error('ssi_tglsetor') ?></label>
            <input type="text" class="form-control" name="ssi_tglsetor" id="ssi_tglsetor" placeholder="Ssi Tglsetor" value="<?php echo $ssi_tglsetor; ?>" />
        </div>
	    <div class="form-group">
            <label for="float">Ssi Jmlsetor <?php echo form_error('ssi_jmlsetor') ?></label>
            <input type="text" class="form-control" name="ssi_jmlsetor" id="ssi_jmlsetor" placeholder="Ssi Jmlsetor" value="<?php echo $ssi_jmlsetor; ?>" />
        </div>
	    <div class="form-group">
            <label for="float">Ssi Jmlbunga <?php echo form_error('ssi_jmlbunga') ?></label>
            <input type="text" class="form-control" name="ssi_jmlbunga" id="ssi_jmlbunga" placeholder="Ssi Jmlbunga" value="<?php echo $ssi_jmlbunga; ?>" />
        </div>
	    <div class="form-group">
            <label for="datetime">Ssi Tgl <?php echo form_error('ssi_tgl') ?></label>
            <input type="text" class="form-control" name="ssi_tgl" id="ssi_tgl" placeholder="Ssi Tgl" value="<?php echo $ssi_tgl; ?>" />
        </div>
	    <div class="form-group">
            <label for="tinyint">Ssi Flag <?php echo form_error('ssi_flag') ?></label>
            <input type="text" class="form-control" name="ssi_flag" id="ssi_flag" placeholder="Ssi Flag" value="<?php echo $ssi_flag; ?>" />
        </div>
	    <div class="form-group">
            <label for="ssi_info">Ssi Info <?php echo form_error('ssi_info') ?></label>
            <textarea class="form-control" rows="3" name="ssi_info" id="ssi_info" placeholder="Ssi Info"><?php echo $ssi_info; ?></textarea>
        </div>
	    <input type="hidden" name="ssi_id" value="<?php echo $ssi_id; ?>" /> 
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('setoransimpanan') ?>" class="btn btn-default">Cancel</a>
	</div>
            </form>
        </div>
        </div>
    </body>
</html>
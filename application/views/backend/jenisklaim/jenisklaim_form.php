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
                    <h2 style="margin-top:0px"><?php echo $button ?> Jenisklaim </h2>
                </div>
        
        <form action="<?php echo $action; ?>" method="post">
        <div class="ibox-content">
	    <div class="form-group">
            <label for="varchar">Jkl Keuntungan <?php echo form_error('jkl_keuntungan') ?></label>
            <input type="text" class="form-control" name="jkl_keuntungan" id="jkl_keuntungan" placeholder="Jkl Keuntungan" value="<?php echo $jkl_keuntungan; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Jkl Plan <?php echo form_error('jkl_plan') ?></label>
            <input type="text" class="form-control" name="jkl_plan" id="jkl_plan" placeholder="Jkl Plan" value="<?php echo $jkl_plan; ?>" />
        </div>
	    <div class="form-group">
            <label for="tinyint">Jkl Tahunke <?php echo form_error('jkl_tahunke') ?></label>
            <input type="text" class="form-control" name="jkl_tahunke" id="jkl_tahunke" placeholder="Jkl Tahunke" value="<?php echo $jkl_tahunke; ?>" />
        </div>
	    <div class="form-group">
            <label for="float">Jkl Nominal <?php echo form_error('jkl_nominal') ?></label>
            <input type="text" class="form-control" name="jkl_nominal" id="jkl_nominal" placeholder="Jkl Nominal" value="<?php echo $jkl_nominal; ?>" />
        </div>
	    <div class="form-group">
            <label for="jkl_keterangan">Jkl Keterangan <?php echo form_error('jkl_keterangan') ?></label>
            <textarea class="form-control" rows="3" name="jkl_keterangan" id="jkl_keterangan" placeholder="Jkl Keterangan"><?php echo $jkl_keterangan; ?></textarea>
        </div>
	    <div class="form-group">
            <label for="float">Jkl Administrasi <?php echo form_error('jkl_administrasi') ?></label>
            <input type="text" class="form-control" name="jkl_administrasi" id="jkl_administrasi" placeholder="Jkl Administrasi" value="<?php echo $jkl_administrasi; ?>" />
        </div>
	    <input type="hidden" name="jkl_id" value="<?php echo $jkl_id; ?>" /> 
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('jenisklaim') ?>" class="btn btn-default">Cancel</a>
	</div>
            </form>
        </div>
        </div>
    </body>
</html>
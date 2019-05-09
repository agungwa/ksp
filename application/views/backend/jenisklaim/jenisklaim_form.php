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
        <div class="ibox-content col-md-12">
        <div class="col-md-4">
	    <div class="form-group">
            <label for="varchar">Keuntungan <?php echo form_error('jkl_keuntungan') ?></label>
            <input type="text" class="form-control" name="jkl_keuntungan" id="jkl_keuntungan" placeholder="Keuntungan" value="<?php echo $jkl_keuntungan; ?>" />
        </div>
        <div class="form-group">
            <label for="varchar">Plan Simkesan <?php echo form_error('jkl_plan') ?></label>
            <div class="input-group">
            <input type="hidden" name="jkl_plan" id="jkl_plan" value="<?php echo $jkl_plan; ?>" />
            <input type="text" class="form-control" name="nm_jkl_plan" id="nm_jkl_plan" placeholder="Plan Simkesan" value="<?php echo $nm_jkl_plan; ?>" readonly/>
            <div class="input-group-addon">
                <span onclick="lookup('<?=base_url()?>plansimkesan/lookup','psk_id');" style="cursor: pointer;">Cari</span>
            </div>
            </div>
        </div>
	    <div class="form-group">
            <label for="tinyint">Tahunke <?php echo form_error('jkl_tahunke') ?></label>
            <input type="number" class="form-control" name="jkl_tahunke" id="jkl_tahunke" placeholder="Tahunke" value="<?php echo $jkl_tahunke; ?>" />
        </div>
	    <div class="form-group">
            <label for="float">Nominal <?php echo form_error('jkl_nominal') ?></label>
            <input type="number" class="form-control" name="jkl_nominal" id="jkl_nominal" placeholder="Nominal" value="<?php echo $jkl_nominal; ?>" />
        </div>
	    <div class="form-group">
            <label for="jkl_keterangan">Keterangan <?php echo form_error('jkl_keterangan') ?></label>
            <textarea class="form-control" rows="3" name="jkl_keterangan" id="jkl_keterangan" placeholder="Keterangan"><?php echo $jkl_keterangan; ?></textarea>
        </div>
	    <div class="form-group">
            <label for="float">Administrasi <?php echo form_error('jkl_administrasi') ?></label>
            <input type="number" class="form-control" name="jkl_administrasi" id="jkl_administrasi" placeholder="Administrasi" value="<?php echo $jkl_administrasi; ?>" />
        </div>
	    <input type="hidden" name="jkl_id" value="<?php echo $jkl_id; ?>" /> 
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('jenisklaim') ?>" class="btn btn-default">Cancel</a>
        </div>
	</div>
            </form>
        </div>
        </div>
    </body>
</html>
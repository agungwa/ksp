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
        <div class="ibox-content col-md-12">
        <div class="col-md-4">
	    <div class="form-group">
            <label for="varchar">Plan Simkesan <?php echo form_error('psk_plan') ?></label>
            <input type="text" class="form-control" name="psk_plan" id="psk_plan" placeholder="Plan Simkesan" value="<?php echo $psk_plan; ?>" />
        </div>
	    <div class="form-group">
            <label for="float">Setoran <?php echo form_error('psk_setoran') ?></label>
            <input type="number" class="form-control" name="psk_setoran" id="psk_setoran" placeholder="Psk Setoran" value="<?php echo $psk_setoran; ?>" />
        </div>
	    <div class="form-group">
            <label for="psk_keterangan">Keterangan <?php echo form_error('psk_keterangan') ?></label>
            <textarea class="form-control" rows="3" name="psk_keterangan" id="psk_keterangan" placeholder="Keterangan"><?php echo $psk_keterangan; ?></textarea>
        </div>
	    <input type="hidden" name="psk_id" value="<?php echo $psk_id; ?>" /> 
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('plansimkesan') ?>" class="btn btn-default">Batal</a>
        </div>
	</div>
            </form>
        </div>
        </div>
    </body>
</html>
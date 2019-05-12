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
                    <h2 style="margin-top:0px"><?php echo $button ?> Pelunasan </h2>
                </div>
        
        <form action="<?php echo $action; ?>" method="post">
        <div class="ibox-content col-md-12">
        <div class="col-md-4">
        <div class="form-group">
            <label for="int">Angsuran<?php echo form_error('jep_id') ?></label>
            <div class="input-group">
            <input type="hidden" name="jep_id" id="jep_id" value="<?php echo $jep_id; ?>" />
            <input type="text" class="form-control" name="nm_jep_id" id="nm_jep_id" placeholder="Angsuran" value="<?php echo $nm_jep_id; ?>" readonly/>
            <div class="input-group-addon">
                <span onclick="lookup('<?=base_url()?>Jenispelunasan/lookup','jep_id');" style="cursor: pointer;">Cari</span>
            </div>
            </div>
        </div>
        <div class="form-group">
            <label for="int">Rekening Pinjaman<?php echo form_error('pin_id') ?></label>
            <div class="input-group">
            <input type="hidden" name="pin_id" id="pin_id" value="<?php echo $pin_id; ?>" />
            <input type="text" class="form-control" name="nm_pin_id" id="nm_pin_id" placeholder="Pinjaman" value="<?php echo $nm_pin_id; ?>" readonly/>
            <div class="input-group-addon">
                <span onclick="lookup('<?=base_url()?>Pinjaman/lookup','pin_id');" style="cursor: pointer;">Cari</span>
            </div>
            </div>
        </div>
	    <input type="hidden" name="pel_id" value="<?php echo $pel_id; ?>" /> 
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('pelunasan') ?>" class="btn btn-default">Cancel</a>
        </div>
	</div>
            </form>
        </div>
        </div>
    </body>
</html>
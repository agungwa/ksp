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
                    <h2 style="margin-top:0px"><?php echo $button ?> Dendaangsuran </h2>
                </div>
        
        <form action="<?php echo $action; ?>" method="post">
        <div class="ibox-content">
        <div class="form-group">
            <label for="int">Ags Id <?php echo form_error('ags_id') ?></label>
            <div class="input-group">
            <!-- <input type="hidden" name="ags_id" id="ags_id" value="<?php echo $ags_id; ?>" /> -->
            <input type="hidden" name="ags_id" id="ags_id" value="69" />
            <input type="text" class="form-control" name="nm_ags_id" id="nm_ags_id" placeholder="Angsuran" value="<?php echo $nm_ags_id; ?>" readonly/>
            <div class="input-group-addon">
                <span onclick="lookup('<?=base_url()?>angsuran/lookup','ags_id');" style="cursor: pointer;">Cari</span>
            </div>
            </div>
        </div>

        <div class="form-group">
            <label for="int">Sed Id <?php echo form_error('sed_id') ?></label>
            <div class="input-group">
            <!-- <input type="hidden" name="sed_id" id="sed_id" value="<?php echo $sed_id; ?>" /> -->
            <input type="hidden" name="sed_id" id="sed_id" value="69" />
            <input type="text" class="form-control" name="nm_sed_id" id="nm_sed_id" placeholder="Setting Denda" value="<?php echo $nm_sed_id; ?>" readonly/>
            <div class="input-group-addon">
                <span onclick="lookup('<?=base_url()?>settingdenda/lookup','sed_id');" style="cursor: pointer;">Cari</span>
            </div>
            </div>
        </div>

	    <input type="hidden" name="dnd_id" value="<?php echo $dnd_id; ?>" /> 
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('dendaangsuran') ?>" class="btn btn-default">Cancel</a>
	</div>
            </form>
        </div>
        </div>
    </body>
</html>
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
                    <h2 style="margin-top:0px"><?php echo $button ?> Wilayah </h2>
                </div>
        
        <form action="<?php echo $action; ?>" method="post">
        <div class="ibox-content">
        <?php if ($button == 'Create') { ?>
        <div class="form-group">
            <label for="varchar">Wil Kode <?php echo form_error('wil_kode') ?></label>
            <input type="text" class="form-control" name="wil_kode" id="wil_kode" placeholder="Wil Kode" value="<?php echo $wil_kode; ?>" />
        </div>
        <?php } else {?>
            <input type="hidden" name="wil_kode" value="<?php echo $wil_kode; ?>" /> 
        <?php } ?>
        
	    <div class="form-group">
            <label for="varchar">Wil Nama <?php echo form_error('wil_nama') ?></label>
            <input type="text" class="form-control" name="wil_nama" id="wil_nama" placeholder="Wil Nama" value="<?php echo $wil_nama; ?>" />
        </div>

	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('wilayah') ?>" class="btn btn-default">Cancel</a>
	</div>
            </form>
        </div>
        </div>
    </body>
</html>
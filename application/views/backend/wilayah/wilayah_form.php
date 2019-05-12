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
        <div class="ibox-content col-md-12">
        <?php if ($button == 'Create') { ?>
        <div class="col-md-6">
        <div class="form-group">
            <label for="varchar">Kode Wilayah<?php echo form_error('wil_kode') ?></label>
            <input type="text" class="form-control" name="wil_kode" id="wil_kode" placeholder="Kode Wilayah" value="<?php echo $wil_kode; ?>" />
        </div>
        <?php } else {?>
            <input type="hidden" name="wil_kode" value="<?php echo $wil_kode; ?>" /> 
        <?php } ?>
        
	    <div class="form-group">
            <label for="varchar">Nama Wilayah <?php echo form_error('wil_nama') ?></label>
            <input type="text" class="form-control" name="wil_nama" id="wil_nama" placeholder="Nama Wilayah" value="<?php echo $wil_nama; ?>" />
        </div>

	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('wilayah') ?>" class="btn btn-default">Batal</a>
        </div>
	</div>
            </form>
        </div>
        </div>
    </body>
</html>
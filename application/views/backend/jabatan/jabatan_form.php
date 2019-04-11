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
                    <h2 style="margin-top:0px"><?php echo $button ?> Jabatan </h2>
                </div>
        
        <form action="<?php echo $action; ?>" method="post">
        <div class="ibox-content">
        <?php if ($button == 'Create') { ?>
        <div class="form-group">
            <label for="varchar">Jab Kode <?php echo form_error('jab_kode') ?></label>
            <input type="text" class="form-control" name="jab_kode" id="jab_kode" placeholder="Jab Kode" value="<?php echo $jab_kode; ?>" />
        </div>
        <?php } else {?>
            <input type="hidden" name="jab_kode" value="<?php echo $jab_kode; ?>" /> 
        <?php } ?>

	    <div class="form-group">
            <label for="varchar">Jab Nama <?php echo form_error('jab_nama') ?></label>
            <input type="text" class="form-control" name="jab_nama" id="jab_nama" placeholder="Jab Nama" value="<?php echo $jab_nama; ?>" />
        </div>
        
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('jabatan') ?>" class="btn btn-default">Cancel</a>
	</div>
            </form>
        </div>
        </div>
    </body>
</html>
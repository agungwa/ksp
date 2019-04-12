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
                    <h2 style="margin-top:0px"><?php echo $button ?> Settingkategoripeminjam </h2>
                </div>
        
        <form action="<?php echo $action; ?>" method="post">
        <div class="ibox-content">
	    <div class="form-group">
            <label for="varchar">Skp Kategori <?php echo form_error('skp_kategori') ?></label>
            <input type="text" class="form-control" name="skp_kategori" id="skp_kategori" placeholder="Skp Kategori" value="<?php echo $skp_kategori; ?>" />
        </div>
	    <input type="hidden" name="skp_id" value="<?php echo $skp_id; ?>" /> 
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('settingkategoripeminjam') ?>" class="btn btn-default">Cancel</a>
	</div>
            </form>
        </div>
        </div>
    </body>
</html>
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
	    <div class="form-group">
            <label for="datetime">Skp Tgl <?php echo form_error('skp_tgl') ?></label>
            <input type="text" class="form-control" name="skp_tgl" id="skp_tgl" placeholder="Skp Tgl" value="<?php echo $skp_tgl; ?>" />
        </div>
	    <div class="form-group">
            <label for="tinyint">Skp Flag <?php echo form_error('skp_flag') ?></label>
            <input type="text" class="form-control" name="skp_flag" id="skp_flag" placeholder="Skp Flag" value="<?php echo $skp_flag; ?>" />
        </div>
	    <div class="form-group">
            <label for="skp_info">Skp Info <?php echo form_error('skp_info') ?></label>
            <textarea class="form-control" rows="3" name="skp_info" id="skp_info" placeholder="Skp Info"><?php echo $skp_info; ?></textarea>
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
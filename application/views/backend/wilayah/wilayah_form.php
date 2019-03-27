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
	    <div class="form-group">
            <label for="varchar">Wil Nama <?php echo form_error('wil_nama') ?></label>
            <input type="text" class="form-control" name="wil_nama" id="wil_nama" placeholder="Wil Nama" value="<?php echo $wil_nama; ?>" />
        </div>
	    <div class="form-group">
            <label for="datetime">Wil Tgl <?php echo form_error('wil_tgl') ?></label>
            <input type="text" class="form-control" name="wil_tgl" id="wil_tgl" placeholder="Wil Tgl" value="<?php echo $wil_tgl; ?>" />
        </div>
	    <div class="form-group">
            <label for="tinyint">Wil Flag <?php echo form_error('wil_flag') ?></label>
            <input type="text" class="form-control" name="wil_flag" id="wil_flag" placeholder="Wil Flag" value="<?php echo $wil_flag; ?>" />
        </div>
	    <div class="form-group">
            <label for="wil_info">Wil Info <?php echo form_error('wil_info') ?></label>
            <textarea class="form-control" rows="3" name="wil_info" id="wil_info" placeholder="Wil Info"><?php echo $wil_info; ?></textarea>
        </div>
	    <input type="hidden" name="wil_kode" value="<?php echo $wil_kode; ?>" /> 
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('wilayah') ?>" class="btn btn-default">Cancel</a>
	</div>
            </form>
        </div>
        </div>
    </body>
</html>
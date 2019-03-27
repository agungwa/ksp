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
	    <div class="form-group">
            <label for="varchar">Jab Nama <?php echo form_error('jab_nama') ?></label>
            <input type="text" class="form-control" name="jab_nama" id="jab_nama" placeholder="Jab Nama" value="<?php echo $jab_nama; ?>" />
        </div>
	    <div class="form-group">
            <label for="datetime">Jab Tgl <?php echo form_error('jab_tgl') ?></label>
            <input type="text" class="form-control" name="jab_tgl" id="jab_tgl" placeholder="Jab Tgl" value="<?php echo $jab_tgl; ?>" />
        </div>
	    <div class="form-group">
            <label for="tinyint">Jab Flag <?php echo form_error('jab_flag') ?></label>
            <input type="text" class="form-control" name="jab_flag" id="jab_flag" placeholder="Jab Flag" value="<?php echo $jab_flag; ?>" />
        </div>
	    <div class="form-group">
            <label for="jab_info">Jab Info <?php echo form_error('jab_info') ?></label>
            <textarea class="form-control" rows="3" name="jab_info" id="jab_info" placeholder="Jab Info"><?php echo $jab_info; ?></textarea>
        </div>
	    <input type="hidden" name="jab_kode" value="<?php echo $jab_kode; ?>" /> 
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('jabatan') ?>" class="btn btn-default">Cancel</a>
	</div>
            </form>
        </div>
        </div>
    </body>
</html>
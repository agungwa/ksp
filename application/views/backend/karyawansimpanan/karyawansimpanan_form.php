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
                    <h2 style="margin-top:0px"><?php echo $button ?> Karyawansimpanan </h2>
                </div>
        
        <form action="<?php echo $action; ?>" method="post">
        <div class="ibox-content">
	    <div class="form-group">
            <label for="varchar">Kar Kode <?php echo form_error('kar_kode') ?></label>
            <input type="text" class="form-control" name="kar_kode" id="kar_kode" placeholder="Kar Kode" value="<?php echo $kar_kode; ?>" />
        </div>
	    <div class="form-group">
            <label for="float">Ksi Simpanan <?php echo form_error('ksi_simpanan') ?></label>
            <input type="text" class="form-control" name="ksi_simpanan" id="ksi_simpanan" placeholder="Ksi Simpanan" value="<?php echo $ksi_simpanan; ?>" />
        </div>
	    <div class="form-group">
            <label for="tinyint">Ksi Status <?php echo form_error('ksi_status') ?></label>
            <input type="text" class="form-control" name="ksi_status" id="ksi_status" placeholder="Ksi Status" value="<?php echo $ksi_status; ?>" />
        </div>
	    <div class="form-group">
            <label for="datetime">Ksi Tgl <?php echo form_error('ksi_tgl') ?></label>
            <input type="text" class="form-control" name="ksi_tgl" id="ksi_tgl" placeholder="Ksi Tgl" value="<?php echo $ksi_tgl; ?>" />
        </div>
	    <div class="form-group">
            <label for="tinyint">Ksi Flag <?php echo form_error('ksi_flag') ?></label>
            <input type="text" class="form-control" name="ksi_flag" id="ksi_flag" placeholder="Ksi Flag" value="<?php echo $ksi_flag; ?>" />
        </div>
	    <div class="form-group">
            <label for="ksi_info">Ksi Info <?php echo form_error('ksi_info') ?></label>
            <textarea class="form-control" rows="3" name="ksi_info" id="ksi_info" placeholder="Ksi Info"><?php echo $ksi_info; ?></textarea>
        </div>
	    <input type="hidden" name="ksi_id" value="<?php echo $ksi_id; ?>" /> 
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('karyawansimpanan') ?>" class="btn btn-default">Cancel</a>
	</div>
            </form>
        </div>
        </div>
    </body>
</html>
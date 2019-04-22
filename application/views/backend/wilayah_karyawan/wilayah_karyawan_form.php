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
                    <h2 style="margin-top:0px"><?php echo $button ?> Wilayah_karyawan </h2>
                </div>
        
        <form action="<?php echo $action; ?>" method="post">
        <div class="ibox-content">
	    <div class="form-group">
            <label for="varchar">Wil Kode <?php echo form_error('wil_kode') ?></label>
            <input type="text" class="form-control" name="wil_kode" id="wil_kode" placeholder="Wil Kode" value="<?php echo $wil_kode; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Status <?php echo form_error('status') ?></label>
            <input type="text" class="form-control" name="status" id="status" placeholder="Status" value="<?php echo $status; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Kar Kode <?php echo form_error('kar_kode') ?></label>
            <input type="text" class="form-control" name="kar_kode" id="kar_kode" placeholder="Kar Kode" value="<?php echo $kar_kode; ?>" />
        </div>
	    <div class="form-group">
            <label for="datetime">Wik Tgl <?php echo form_error('wik_tgl') ?></label>
            <input type="text" class="form-control" name="wik_tgl" id="wik_tgl" placeholder="Wik Tgl" value="<?php echo $wik_tgl; ?>" />
        </div>
	    <div class="form-group">
            <label for="tinyint">Wik Flag <?php echo form_error('wik_flag') ?></label>
            <input type="text" class="form-control" name="wik_flag" id="wik_flag" placeholder="Wik Flag" value="<?php echo $wik_flag; ?>" />
        </div>
	    <div class="form-group">
            <label for="wik_info">Wik Info <?php echo form_error('wik_info') ?></label>
            <textarea class="form-control" rows="3" name="wik_info" id="wik_info" placeholder="Wik Info"><?php echo $wik_info; ?></textarea>
        </div>
	    <input type="hidden" name="wik_id" value="<?php echo $wik_id; ?>" /> 
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('wilayah_karyawan') ?>" class="btn btn-default">Cancel</a>
	</div>
            </form>
        </div>
        </div>
    </body>
</html>
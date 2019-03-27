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
                    <h2 style="margin-top:0px"><?php echo $button ?> Karyawan </h2>
                </div>
        
        <form action="<?php echo $action; ?>" method="post">
        <div class="ibox-content">
	    <div class="form-group">
            <label for="varchar">Kar Nama <?php echo form_error('kar_nama') ?></label>
            <input type="text" class="form-control" name="kar_nama" id="kar_nama" placeholder="Kar Nama" value="<?php echo $kar_nama; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Jab Kode <?php echo form_error('jab_kode') ?></label>
            <input type="text" class="form-control" name="jab_kode" id="jab_kode" placeholder="Jab Kode" value="<?php echo $jab_kode; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Wil Kode <?php echo form_error('wil_kode') ?></label>
            <input type="text" class="form-control" name="wil_kode" id="wil_kode" placeholder="Wil Kode" value="<?php echo $wil_kode; ?>" />
        </div>
	    <div class="form-group">
            <label for="kar_alamat">Kar Alamat <?php echo form_error('kar_alamat') ?></label>
            <textarea class="form-control" rows="3" name="kar_alamat" id="kar_alamat" placeholder="Kar Alamat"><?php echo $kar_alamat; ?></textarea>
        </div>
	    <div class="form-group">
            <label for="varchar">Kar Nohp <?php echo form_error('kar_nohp') ?></label>
            <input type="text" class="form-control" name="kar_nohp" id="kar_nohp" placeholder="Kar Nohp" value="<?php echo $kar_nohp; ?>" />
        </div>
	    <div class="form-group">
            <label for="datetime">Kar Tgl <?php echo form_error('kar_tgl') ?></label>
            <input type="text" class="form-control" name="kar_tgl" id="kar_tgl" placeholder="Kar Tgl" value="<?php echo $kar_tgl; ?>" />
        </div>
	    <div class="form-group">
            <label for="tinyint">Kar Flag <?php echo form_error('kar_flag') ?></label>
            <input type="text" class="form-control" name="kar_flag" id="kar_flag" placeholder="Kar Flag" value="<?php echo $kar_flag; ?>" />
        </div>
	    <div class="form-group">
            <label for="kar_info">Kar Info <?php echo form_error('kar_info') ?></label>
            <textarea class="form-control" rows="3" name="kar_info" id="kar_info" placeholder="Kar Info"><?php echo $kar_info; ?></textarea>
        </div>
	    <input type="hidden" name="kar_kode" value="<?php echo $kar_kode; ?>" /> 
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('karyawan') ?>" class="btn btn-default">Cancel</a>
	</div>
            </form>
        </div>
        </div>
    </body>
</html>
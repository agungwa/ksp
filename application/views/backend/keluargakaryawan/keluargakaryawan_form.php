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
                    <h2 style="margin-top:0px"><?php echo $button ?> Keluargakaryawan </h2>
                </div>
        
        <form action="<?php echo $action; ?>" method="post">
        <div class="ibox-content">
	    <div class="form-group">
            <label for="varchar">Kar Kode <?php echo form_error('kar_kode') ?></label>
            <input type="text" class="form-control" name="kar_kode" id="kar_kode" placeholder="Kar Kode" value="<?php echo $kar_kode; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Kka Nama <?php echo form_error('kka_nama') ?></label>
            <input type="text" class="form-control" name="kka_nama" id="kka_nama" placeholder="Kka Nama" value="<?php echo $kka_nama; ?>" />
        </div>
	    <div class="form-group">
            <label for="kka_alamat">Kka Alamat <?php echo form_error('kka_alamat') ?></label>
            <textarea class="form-control" rows="3" name="kka_alamat" id="kka_alamat" placeholder="Kka Alamat"><?php echo $kka_alamat; ?></textarea>
        </div>
	    <div class="form-group">
            <label for="varchar">Kka Nohp <?php echo form_error('kka_nohp') ?></label>
            <input type="text" class="form-control" name="kka_nohp" id="kka_nohp" placeholder="Kka Nohp" value="<?php echo $kka_nohp; ?>" />
        </div>
	    <div class="form-group">
            <label for="datetime">Kka Tgl <?php echo form_error('kka_tgl') ?></label>
            <input type="text" class="form-control" name="kka_tgl" id="kka_tgl" placeholder="Kka Tgl" value="<?php echo $kka_tgl; ?>" />
        </div>
	    <div class="form-group">
            <label for="tinyint">Kka Flag <?php echo form_error('kka_flag') ?></label>
            <input type="text" class="form-control" name="kka_flag" id="kka_flag" placeholder="Kka Flag" value="<?php echo $kka_flag; ?>" />
        </div>
	    <div class="form-group">
            <label for="kka_info">Kka Info <?php echo form_error('kka_info') ?></label>
            <textarea class="form-control" rows="3" name="kka_info" id="kka_info" placeholder="Kka Info"><?php echo $kka_info; ?></textarea>
        </div>
	    <input type="hidden" name="kka_id" value="<?php echo $kka_id; ?>" /> 
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('keluargakaryawan') ?>" class="btn btn-default">Cancel</a>
	</div>
            </form>
        </div>
        </div>
    </body>
</html>
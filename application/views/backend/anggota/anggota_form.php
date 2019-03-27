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
                    <h2 style="margin-top:0px"><?php echo $button ?> Anggota </h2>
                </div>
        
        <form action="<?php echo $action; ?>" method="post">
        <div class="ibox-content">
	    <div class="form-group">
            <label for="varchar">Ang Nama <?php echo form_error('ang_nama') ?></label>
            <input type="text" class="form-control" name="ang_nama" id="ang_nama" placeholder="Ang Nama" value="<?php echo $ang_nama; ?>" />
        </div>
	    <div class="form-group">
            <label for="ang_alamat">Ang Alamat <?php echo form_error('ang_alamat') ?></label>
            <textarea class="form-control" rows="3" name="ang_alamat" id="ang_alamat" placeholder="Ang Alamat"><?php echo $ang_alamat; ?></textarea>
        </div>
	    <div class="form-group">
            <label for="varchar">Ang Noktp <?php echo form_error('ang_noktp') ?></label>
            <input type="text" class="form-control" name="ang_noktp" id="ang_noktp" placeholder="Ang Noktp" value="<?php echo $ang_noktp; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Ang Nokk <?php echo form_error('ang_nokk') ?></label>
            <input type="text" class="form-control" name="ang_nokk" id="ang_nokk" placeholder="Ang Nokk" value="<?php echo $ang_nokk; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Ang Nohp <?php echo form_error('ang_nohp') ?></label>
            <input type="text" class="form-control" name="ang_nohp" id="ang_nohp" placeholder="Ang Nohp" value="<?php echo $ang_nohp; ?>" />
        </div>
	    <div class="form-group">
            <label for="date">Ang Tgllahir <?php echo form_error('ang_tgllahir') ?></label>
            <input type="text" class="form-control" name="ang_tgllahir" id="ang_tgllahir" placeholder="Ang Tgllahir" value="<?php echo $ang_tgllahir; ?>" />
        </div>
	    <div class="form-group">
            <label for="datetime">Ang Tgl <?php echo form_error('ang_tgl') ?></label>
            <input type="text" class="form-control" name="ang_tgl" id="ang_tgl" placeholder="Ang Tgl" value="<?php echo $ang_tgl; ?>" />
        </div>
	    <div class="form-group">
            <label for="tinyint">Ang Flag <?php echo form_error('ang_flag') ?></label>
            <input type="text" class="form-control" name="ang_flag" id="ang_flag" placeholder="Ang Flag" value="<?php echo $ang_flag; ?>" />
        </div>
	    <div class="form-group">
            <label for="ang_info">Ang Info <?php echo form_error('ang_info') ?></label>
            <textarea class="form-control" rows="3" name="ang_info" id="ang_info" placeholder="Ang Info"><?php echo $ang_info; ?></textarea>
        </div>
	    <input type="hidden" name="ang_no" value="<?php echo $ang_no; ?>" /> 
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('anggota') ?>" class="btn btn-default">Cancel</a>
	</div>
            </form>
        </div>
        </div>
    </body>
</html>
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
                    <h2 style="margin-top:0px"><?php echo $button ?> Klaimsimkesan </h2>
                </div>
        
        <form action="<?php echo $action; ?>" method="post">
        <div class="ibox-content">
	    <div class="form-group">
            <label for="varchar">Sik Kode <?php echo form_error('sik_kode') ?></label>
            <input type="text" class="form-control" name="sik_kode" id="sik_kode" placeholder="Sik Kode" value="<?php echo $sik_kode; ?>" />
        </div>
	    <div class="form-group">
            <label for="int">Jkl Id <?php echo form_error('jkl_id') ?></label>
            <input type="text" class="form-control" name="jkl_id" id="jkl_id" placeholder="Jkl Id" value="<?php echo $jkl_id; ?>" />
        </div>
	    <div class="form-group">
            <label for="datetime">Ksi Tglklaim <?php echo form_error('ksi_tglklaim') ?></label>
            <input type="text" class="form-control" name="ksi_tglklaim" id="ksi_tglklaim" placeholder="Ksi Tglklaim" value="<?php echo $ksi_tglklaim; ?>" />
        </div>
	    <div class="form-group">
            <label for="float">Ksi Jmlklaim <?php echo form_error('ksi_jmlklaim') ?></label>
            <input type="text" class="form-control" name="ksi_jmlklaim" id="ksi_jmlklaim" placeholder="Ksi Jmlklaim" value="<?php echo $ksi_jmlklaim; ?>" />
        </div>
	    <div class="form-group">
            <label for="float">Ksi Jmltunggakan <?php echo form_error('ksi_jmltunggakan') ?></label>
            <input type="text" class="form-control" name="ksi_jmltunggakan" id="ksi_jmltunggakan" placeholder="Ksi Jmltunggakan" value="<?php echo $ksi_jmltunggakan; ?>" />
        </div>
	    <div class="form-group">
            <label for="float">Ksi Jmlditerima <?php echo form_error('ksi_jmlditerima') ?></label>
            <input type="text" class="form-control" name="ksi_jmlditerima" id="ksi_jmlditerima" placeholder="Ksi Jmlditerima" value="<?php echo $ksi_jmlditerima; ?>" />
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
	    <a href="<?php echo site_url('klaimsimkesan') ?>" class="btn btn-default">Cancel</a>
	</div>
            </form>
        </div>
        </div>
    </body>
</html>
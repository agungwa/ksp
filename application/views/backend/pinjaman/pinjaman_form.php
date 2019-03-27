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
                    <h2 style="margin-top:0px"><?php echo $button ?> Pinjaman </h2>
                </div>
        
        <form action="<?php echo $action; ?>" method="post">
        <div class="ibox-content">
	    <div class="form-group">
            <label for="varchar">Pin Id <?php echo form_error('pin_id') ?></label>
            <input type="text" class="form-control" name="pin_id" id="pin_id" placeholder="Pin Id" value="<?php echo $pin_id; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Ang No <?php echo form_error('ang_no') ?></label>
            <input type="text" class="form-control" name="ang_no" id="ang_no" placeholder="Ang No" value="<?php echo $ang_no; ?>" />
        </div>
	    <div class="form-group">
            <label for="int">Sea Id <?php echo form_error('sea_id') ?></label>
            <input type="text" class="form-control" name="sea_id" id="sea_id" placeholder="Sea Id" value="<?php echo $sea_id; ?>" />
        </div>
	    <div class="form-group">
            <label for="int">Bup Id <?php echo form_error('bup_id') ?></label>
            <input type="text" class="form-control" name="bup_id" id="bup_id" placeholder="Bup Id" value="<?php echo $bup_id; ?>" />
        </div>
	    <div class="form-group">
            <label for="int">Pop Id <?php echo form_error('pop_id') ?></label>
            <input type="text" class="form-control" name="pop_id" id="pop_id" placeholder="Pop Id" value="<?php echo $pop_id; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Wil Kode <?php echo form_error('wil_kode') ?></label>
            <input type="text" class="form-control" name="wil_kode" id="wil_kode" placeholder="Wil Kode" value="<?php echo $wil_kode; ?>" />
        </div>
	    <div class="form-group">
            <label for="int">Skp Id <?php echo form_error('skp_id') ?></label>
            <input type="text" class="form-control" name="skp_id" id="skp_id" placeholder="Skp Id" value="<?php echo $skp_id; ?>" />
        </div>
	    <div class="form-group">
            <label for="int">Pen Id <?php echo form_error('pen_id') ?></label>
            <input type="text" class="form-control" name="pen_id" id="pen_id" placeholder="Pen Id" value="<?php echo $pen_id; ?>" />
        </div>
	    <div class="form-group">
            <label for="float">Pin Pengajuan <?php echo form_error('pin_pengajuan') ?></label>
            <input type="text" class="form-control" name="pin_pengajuan" id="pin_pengajuan" placeholder="Pin Pengajuan" value="<?php echo $pin_pengajuan; ?>" />
        </div>
	    <div class="form-group">
            <label for="float">Pin Pinjaman <?php echo form_error('pin_pinjaman') ?></label>
            <input type="text" class="form-control" name="pin_pinjaman" id="pin_pinjaman" placeholder="Pin Pinjaman" value="<?php echo $pin_pinjaman; ?>" />
        </div>
	    <div class="form-group">
            <label for="datetime">Pin Tglpengajuan <?php echo form_error('pin_tglpengajuan') ?></label>
            <input type="text" class="form-control" name="pin_tglpengajuan" id="pin_tglpengajuan" placeholder="Pin Tglpengajuan" value="<?php echo $pin_tglpengajuan; ?>" />
        </div>
	    <div class="form-group">
            <label for="datetime">Pin Tglpencairan <?php echo form_error('pin_tglpencairan') ?></label>
            <input type="text" class="form-control" name="pin_tglpencairan" id="pin_tglpencairan" placeholder="Pin Tglpencairan" value="<?php echo $pin_tglpencairan; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Pin Marketing <?php echo form_error('pin_marketing') ?></label>
            <input type="text" class="form-control" name="pin_marketing" id="pin_marketing" placeholder="Pin Marketing" value="<?php echo $pin_marketing; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Pin Surveyor <?php echo form_error('pin_surveyor') ?></label>
            <input type="text" class="form-control" name="pin_surveyor" id="pin_surveyor" placeholder="Pin Surveyor" value="<?php echo $pin_surveyor; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Pin Survey <?php echo form_error('pin_survey') ?></label>
            <input type="text" class="form-control" name="pin_survey" id="pin_survey" placeholder="Pin Survey" value="<?php echo $pin_survey; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Pin Statuspinjaman <?php echo form_error('pin_statuspinjaman') ?></label>
            <input type="text" class="form-control" name="pin_statuspinjaman" id="pin_statuspinjaman" placeholder="Pin Statuspinjaman" value="<?php echo $pin_statuspinjaman; ?>" />
        </div>
	    <div class="form-group">
            <label for="datetime">Pin Tgl <?php echo form_error('pin_tgl') ?></label>
            <input type="text" class="form-control" name="pin_tgl" id="pin_tgl" placeholder="Pin Tgl" value="<?php echo $pin_tgl; ?>" />
        </div>
	    <div class="form-group">
            <label for="tinyint">Pin Flag <?php echo form_error('pin_flag') ?></label>
            <input type="text" class="form-control" name="pin_flag" id="pin_flag" placeholder="Pin Flag" value="<?php echo $pin_flag; ?>" />
        </div>
	    <div class="form-group">
            <label for="pin_info">Pin Info <?php echo form_error('pin_info') ?></label>
            <textarea class="form-control" rows="3" name="pin_info" id="pin_info" placeholder="Pin Info"><?php echo $pin_info; ?></textarea>
        </div>
	    <input type="hidden" name="" value="<?php echo $; ?>" /> 
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('pinjaman') ?>" class="btn btn-default">Cancel</a>
	</div>
            </form>
        </div>
        </div>
    </body>
</html>
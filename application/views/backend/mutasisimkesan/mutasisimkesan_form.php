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
                    <h2 style="margin-top:0px"><?php echo $button ?> Mutasisimkesan </h2>
                </div>
        
        <form action="<?php echo $action; ?>" method="post">
        <div class="ibox-content">
	    <div class="form-group">
            <label for="varchar">Sik Kode <?php echo form_error('sik_kode') ?></label>
            <input type="text" class="form-control" name="sik_kode" id="sik_kode" placeholder="Sik Kode" value="<?php echo $sik_kode; ?>" />
        </div>
	    <div class="form-group">
            <label for="datetime">Msk Tglmutasi <?php echo form_error('msk_tglmutasi') ?></label>
            <input type="text" class="form-control" name="msk_tglmutasi" id="msk_tglmutasi" placeholder="Msk Tglmutasi" value="<?php echo $msk_tglmutasi; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Msk Asal <?php echo form_error('msk_asal') ?></label>
            <input type="text" class="form-control" name="msk_asal" id="msk_asal" placeholder="Msk Asal" value="<?php echo $msk_asal; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Msk Tujuan <?php echo form_error('msk_tujuan') ?></label>
            <input type="text" class="form-control" name="msk_tujuan" id="msk_tujuan" placeholder="Msk Tujuan" value="<?php echo $msk_tujuan; ?>" />
        </div>
	    <div class="form-group">
            <label for="tinyint">Msk Status <?php echo form_error('msk_status') ?></label>
            <input type="text" class="form-control" name="msk_status" id="msk_status" placeholder="Msk Status" value="<?php echo $msk_status; ?>" />
        </div>
	    <div class="form-group">
            <label for="datetime">Msk Tgl <?php echo form_error('msk_tgl') ?></label>
            <input type="text" class="form-control" name="msk_tgl" id="msk_tgl" placeholder="Msk Tgl" value="<?php echo $msk_tgl; ?>" />
        </div>
	    <div class="form-group">
            <label for="tinyint">Msk Flag <?php echo form_error('msk_flag') ?></label>
            <input type="text" class="form-control" name="msk_flag" id="msk_flag" placeholder="Msk Flag" value="<?php echo $msk_flag; ?>" />
        </div>
	    <div class="form-group">
            <label for="msk_info">Msk Info <?php echo form_error('msk_info') ?></label>
            <textarea class="form-control" rows="3" name="msk_info" id="msk_info" placeholder="Msk Info"><?php echo $msk_info; ?></textarea>
        </div>
	    <input type="hidden" name="msk_id" value="<?php echo $msk_id; ?>" /> 
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('mutasisimkesan') ?>" class="btn btn-default">Cancel</a>
	</div>
            </form>
        </div>
        </div>
    </body>
</html>
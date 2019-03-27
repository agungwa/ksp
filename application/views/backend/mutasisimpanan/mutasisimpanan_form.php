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
                    <h2 style="margin-top:0px"><?php echo $button ?> Mutasisimpanan </h2>
                </div>
        
        <form action="<?php echo $action; ?>" method="post">
        <div class="ibox-content">
	    <div class="form-group">
            <label for="varchar">Sim Kode <?php echo form_error('sim_kode') ?></label>
            <input type="text" class="form-control" name="sim_kode" id="sim_kode" placeholder="Sim Kode" value="<?php echo $sim_kode; ?>" />
        </div>
	    <div class="form-group">
            <label for="datetime">Mus Tglmutasi <?php echo form_error('mus_tglmutasi') ?></label>
            <input type="text" class="form-control" name="mus_tglmutasi" id="mus_tglmutasi" placeholder="Mus Tglmutasi" value="<?php echo $mus_tglmutasi; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Mus Asal <?php echo form_error('mus_asal') ?></label>
            <input type="text" class="form-control" name="mus_asal" id="mus_asal" placeholder="Mus Asal" value="<?php echo $mus_asal; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Mus Tujuan <?php echo form_error('mus_tujuan') ?></label>
            <input type="text" class="form-control" name="mus_tujuan" id="mus_tujuan" placeholder="Mus Tujuan" value="<?php echo $mus_tujuan; ?>" />
        </div>
	    <div class="form-group">
            <label for="tinyint">Mus Status <?php echo form_error('mus_status') ?></label>
            <input type="text" class="form-control" name="mus_status" id="mus_status" placeholder="Mus Status" value="<?php echo $mus_status; ?>" />
        </div>
	    <div class="form-group">
            <label for="datetime">Mus Tgl <?php echo form_error('mus_tgl') ?></label>
            <input type="text" class="form-control" name="mus_tgl" id="mus_tgl" placeholder="Mus Tgl" value="<?php echo $mus_tgl; ?>" />
        </div>
	    <div class="form-group">
            <label for="tinyint">Mus Flag <?php echo form_error('mus_flag') ?></label>
            <input type="text" class="form-control" name="mus_flag" id="mus_flag" placeholder="Mus Flag" value="<?php echo $mus_flag; ?>" />
        </div>
	    <div class="form-group">
            <label for="mus_info">Mus Info <?php echo form_error('mus_info') ?></label>
            <textarea class="form-control" rows="3" name="mus_info" id="mus_info" placeholder="Mus Info"><?php echo $mus_info; ?></textarea>
        </div>
	    <input type="hidden" name="mus_id" value="<?php echo $mus_id; ?>" /> 
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('mutasisimpanan') ?>" class="btn btn-default">Cancel</a>
	</div>
            </form>
        </div>
        </div>
    </body>
</html>
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
            <div class="input-group">
            <input type="hidden" name="sim_kode" id="sim_kode" value="<?php echo $sim_kode; ?>" />
            <input type="text" class="form-control" name="nm_sim_kode" id="nm_sim_kode" placeholder="Simpanan" value="<?php echo $nm_sim_kode; ?>" readonly/>
            <div class="input-group-addon">
                <span onclick="lookup('<?=base_url()?>simpanan/lookup','sim_kode');" style="cursor: pointer;">Cari</span>
            </div>
            </div>
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
	    <input type="hidden" name="mus_id" value="<?php echo $mus_id; ?>" /> 
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('mutasisimpanan') ?>" class="btn btn-default">Cancel</a>
	</div>
            </form>
        </div>
        </div>
    </body>
</html>
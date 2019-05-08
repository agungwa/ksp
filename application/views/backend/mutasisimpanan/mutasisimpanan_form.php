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
                    <h2 style="margin-top:0px"><?php echo $button ?> Mutasi Simpanan </h2>
                </div>
        
        <form action="<?php echo $action; ?>" method="post">
        <div class="ibox-content col-md-12">
        <div class="col-md-4">
        <div class="form-group">
            <label for="varchar">Rekening Simpanan <?php echo form_error('sim_kode') ?></label>
            <div class="input-group">
            <input type="hidden" name="sim_kode" id="sim_kode" value="<?php echo $sim_kode; ?>" />
            <input type="text" class="form-control" name="nm_sim_kode" id="nm_sim_kode" placeholder="Rekening Simpanan" value="<?php echo $nm_sim_kode; ?>" readonly/>
            <div class="input-group-addon">
                <span onclick="lookup('<?=base_url()?>simpanan/lookup','sim_kode');" style="cursor: pointer;">Cari</span>
            </div>
            </div>
        </div>
	    <div class="form-group">
            <label for="datetime">Tanggal Mutasi <?php echo form_error('mus_tglmutasi') ?></label>
            <input type="date" class="form-control" name="mus_tglmutasi" id="todays-date" placeholder="Tanggal Mutasi" value="<?php echo $mus_tglmutasi; ?>" />
        </div>
        <div class="form-group">
            <label for="varchar">Wilayah Asal <?php echo form_error('mus_asal') ?></label>
            <div class="input-group">
            <input type="hidden" name="mus_asal" id="mus_asal" value="<?php echo $mus_asal; ?>" />
            <input type="text" class="form-control" name="nm_mus_asal" id="nm_mus_asal" placeholder="Wilayah Asal" value="<?php echo $nm_mus_asal; ?>" readonly/>
            <div class="input-group-addon">
                <span onclick="lookup('<?=base_url()?>wilayah/lookup','wil_kode');" style="cursor: pointer;">Cari</span>
            </div>
            </div>
        </div>
        <div class="form-group">
            <label for="varchar">Wilayah Tujuan <?php echo form_error('mus_tujuan') ?></label>
            <div class="input-group">
            <input type="hidden" name="mus_tujuan" id="mus_tujuan" value="<?php echo $mus_tujuan; ?>" />
            <input type="text" class="form-control" name="nm_mus_tujuan" id="nm_mus_tujuan" placeholder="Wilayah Tujuan" value="<?php echo $nm_mus_tujuan; ?>" readonly/>
            <div class="input-group-addon">
                <span onclick="lookup('<?=base_url()?>wilayah/lookup','wil_kode');" style="cursor: pointer;">Cari</span>
            </div>
            </div>
        </div>
	    <div class="form-group">
            <label for="tinyint">Status <?php echo form_error('mus_status') ?></label>
            <input type="number" class="form-control" name="mus_status" id="mus_status" placeholder="Status" value="<?php echo $mus_status; ?>" />
        </div>
	    <input type="hidden" name="mus_id" value="<?php echo $mus_id; ?>" /> 
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('mutasisimpanan') ?>" class="btn btn-default">Cancel</a>
        </div>
	</div>
            </form>
        </div>
        </div>
    </body>
</html>
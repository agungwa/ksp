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
                    <h2 style="margin-top:0px"><?php echo $button ?> Mutasi Pinjaman </h2>
                </div>
        
        <form action="<?php echo $action; ?>" method="post">
        <div class="ibox-content col-md-12">
        <div class="col-md-4">
        <div class="form-group">
            <label for="varchar">Rekening Pinjaman <?php echo form_error('pin_id') ?></label>
            <div class="input-group">
            <input type="hidden" name="pin_id" id="pin_id" value="<?php echo $pin_id; ?>" />
            <input type="text" class="form-control" name="nm_pin_id" id="nm_pin_id" placeholder="Pinjaman" value="<?php echo $nm_pin_id; ?>" readonly/>
            <div class="input-group-addon">
                <span onclick="lookup('<?=base_url()?>pinjaman/lookup','pin_id');" style="cursor: pointer;">Cari</span>
            </div>
            </div>
        </div>

	    <div class="form-group">
            <label for="datetime">Tanggal Mutasi <?php echo form_error('mup_tglmutasi') ?></label>
            <input type="date" class="form-control" name="mup_tglmutasi" id="todays-date" placeholder="Tanggal Mutasi" value="<?php echo $mup_tglmutasi; ?>" />
        </div>

        <div class="form-group">
            <label for="varchar">Wilayah Asal <?php echo form_error('mup_asal') ?></label>
            <div class="input-group">
            <input type="hidden" name="mup_asal" id="asal_id" value="<?php echo $mup_asal; ?>" />
            <input type="text" class="form-control" name="nm_mup_asal" id="nm_asal_id" placeholder="Wilayah Asal" value="<?php echo $mup_asal; ?>" readonly/>
            <div class="input-group-addon">
                <span onclick="lookup('<?=base_url()?>wilayah/lookup','asal_id');" style="cursor: pointer;">Cari</span>
            </div>
            </div>
        </div>
        <div class="form-group">
            <label for="varchar">Wilayah Tujuan <?php echo form_error('mup_tujuan') ?></label>
            <div class="input-group">
            <input type="hidden" name="tujuan_id" id="tujuan_id" value="<?php echo $mup_tujuan; ?>" />
            <input type="text" class="form-control" name="nm_mup_tujuan" id="nm_tujuan_id" placeholder="Wilayah Tujuan" value="<?php echo $mup_tujuan; ?>" readonly/>
            <div class="input-group-addon">
                <span onclick="lookup('<?=base_url()?>wilayah/lookup','tujuan_id');" style="cursor: pointer;">Cari</span>
            </div>
            </div>
        </div>

	    <div class="form-group">
            <label for="tinyint">Status <?php echo form_error('mup_status') ?></label>
            <input type="text" class="form-control" name="mup_status" id="mup_status" placeholder="Status" value="<?php echo $mup_status; ?>" />
        </div>
        
	    <input type="hidden" name="mup_id" value="<?php echo $mup_id; ?>" /> 
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('mutasipinjaman') ?>" class="btn btn-default">Batal</a>
        </div>
	</div>
            </form>
        </div>
        </div>
    </body>
</html>
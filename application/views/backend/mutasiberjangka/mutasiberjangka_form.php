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
                    <h2 style="margin-top:0px"><?php echo $button ?> Mutasi Berjangka </h2>
                </div>
        
        <form action="<?php echo $action; ?>" method="post">
        <div class="ibox-content col-md-12">
        <div class="col-md-4">
        <div class="form-group">
            <label for="varchar">Rekening Investasi <?php echo form_error('ivb_kode') ?></label>
            <div class="input-group">
            <input type="hidden" name="ivb_kode" id="ivb_kode" value="<?php echo $ivb_kode; ?>" />
            <input type="text" class="form-control" name="nm_ivb_kode" id="nm_ivb_kode" placeholder="Rekening Investasi" value="<?php echo $nm_ivb_kode; ?>" readonly/>
            <div class="input-group-addon">
                <span onclick="lookup('<?=base_url()?>investasiberjangka/lookup','ivb_kode');" style="cursor: pointer;">Cari</span>
            </div>
            </div>
        </div>
	    <div class="form-group">
            <label for="datetime">Tanggal Mutasi <?php echo form_error('mib_tglmutasi') ?></label>
            <input type="date" class="form-control" name="mib_tglmutasi" id="todays-date" placeholder="Tanggal Mutasi" value="<?php echo $mib_tglmutasi; ?>" />
        </div>

        <div class="form-group">
            <label for="varchar">Wilayah Asal <?php echo form_error('mib_asal') ?></label>
            <div class="input-group">
            <input type="hidden" name="mib_asal" id="asal_id" value="<?php echo $mib_asal; ?>" />
            <input type="text" class="form-control" name="nm_mib_asal" id="nm_asal_id" placeholder="Wilayah Asal" value="<?php echo $mib_asal; ?>" readonly/>
            <div class="input-group-addon">
                <span onclick="lookup('<?=base_url()?>wilayah/lookup','asal_id');" style="cursor: pointer;">Cari</span>
            </div>
            </div>
        </div>
        <div class="form-group">
            <label for="varchar">Wilayah Tujuan <?php echo form_error('mib_tujuan') ?></label>
            <div class="input-group">
            <input type="hidden" name="mib_tujuan" id="tujuan_id" value="<?php echo $mib_tujuan; ?>" />
            <input type="text" class="form-control" name="nm_mib_tujuan" id="nm_tujuan_id" placeholder="Wilayah Tujuan" value="<?php echo $mib_tujuan; ?>" readonly/>
            <div class="input-group-addon">
                <span onclick="lookup('<?=base_url()?>wilayah/lookup','tujuan_id');" style="cursor: pointer;">Cari</span>
            </div>
            </div>
        </div>

	    <div class="form-group">
            <label for="tinyint">Status <?php echo form_error('mib_status') ?></label>
            <input type="number" class="form-control" name="mib_status" id="mib_status" placeholder="Status" value="<?php echo $mib_status; ?>" />
        </div>
	    <input type="hidden" name="mib_id" value="<?php echo $mib_id; ?>" /> 
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('mutasiberjangka') ?>" class="btn btn-default">Batal</a>
        </div>
	</div>
            </form>
        </div>
        </div>
    </body>
</html>
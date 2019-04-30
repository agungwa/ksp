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
                    <h2 style="margin-top:0px"><?php echo $button ?> Mutasiberjangka </h2>
                </div>
        
        <form action="<?php echo $action; ?>" method="post">
        <div class="ibox-content">
        <div class="form-group">
            <label for="varchar">Investasi Kode <?php echo form_error('ivb_kode') ?></label>
            <div class="input-group">
            <input type="hidden" name="ivb_kode" id="ivb_kode" value="<?php echo $ivb_kode; ?>" />
            <input type="text" class="form-control" name="nm_ivb_kode" id="nm_ivb_kode" placeholder="Investasi Kode" value="<?php echo $nm_ivb_kode; ?>" readonly/>
            <div class="input-group-addon">
                <span onclick="lookup('<?=base_url()?>investasiberjangka/lookup','ivb_kode');" style="cursor: pointer;">Cari</span>
            </div>
            </div>
        </div>
	    <div class="form-group">
            <label for="datetime">Mib Tglmutasi <?php echo form_error('mib_tglmutasi') ?></label>
            <input type="text" class="form-control" name="mib_tglmutasi" id="mib_tglmutasi" placeholder="Mib Tglmutasi" value="<?php echo $mib_tglmutasi; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Mib Asal <?php echo form_error('mib_asal') ?></label>
            <input type="text" class="form-control" name="mib_asal" id="mib_asal" placeholder="Mib Asal" value="<?php echo $mib_asal; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Mib Tujuan <?php echo form_error('mib_tujuan') ?></label>
            <input type="text" class="form-control" name="mib_tujuan" id="mib_tujuan" placeholder="Mib Tujuan" value="<?php echo $mib_tujuan; ?>" />
        </div>
	    <div class="form-group">
            <label for="tinyint">Mib Status <?php echo form_error('mib_status') ?></label>
            <input type="text" class="form-control" name="mib_status" id="mib_status" placeholder="Mib Status" value="<?php echo $mib_status; ?>" />
        </div>
	    <input type="hidden" name="mib_id" value="<?php echo $mib_id; ?>" /> 
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('mutasiberjangka') ?>" class="btn btn-default">Cancel</a>
	</div>
            </form>
        </div>
        </div>
    </body>
</html>
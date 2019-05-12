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
                    <h2 style="margin-top:0px"><?php echo $button ?> Tutupinvestasiberjangka </h2>
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
            <label for="datetime">Tib Tgltutup <?php echo form_error('tib_tgltutup') ?></label>
            <input type="date" class="form-control" name="tib_tgltutup" id="tib_tgltutup" placeholder="Tib Tgltutup" value="<?php echo $tib_tgltutup; ?>" />
        </div>
	    <div class="form-group">
            <label for="tib_catatan">Tib Catatan <?php echo form_error('tib_catatan') ?></label>
            <textarea class="form-control" rows="3" name="tib_catatan" id="tib_catatan" placeholder="Tib Catatan"><?php echo $tib_catatan; ?></textarea>
        </div>
	    <input type="hidden" name="tib_id" value="<?php echo $tib_id; ?>" /> 
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('tutupinvestasiberjangka') ?>" class="btn btn-default">Batal</a>
	</div>
            </form>
        </div>
        </div>
    </body>
</html>
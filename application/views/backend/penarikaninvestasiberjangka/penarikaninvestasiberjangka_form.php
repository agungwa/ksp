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
                    <h2 style="margin-top:0px"><?php echo $button ?> Penarikan Investasi Berjangka </h2>
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
            <label for="tinyint">Penarikanke <?php echo form_error('pib_penarikanke') ?></label>
            <input type="text" class="form-control" name="pib_penarikanke" id="pib_penarikanke" placeholder="Penarikanke" value="<?php echo $pib_penarikanke; ?>" />
        </div>
	    <div class="form-group">
            <label for="float">Jumlah Keuntungan <?php echo form_error('pib_jmlkeuntungan') ?></label>
            <input type="number" class="form-control" name="pib_jmlkeuntungan" id="pib_jmlkeuntungan" placeholder="Jumlah Keuntungan" value="<?php echo $pib_jmlkeuntungan; ?>" />
        </div>
	    <div class="form-group">
            <label for="float">Jumlah Diterima <?php echo form_error('pib_jmlditerima') ?></label>
            <input type="number" class="form-control" name="pib_jmlditerima" id="pib_jmlditerima" placeholder="Jumlah Diterima" value="<?php echo $pib_jmlditerima; ?>" />
        </div>
	    <input type="hidden" name="pib_id" value="<?php echo $pib_id; ?>" /> 
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('penarikaninvestasiberjangka') ?>" class="btn btn-default">Cancel</a>
        </div>
	</div>
            </form>
        </div>
        </div>
    </body>
</html>
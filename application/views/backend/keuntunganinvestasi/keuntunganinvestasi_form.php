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
                    <h2 style="margin-top:0px"><?php echo $button ?> Keuntungan Investasi </h2>
                </div>
        
        <form action="<?php echo $action; ?>" method="post">
        <div class="ibox-content col-md-12">
        <div class="col-md-4">
        <div class="form-group">
            <label for="varchar">Penarikan Investasi <?php echo form_error('pib_id') ?></label>
            <div class="input-group">
            <input type="hidden" name="pib_id" id="pib_id" value="<?php echo $pib_id; ?>" />
            <input type="text" class="form-control" name="nm_pib_id" id="nm_pib_id" placeholder="Penarikan Investasi" value="<?php echo $nm_pib_id; ?>" readonly/>
            <div class="input-group-addon">
                <span onclick="lookup('<?=base_url()?>investasiberjangka/lookup','pib_id');" style="cursor: pointer;">Cari</span>
            </div>
            </div>
        </div>
	    <div class="form-group">
            <label for="float">Jumlah Keuntungan <?php echo form_error('kiv_jmlkeuntungan') ?></label>
            <input type="number" class="form-control" name="kiv_jmlkeuntungan" id="kiv_jmlkeuntungan" placeholder="Jumlah Keuntungan" value="<?php echo $kiv_jmlkeuntungan; ?>" />
        </div>
	    <div class="form-group">
            <label for="datetime">Tanggal <?php echo form_error('kiv_tglkeuntungan') ?></label>
            <input type="date" class="form-control" name="kiv_tglkeuntungan" id="todays-date" placeholder="Tanggal" value="<?php echo $kiv_tglkeuntungan; ?>" />
        </div>
	    <input type="hidden" name="kiv_id" value="<?php echo $kiv_id; ?>" /> 
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('keuntunganinvestasi') ?>" class="btn btn-default">Batal</a>
        </div>
	</div>
            </form>
        </div>
        </div>
    </body>
</html>
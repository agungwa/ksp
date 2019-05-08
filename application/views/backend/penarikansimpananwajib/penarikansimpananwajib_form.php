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
                    <h2 style="margin-top:0px"><?php echo $button ?> Tarik Simpanan Wajib </h2>
                </div>
        
        <form action="<?php echo $action; ?>" method="post">
        <div class="ibox-content col-md-12">
        <div class="col-md-6">
        <div class="form-group">
            <label for="int">Simpanan Wajib <?php echo form_error('siw_id') ?></label>
            <div class="input-group">
            <input type="hidden" name="siw_id" id="siw_id" value="<?php echo $siw_id; ?>" />
            <input type="text" class="form-control" name="nm_siw_id" id="nm_siw_id" placeholder="Simpanan Wajib" value="<?php echo $nm_siw_id; ?>" readonly/>
            <div class="input-group-addon">
                <span onclick="lookup('<?=base_url()?>simpananwajib/lookup','siw_id');" style="cursor: pointer;">Cari</span>
            </div>
            </div>
        </div>
	    <div class="form-group">
            <label for="datetime">Tanggal Penarikan <?php echo form_error('psw_tglpenarikan') ?></label>
            <input type="date" class="form-control" name="psw_tglpenarikan" id="todays-date" placeholder="Tanggal Penarikan" value="<?php echo $psw_tglpenarikan; ?>" />
        </div>
	    <div class="form-group">
            <label for="float">Jumlah <?php echo form_error('psw_jumlah') ?></label>
            <input type="number" class="form-control" name="psw_jumlah" id="psw_jumlah" placeholder="Jumlah" value="<?php echo $psw_jumlah; ?>" />
        </div>
        
	    <input type="hidden" name="psw_id" value="<?php echo $psw_id; ?>" /> 
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('penarikansimpananwajib') ?>" class="btn btn-default">Cancel</a>
	</div>
    </div>
            </form>
        </div>
        </div>
    </body>
</html>
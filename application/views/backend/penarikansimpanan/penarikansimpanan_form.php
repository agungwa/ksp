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
                    <h2 style="margin-top:0px"><?php echo $button ?> Penarikansimpanan </h2>
                </div>
        
        <form action="<?php echo $action; ?>" method="post">
        <div class="ibox-content">
        <div class="form-group">
            <label for="varchar">Simpanan <?php echo form_error('sim_kode') ?></label>
            <div class="input-group">
            <input type="hidden" name="sim_kode" id="sim_kode" value="<?php echo $sim_kode; ?>" />
            <input type="text" class="form-control" name="nm_sim_kode" id="nm_sim_kode" placeholder="Simpanan" value="<?php echo $nm_sim_kode; ?>" readonly/>
            <div class="input-group-addon">
                <span onclick="lookup('<?=base_url()?>simpanan/lookup','sim_kode');" style="cursor: pointer;">Cari</span>
            </div>
            </div>
        </div>
	    <div class="form-group">
            <label for="datetime">Pes Tglpenarikan <?php echo form_error('pes_tglpenarikan') ?></label>
            <input type="text" class="form-control" name="pes_tglpenarikan" id="pes_tglpenarikan" placeholder="Pes Tglpenarikan" value="<?php echo $pes_tglpenarikan; ?>" />
        </div>
	    <div class="form-group">
            <label for="float">Pes Jumlah <?php echo form_error('pes_jumlah') ?></label>
            <input type="text" class="form-control" name="pes_jumlah" id="pes_jumlah" placeholder="Pes Jumlah" value="<?php echo $pes_jumlah; ?>" />
        </div>
	    <input type="hidden" name="pes_id" value="<?php echo $pes_id; ?>" /> 
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('penarikansimpanan') ?>" class="btn btn-default">Cancel</a>
	</div>
            </form>
        </div>
        </div>
    </body>
</html>
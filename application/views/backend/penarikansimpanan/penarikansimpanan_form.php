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
            <label for="varchar">Sim Kode <?php echo form_error('sim_kode') ?></label>
            <input type="text" class="form-control" name="sim_kode" id="sim_kode" placeholder="Sim Kode" value="<?php echo $sim_kode; ?>" />
        </div>
	    <div class="form-group">
            <label for="int">Siw Id <?php echo form_error('siw_id') ?></label>
            <input type="text" class="form-control" name="siw_id" id="siw_id" placeholder="Siw Id" value="<?php echo $siw_id; ?>" />
        </div>
	    <div class="form-group">
            <label for="datetime">Pes Tglpenarikan <?php echo form_error('pes_tglpenarikan') ?></label>
            <input type="text" class="form-control" name="pes_tglpenarikan" id="pes_tglpenarikan" placeholder="Pes Tglpenarikan" value="<?php echo $pes_tglpenarikan; ?>" />
        </div>
	    <div class="form-group">
            <label for="float">Pes Jumlah <?php echo form_error('pes_jumlah') ?></label>
            <input type="text" class="form-control" name="pes_jumlah" id="pes_jumlah" placeholder="Pes Jumlah" value="<?php echo $pes_jumlah; ?>" />
        </div>
	    <div class="form-group">
            <label for="datetime">Pes Tgl <?php echo form_error('pes_tgl') ?></label>
            <input type="text" class="form-control" name="pes_tgl" id="pes_tgl" placeholder="Pes Tgl" value="<?php echo $pes_tgl; ?>" />
        </div>
	    <div class="form-group">
            <label for="tinyint">Pes Flag <?php echo form_error('pes_flag') ?></label>
            <input type="text" class="form-control" name="pes_flag" id="pes_flag" placeholder="Pes Flag" value="<?php echo $pes_flag; ?>" />
        </div>
	    <div class="form-group">
            <label for="pes_info">Pes Info <?php echo form_error('pes_info') ?></label>
            <textarea class="form-control" rows="3" name="pes_info" id="pes_info" placeholder="Pes Info"><?php echo $pes_info; ?></textarea>
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
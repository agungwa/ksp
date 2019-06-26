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
                    <h2 style="margin-top:0px"><?php echo $button ?> Bungasetoransimpanan </h2>
                </div>
        
        <form action="<?php echo $action; ?>" method="post">
        <div class="ibox-content">
	    <div class="form-group">
            <label for="int">Sim Kode <?php echo form_error('sim_kode') ?></label>
            <input type="text" class="form-control" name="sim_kode" id="sim_kode" placeholder="Sim Kode" value="<?php echo $sim_kode; ?>" />
        </div>
	    <div class="form-group">
            <label for="float">Bss Saldosimpanan <?php echo form_error('bss_saldosimpanan') ?></label>
            <input type="text" class="form-control" name="bss_saldosimpanan" id="bss_saldosimpanan" placeholder="Bss Saldosimpanan" value="<?php echo $bss_saldosimpanan; ?>" />
        </div>
	    <div class="form-group">
            <label for="float">Bss Saldobulanini <?php echo form_error('bss_saldobulanini') ?></label>
            <input type="text" class="form-control" name="bss_saldobulanini" id="bss_saldobulanini" placeholder="Bss Saldobulanini" value="<?php echo $bss_saldobulanini; ?>" />
        </div>
	    <div class="form-group">
            <label for="datetime">Bss Tglbunga <?php echo form_error('bss_tglbunga') ?></label>
            <input type="text" class="form-control" name="bss_tglbunga" id="bss_tglbunga" placeholder="Bss Tglbunga" value="<?php echo $bss_tglbunga; ?>" />
        </div>
	    <div class="form-group">
            <label for="datetime">Bss Tgl <?php echo form_error('bss_tgl') ?></label>
            <input type="text" class="form-control" name="bss_tgl" id="bss_tgl" placeholder="Bss Tgl" value="<?php echo $bss_tgl; ?>" />
        </div>
	    <div class="form-group">
            <label for="tinyint">Bss Flag <?php echo form_error('bss_flag') ?></label>
            <input type="text" class="form-control" name="bss_flag" id="bss_flag" placeholder="Bss Flag" value="<?php echo $bss_flag; ?>" />
        </div>
	    <div class="form-group">
            <label for="bss_info">Bss Info <?php echo form_error('bss_info') ?></label>
            <textarea class="form-control" rows="3" name="bss_info" id="bss_info" placeholder="Bss Info"><?php echo $bss_info; ?></textarea>
        </div>
	    <input type="hidden" name="bss_id" value="<?php echo $bss_id; ?>" /> 
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('bungasetoransimpanan') ?>" class="btn btn-default">Cancel</a>
	</div>
            </form>
        </div>
        </div>
    </body>
</html>
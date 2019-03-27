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
                    <h2 style="margin-top:0px"><?php echo $button ?> Simpanan </h2>
                </div>
        
        <form action="<?php echo $action; ?>" method="post">
        <div class="ibox-content">
	    <div class="form-group">
            <label for="varchar">Sim Kode <?php echo form_error('sim_kode') ?></label>
            <input type="text" class="form-control" name="sim_kode" id="sim_kode" placeholder="Sim Kode" value="<?php echo $sim_kode; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Ang No <?php echo form_error('ang_no') ?></label>
            <input type="text" class="form-control" name="ang_no" id="ang_no" placeholder="Ang No" value="<?php echo $ang_no; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Kar Kode <?php echo form_error('kar_kode') ?></label>
            <input type="text" class="form-control" name="kar_kode" id="kar_kode" placeholder="Kar Kode" value="<?php echo $kar_kode; ?>" />
        </div>
	    <div class="form-group">
            <label for="int">Bus Id <?php echo form_error('bus_id') ?></label>
            <input type="text" class="form-control" name="bus_id" id="bus_id" placeholder="Bus Id" value="<?php echo $bus_id; ?>" />
        </div>
	    <div class="form-group">
            <label for="int">Jsi Id <?php echo form_error('jsi_id') ?></label>
            <input type="text" class="form-control" name="jsi_id" id="jsi_id" placeholder="Jsi Id" value="<?php echo $jsi_id; ?>" />
        </div>
	    <div class="form-group">
            <label for="int">Jse Id <?php echo form_error('jse_id') ?></label>
            <input type="text" class="form-control" name="jse_id" id="jse_id" placeholder="Jse Id" value="<?php echo $jse_id; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Wil Kode <?php echo form_error('wil_kode') ?></label>
            <input type="text" class="form-control" name="wil_kode" id="wil_kode" placeholder="Wil Kode" value="<?php echo $wil_kode; ?>" />
        </div>
	    <div class="form-group">
            <label for="datetime">Sim Tglpendaftaran <?php echo form_error('sim_tglpendaftaran') ?></label>
            <input type="text" class="form-control" name="sim_tglpendaftaran" id="sim_tglpendaftaran" placeholder="Sim Tglpendaftaran" value="<?php echo $sim_tglpendaftaran; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Sim Status <?php echo form_error('sim_status') ?></label>
            <input type="text" class="form-control" name="sim_status" id="sim_status" placeholder="Sim Status" value="<?php echo $sim_status; ?>" />
        </div>
	    <div class="form-group">
            <label for="datetime">Sim Tgl <?php echo form_error('sim_tgl') ?></label>
            <input type="text" class="form-control" name="sim_tgl" id="sim_tgl" placeholder="Sim Tgl" value="<?php echo $sim_tgl; ?>" />
        </div>
	    <div class="form-group">
            <label for="tinyint">Sim Flag <?php echo form_error('sim_flag') ?></label>
            <input type="text" class="form-control" name="sim_flag" id="sim_flag" placeholder="Sim Flag" value="<?php echo $sim_flag; ?>" />
        </div>
	    <div class="form-group">
            <label for="sim_info">Sim Info <?php echo form_error('sim_info') ?></label>
            <textarea class="form-control" rows="3" name="sim_info" id="sim_info" placeholder="Sim Info"><?php echo $sim_info; ?></textarea>
        </div>
	    <input type="hidden" name="" value="<?php echo $; ?>" /> 
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('simpanan') ?>" class="btn btn-default">Cancel</a>
	</div>
            </form>
        </div>
        </div>
    </body>
</html>
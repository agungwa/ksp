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
                    <h2 style="margin-top:0px"><?php echo $button ?> Karyawanijasah </h2>
                </div>
        
        <form action="<?php echo $action; ?>" method="post">
        <div class="ibox-content">
	    <div class="form-group">
            <label for="int">Kar Kode <?php echo form_error('kar_kode') ?></label>
            <input type="text" class="form-control" name="kar_kode" id="kar_kode" placeholder="Kar Kode" value="<?php echo $kar_kode; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Kij Sd <?php echo form_error('kij_sd') ?></label>
            <input type="text" class="form-control" name="kij_sd" id="kij_sd" placeholder="Kij Sd" value="<?php echo $kij_sd; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Kij Smp <?php echo form_error('kij_smp') ?></label>
            <input type="text" class="form-control" name="kij_smp" id="kij_smp" placeholder="Kij Smp" value="<?php echo $kij_smp; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Kij Sma <?php echo form_error('kij_sma') ?></label>
            <input type="text" class="form-control" name="kij_sma" id="kij_sma" placeholder="Kij Sma" value="<?php echo $kij_sma; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Kij D3 <?php echo form_error('kij_d3') ?></label>
            <input type="text" class="form-control" name="kij_d3" id="kij_d3" placeholder="Kij D3" value="<?php echo $kij_d3; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Kij S1 <?php echo form_error('kij_s1') ?></label>
            <input type="text" class="form-control" name="kij_s1" id="kij_s1" placeholder="Kij S1" value="<?php echo $kij_s1; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Kij S2 <?php echo form_error('kij_s2') ?></label>
            <input type="text" class="form-control" name="kij_s2" id="kij_s2" placeholder="Kij S2" value="<?php echo $kij_s2; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Kij S3 <?php echo form_error('kij_s3') ?></label>
            <input type="text" class="form-control" name="kij_s3" id="kij_s3" placeholder="Kij S3" value="<?php echo $kij_s3; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Kij Lainlain <?php echo form_error('kij_lainlain') ?></label>
            <input type="text" class="form-control" name="kij_lainlain" id="kij_lainlain" placeholder="Kij Lainlain" value="<?php echo $kij_lainlain; ?>" />
        </div>
	    <div class="form-group">
            <label for="tinyint">Kij Status <?php echo form_error('kij_status') ?></label>
            <input type="text" class="form-control" name="kij_status" id="kij_status" placeholder="Kij Status" value="<?php echo $kij_status; ?>" />
        </div>
	    <div class="form-group">
            <label for="datetime">Kij Tgl <?php echo form_error('kij_tgl') ?></label>
            <input type="text" class="form-control" name="kij_tgl" id="kij_tgl" placeholder="Kij Tgl" value="<?php echo $kij_tgl; ?>" />
        </div>
	    <div class="form-group">
            <label for="tinyint">Kij Flag <?php echo form_error('kij_flag') ?></label>
            <input type="text" class="form-control" name="kij_flag" id="kij_flag" placeholder="Kij Flag" value="<?php echo $kij_flag; ?>" />
        </div>
	    <div class="form-group">
            <label for="kij_info">Kij Info <?php echo form_error('kij_info') ?></label>
            <textarea class="form-control" rows="3" name="kij_info" id="kij_info" placeholder="Kij Info"><?php echo $kij_info; ?></textarea>
        </div>
	    <input type="hidden" name="kij_id" value="<?php echo $kij_id; ?>" /> 
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('karyawanijasah') ?>" class="btn btn-default">Cancel</a>
	</div>
            </form>
        </div>
        </div>
    </body>
</html>
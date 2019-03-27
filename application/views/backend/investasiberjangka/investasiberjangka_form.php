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
                    <h2 style="margin-top:0px"><?php echo $button ?> Investasiberjangka </h2>
                </div>
        
        <form action="<?php echo $action; ?>" method="post">
        <div class="ibox-content">
	    <div class="form-group">
            <label for="varchar">Ang No <?php echo form_error('ang_no') ?></label>
            <input type="text" class="form-control" name="ang_no" id="ang_no" placeholder="Ang No" value="<?php echo $ang_no; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Kar Kode <?php echo form_error('kar_kode') ?></label>
            <input type="text" class="form-control" name="kar_kode" id="kar_kode" placeholder="Kar Kode" value="<?php echo $kar_kode; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Wil Kode <?php echo form_error('wil_kode') ?></label>
            <input type="text" class="form-control" name="wil_kode" id="wil_kode" placeholder="Wil Kode" value="<?php echo $wil_kode; ?>" />
        </div>
	    <div class="form-group">
            <label for="int">Jwi Id <?php echo form_error('jwi_id') ?></label>
            <input type="text" class="form-control" name="jwi_id" id="jwi_id" placeholder="Jwi Id" value="<?php echo $jwi_id; ?>" />
        </div>
	    <div class="form-group">
            <label for="int">Jiv Id <?php echo form_error('jiv_id') ?></label>
            <input type="text" class="form-control" name="jiv_id" id="jiv_id" placeholder="Jiv Id" value="<?php echo $jiv_id; ?>" />
        </div>
	    <div class="form-group">
            <label for="int">Biv Id <?php echo form_error('biv_id') ?></label>
            <input type="text" class="form-control" name="biv_id" id="biv_id" placeholder="Biv Id" value="<?php echo $biv_id; ?>" />
        </div>
	    <div class="form-group">
            <label for="datetime">Ivb Tglpendaftaran <?php echo form_error('ivb_tglpendaftaran') ?></label>
            <input type="text" class="form-control" name="ivb_tglpendaftaran" id="ivb_tglpendaftaran" placeholder="Ivb Tglpendaftaran" value="<?php echo $ivb_tglpendaftaran; ?>" />
        </div>
	    <div class="form-group">
            <label for="datetime">Ivb Tglperpanjangan <?php echo form_error('ivb_tglperpanjangan') ?></label>
            <input type="text" class="form-control" name="ivb_tglperpanjangan" id="ivb_tglperpanjangan" placeholder="Ivb Tglperpanjangan" value="<?php echo $ivb_tglperpanjangan; ?>" />
        </div>
	    <div class="form-group">
            <label for="tinyint">Ivb Status <?php echo form_error('ivb_status') ?></label>
            <input type="text" class="form-control" name="ivb_status" id="ivb_status" placeholder="Ivb Status" value="<?php echo $ivb_status; ?>" />
        </div>
	    <div class="form-group">
            <label for="datetime">Ivb Tgl <?php echo form_error('ivb_tgl') ?></label>
            <input type="text" class="form-control" name="ivb_tgl" id="ivb_tgl" placeholder="Ivb Tgl" value="<?php echo $ivb_tgl; ?>" />
        </div>
	    <div class="form-group">
            <label for="tinyint">Ivb Flag <?php echo form_error('ivb_flag') ?></label>
            <input type="text" class="form-control" name="ivb_flag" id="ivb_flag" placeholder="Ivb Flag" value="<?php echo $ivb_flag; ?>" />
        </div>
	    <div class="form-group">
            <label for="ivb_info">Ivb Info <?php echo form_error('ivb_info') ?></label>
            <textarea class="form-control" rows="3" name="ivb_info" id="ivb_info" placeholder="Ivb Info"><?php echo $ivb_info; ?></textarea>
        </div>
	    <input type="hidden" name="ivb_kode" value="<?php echo $ivb_kode; ?>" /> 
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('investasiberjangka') ?>" class="btn btn-default">Cancel</a>
	</div>
            </form>
        </div>
        </div>
    </body>
</html>
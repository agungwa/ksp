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
                    <h2 style="margin-top:0px"><?php echo $button ?> Simkesan </h2>
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
            <label for="int">Psk Id <?php echo form_error('psk_id') ?></label>
            <input type="text" class="form-control" name="psk_id" id="psk_id" placeholder="Psk Id" value="<?php echo $psk_id; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Wil Kode <?php echo form_error('wil_kode') ?></label>
            <input type="text" class="form-control" name="wil_kode" id="wil_kode" placeholder="Wil Kode" value="<?php echo $wil_kode; ?>" />
        </div>
	    <div class="form-group">
            <label for="datetime">Sik Tglpendaftaran <?php echo form_error('sik_tglpendaftaran') ?></label>
            <input type="text" class="form-control" name="sik_tglpendaftaran" id="sik_tglpendaftaran" placeholder="Sik Tglpendaftaran" value="<?php echo $sik_tglpendaftaran; ?>" />
        </div>
	    <div class="form-group">
            <label for="datetime">Sik Tglberakhir <?php echo form_error('sik_tglberakhir') ?></label>
            <input type="text" class="form-control" name="sik_tglberakhir" id="sik_tglberakhir" placeholder="Sik Tglberakhir" value="<?php echo $sik_tglberakhir; ?>" />
        </div>
	    <div class="form-group">
            <label for="tinyint">Sik Status <?php echo form_error('sik_status') ?></label>
            <input type="text" class="form-control" name="sik_status" id="sik_status" placeholder="Sik Status" value="<?php echo $sik_status; ?>" />
        </div>
	    <div class="form-group">
            <label for="datetime">Sik Tgl <?php echo form_error('sik_tgl') ?></label>
            <input type="text" class="form-control" name="sik_tgl" id="sik_tgl" placeholder="Sik Tgl" value="<?php echo $sik_tgl; ?>" />
        </div>
	    <div class="form-group">
            <label for="tinyint">Sik Flag <?php echo form_error('sik_flag') ?></label>
            <input type="text" class="form-control" name="sik_flag" id="sik_flag" placeholder="Sik Flag" value="<?php echo $sik_flag; ?>" />
        </div>
	    <div class="form-group">
            <label for="sik_info">Sik Info <?php echo form_error('sik_info') ?></label>
            <textarea class="form-control" rows="3" name="sik_info" id="sik_info" placeholder="Sik Info"><?php echo $sik_info; ?></textarea>
        </div>
	    <input type="hidden" name="sik_kode" value="<?php echo $sik_kode; ?>" /> 
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('simkesan') ?>" class="btn btn-default">Cancel</a>
	</div>
            </form>
        </div>
        </div>
    </body>
</html>
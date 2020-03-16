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
                    <h2 style="margin-top:0px"><?php echo $button ?> Rekap </h2>
                </div>
        
        <form action="<?php echo $action; ?>" method="post">
        <div class="ibox-content">
	    <div class="form-group">
            <label for="tinyint">Rek Jenis <?php echo form_error('rek_jenis') ?></label>
            <input type="text" class="form-control" name="rek_jenis" id="rek_jenis" placeholder="Rek Jenis" value="<?php echo $rek_jenis; ?>" />
        </div>
	    <div class="form-group">
            <label for="int">Wil Kode <?php echo form_error('wil_kode') ?></label>
            <input type="text" class="form-control" name="wil_kode" id="wil_kode" placeholder="Wil Kode" value="<?php echo $wil_kode; ?>" />
        </div>
	    <div class="form-group">
            <label for="int">Kar Kode <?php echo form_error('kar_kode') ?></label>
            <input type="text" class="form-control" name="kar_kode" id="kar_kode" placeholder="Kar Kode" value="<?php echo $kar_kode; ?>" />
        </div>
	    <div class="form-group">
            <label for="float">Rek Lainlainmasuk <?php echo form_error('rek_lainlainmasuk') ?></label>
            <input type="text" class="form-control" name="rek_lainlainmasuk" id="rek_lainlainmasuk" placeholder="Rek Lainlainmasuk" value="<?php echo $rek_lainlainmasuk; ?>" />
        </div>
	    <div class="form-group">
            <label for="float">Rek Lainlainkeluar <?php echo form_error('rek_lainlainkeluar') ?></label>
            <input type="text" class="form-control" name="rek_lainlainkeluar" id="rek_lainlainkeluar" placeholder="Rek Lainlainkeluar" value="<?php echo $rek_lainlainkeluar; ?>" />
        </div>
	    <div class="form-group">
            <label for="float">Rek Jumlah <?php echo form_error('rek_jumlah') ?></label>
            <input type="text" class="form-control" name="rek_jumlah" id="rek_jumlah" placeholder="Rek Jumlah" value="<?php echo $rek_jumlah; ?>" />
        </div>
	    <div class="form-group">
            <label for="datetime">Rek Tanggal <?php echo form_error('rek_tanggal') ?></label>
            <input type="text" class="form-control" name="rek_tanggal" id="rek_tanggal" placeholder="Rek Tanggal" value="<?php echo $rek_tanggal; ?>" />
        </div>
	    <div class="form-group">
            <label for="datetime">Rek Tgl <?php echo form_error('rek_tgl') ?></label>
            <input type="text" class="form-control" name="rek_tgl" id="rek_tgl" placeholder="Rek Tgl" value="<?php echo $rek_tgl; ?>" />
        </div>
	    <div class="form-group">
            <label for="tinyint">Rek Flag <?php echo form_error('rek_flag') ?></label>
            <input type="text" class="form-control" name="rek_flag" id="rek_flag" placeholder="Rek Flag" value="<?php echo $rek_flag; ?>" />
        </div>
	    <div class="form-group">
            <label for="rek_info">Rek Info <?php echo form_error('rek_info') ?></label>
            <textarea class="form-control" rows="3" name="rek_info" id="rek_info" placeholder="Rek Info"><?php echo $rek_info; ?></textarea>
        </div>
	    <input type="hidden" name="rek_id" value="<?php echo $rek_id; ?>" /> 
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('rekap') ?>" class="btn btn-default">Cancel</a>
	</div>
            </form>
        </div>
        </div>
    </body>
</html>
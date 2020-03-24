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
                    <h2 style="margin-top:0px"><?php echo $button ?> Lainlain </h2>
                </div>
        
        <form action="<?php echo $action; ?>" method="post">
        <div class="ibox-content">
	    <div class="form-group">
            <label for="float">Lln Jumlah <?php echo form_error('lln_jumlah') ?></label>
            <input type="text" class="form-control" name="lln_jumlah" id="lln_jumlah" placeholder="Lln Jumlah" value="<?php echo $lln_jumlah; ?>" />
        </div>
	    <div class="form-group">
            <label for="tinyint">Lln Jenis <?php echo form_error('lln_jenis') ?></label>
            <input type="text" class="form-control" name="lln_jenis" id="lln_jenis" placeholder="Lln Jenis" value="<?php echo $lln_jenis; ?>" />
        </div>
	    <div class="form-group">
            <label for="tinyint">Lln Inout <?php echo form_error('lln_inout') ?></label>
            <input type="text" class="form-control" name="lln_inout" id="lln_inout" placeholder="Lln Inout" value="<?php echo $lln_inout; ?>" />
        </div>
	    <div class="form-group">
            <label for="datetime">Lln Tanggal <?php echo form_error('lln_tanggal') ?></label>
            <input type="text" class="form-control" name="lln_tanggal" id="lln_tanggal" placeholder="Lln Tanggal" value="<?php echo $lln_tanggal; ?>" />
        </div>
	    <div class="form-group">
            <label for="datetime">Lln Tgl <?php echo form_error('lln_tgl') ?></label>
            <input type="text" class="form-control" name="lln_tgl" id="lln_tgl" placeholder="Lln Tgl" value="<?php echo $lln_tgl; ?>" />
        </div>
	    <div class="form-group">
            <label for="tinyint">Lln Flag <?php echo form_error('lln_flag') ?></label>
            <input type="text" class="form-control" name="lln_flag" id="lln_flag" placeholder="Lln Flag" value="<?php echo $lln_flag; ?>" />
        </div>
	    <div class="form-group">
            <label for="lln_info">Lln Info <?php echo form_error('lln_info') ?></label>
            <textarea class="form-control" rows="3" name="lln_info" id="lln_info" placeholder="Lln Info"><?php echo $lln_info; ?></textarea>
        </div>
	    <input type="hidden" name="lln_id" value="<?php echo $lln_id; ?>" /> 
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('lainlain') ?>" class="btn btn-default">Cancel</a>
	</div>
            </form>
        </div>
        </div>
    </body>
</html>
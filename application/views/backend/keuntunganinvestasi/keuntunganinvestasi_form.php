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
                    <h2 style="margin-top:0px"><?php echo $button ?> Keuntunganinvestasi </h2>
                </div>
        
        <form action="<?php echo $action; ?>" method="post">
        <div class="ibox-content">
	    <div class="form-group">
            <label for="int">Pib Id <?php echo form_error('pib_id') ?></label>
            <input type="text" class="form-control" name="pib_id" id="pib_id" placeholder="Pib Id" value="<?php echo $pib_id; ?>" />
        </div>
	    <div class="form-group">
            <label for="float">Kiv Jmlkeuntungan <?php echo form_error('kiv_jmlkeuntungan') ?></label>
            <input type="text" class="form-control" name="kiv_jmlkeuntungan" id="kiv_jmlkeuntungan" placeholder="Kiv Jmlkeuntungan" value="<?php echo $kiv_jmlkeuntungan; ?>" />
        </div>
	    <div class="form-group">
            <label for="datetime">Kiv Tglkeuntungan <?php echo form_error('kiv_tglkeuntungan') ?></label>
            <input type="text" class="form-control" name="kiv_tglkeuntungan" id="kiv_tglkeuntungan" placeholder="Kiv Tglkeuntungan" value="<?php echo $kiv_tglkeuntungan; ?>" />
        </div>
	    <div class="form-group">
            <label for="datetime">Kiv Tgl <?php echo form_error('kiv_tgl') ?></label>
            <input type="text" class="form-control" name="kiv_tgl" id="kiv_tgl" placeholder="Kiv Tgl" value="<?php echo $kiv_tgl; ?>" />
        </div>
	    <div class="form-group">
            <label for="tinyint">Kiv Flag <?php echo form_error('kiv_flag') ?></label>
            <input type="text" class="form-control" name="kiv_flag" id="kiv_flag" placeholder="Kiv Flag" value="<?php echo $kiv_flag; ?>" />
        </div>
	    <div class="form-group">
            <label for="kiv_info">Kiv Info <?php echo form_error('kiv_info') ?></label>
            <textarea class="form-control" rows="3" name="kiv_info" id="kiv_info" placeholder="Kiv Info"><?php echo $kiv_info; ?></textarea>
        </div>
	    <input type="hidden" name="kiv_id" value="<?php echo $kiv_id; ?>" /> 
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('keuntunganinvestasi') ?>" class="btn btn-default">Cancel</a>
	</div>
            </form>
        </div>
        </div>
    </body>
</html>
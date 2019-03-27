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
                    <h2 style="margin-top:0px"><?php echo $button ?> Jasainvestasi </h2>
                </div>
        
        <form action="<?php echo $action; ?>" method="post">
        <div class="ibox-content">
	    <div class="form-group">
            <label for="varchar">Jiv Jasa <?php echo form_error('jiv_jasa') ?></label>
            <input type="text" class="form-control" name="jiv_jasa" id="jiv_jasa" placeholder="Jiv Jasa" value="<?php echo $jiv_jasa; ?>" />
        </div>
	    <div class="form-group">
            <label for="jiv_keterangan">Jiv Keterangan <?php echo form_error('jiv_keterangan') ?></label>
            <textarea class="form-control" rows="3" name="jiv_keterangan" id="jiv_keterangan" placeholder="Jiv Keterangan"><?php echo $jiv_keterangan; ?></textarea>
        </div>
	    <div class="form-group">
            <label for="datetime">Jiv Tgl <?php echo form_error('jiv_tgl') ?></label>
            <input type="text" class="form-control" name="jiv_tgl" id="jiv_tgl" placeholder="Jiv Tgl" value="<?php echo $jiv_tgl; ?>" />
        </div>
	    <div class="form-group">
            <label for="tinyint">Jiv Flag <?php echo form_error('jiv_flag') ?></label>
            <input type="text" class="form-control" name="jiv_flag" id="jiv_flag" placeholder="Jiv Flag" value="<?php echo $jiv_flag; ?>" />
        </div>
	    <div class="form-group">
            <label for="jiv_info">Jiv Info <?php echo form_error('jiv_info') ?></label>
            <textarea class="form-control" rows="3" name="jiv_info" id="jiv_info" placeholder="Jiv Info"><?php echo $jiv_info; ?></textarea>
        </div>
	    <input type="hidden" name="jiv_id" value="<?php echo $jiv_id; ?>" /> 
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('jasainvestasi') ?>" class="btn btn-default">Cancel</a>
	</div>
            </form>
        </div>
        </div>
    </body>
</html>
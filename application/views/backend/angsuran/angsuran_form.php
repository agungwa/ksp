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
                    <h2 style="margin-top:0px"><?php echo $button ?> Angsuran </h2>
                </div>
        
        <form action="<?php echo $action; ?>" method="post">
        <div class="ibox-content">
	    <div class="form-group">
            <label for="varchar">Pin Id <?php echo form_error('pin_id') ?></label>
            <input type="text" class="form-control" name="pin_id" id="pin_id" placeholder="Pin Id" value="<?php echo $pin_id; ?>" />
        </div>
	    <div class="form-group">
            <label for="int">Ang Angsuranke <?php echo form_error('ang_angsuranke') ?></label>
            <input type="text" class="form-control" name="ang_angsuranke" id="ang_angsuranke" placeholder="Ang Angsuranke" value="<?php echo $ang_angsuranke; ?>" />
        </div>
	    <div class="form-group">
            <label for="date">Ags Tgljatuhtempo <?php echo form_error('ags_tgljatuhtempo') ?></label>
            <input type="text" class="form-control" name="ags_tgljatuhtempo" id="ags_tgljatuhtempo" placeholder="Ags Tgljatuhtempo" value="<?php echo $ags_tgljatuhtempo; ?>" />
        </div>
	    <div class="form-group">
            <label for="datetime">Ags Tglbayar <?php echo form_error('ags_tglbayar') ?></label>
            <input type="text" class="form-control" name="ags_tglbayar" id="ags_tglbayar" placeholder="Ags Tglbayar" value="<?php echo $ags_tglbayar; ?>" />
        </div>
	    <div class="form-group">
            <label for="float">Ags Jmlpokok <?php echo form_error('ags_jmlpokok') ?></label>
            <input type="text" class="form-control" name="ags_jmlpokok" id="ags_jmlpokok" placeholder="Ags Jmlpokok" value="<?php echo $ags_jmlpokok; ?>" />
        </div>
	    <div class="form-group">
            <label for="float">Ags Jmlbunga <?php echo form_error('ags_jmlbunga') ?></label>
            <input type="text" class="form-control" name="ags_jmlbunga" id="ags_jmlbunga" placeholder="Ags Jmlbunga" value="<?php echo $ags_jmlbunga; ?>" />
        </div>
	    <div class="form-group">
            <label for="tinyint">Ags Status <?php echo form_error('ags_status') ?></label>
            <input type="text" class="form-control" name="ags_status" id="ags_status" placeholder="Ags Status" value="<?php echo $ags_status; ?>" />
        </div>
	    <div class="form-group">
            <label for="datetime">Ags Tgl <?php echo form_error('ags_tgl') ?></label>
            <input type="text" class="form-control" name="ags_tgl" id="ags_tgl" placeholder="Ags Tgl" value="<?php echo $ags_tgl; ?>" />
        </div>
	    <div class="form-group">
            <label for="tinyint">Ags Flag <?php echo form_error('ags_flag') ?></label>
            <input type="text" class="form-control" name="ags_flag" id="ags_flag" placeholder="Ags Flag" value="<?php echo $ags_flag; ?>" />
        </div>
	    <div class="form-group">
            <label for="ags_info">Ags Info <?php echo form_error('ags_info') ?></label>
            <textarea class="form-control" rows="3" name="ags_info" id="ags_info" placeholder="Ags Info"><?php echo $ags_info; ?></textarea>
        </div>
	    <input type="hidden" name="ags_id" value="<?php echo $ags_id; ?>" /> 
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('angsuran') ?>" class="btn btn-default">Cancel</a>
	</div>
            </form>
        </div>
        </div>
    </body>
</html>
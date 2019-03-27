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
                    <h2 style="margin-top:0px"><?php echo $button ?> Dendaangsuran </h2>
                </div>
        
        <form action="<?php echo $action; ?>" method="post">
        <div class="ibox-content">
	    <div class="form-group">
            <label for="int">Ags Id <?php echo form_error('ags_id') ?></label>
            <input type="text" class="form-control" name="ags_id" id="ags_id" placeholder="Ags Id" value="<?php echo $ags_id; ?>" />
        </div>
	    <div class="form-group">
            <label for="int">Sed Id <?php echo form_error('sed_id') ?></label>
            <input type="text" class="form-control" name="sed_id" id="sed_id" placeholder="Sed Id" value="<?php echo $sed_id; ?>" />
        </div>
	    <div class="form-group">
            <label for="datetime">Dnd Tgl <?php echo form_error('dnd_tgl') ?></label>
            <input type="text" class="form-control" name="dnd_tgl" id="dnd_tgl" placeholder="Dnd Tgl" value="<?php echo $dnd_tgl; ?>" />
        </div>
	    <div class="form-group">
            <label for="tinyint">Dnd Flag <?php echo form_error('dnd_flag') ?></label>
            <input type="text" class="form-control" name="dnd_flag" id="dnd_flag" placeholder="Dnd Flag" value="<?php echo $dnd_flag; ?>" />
        </div>
	    <div class="form-group">
            <label for="dnd_info">Dnd Info <?php echo form_error('dnd_info') ?></label>
            <textarea class="form-control" rows="3" name="dnd_info" id="dnd_info" placeholder="Dnd Info"><?php echo $dnd_info; ?></textarea>
        </div>
	    <input type="hidden" name="dnd_id" value="<?php echo $dnd_id; ?>" /> 
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('dendaangsuran') ?>" class="btn btn-default">Cancel</a>
	</div>
            </form>
        </div>
        </div>
    </body>
</html>
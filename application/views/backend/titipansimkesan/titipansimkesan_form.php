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
                    <h2 style="margin-top:0px"><?php echo $button ?> Titipansimkesan </h2>
                </div>
        
        <form action="<?php echo $action; ?>" method="post">
        <div class="ibox-content">
	    <div class="form-group">
            <label for="int">Sik Id <?php echo form_error('sik_id') ?></label>
            <input type="text" class="form-control" name="sik_id" id="sik_id" placeholder="Sik Id" value="<?php echo $sik_id; ?>" />
        </div>
	    <div class="form-group">
            <label for="datetime">Tts Tgltitip <?php echo form_error('tts_tgltitip') ?></label>
            <input type="text" class="form-control" name="tts_tgltitip" id="tts_tgltitip" placeholder="Tts Tgltitip" value="<?php echo $tts_tgltitip; ?>" />
        </div>
	    <div class="form-group">
            <label for="float">Tts Jmltitip <?php echo form_error('tts_jmltitip') ?></label>
            <input type="text" class="form-control" name="tts_jmltitip" id="tts_jmltitip" placeholder="Tts Jmltitip" value="<?php echo $tts_jmltitip; ?>" />
        </div>
	    <div class="form-group">
            <label for="float">Tts Jmlambil <?php echo form_error('tts_jmlambil') ?></label>
            <input type="text" class="form-control" name="tts_jmlambil" id="tts_jmlambil" placeholder="Tts Jmlambil" value="<?php echo $tts_jmlambil; ?>" />
        </div>
	    <div class="form-group">
            <label for="tinyint">Tts Status <?php echo form_error('tts_status') ?></label>
            <input type="text" class="form-control" name="tts_status" id="tts_status" placeholder="Tts Status" value="<?php echo $tts_status; ?>" />
        </div>
	    <div class="form-group">
            <label for="datetime">Tts Tgl <?php echo form_error('tts_tgl') ?></label>
            <input type="text" class="form-control" name="tts_tgl" id="tts_tgl" placeholder="Tts Tgl" value="<?php echo $tts_tgl; ?>" />
        </div>
	    <div class="form-group">
            <label for="tinyint">Tts Flag <?php echo form_error('tts_flag') ?></label>
            <input type="text" class="form-control" name="tts_flag" id="tts_flag" placeholder="Tts Flag" value="<?php echo $tts_flag; ?>" />
        </div>
	    <div class="form-group">
            <label for="tts_info">Tts Info <?php echo form_error('tts_info') ?></label>
            <textarea class="form-control" rows="3" name="tts_info" id="tts_info" placeholder="Tts Info"><?php echo $tts_info; ?></textarea>
        </div>
	    <input type="hidden" name="tts_id" value="<?php echo $tts_id; ?>" /> 
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('titipansimkesan') ?>" class="btn btn-default">Cancel</a>
	</div>
            </form>
        </div>
        </div>
    </body>
</html>
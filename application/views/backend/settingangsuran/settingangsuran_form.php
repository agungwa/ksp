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
                    <h2 style="margin-top:0px"><?php echo $button ?> Setting Angsuran </h2>
                </div>
        
        <form action="<?php echo $action; ?>" method="post">
        <div class="ibox-content col-md-12">
        <div class="col-md-4">
	    <div class="form-group">
            <label for="tinyint">Tenor (dalam bulan) <?php echo form_error('sea_tenor') ?></label>
            <input type="text" class="form-control" name="sea_tenor" id="sea_tenor" placeholder="Tenor" value="<?php echo $sea_tenor; ?>" />
        </div>
	    <input type="hidden" name="sea_id" value="<?php echo $sea_id; ?>" /> 
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('settingangsuran') ?>" class="btn btn-default">Batal</a>
        </div>
	</div>
            </form>
        </div>
        </div>
    </body>
</html>
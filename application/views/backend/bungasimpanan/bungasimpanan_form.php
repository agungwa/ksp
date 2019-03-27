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
                    <h2 style="margin-top:0px"><?php echo $button ?> Bungasimpanan </h2>
                </div>
        
        <form action="<?php echo $action; ?>" method="post">
        <div class="ibox-content">
	    <div class="form-group">
            <label for="float">Bus Bunga <?php echo form_error('bus_bunga') ?></label>
            <input type="text" class="form-control" name="bus_bunga" id="bus_bunga" placeholder="Bus Bunga" value="<?php echo $bus_bunga; ?>" />
        </div>
	    <div class="form-group">
            <label for="datetime">Bus Tgl <?php echo form_error('bus_tgl') ?></label>
            <input type="text" class="form-control" name="bus_tgl" id="bus_tgl" placeholder="Bus Tgl" value="<?php echo $bus_tgl; ?>" />
        </div>
	    <div class="form-group">
            <label for="tinyint">Bus Flag <?php echo form_error('bus_flag') ?></label>
            <input type="text" class="form-control" name="bus_flag" id="bus_flag" placeholder="Bus Flag" value="<?php echo $bus_flag; ?>" />
        </div>
	    <div class="form-group">
            <label for="bus_info">Bus Info <?php echo form_error('bus_info') ?></label>
            <textarea class="form-control" rows="3" name="bus_info" id="bus_info" placeholder="Bus Info"><?php echo $bus_info; ?></textarea>
        </div>
	    <input type="hidden" name="bus_id" value="<?php echo $bus_id; ?>" /> 
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('bungasimpanan') ?>" class="btn btn-default">Cancel</a>
	</div>
            </form>
        </div>
        </div>
    </body>
</html>
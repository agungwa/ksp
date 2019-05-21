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
                    <h2 style="margin-top:0px"><?php echo $button ?> Bunga Simpanan </h2>
                </div>
        
        <form action="<?php echo $action; ?>" method="post">
        <div class="ibox-content">
	    <div class="form-group col-xs-2">
            <label for="float">Bunga (dalam %) <?php echo form_error('bus_bunga') ?></label>
            <input class="form-control" type="number"  name="bus_bunga" id="bus_bunga" placeholder="Bunga" value="<?php echo $bus_bunga; ?>" />
        </div>
        <div class="clearfix"> </div>
	    <input type="hidden" name="bus_id" value="<?php echo $bus_id; ?>" /> 
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('bungasimpanan') ?>" class="btn btn-default">Batal</a>
	</div>
            </form>
        </div>
        </div>
    </body>
</html>
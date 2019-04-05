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
                    <h2 style="margin-top:0px"><?php echo $button ?> Potonganprovisi </h2>
                </div>
        
        <form action="<?php echo $action; ?>" method="post">
        <div class="ibox-content">
	    <div class="form-group">
            <label for="float">Pop Potongan <?php echo form_error('pop_potongan') ?></label>
            <input type="text" class="form-control" name="pop_potongan" id="pop_potongan" placeholder="Pop Potongan" value="<?php echo $pop_potongan; ?>" />
        </div>
	    <input type="hidden" name="pop_id" value="<?php echo $pop_id; ?>" /> 
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('potonganprovisi') ?>" class="btn btn-default">Cancel</a>
	</div>
            </form>
        </div>
        </div>
    </body>
</html>
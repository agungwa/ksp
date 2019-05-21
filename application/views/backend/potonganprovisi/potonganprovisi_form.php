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
                    <h2 style="margin-top:0px"><?php echo $button ?> Potongan Provisi </h2>
                </div>
        
        <form action="<?php echo $action; ?>" method="post">
        <div class="ibox-content col-md-12">
        <div class="col-md-4">
	    <div class="form-group">
            <label for="float">Potongan (dalam persen)<?php echo form_error('pop_potongan') ?></label>
            <input type="number" class="form-control" name="pop_potongan" id="pop_potongan" placeholder="Potongan" value="<?php echo $pop_potongan; ?>" />
        </div>
	    <input type="hidden" name="pop_id" value="<?php echo $pop_id; ?>" /> 
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('potonganprovisi') ?>" class="btn btn-default">Batal</a>
        </div>
	</div>
            </form>
        </div>
        </div>
    </body>
</html>
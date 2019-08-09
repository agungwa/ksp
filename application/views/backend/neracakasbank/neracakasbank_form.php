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
                    <h2 style="margin-top:0px"><?php echo $button ?> Kas Bank </h2>
                </div>
        
        <form action="<?php echo $action; ?>" method="post">
        <div class="ibox-content">
	    <div class="form-group">
            <label for="datetime">Tanggal <?php echo form_error('nkb_tanggal') ?></label>
            <input type="date" class="form-control" name="nkb_tanggal" id="todays-date" placeholder="Tanggal" value="<?php echo $nkb_tanggal; ?>" />
        </div>
	    <div class="form-group">
            <label for="float">Jumlah <?php echo form_error('nkb_jumlah') ?></label>
            <input type="number" class="form-control" name="nkb_jumlah" id="nkb_jumlah" placeholder="Jumlah" value="<?php echo $nkb_jumlah; ?>" />
        </div>
	    <input type="hidden" name="nkb_id" value="<?php echo $nkb_id; ?>" /> 
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('neracakasbank') ?>" class="btn btn-default">Cancel</a>
	</div>
            </form>
        </div>
        </div>
    </body>
</html>
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
                    <h2 style="margin-top:0px"><?php echo $button ?> Temp_setoransimpanan </h2>
                </div>
        
        <form action="<?php echo $action; ?>" method="post">
        <div class="ibox-content">
	    <div class="form-group">
            <label for="varchar">Sim Kode <?php echo form_error('sim_kode') ?></label>
            <input type="text" class="form-control" name="sim_kode" id="sim_kode" placeholder="Sim Kode" value="<?php echo $sim_kode; ?>" />
        </div>
	    <div class="form-group">
            <label for="float">Tes Totalsetor <?php echo form_error('tes_totalsetor') ?></label>
            <input type="text" class="form-control" name="tes_totalsetor" id="tes_totalsetor" placeholder="Tes Totalsetor" value="<?php echo $tes_totalsetor; ?>" />
        </div>
	    <div class="form-group">
            <label for="datetime">Tes Periode <?php echo form_error('tes_periode') ?></label>
            <input type="text" class="form-control" name="tes_periode" id="tes_periode" placeholder="Tes Periode" value="<?php echo $tes_periode; ?>" />
        </div>
	    <input type="hidden" name="tes_id" value="<?php echo $tes_id; ?>" /> 
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('temp_setoransimpanan') ?>" class="btn btn-default">Cancel</a>
	</div>
            </form>
        </div>
        </div>
    </body>
</html>
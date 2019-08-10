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
                    <h2 style="margin-top:0px"><?php echo $button ?> Neracaekuitas </h2>
                </div>
        
        <form action="<?php echo $action; ?>" method="post">
        <div class="ibox-content">
	    <div class="form-group">
            <label for="datetime">Tanggal <?php echo form_error('nek_tanggal') ?></label>
            <input type="date" class="form-control" name="nek_tanggal" id="todays-date" placeholder="Tanggal" value="<?php echo $nek_tanggal; ?>" />
        </div>
	    <div class="form-group">
            <label for="float">Simpanancdr <?php echo form_error('nek_simpanancdr') ?></label>
            <input type="number" class="form-control" name="nek_simpanancdr" id="nek_simpanancdr" placeholder="Simpanancdr" value="<?php echo $nek_simpanancdr; ?>" />
        </div>
	    <div class="form-group">
            <label for="float">Donasi <?php echo form_error('nek_donasi') ?></label>
            <input type="number" class="form-control" name="nek_donasi" id="nek_donasi" placeholder="Donasi" value="<?php echo $nek_donasi; ?>" />
        </div>
	    <input type="hidden" name="nek_id" value="<?php echo $nek_id; ?>" /> 
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('neracaekuitas') ?>" class="btn btn-default">Cancel</a>
	</div>
            </form>
        </div>
        </div>
    </body>
</html>
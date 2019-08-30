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
                    <h2 style="margin-top:0px"><?php echo $button ?> Neracakas bank simkesan </h2>
                </div>
        
        <form action="<?php echo $action; ?>" method="post">
        <div class="ibox-content">
	    <div class="form-group">
            <label for="datetime">Tanggal <?php echo form_error('nkbs_tanggal') ?></label>
            <input type="text" class="form-control" name="nkbs_tanggal" id="todays-date" placeholder="Nkbs Tanggal" value="<?php echo $nkbs_tanggal; ?>" />
        </div>
	    <div class="form-group">
            <label for="float">Nkbs Jumlah <?php echo form_error('nkbs_jumlah') ?></label>
            <input type="text" class="form-control numeric" name="jumlah" id="nkbs_jumlah" placeholder="Nkbs Jumlah" value="<?php echo $nkbs_jumlah; ?>" />
        </div>
	    <input type="hidden" name="nkbs_id" value="<?php echo $nkbs_id; ?>" /> 
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('neracakasbanksimkesan') ?>" class="btn btn-default">Cancel</a>
	</div>
            </form>
        </div>
        </div>
    </body>
</html>
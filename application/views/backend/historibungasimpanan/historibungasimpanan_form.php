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
                    <h2 style="margin-top:0px"><?php echo $button ?> Histori bunga simpanan </h2>
                </div>
        
        <form action="<?php echo $action; ?>" method="post">
        <div class="ibox-content">
	    <div class="form-group">
            <label for="int">ID Anggota <?php echo form_error('ang_no') ?></label>
            <input type="text" class="form-control" name="ang_no" id="ang_no" placeholder="Ang No" value="<?php echo $ang_no; ?>" />
        </div>
	    <div class="form-group">
            <label for="datetime">Tanggal Terakhir<?php echo form_error('hbs_tglterakhir') ?></label>
            <input type="date" class="form-control" name="hbs_tglterakhir" id="hbs_tglterakhir" placeholder="Hbs Tglterakhir" value="<?php echo $hbs_tglterakhir; ?>" />
        </div>
	    <input type="hidden" name="hbs_id" value="<?php echo $hbs_id; ?>" /> 
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('historibungasimpanan') ?>" class="btn btn-default">Cancel</a>
	</div>
            </form>
        </div>
        </div>
    </body>
</html>
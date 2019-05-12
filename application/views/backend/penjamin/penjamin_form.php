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
                    <h2 style="margin-top:0px"><?php echo $button ?> Penjamin </h2>
                </div>
        
        <form action="<?php echo $action; ?>" method="post">
        <div class="ibox-content">
	    <div class="form-group">
            <label for="varchar">No KTP <?php echo form_error('pen_noktp') ?></label>
            <input type="text" class="form-control" name="pen_noktp" id="pen_noktp" placeholder="No KTP" value="<?php echo $pen_noktp; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Nama <?php echo form_error('pen_nama') ?></label>
            <input type="text" class="form-control" name="pen_nama" id="pen_nama" placeholder="Nama" value="<?php echo $pen_nama; ?>" />
        </div>
	    <div class="form-group">
            <label for="pen_alamat">Alamat <?php echo form_error('pen_alamat') ?></label>
            <textarea class="form-control" rows="3" name="pen_alamat" id="pen_alamat" placeholder="Alamat"><?php echo $pen_alamat; ?></textarea>
        </div>
	    <div class="form-group">
            <label for="varchar">No Handphone<?php echo form_error('pen_nohp') ?></label>
            <input type="number" class="form-control" name="pen_nohp" id="pen_nohp" placeholder="No Handphone" value="08<?php echo $pen_nohp; ?>" />
        </div>
	    <input type="hidden" name="pen_id" value="<?php echo $pen_id; ?>" /> 
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('penjamin') ?>" class="btn btn-default">Cancel</a>
	</div>
            </form>
        </div>
        </div>
    </body>
</html>
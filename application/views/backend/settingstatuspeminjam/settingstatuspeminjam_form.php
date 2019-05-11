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
                    <h2 style="margin-top:0px"><?php echo $button ?> Setting Status Peminjam </h2>
                </div>
        
        <form action="<?php echo $action; ?>" method="post">
        <div class="ibox-content col-md-12">
        <div class="col-md-4">
	    <div class="form-group">
            <label for="varchar">Nama Status <?php echo form_error('ssp_namastatus') ?></label>
            <input type="text" class="form-control" name="ssp_namastatus" id="ssp_namastatus" placeholder="Nama Status" value="<?php echo $ssp_namastatus; ?>" />
        </div>
	    <input type="hidden" name="ssp_id" value="<?php echo $ssp_id; ?>" /> 
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('settingstatuspeminjam') ?>" class="btn btn-default">Cancel</a>
	</div>
            </form>
        </div>
        </div>
    </body>
</html>
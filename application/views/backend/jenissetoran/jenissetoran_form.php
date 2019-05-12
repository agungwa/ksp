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
                    <h2 style="margin-top:0px"><?php echo $button ?> Jenissetoran </h2>
                </div>
        
        <form action="<?php echo $action; ?>" method="post">
        <div class="ibox-content">
	    <div class="form-group">
            <label for="varchar">Jenis Setoran <?php echo form_error('jse_setoran') ?></label>
            <input type="text" class="form-control" name="jse_setoran" id="jse_setoran" placeholder="Setoran" value="<?php echo $jse_setoran; ?>" />
        </div>
	    <div class="form-group">
            <label for="jse_keterangan">Keterangan <?php echo form_error('jse_keterangan') ?></label>
            <textarea class="form-control" rows="3" name="jse_keterangan" id="jse_keterangan" placeholder="Keterangan"><?php echo $jse_keterangan; ?></textarea>
        </div>
        <div class="form-group">
            <label for="jse_min">Minimal <?php echo form_error('jse_min') ?></label>
            <input type="number" class="form-control" name="jse_min" id="jse_min" placeholder="Minimal" value="<?php echo $jse_min; ?>" />
        </div>
	    <input type="hidden" name="jse_id" value="<?php echo $jse_id; ?>" /> 
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('jenissetoran') ?>" class="btn btn-default">Batal</a>
	</div>
            </form>
        </div>
        </div>
    </body>
</html>
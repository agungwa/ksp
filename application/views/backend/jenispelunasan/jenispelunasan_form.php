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
                    <h2 style="margin-top:0px"><?php echo $button ?> Jenis Pelunasan </h2>
                </div>
        
        <form action="<?php echo $action; ?>" method="post">
        <div class="ibox-content col-md-12">
        <div class="col-md-4">
	    <div class="form-group">
            <label for="varchar">Jenis <?php echo form_error('jep_jenis') ?></label>
            <input type="text" class="form-control" name="jep_jenis" id="jep_jenis" placeholder="Jenis" value="<?php echo $jep_jenis; ?>" />
        </div>
	    <div class="form-group">
            <label for="jep_keterangan">Keterangan <?php echo form_error('jep_keterangan') ?></label>
            <textarea class="form-control" rows="3" name="jep_keterangan" id="jep_keterangan" placeholder="Keterangan"><?php echo $jep_keterangan; ?></textarea>
        </div>
	    <input type="hidden" name="jep_id" value="<?php echo $jep_id; ?>" /> 
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('jenispelunasan') ?>" class="btn btn-default">Cancel</a>
        </div>
	</div>
            </form>
        </div>
        </div>
    </body>
</html>
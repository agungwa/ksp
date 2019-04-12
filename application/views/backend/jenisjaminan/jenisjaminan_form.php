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
                    <h2 style="margin-top:0px"><?php echo $button ?> Jenisjaminan </h2>
                </div>
        
        <form action="<?php echo $action; ?>" method="post">
        <div class="ibox-content">
	    <div class="form-group">
            <label for="varchar">Jej Jaminan <?php echo form_error('jej_jaminan') ?></label>
            <input type="text" class="form-control" name="jej_jaminan" id="jej_jaminan" placeholder="Jej Jaminan" value="<?php echo $jej_jaminan; ?>" />
        </div>
	    <div class="form-group">
            <label for="jej_keterangan">Jej Keterangan <?php echo form_error('jej_keterangan') ?></label>
            <textarea class="form-control" rows="3" name="jej_keterangan" id="jej_keterangan" placeholder="Jej Keterangan"><?php echo $jej_keterangan; ?></textarea>
        </div>
	    <input type="hidden" name="jej_id" value="<?php echo $jej_id; ?>" /> 
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('jenisjaminan') ?>" class="btn btn-default">Cancel</a>
	</div>
            </form>
        </div>
        </div>
    </body>
</html>
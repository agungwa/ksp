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
                    <h2 style="margin-top:0px"><?php echo $button ?> Kantor ksp </h2>
                </div>
        
        <form action="<?php echo $action; ?>" method="post">
        <div class="ibox-content">
	    <div class="form-group">
            <label for="varchar">Kks Nama <?php echo form_error('kks_nama') ?></label>
            <input type="text" class="form-control" name="kks_nama" id="kks_nama" placeholder="Kks Nama" value="<?php echo $kks_nama; ?>" />
        </div>
	    <div class="form-group">
            <label for="kks_alamat">Kks Alamat <?php echo form_error('kks_alamat') ?></label>
            <textarea class="form-control" rows="3" name="kks_alamat" id="kks_alamat" placeholder="Kks Alamat"><?php echo $kks_alamat; ?></textarea>
        </div>
	    <div class="form-group">
            <label for="varchar">Kks Kode <?php echo form_error('kks_kode') ?></label>
            <input type="text" class="form-control" name="kks_kode" id="kks_kode" placeholder="Kks Kode" value="<?php echo $kks_kode; ?>" />
        </div>
	    <input type="hidden" name="kks_id" value="<?php echo $kks_id; ?>" /> 
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('kantorksp') ?>" class="btn btn-default">Cancel</a>
	</div>
            </form>
        </div>
        </div>
    </body>
</html>
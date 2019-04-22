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
                    <h2 style="margin-top:0px"><?php echo $button ?> Karyawan </h2>
                </div>
        
        <form action="<?php echo $action; ?>" method="post">
        <div class="ibox-content">
        <?php if ($button == 'Create') { ?>
        <div class="form-group">
            <label for="varchar">Kar Kode <?php echo form_error('kar_kode') ?></label>
            <input type="text" class="form-control" name="kar_kode" id="kar_kode" placeholder="Kar Kode" value="<?php echo $kar_kode; ?>" />
        </div>
        <?php } else {?>
            <input type="hidden" name="kar_kode" value="<?php echo $kar_kode; ?>" /> 
        <?php } ?>

	    <div class="form-group">
            <label for="varchar">Kar Nama <?php echo form_error('kar_nama') ?></label>
            <input type="text" class="form-control" name="kar_nama" id="kar_nama" placeholder="Kar Nama" value="<?php echo $kar_nama; ?>" />
        </div>

        <div class="form-group">
            <label for="varchar">Jab Kode <?php echo form_error('jab_kode') ?></label>
            <div class="input-group">
            <input type="hidden" name="jab_kode" id="jab_kode" value="<?php echo $jab_kode; ?>" />
            <input type="text" class="form-control" name="nm_jab_kode" id="nm_jab_kode" placeholder="Jabatan" value="<?php echo $nm_jab_kode; ?>" readonly/>
            <div class="input-group-addon">
                <span onclick="lookup('<?=base_url()?>Jabatan/lookup','jab_kode');" style="cursor: pointer;">Cari</span>
            </div>
            </div>
        </div>

	    <div class="form-group">
            <label for="kar_alamat">Kar Alamat <?php echo form_error('kar_alamat') ?></label>
            <textarea class="form-control" rows="3" name="kar_alamat" id="kar_alamat" placeholder="Kar Alamat"><?php echo $kar_alamat; ?></textarea>
        </div>
	    <div class="form-group">
            <label for="varchar">Kar Nohp <?php echo form_error('kar_nohp') ?></label>
            <input type="text" class="form-control" name="kar_nohp" id="kar_nohp" placeholder="Kar Nohp" value="<?php echo $kar_nohp; ?>" />
        </div>
	    
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('karyawan') ?>" class="btn btn-default">Cancel</a>
	</div>
            </form>
        </div>
        </div>
    </body>
</html>
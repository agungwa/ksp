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
                    <h2 style="margin-top:0px"><?php echo $button ?> Wilayah Karyawan </h2>
                </div>
        
        <form action="<?php echo $action; ?>" method="post">
        <div class="ibox-content col-md-12">
        <div class="col-md-4">

        <div class="form-group">
            <label for="varchar">Wilayah <?php echo form_error('wil_kode') ?></label>
            <div class="input-group">
            <input type="hidden" name="wil_kode" id="wil_kode" value="<?php echo $wil_kode; ?>" />
            <input type="text" class="form-control" name="nm_wil_kode" id="nm_wil_kode" placeholder="Wilayah" value="<?php echo $nm_wil_kode; ?>" readonly/>
            <div class="input-group-addon">
                <span onclick="lookup('<?=base_url()?>Wilayah/lookup','wil_kode');" style="cursor: pointer;">Cari</span>
            </div>
            </div>
        </div>

	    <!-- <div class="form-group">
            <label for="varchar">Status <?php echo form_error('status') ?></label>
            <input type="text" class="form-control" name="status" id="status" placeholder="Status" value="<?php echo $status; ?>" />
        </div> -->
	    
        <div class="form-group">
            <label for="varchar">Karyawan <?php echo form_error('kar_kode') ?></label>
            <div class="input-group">
            <input type="hidden" name="kar_kode" id="kar_kode" value="<?php echo $kar_kode; ?>" />
            <input type="text" class="form-control" name="nm_kar_kode" id="nm_kar_kode" placeholder="Karyawan" value="<?php echo $nm_kar_kode; ?>" readonly/>
            <div class="input-group-addon">
                <span onclick="lookup('<?=base_url()?>Karyawan/lookup','kar_kode');" style="cursor: pointer;">Cari</span>
            </div>
            </div>
        </div>

	    <input type="hidden" name="wik_id" value="<?php echo $wik_id; ?>" /> 
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('wilayah_karyawan') ?>" class="btn btn-default">Batal</a>
	</div>
    </div>
            </form>
        </div>
        </div>
    </body>
</html>
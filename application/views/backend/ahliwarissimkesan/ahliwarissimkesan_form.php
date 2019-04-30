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
                    <h2 style="margin-top:0px"><?php echo $button ?> Ahliwarissimkesan </h2>
                </div>
        
        <form action="<?php echo $action; ?>" method="post">
        <div class="ibox-content">
	    
        <div class="form-group">
            <label for="varchar">Sik Kode <?php echo form_error('sik_kode') ?></label>
            <div class="input-group">
            <!-- <input type="hidden" name="pin_id" id="pin_id" value="<?php echo $pin_id; ?>" /> -->
            <input type="hidden" name="sik_kode" id="sik_kode" value="69" />
            <input type="text" class="form-control" name="nm_sik_kode" id="nm_sik_kode" placeholder="Simkesan" value="<?php echo $nm_sik_kode; ?>" readonly/>
            <div class="input-group-addon">
                <span onclick="lookup('<?=base_url()?>simkesan/lookup','sik_kode');" style="cursor: pointer;">Cari</span>
            </div>
            </div>
        </div>

	    <div class="form-group">
            <label for="varchar">Aws Noid <?php echo form_error('aws_noid') ?></label>
            <input type="text" class="form-control" name="aws_noid" id="aws_noid" placeholder="Aws Noid" value="<?php echo $aws_noid; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Aws Jenisid <?php echo form_error('aws_jenisid') ?></label>
            <input type="text" class="form-control" name="aws_jenisid" id="aws_jenisid" placeholder="Aws Jenisid" value="<?php echo $aws_jenisid; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Aws Nama <?php echo form_error('aws_nama') ?></label>
            <input type="text" class="form-control" name="aws_nama" id="aws_nama" placeholder="Aws Nama" value="<?php echo $aws_nama; ?>" />
        </div>
	    <div class="form-group">
            <label for="aws_alamat">Aws Alamat <?php echo form_error('aws_alamat') ?></label>
            <textarea class="form-control" rows="3" name="aws_alamat" id="aws_alamat" placeholder="Aws Alamat"><?php echo $aws_alamat; ?></textarea>
        </div>
	    <div class="form-group">
            <label for="varchar">Aws Hubungan <?php echo form_error('aws_hubungan') ?></label>
            <input type="text" class="form-control" name="aws_hubungan" id="aws_hubungan" placeholder="Aws Hubungan" value="<?php echo $aws_hubungan; ?>" />
        </div>
	    <div class="form-group">
            <label for="aws_lampiran">Aws Lampiran <?php echo form_error('aws_lampiran') ?></label>
            <textarea class="form-control" rows="3" name="aws_lampiran" id="aws_lampiran" placeholder="Aws Lampiran"><?php echo $aws_lampiran; ?></textarea>
        </div>

	    <input type="hidden" name="aws_id" value="<?php echo $aws_id; ?>" /> 
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('ahliwarissimkesan') ?>" class="btn btn-default">Cancel</a>
	</div>
            </form>
        </div>
        </div>
    </body>
</html>
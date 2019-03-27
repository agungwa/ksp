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
            <input type="text" class="form-control" name="sik_kode" id="sik_kode" placeholder="Sik Kode" value="<?php echo $sik_kode; ?>" />
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
	    <div class="form-group">
            <label for="datetime">Aws Tgl <?php echo form_error('aws_tgl') ?></label>
            <input type="text" class="form-control" name="aws_tgl" id="aws_tgl" placeholder="Aws Tgl" value="<?php echo $aws_tgl; ?>" />
        </div>
	    <div class="form-group">
            <label for="tinyint">Aws Flag <?php echo form_error('aws_flag') ?></label>
            <input type="text" class="form-control" name="aws_flag" id="aws_flag" placeholder="Aws Flag" value="<?php echo $aws_flag; ?>" />
        </div>
	    <div class="form-group">
            <label for="aws_info">Aws Info <?php echo form_error('aws_info') ?></label>
            <textarea class="form-control" rows="3" name="aws_info" id="aws_info" placeholder="Aws Info"><?php echo $aws_info; ?></textarea>
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
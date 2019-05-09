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
        <div class="ibox-content col-md-12">
        <div class="col-md-8"> 
        <div class="col-md-6"> 
        <div class="form-group">
            <label for="varchar">Rekening Simkesan <?php echo form_error('sik_kode') ?></label>
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
            <label for="varchar">Ahli Waris ID<?php echo form_error('aws_noid') ?></label>
            <input type="text" class="form-control" name="aws_noid" id="aws_noid" placeholder="Ahli Waris ID" value="<?php echo $aws_noid; ?>" />
        </div>
        </div>
        <div class="col-md-6"> 
	    <div class="form-group">
            <label for="varchar">Jenis ID <?php echo form_error('aws_jenisid') ?></label>
            <input type="text" class="form-control" name="aws_jenisid" id="aws_jenisid" placeholder="Jenis ID" value="<?php echo $aws_jenisid; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Nama <?php echo form_error('aws_nama') ?></label>
            <input type="text" class="form-control" name="aws_nama" id="aws_nama" placeholder="Nama" value="<?php echo $aws_nama; ?>" />
        </div>
        </div>
        <div class="col-md-8"> 
	    <div class="form-group">
            <label for="aws_alamat">Alamat <?php echo form_error('aws_alamat') ?></label>
            <textarea class="form-control" rows="3" name="aws_alamat" id="aws_alamat" placeholder="Alamat"><?php echo $aws_alamat; ?></textarea>
        </div>
	    <div class="form-group">
            <label for="varchar">Hubungan <?php echo form_error('aws_hubungan') ?></label>
            <input type="text" class="form-control" name="aws_hubungan" id="aws_hubungan" placeholder="Hubungan" value="<?php echo $aws_hubungan; ?>" />
        </div>
	    <div class="form-group">
            <label for="aws_lampiran">Lampiran <?php echo form_error('aws_lampiran') ?></label>
            <textarea class="form-control" rows="3" name="aws_lampiran" id="aws_lampiran" placeholder="Lampiran"><?php echo $aws_lampiran; ?></textarea>
        </div>

	    <input type="hidden" name="aws_id" value="<?php echo $aws_id; ?>" /> 
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('ahliwarissimkesan') ?>" class="btn btn-default">Cancel</a>
        </div>
   
	</div>
            </form>
        </div>
        </div>
    </body>
</html>
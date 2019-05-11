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
                    <h2 style="margin-top:0px"><?php echo $button ?> Status Peminjam </h2>
                </div>
        
        <form action="<?php echo $action; ?>" method="post">
        <div class="ibox-content col-md-12">
        <div class="col-md-4">
        <div class="form-group">
            <label for="varchar">Anggota <?php echo form_error('ang_no') ?></label>
            <div class="input-group">
            <input type="hidden" name="ang_no" id="ang_no" value="<?php echo $ang_no; ?>" />
            <input type="text" class="form-control" name="nm_ang_no" id="nm_ang_no" placeholder="Anggota" value="<?php echo $nm_ang_no; ?>" readonly/>
            <div class="input-group-addon">
                <span onclick="lookup('<?=base_url()?>Anggota/lookup','ang_no');" style="cursor: pointer;">Cari</span>
            </div>
            </div>
        </div>
        <div class="form-group">
            <label for="int">Status Peminjam <?php echo form_error('ssp_id') ?></label>
            <div class="input-group">
            <input type="hidden" name="ssp_id" id="ssp_id" value="<?php echo $ssp_id; ?>" />
            <input type="text" class="form-control" name="nm_ssp_id" id="nm_ssp_id" placeholder="Status Peminjam" value="<?php echo $nm_ssp_id; ?>" readonly/>
            <div class="input-group-addon">
                <span onclick="lookup('<?=base_url()?>settingstatuspeminjam/lookup','ssp_id');" style="cursor: pointer;">Cari</span>
            </div>
            </div>
        </div>
        <div class="form-group">
            <label for="int">Rekening Pinjaman <?php echo form_error('pin_id') ?></label>
            <div class="input-group">
            <input type="hidden" name="pin_id" id="pin_id" value="<?php echo $pin_id; ?>" />
            <input type="text" class="form-control" name="nm_pin_id" id="nm_pin_id" placeholder="Rekening Pinjaman" value="<?php echo $nm_pin_id; ?>" readonly/>
            <div class="input-group-addon">
                <span onclick="lookup('<?=base_url()?>Pinjaman/lookup','pin_id');" style="cursor: pointer;">Cari</span>
            </div>
            </div>
        </div>
	    <input type="hidden" name="stp_id" value="<?php echo $stp_id; ?>" /> 
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('statuspeminjam') ?>" class="btn btn-default">Cancel</a>
        </div>
	</div>
            </form>
        </div>
        </div>
    </body>
</html>
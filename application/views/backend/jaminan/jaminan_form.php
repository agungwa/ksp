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
                    <h2 style="margin-top:0px"><?php echo $button ?> Jaminan </h2>
                </div>
        
        <form action="<?php echo $action; ?>" method="post">
        <div class="ibox-content">
        <div class="form-group">
            <label for="varchar">Pin Id <?php echo form_error('pin_id') ?></label>
            <div class="input-group">
            <!-- <input type="hidden" name="pin_id" id="pin_id" value="<?php echo $pin_id; ?>" /> -->
            <input type="hidden" name="pin_id" id="pin_id" value="69" />
            <input type="text" class="form-control" name="nm_pin_id" id="nm_pin_id" placeholder="Pinjaman" value="<?php echo $nm_pin_id; ?>" readonly/>
            <div class="input-group-addon">
                <span onclick="lookup('<?=base_url()?>pinjaman/lookup','pin_id');" style="cursor: pointer;">Cari</span>
            </div>
            </div>
        </div>

        <div class="form-group">
            <label for="varchar">Jej Id <?php echo form_error('jej_id') ?></label>
            <div class="input-group">
            <input type="hidden" name="jej_id" id="jej_id" value="<?php echo $jej_id; ?>" />
            <input type="text" class="form-control" name="nm_jej_id" id="nm_jej_id" placeholder="Jenis Jaminan" value="<?php echo $nm_jej_id; ?>" readonly/>
            <div class="input-group-addon">
                <span onclick="lookup('<?=base_url()?>jenisjaminan/lookup','jej_id');" style="cursor: pointer;">Cari</span>
            </div>
            </div>
        </div>

	    <div class="form-group">
            <label for="varchar">Jam Nomor <?php echo form_error('jam_nomor') ?></label>
            <input type="text" class="form-control" name="jam_nomor" id="jam_nomor" placeholder="Jam Nomor" value="<?php echo $jam_nomor; ?>" />
        </div>
	    <div class="form-group">
            <label for="jam_keterangan">Jam Keterangan <?php echo form_error('jam_keterangan') ?></label>
            <textarea class="form-control" rows="3" name="jam_keterangan" id="jam_keterangan" placeholder="Jam Keterangan"><?php echo $jam_keterangan; ?></textarea>
        </div>
	    <!-- <div class="form-group">
            <label for="jam_file">Jam File <?php echo form_error('jam_file') ?></label>
            <textarea class="form-control" rows="3" name="jam_file" id="jam_file" placeholder="Jam File"><?php echo $jam_file; ?></textarea>
        </div> -->
	    <input type="hidden" name="jam_id" value="<?php echo $jam_id; ?>" /> 
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('jaminan') ?>" class="btn btn-default">Cancel</a>
	</div>
            </form>
        </div>
        </div>
    </body>
</html>
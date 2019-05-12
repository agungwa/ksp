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
                    <h2 style="margin-top:0px"><?php echo $button ?> Mutasi Simkesan </h2>
                </div>
        
        <form action="<?php echo $action; ?>" method="post">
        <div class="ibox-content col-md-12">
        <div class="col-md-4">
	    
        <div class="form-group">
            <label for="varchar">Rekening Simkesan <?php echo form_error('sik_kode') ?></label>
            <div class="input-group">
            <!-- <input type="hidden" name="sik_kode" id="sik_kode" value="<?php echo $sik_kode; ?>" /> -->
            <input type="hidden" name="sik_kode" id="sik_kode" value="69" />
            <input type="text" class="form-control" name="nm_sik_kode" id="nm_sik_kode" placeholder="Simkesan" value="<?php echo $nm_sik_kode; ?>" readonly/>
            <div class="input-group-addon">
                <span onclick="lookup('<?=base_url()?>simkesan/lookup','sik_kode');" style="cursor: pointer;">Cari</span>
            </div>
            </div>
        </div>

	    <div class="form-group">
            <label for="datetime">Tanggal Mutasi <?php echo form_error('msk_tglmutasi') ?></label>
            <input type="date" class="form-control" name="msk_tglmutasi" id="todays-date" placeholder="Msk Tglmutasi" value="<?php echo $msk_tglmutasi; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Asal <?php echo form_error('msk_asal') ?></label>
            <input type="text" class="form-control" name="msk_asal" id="msk_asal" placeholder="Asal" value="<?php echo $msk_asal; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Tujuan <?php echo form_error('msk_tujuan') ?></label>
            <input type="text" class="form-control" name="msk_tujuan" id="msk_tujuan" placeholder="Tujuan" value="<?php echo $msk_tujuan; ?>" />
        </div>
	    <div class="form-group">
            <label for="tinyint">Status <?php echo form_error('msk_status') ?></label>
            <input type="text" class="form-control" name="msk_status" id="msk_status" placeholder="Status" value="<?php echo $msk_status; ?>" />
        </div>
        
	    <input type="hidden" name="msk_id" value="<?php echo $msk_id; ?>" /> 
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('mutasisimkesan') ?>" class="btn btn-default">Batal</a>
	</div>
            </form>
        </div>
        </div>
    </body>
</html>
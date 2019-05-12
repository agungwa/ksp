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
                    <h2 style="margin-top:0px"><?php echo $button ?> Simpananwajib </h2>
                </div>
        
        <form action="<?php echo $action; ?>" method="post">
        <div class="ibox-content col-md-12">
        <div class="col-md-6">
        <div class="form-group col-md-12">
            <label for="varchar">Anggota <?php echo form_error('ang_no') ?></label>
            <div class="input-group">
            <input type="hidden" name="ang_no" id="ang_no" value="<?php echo $ang_no; ?>" />
            <input type="text" class="form-control" name="nm_ang_no" id="nm_ang_no" placeholder="Anggota" value="<?php echo $nm_ang_no; ?>" readonly/>
            <div class="input-group-addon">
                <span onclick="lookup('<?=base_url()?>anggota/lookup','ang_no');" style="cursor: pointer;">Cari</span>
            </div>
            </div>
        </div>
        <div class="form-group col-md-12">
            <label for="varchar">Setting Simpanan <?php echo form_error('ses_id') ?></label>
            <div class="input-group">
            <input type="hidden" name="ses_id" id="ses_id" value="<?php echo $ses_id; ?>" />
            <input type="text" class="form-control" name="nm_ses_id" id="nm_ses_id" placeholder="Setting Simpanan" value="<?php echo $nm_ses_id; ?>" readonly/>
            <div class="input-group-addon">
                <span onclick="lookup('<?=base_url()?>settingsimpanan/lookup','ses_id');" style="cursor: pointer;">Cari</span>
            </div>
            </div>
        </div>
	    <div class="form-group col-md-12">
            <label for="datetime">Tanggal Bayar <?php echo form_error('siw_tglbayar') ?></label>
            <input type="date" class="form-control" name="siw_tglbayar" id="todays-date" placeholder="Tanggal Bayar" value="<?php echo $siw_tglbayar; ?>" />
        </div>
	    <div class="form-group col-md-12">
            <label for="tinyint">Status <?php echo form_error('siw_status') ?></label>
            <input type="text" class="form-control" name="siw_status" id="siw_status" placeholder="Status" value="<?php echo $siw_status; ?>" />
        </div>
	    <div class="form-group col-md-12">
            <label for="datetime">Tanggal Ambil <?php echo form_error('siw_tglambil') ?></label>
            <input type="date" class="form-control" name="siw_tglambil" id="siw_tglambil" placeholder="Tanggal Ambil" value="<?php echo $siw_tglambil; ?>" />
        </div>
	    <input type="hidden" name="siw_id" value="<?php echo $siw_id; ?>" /> 
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('simpananwajib') ?>" class="btn btn-default">Batal</a>
        </div>
	</div>
            </form>
        </div>
        </div>
    </body>
</html>
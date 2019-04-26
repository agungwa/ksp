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
                    <h2 style="margin-top:0px"><?php echo $button ?> Simpananpokok </h2>
                </div>
        
        <form action="<?php echo $action; ?>" method="post">
        <div class="ibox-content">
        <div class="form-group">
            <label for="varchar">Anggota <?php echo form_error('ang_no') ?></label>
            <div class="input-group">
            <input type="hidden" name="ang_no" id="ang_no" value="<?php echo $ang_no; ?>" />
            <input type="text" class="form-control" name="nm_ang_no" id="nm_ang_no" placeholder="Anggota" value="<?php echo $nm_ang_no; ?>" readonly/>
            <div class="input-group-addon">
                <span onclick="lookup('<?=base_url()?>anggota/lookup','ang_no');" style="cursor: pointer;">Cari</span>
            </div>
            </div>
        </div>
        <div class="form-group">
            <label for="varchar">Setting Simpanan <?php echo form_error('ses_id') ?></label>
            <div class="input-group">
            <input type="hidden" name="ses_id" id="ses_id" value="<?php echo $ses_id; ?>" />
            <input type="text" class="form-control" name="nm_ses_id" id="nm_ses_id" placeholder="Setting Simpanan" value="<?php echo $nm_ses_id; ?>" readonly/>
            <div class="input-group-addon">
                <span onclick="lookup('<?=base_url()?>settingsimpaan/lookup','ses_id');" style="cursor: pointer;">Cari</span>
            </div>
            </div>
        </div>
	    <div class="form-group">
            <label for="datetime">Sip Tglbayar <?php echo form_error('sip_tglbayar') ?></label>
            <input type="text" class="form-control" name="sip_tglbayar" id="sip_tglbayar" placeholder="Sip Tglbayar" value="<?php echo $sip_tglbayar; ?>" />
        </div>
	    <input type="hidden" name="sip_id" value="<?php echo $sip_id; ?>" /> 
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('simpananpokok') ?>" class="btn btn-default">Cancel</a>
	</div>
            </form>
        </div>
        </div>
    </body>
</html>
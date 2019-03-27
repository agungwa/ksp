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
                    <h2 style="margin-top:0px"><?php echo $button ?> Penarikansimkesan </h2>
                </div>
        
        <form action="<?php echo $action; ?>" method="post">
        <div class="ibox-content">
	    <div class="form-group">
            <label for="int">Pns Id <?php echo form_error('pns_id') ?></label>
            <input type="text" class="form-control" name="pns_id" id="pns_id" placeholder="Pns Id" value="<?php echo $pns_id; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Sik Kode <?php echo form_error('sik_kode') ?></label>
            <input type="text" class="form-control" name="sik_kode" id="sik_kode" placeholder="Sik Kode" value="<?php echo $sik_kode; ?>" />
        </div>
	    <div class="form-group">
            <label for="int">Jps Id <?php echo form_error('jps_id') ?></label>
            <input type="text" class="form-control" name="jps_id" id="jps_id" placeholder="Jps Id" value="<?php echo $jps_id; ?>" />
        </div>
	    <div class="form-group">
            <label for="datetime">Pns Tglpenarikan <?php echo form_error('pns_tglpenarikan') ?></label>
            <input type="text" class="form-control" name="pns_tglpenarikan" id="pns_tglpenarikan" placeholder="Pns Tglpenarikan" value="<?php echo $pns_tglpenarikan; ?>" />
        </div>
	    <div class="form-group">
            <label for="float">Pns Jmlsimkesan <?php echo form_error('pns_jmlsimkesan') ?></label>
            <input type="text" class="form-control" name="pns_jmlsimkesan" id="pns_jmlsimkesan" placeholder="Pns Jmlsimkesan" value="<?php echo $pns_jmlsimkesan; ?>" />
        </div>
	    <div class="form-group">
            <label for="float">Pns Jmlpenarikan <?php echo form_error('pns_jmlpenarikan') ?></label>
            <input type="text" class="form-control" name="pns_jmlpenarikan" id="pns_jmlpenarikan" placeholder="Pns Jmlpenarikan" value="<?php echo $pns_jmlpenarikan; ?>" />
        </div>
	    <div class="form-group">
            <label for="pns_catatan">Pns Catatan <?php echo form_error('pns_catatan') ?></label>
            <textarea class="form-control" rows="3" name="pns_catatan" id="pns_catatan" placeholder="Pns Catatan"><?php echo $pns_catatan; ?></textarea>
        </div>
	    <div class="form-group">
            <label for="datetime">Pns Tgl <?php echo form_error('pns_tgl') ?></label>
            <input type="text" class="form-control" name="pns_tgl" id="pns_tgl" placeholder="Pns Tgl" value="<?php echo $pns_tgl; ?>" />
        </div>
	    <div class="form-group">
            <label for="tinyint">Pns Flag <?php echo form_error('pns_flag') ?></label>
            <input type="text" class="form-control" name="pns_flag" id="pns_flag" placeholder="Pns Flag" value="<?php echo $pns_flag; ?>" />
        </div>
	    <div class="form-group">
            <label for="pns_info">Pns Info <?php echo form_error('pns_info') ?></label>
            <textarea class="form-control" rows="3" name="pns_info" id="pns_info" placeholder="Pns Info"><?php echo $pns_info; ?></textarea>
        </div>
	    <input type="hidden" name="" value="<?php echo $; ?>" /> 
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('penarikansimkesan') ?>" class="btn btn-default">Cancel</a>
	</div>
            </form>
        </div>
        </div>
    </body>
</html>
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
                    <h2 style="margin-top:0px"><?php echo $button ?> Penarikan Simkesan </h2>
                </div>
        
        <form action="<?php echo $action; ?>" method="post">
        <div class="ibox-content col-md-12">
        <div class="col-md-4">

	    <div class="form-group">
            <label for="varchar">Rekening Simkesan<?php echo form_error('sik_kode') ?></label>
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
            <label for="int">Jenis Penarikan <?php echo form_error('jps_id') ?></label>
            <div class="input-group">
            <input type="hidden" name="jps_id" id="jps_id" value="<?php echo $jps_id; ?>" />
            <input type="text" class="form-control" name="nm_jps_id" id="nm_jps_id" placeholder="Jenis Penarikan" value="<?php echo $nm_jps_id; ?>" readonly/>
            <div class="input-group-addon">
                <span onclick="lookup('<?=base_url()?>jenispenarikansimkesan/lookup','jps_id');" style="cursor: pointer;">Cari</span>
            </div>
            </div>
        </div>

	    <div class="form-group">
            <label for="datetime">Tanggal Penarikan <?php echo form_error('pns_tglpenarikan') ?></label>
            <input type="date" class="form-control" name="pns_tglpenarikan" id="todays-date" placeholder="Tanggal Penarikan" value="<?php echo $pns_tglpenarikan; ?>" />
        </div>
	    <div class="form-group">
            <label for="float">Jumlah Simkesan<?php echo form_error('pns_jmlsimkesan') ?></label>
            <input type="number" class="form-control" name="pns_jmlsimkesan" id="pns_jmlsimkesan" placeholder="Jumlah Simkesan" value="<?php echo $pns_jmlsimkesan; ?>" />
        </div>
	    <div class="form-group">
            <label for="float">Jumlah Penarikan <?php echo form_error('pns_jmlpenarikan') ?></label>
            <input type="number" class="form-control" name="pns_jmlpenarikan" id="pns_jmlpenarikan" placeholder="Jumlah Penarikan" value="<?php echo $pns_jmlpenarikan; ?>" />
        </div>
	    <div class="form-group">
            <label for="pns_catatan">Catatan <?php echo form_error('pns_catatan') ?></label>
            <textarea class="form-control" rows="3" name="pns_catatan" id="pns_catatan" placeholder="Catatan"><?php echo $pns_catatan; ?></textarea>
        </div>

	    <input type="hidden" name="pns_id" value="<?php echo $pns_id; ?>" /> 
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('penarikansimkesan') ?>" class="btn btn-default">Batal</a>
        </div>
	</div>
            </form>
        </div>
        </div>
    </body>
</html>
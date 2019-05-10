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
                    <h2 style="margin-top:0px"><?php echo $button ?> Klaimsimkesan </h2>
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
            <label for="int">Jenis Klaim <?php echo form_error('jkl_id') ?></label>
            <div class="input-group">
            <input type="hidden" name="jkl_id" id="jkl_id" value="<?php echo $jkl_id; ?>" />
            <input type="text" class="form-control" name="nm_jkl_id" id="nm_jkl_id" placeholder="Jenis Klaim" value="<?php echo $nm_jkl_id; ?>" readonly/>
            <div class="input-group-addon">
                <span onclick="lookup('<?=base_url()?>jenisklaim/lookup','jkl_id');" style="cursor: pointer;">Cari</span>
            </div>
            </div>
        </div>

	    <div class="form-group">
            <label for="datetime">Tanggal Klaim <?php echo form_error('ksi_tglklaim') ?></label>
            <input type="date" class="form-control" name="ksi_tglklaim" id="todays-date" placeholder="Tanggal Klaim" value="<?php echo $ksi_tglklaim; ?>" />
        </div>
	    <div class="form-group">
            <label for="float">Jumlah Klaim <?php echo form_error('ksi_jmlklaim') ?></label>
            <input type="number" class="form-control" name="ksi_jmlklaim" id="ksi_jmlklaim" placeholder="Jumlah Klaim" value="<?php echo $ksi_jmlklaim; ?>" />
        </div>
	    <div class="form-group">
            <label for="float">Jumlah Tunggakan <?php echo form_error('ksi_jmltunggakan') ?></label>
            <input type="number" class="form-control" name="ksi_jmltunggakan" id="ksi_jmltunggakan" placeholder="Jumlah Tunggakan" value="<?php echo $ksi_jmltunggakan; ?>" />
        </div>
	    <div class="form-group">
            <label for="float">Jumlah Terima <?php echo form_error('ksi_jmlditerima') ?></label>
            <input type="number" class="form-control" name="ksi_jmlditerima" id="ksi_jmlditerima" placeholder="Jumlah Terima" value="<?php echo $ksi_jmlditerima; ?>" />
        </div>
	    <div class="form-group">
            <label for="tinyint">Status <?php echo form_error('ksi_status') ?></label>
            <input type="number" class="form-control" name="ksi_status" id="ksi_status" placeholder="Status" value="<?php echo $ksi_status; ?>" />
        </div>

	    <input type="hidden" name="ksi_id" value="<?php echo $ksi_id; ?>" /> 
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('klaimsimkesan') ?>" class="btn btn-default">Cancel</a>
        </div>
	</div>
            </form>
        </div>
        </div>
    </body>
</html>
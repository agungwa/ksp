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
                    <h2 style="margin-top:0px"><?php echo $button ?> Simkesan </h2>
                </div>
        
        <form action="<?php echo $action; ?>" method="post">
        <div class="ibox-content col-md-12">
        <div class="col-md-8"> 
        <div class="col-md-6"> 
        <div class="form-group">
            <label for="tinyint">Rekening Simkesan <?php echo form_error('sik_kode') ?></label>
            <input type="text" class="form-control" name="sik_kode" id="sik_kode" placeholder="Rekening Simkesan" value="<?php echo $sik_kode; ?>" />
        </div>

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
            <label for="varchar">Karyawan <?php echo form_error('kar_kode') ?></label>
            <div class="input-group">
            <input type="hidden" name="kar_kode" id="kar_kode" value="<?php echo $kar_kode; ?>" />
            <input type="text" class="form-control" name="nm_kar_kode" id="nm_kar_kode" placeholder="Karyawan" value="<?php echo $nm_kar_kode; ?>" readonly/>
            <div class="input-group-addon">
                <span onclick="lookup('<?=base_url()?>karyawan/lookup','kar_kode');" style="cursor: pointer;">Cari</span>
            </div>
            </div>
        </div>

        <div class="form-group">
            <label for="int">Plan Simkesan <?php echo form_error('psk_id') ?></label>
            <div class="input-group">
            <input type="hidden" name="psk_id" id="psk_id" value="<?php echo $psk_id; ?>" />
            <input type="text" class="form-control" name="nm_psk_id" id="nm_psk_id" placeholder="Plan Simkesan" value="<?php echo $nm_psk_id; ?>" readonly/>
            <div class="input-group-addon">
                <span onclick="lookup('<?=base_url()?>plansimkesan/lookup','psk_id');" style="cursor: pointer;">Cari</span>
            </div>
            </div>
        </div>
        </div>
        <div class="col-md-6"> 
        <div class="form-group">
            <label for="varchar">Wilayah <?php echo form_error('wil_kode') ?></label>
            <div class="input-group">
            <input type="hidden" name="wil_kode" id="wil_kode" value="<?php echo $wil_kode; ?>" />
            <input type="text" class="form-control" name="nm_wil_kode" id="nm_wil_kode" placeholder="Wilayah" value="<?php echo $nm_wil_kode; ?>" readonly/>
            <div class="input-group-addon">
                <span onclick="lookup('<?=base_url()?>wilayah/lookup','wil_kode');" style="cursor: pointer;">Cari</span>
            </div>
            </div>
        </div>

	    <div class="form-group">
            <label for="datetime">Tanggal Pendaftaran <?php echo form_error('sik_tglpendaftaran') ?></label>
            <input type="date" class="form-control" name="sik_tglpendaftaran" id="todays-date" placeholder="Tanggal Pendaftaran" value="<?php echo $sik_tglpendaftaran; ?>" />
        </div>
	    <div class="form-group">
            <label for="datetime">Tanggal Berakhir <?php echo form_error('sik_tglberakhir') ?></label>
            <input type="date" class="form-control" name="sik_tglberakhir" id="sik_tglberakhir" placeholder="Tanggal Berakhir" value="<?php echo $sik_tglberakhir; ?>" />
        </div>
	    <div class="form-group">
            <label for="tinyint">Status <?php echo form_error('sik_status') ?></label>
            <input type="text" class="form-control" name="sik_status" id="sik_status" placeholder="Status" value="<?php echo $sik_status; ?>" />
        </div>

	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('simkesan') ?>" class="btn btn-default">Batal</a>
        </div>
        </div>
	</div>
            </form>
        </div>
        </div>
    </div>
    </body>
</html>
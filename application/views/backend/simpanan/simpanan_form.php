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
                    <h2 style="margin-top:0px"><?php echo $button ?> Simpanan </h2>
                </div>
        
        <form action="<?php echo $action; ?>" method="post">
        <div class="ibox-content col-md-12">
        <div class="col-md-6">
	    <div class="form-group col-md-12">
            <label for="varchar">Kode Simpanan <?php echo form_error('sim_kode') ?></label>
            <input type="text" class="form-control" name="sim_kode" id="sim_kode" placeholder="Kode Simpanan" value="<?php echo $sim_kode; ?>" />
        </div>
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
            <label for="varchar">Karyawan <?php echo form_error('kar_kode') ?></label>
            <div class="input-group">
            <input type="hidden" name="kar_kode" id="kar_kode" value="<?php echo $kar_kode; ?>" />
            <input type="text" class="form-control" name="nm_kar_kode" id="nm_kar_kode" placeholder="Karyawan" value="<?php echo $nm_kar_kode; ?>" readonly/>
            <div class="input-group-addon">
                <span onclick="lookup('<?=base_url()?>karyawan/lookup','kar_kode');" style="cursor: pointer;">Cari</span>
            </div>
            </div>
        </div>
        <div class="form-group col-md-12">
            <label for="float">Bunga Simpanan <?php echo form_error('bus_id') ?></label>
            <div class="input-group">
            <input type="hidden" name="bus_id" id="bus_id" value="<?php echo $bus_id; ?>" />
            <input type="text" class="form-control" name="nm_bus_id" id="nm_bus_id" placeholder="Bunga Simpanan" value="<?php echo $nm_bus_id; ?>" readonly/>
            <div class="input-group-addon">
                <span onclick="lookup('<?=base_url()?>bungasimpanan/lookup','bus_id');" style="cursor: pointer;">Cari</span>
            </div>
            </div>
        </div>
        </div>
        <div class="col-md-6">
        <div class="form-group col-md-12">
            <label for="int">Jenis Simpanan <?php echo form_error('jsi_id') ?></label>
            <div class="input-group">
            <input type="hidden" name="jsi_id" id="jsi_id" value="<?php echo $jsi_id; ?>" />
            <input type="text" class="form-control" name="nm_jsi_id" id="nm_jsi_id" placeholder="Jenis Simpanan" value="<?php echo $nm_jsi_id; ?>" readonly/>
            <div class="input-group-addon">
                <span onclick="lookup('<?=base_url()?>jenissimpanan/lookup','jsi_id');" style="cursor: pointer;">Cari</span>
            </div>
            </div>
        </div>
        <div class="form-group col-md-12">
            <label for="int">Jenis Setoran <?php echo form_error('jse_id') ?></label>
            <div class="input-group">
            <input type="hidden" name="jse_id" id="jse_id" value="<?php echo $jse_id; ?>" />
            <input type="text" class="form-control" name="nm_jse_id" id="nm_jse_id" placeholder="Jenis Setoran" value="<?php echo $nm_jse_id; ?>" readonly/>
            <div class="input-group-addon">
                <span onclick="lookup('<?=base_url()?>jenissetoran/lookup','jse_id');" style="cursor: pointer;">Cari</span>
            </div>
            </div>
        </div>
        <div class="form-group col-md-12">
            <label for="varchar">Wilayah <?php echo form_error('wil_kode') ?></label>
            <div class="input-group">
            <input type="hidden" name="wil_kode" id="wil_kode" value="<?php echo $wil_kode; ?>" />
            <input type="text" class="form-control" name="nm_wil_kode" id="nm_wil_kode" placeholder="Wilayah" value="<?php echo $nm_wil_kode; ?>" readonly/>
            <div class="input-group-addon">
                <span onclick="lookup('<?=base_url()?>wilayah/lookup','wil_kode');" style="cursor: pointer;">Cari</span>
            </div>
            </div>
        </div>
        
	    <div class="form-group col-md-12">
            <label for="datetime">Tanggal Pendaftaran </label>
            <input type="date" class="form-control" name="sim_tglpendaftaran" id="todays-date" placeholder="Sim Tglpendaftaran"  required />
        </div>
        </div>
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('simpanan') ?>" class="btn btn-default">Batal</a>
        
	</div>
            </form>
        </div>
        </div>
    </body>
</html>
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
                    <h2 style="margin-top:0px"><?php echo $button ?> Investasi Berjangka </h2>
                </div>
        
        <form action="<?php echo $action; ?>" method="post">
        <div class="ibox-content col-md-12">
        <div class="col-md-8">
        <div class="col-md-6">
        <div class="form-group">
            <label for="varchar">Rekening Investasi <?php echo form_error('ivb_kode') ?></label>
            <input type="text" class="form-control" name="ivb_kode" id="ivb_kode" placeholder="Rekening Investasi" value="<?php echo $ivb_kode; ?>" />
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
            <label for="int">Jangka Waktu <?php echo form_error('jwi_id') ?></label>
            <div class="input-group">
            <input type="hidden" name="jwi_id" id="jwi_id" value="<?php echo $jwi_id; ?>" />
            <input type="text" class="form-control" name="nm_jwi_id" id="nm_jwi_id" placeholder="Jangka Waktu" value="<?php echo $nm_jwi_id; ?>" readonly/>
            <div class="input-group-addon">
                <span onclick="lookup('<?=base_url()?>jangkawaktuinvestasi/lookup','jwi_id');" style="cursor: pointer;">Cari</span>
            </div>
            </div>
        </div>
        </div>
        <div class="col-md-6">
        <div class="form-group">
            <label for="int">Jasa Investasi <?php echo form_error('jiv_id') ?></label>
            <div class="input-group">
            <input type="hidden" name="jiv_id" id="jiv_id" value="<?php echo $jiv_id; ?>" />
            <input type="text" class="form-control" name="nm_jiv_id" id="nm_jiv_id" placeholder="Jasa Investasi" value="<?php echo $nm_jiv_id; ?>" readonly/>
            <div class="input-group-addon">
                <span onclick="lookup('<?=base_url()?>jasainvestasi/lookup','jiv_id');" style="cursor: pointer;">Cari</span>
            </div>
            </div>
        </div>
       
        <div class="form-group">
            <label for="int">Bunga (dalam persen) <?php echo form_error('biv_id') ?></label>
            <div class="input-group">
            <input type="hidden" name="biv_id" id="biv_id" value="<?php echo $biv_id; ?>" />
            <input type="text" class="form-control" name="nm_biv_id" id="nm_biv_id" placeholder="Bunga Investasi" value="<?php echo $nm_biv_id; ?>" readonly/>
            <div class="input-group-addon">
                <span onclick="lookup('<?=base_url()?>bungainvestasi/lookup','biv_id');" style="cursor: pointer;">Cari</span>
            </div>
            </div>
        </div>
	    <div class="form-group">
            <label for="datetime">Tanggal Pendaftaran <?php echo form_error('ivb_tglpendaftaran') ?></label>
            <input type="date" class="form-control" name="ivb_tglpendaftaran" id="todays-date" placeholder="Tanggal Pendaftaran" value="<?php echo $ivb_tglpendaftaran; ?>" />
        </div>
	    <div class="form-group">
            <label for="datetime">Tanggal Perpanjangan<?php echo form_error('ivb_tglperpanjangan') ?></label>
            <input type="date" class="form-control" name="ivb_tglperpanjangan" id="ivb_tglperpanjangan" placeholder="Tanggal Perpanjangan" value="<?php echo $ivb_tglperpanjangan; ?>" />
        </div>
	    <div class="form-group">
            <label for="tinyint">Status <?php echo form_error('ivb_status') ?></label>
            <input type="text" class="form-control" name="ivb_status" id="ivb_status" placeholder="Status" value="<?php echo $ivb_status; ?>" />
        </div>
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('investasiberjangka') ?>" class="btn btn-default">Batal</a>
        </div>
        </div>
	</div>
            </form>
        </div>
        </div>
    </body>
</html>
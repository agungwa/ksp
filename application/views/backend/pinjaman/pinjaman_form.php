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
                    <h2 style="margin-top:0px"><?php echo $button ?> Pinjaman </h2>
                </div>
        
        <form action="<?php echo $action; ?>" method="post">
        <div class="ibox-content">
	    <div class="form-group">
            <label for="varchar">Pin Id <?php echo form_error('pin_id') ?></label>
            <input type="text" class="form-control" name="pin_id" id="pin_id" placeholder="Pin Id" value="<?php echo $pin_id; ?>" />
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
            <label for="int">Setting Angsuran <?php echo form_error('sea_id') ?></label>
            <div class="input-group">
            <input type="hidden" name="sea_id" id="sea_id" value="<?php echo $sea_id; ?>" />
            <input type="text" class="form-control" name="nm_sea_id" id="nm_sea_id" placeholder="Setting Angsuran" value="<?php echo $nm_sea_id; ?>" readonly/>
            <div class="input-group-addon">
                <span onclick="lookup('<?=base_url()?>settingangsuran/lookup','sea_id');" style="cursor: pointer;">Cari</span>
            </div>
            </div>
        </div>

        <div class="form-group">
            <label for="int">Bup Id <?php echo form_error('bup_id') ?></label>
            <div class="input-group">
            <input type="hidden" name="bup_id" id="bup_id" value="<?php echo $bup_id; ?>" />
            <input type="text" class="form-control" name="nm_bup_id" id="nm_bup_id" placeholder="Bunga Pinjaman" value="<?php echo $nm_bup_id; ?>" readonly/>
            <div class="input-group-addon">
                <span onclick="lookup('<?=base_url()?>bungapinjaman/lookup','bup_id');" style="cursor: pointer;">Cari</span>
            </div>
            </div>
        </div>

        <div class="form-group">
            <label for="int">Pop Id <?php echo form_error('pop_id') ?></label>
            <div class="input-group">
            <input type="hidden" name="pop_id" id="pop_id" value="<?php echo $pop_id; ?>" />
            <input type="text" class="form-control" name="nm_pop_id" id="nm_pop_id" placeholder="Potongan Provisi" value="<?php echo $nm_pop_id; ?>" readonly/>
            <div class="input-group-addon">
                <span onclick="lookup('<?=base_url()?>potonganprovisi/lookup','pop_id');" style="cursor: pointer;">Cari</span>
            </div>
            </div>
        </div>

        <div class="form-group">
            <label for="varchar">Wil Kode <?php echo form_error('wil_kode') ?></label>
            <div class="input-group">
            <input type="hidden" name="wil_kode" id="wil_kode" value="<?php echo $wil_kode; ?>" />
            <input type="text" class="form-control" name="nm_wil_kode" id="nm_wil_kode" placeholder="Wilayah" value="<?php echo $nm_wil_kode; ?>" readonly/>
            <div class="input-group-addon">
                <span onclick="lookup('<?=base_url()?>wilayah/lookup','wil_kode');" style="cursor: pointer;">Cari</span>
            </div>
            </div>
        </div>

        <div class="form-group">
            <label for="int">Skp Id <?php echo form_error('skp_id') ?></label>
            <div class="input-group">
            <input type="hidden" name="skp_id" id="skp_id" value="<?php echo $skp_id; ?>" />
            <input type="text" class="form-control" name="nm_skp_id" id="nm_skp_id" placeholder="SKP Id" value="<?php echo $nm_skp_id; ?>" readonly/>
            <div class="input-group-addon">
                <span onclick="lookup('<?=base_url()?>settingkategoripeminjam/lookup','skp_id');" style="cursor: pointer;">Cari</span>
            </div>
            </div>
        </div>

        <div class="form-group">
            <label for="int">Penjamin <?php echo form_error('pen_id') ?></label>
            <div class="input-group">
            <!-- <input type="hidden" name="pen_id" id="pen_id" value="<?php echo $pen_id; ?>" /> -->
            <input type="hidden" name="pen_id" id="pen_id" value="69" />
            <input type="text" class="form-control" name="nm_pen_id" id="nm_pen_id" placeholder="Penjamin" value="<?php echo $nm_pen_id; ?>" readonly/>
            <div class="input-group-addon">
                <span onclick="lookup('<?=base_url()?>penjamin/lookup','pen_id');" style="cursor: pointer;">Cari</span>
            </div>
            </div>
        </div>

	    <div class="form-group">
            <label for="float">Pin Pengajuan <?php echo form_error('pin_pengajuan') ?></label>
            <input type="text" class="form-control" name="pin_pengajuan" id="pin_pengajuan" placeholder="Pin Pengajuan" value="<?php echo $pin_pengajuan; ?>" />
        </div>
	    <div class="form-group">
            <label for="float">Pin Pinjaman <?php echo form_error('pin_pinjaman') ?></label>
            <input type="text" class="form-control" name="pin_pinjaman" id="pin_pinjaman" placeholder="Pin Pinjaman" value="<?php echo $pin_pinjaman; ?>" />
        </div>
	    <div class="form-group">
            <label for="datetime">Pin Tglpengajuan <?php echo form_error('pin_tglpengajuan') ?></label>
            <input type="text" class="form-control" name="pin_tglpengajuan" id="pin_tglpengajuan" placeholder="Pin Tglpengajuan" value="<?php echo $pin_tglpengajuan; ?>" />
        </div>
	    <div class="form-group">
            <label for="datetime">Pin Tglpencairan <?php echo form_error('pin_tglpencairan') ?></label>
            <input type="text" class="form-control" name="pin_tglpencairan" id="pin_tglpencairan" placeholder="Pin Tglpencairan" value="<?php echo $pin_tglpencairan; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Pin Marketing <?php echo form_error('pin_marketing') ?></label>
            <input type="text" class="form-control" name="pin_marketing" id="pin_marketing" placeholder="Pin Marketing" value="<?php echo $pin_marketing; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Pin Surveyor <?php echo form_error('pin_surveyor') ?></label>
            <input type="text" class="form-control" name="pin_surveyor" id="pin_surveyor" placeholder="Pin Surveyor" value="<?php echo $pin_surveyor; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Pin Survey <?php echo form_error('pin_survey') ?></label>
            <input type="text" class="form-control" name="pin_survey" id="pin_survey" placeholder="Pin Survey" value="<?php echo $pin_survey; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Pin Statuspinjaman <?php echo form_error('pin_statuspinjaman') ?></label>
            <input type="text" class="form-control" name="pin_statuspinjaman" id="pin_statuspinjaman" placeholder="Pin Statuspinjaman" value="<?php echo $pin_statuspinjaman; ?>" />
        </div>
	    
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('pinjaman') ?>" class="btn btn-default">Cancel</a>
	</div>
            </form>
        </div>
        </div>
    </body>
</html>
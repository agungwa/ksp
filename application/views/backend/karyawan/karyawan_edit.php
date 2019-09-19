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
                    <h2 style="margin-top:0px"><?php echo $button ?> Karyawan </h2>
                </div>
        
        <form action="<?php echo $action; ?>" method="post">
        
        <h3 style="margin-top:0px">Data Karyawan </h2>
        <div class="col-lg-4">
        <div class="form-group">
            <label for="varchar">Kode</label>
            <input type="text" class="form-control" name="kar_kode" required readonly id="kar_kode" placeholder="Kode" value="<?php echo $kar_kode ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Nama</label>
            <input type="text" class="form-control" name="kar_nama" id="kar_nama" placeholder="Nama" required  value="<?php echo $kar_nama ?>"  />
        </div>
	    <div class="form-group">
            <label for="varchar">No KTP</label>
            <input type="text" class="form-control" name="kar_nik" id="kar_nik" placeholder="NO KTP" required  value="<?php echo $kar_nik ?>"/>
        </div>

        <div class="form-group">
            <label for="varchar">jabatan <?php echo form_error('jab_kode') ?></label>
            <div class="input-group">
            <input type="hidden" name="jab_kode" id="jab_kode" value="<?php echo $jab_kode; ?>" />
            <input type="text" class="form-control" name="nm_jab_kode" id="nm_jab_kode" placeholder="Jabatan" value="<?php echo $nm_jab_kode; ?>" readonly/>
            <div class="input-group-addon">
                <span onclick="lookup('<?=base_url()?>Jabatan/lookup','jab_kode');" style="cursor: pointer;">Cari</span>
            </div>
            </div>
        </div>

	    <div class="form-group">
            <label for="kar_alamat">Alamat <?php echo form_error('kar_alamat') ?></label>
            <textarea class="form-control" rows="3" name="kar_alamat" id="kar_alamat" placeholder="Kar Alamat"><?php echo $kar_alamat; ?></textarea>
        </div>
	    <div class="form-group">
            <label for="varchar">Nomor Handphone <?php echo form_error('kar_nohp') ?></label>
            <input type="text" class="form-control numeric" name="kar_nohp" id="kar_nohp" placeholder="Kar Nohp" value="<?php echo $kar_nohp; ?>" />
        </div>

        <!-- simpanan karyawan -->
	    <div class="form-group">
            <label for="float">Simpanan</label>
            <input type="text" class="form-control numeric" name="ksi_simpanan" id="ksi_simpanan" placeholder="Ksi Simpanan" required  value="<?php echo $karyawansimpanan->ksi_simpanan ?>">
        </div>
        </div>

        <!-- ijasah karyawan -->
        
        <h3 style="margin-top:0px">Ijazah Karyawan </h2>
        <div class="col-lg-4">
	    <div class="form-group">
            <label for="varchar">Ijazah SD/MI</label>
            <input type="text" class="form-control" name="kij_sd" id="kij_sd" placeholder="Ijasah Sd" required value="<?php echo $karyawanijasah->kij_sd ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Ijazah SMP/MTs</label>
            <input type="text" class="form-control" name="kij_smp" id="kij_smp" placeholder="Ijasah Smp" value="<?php echo $karyawanijasah->kij_smp ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Ijazah SMA/MA/SMK </label>
            <input type="text" class="form-control" name="kij_sma" id="kij_sma" placeholder="Ijasah Sma" value="<?php echo $karyawanijasah->kij_sma ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Ijazah D3  </label>
            <input type="text" class="form-control" name="kij_d3" id="kij_d3" placeholder="Ijasah D3" value="<?php echo $karyawanijasah->kij_d3 ?>"/>
        </div>
	    <div class="form-group">
            <label for="varchar">Ijazah S1 </label>
            <input type="text" class="form-control" name="kij_s1" id="kij_s1" placeholder="Ijasah S1" value="<?php echo $karyawanijasah->kij_s1 ?>"/>
        </div>
	    <div class="form-group">
            <label for="varchar">Ijazah S2 </label>
            <input type="text" class="form-control" name="kij_s2" id="kij_s2" placeholder="Ijasah S2" value="<?php echo $karyawanijasah->kij_s2 ?>"/>
        </div>
	    <div class="form-group">
            <label for="varchar">Ijazah S3 </label>
            <input type="text" class="form-control" name="kij_s3" id="kij_s3" placeholder="Ijasah S3" value="<?php echo $karyawanijasah->kij_s3 ?>"/>
        </div>
	    <div class="form-group">
            <label for="varchar">Lainlain </label>
            <input type="text" class="form-control" name="kij_lainlain" id="kij_lainlain" placeholder="Lainlain" value="<?php echo $karyawanijasah->kij_lainlain ?>"/>
        </div>
        </div>

        <!-- keluarga karyawan -->
        <h3 style="margin-top:0px">Keluarga Karyawan </h2>
        <div class="col-lg-4">
	    <div class="form-group">
            <label for="varchar">Nama</label>
            <input type="text" class="form-control" name="kka_nama" id="kka_nama" placeholder="Kka Nama" required value="<?php echo $karyawankeluarga->kka_nama ?>" />
        </div>
        <div class="form-group">
            <label for="varchar">Hubungan</label>
            <input type="text" class="form-control" name="kka_hubungan" id="kka_hubungan" placeholder="Hubungan" required value="<?php echo $karyawankeluarga->kka_hubungan ?>" />
        </div>
	    <div class="form-group">
            <label for="kka_alamat">Alamat </label>
            <textarea class="form-control" rows="3" name="kka_alamat" id="kka_alamat" placeholder="Kka Alamat" required><?php echo $karyawankeluarga->kka_alamat ?></textarea>
        </div>
	    <div class="form-group">
            <label for="varchar">No Handphone</label>
            <input type="number" class="form-control numeric" name="kka_nohp" id="kka_nohp" placeholder="Kka Nohp" required value="<?php echo $karyawankeluarga->kka_nohp ?>"/>
        </div>
        </div>

	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('karyawan') ?>" class="btn btn-default">Batal</a>
	</div>


            </form>
        </div>
        </div>
    </body>
</html>
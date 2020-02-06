<div class="row">
    <div class="col-lg-12">
        <div class="ibox">
            <div class="ibox-content">
            
            <div class="jumbotron">
                <div class="row" style="margin-bottom: 10px, margin-top:10px">
                  
    <form action="<?php echo site_url('simpanan/simpanana_action'); ?>" method="post">
        <div class="ibox-content col-md-12">
        <h3>Form Simpanan Jangka 9 Bulan</h3>
        <div class="col-md-6">
	    <div class="form-group col-md-12">
            <label for="varchar">Kode Simpanan</label>
            <input type="text" class="form-control" name="sim_kode" id="sim_kode" placeholder="Kode Simpanan" value="<?php echo $kode; ?>"  required readonly />
        </div>
        <div class="form-group col-md-12">
            <label for="varchar">Anggota </label>
            <div class="input-group">
            <input type="hidden" name="ang_no" id="ang_no"  required />
            <input type="text" class="form-control" name="nm_ang_no" id="nm_ang_no" placeholder="Anggota"  required />
            <div class="input-group-addon">
                <span onclick="lookup('<?=base_url()?>anggota/lookup','ang_no');" style="cursor: pointer;">Cari</span>
            </div>
            </div>
        </div>
        <div class="form-group col-md-12">
            <label for="varchar">Karyawan </label>
            <div class="input-group">
            <input type="hidden" name="kar_kode" id="kar_kode"  required />
            <input type="text" class="form-control" name="nm_kar_kode" id="nm_kar_kode" placeholder="Karyawan"  required />
            <div class="input-group-addon">
                <span onclick="lookup('<?=base_url()?>karyawan/lookup','kar_kode');" style="cursor: pointer;">Cari</span>
            </div>
            </div>
        </div>
         <div class="form-group col-md-12">
           <!-- <label for="float">Bunga Simpanan</label>
            <div class="input-group">
            <input type="hidden" name="bus_id" id="bus_id" required />
            <input type="text" class="form-control" name="nm_bus_id" id="nm_bus_id" placeholder="Bunga Simpanan"  required />
            <div class="input-group-addon">
                <span onclick="lookup('<?=base_url()?>bungasimpanan/lookup','bus_id');" style="cursor: pointer;">Cari</span>
            </div>
            </div>--> 
        </div>
        </div> 
        <div class="col-md-6">
        <div class="form-group col-md-12">
            <label for="int">Jenis Setoran </label>
            <div class="input-group">
            <input type="hidden" name="jse_id" id="jse_id"  required />
            <input type="text" class="form-control" name="nm_jse_id" id="nm_jse_id" placeholder="Jenis Setoran"  required />
            <div class="input-group-addon">
                <span onclick="lookup('<?=base_url()?>jenissetoran/lookup','jse_id');" style="cursor: pointer;">Cari</span>
            </div>
            </div>
        </div>
        <div class="form-group col-md-12">
            <label for="varchar">Wilayah </label>
            <div class="input-group">
            <input type="hidden" name="wil_kode" id="wil_kode"  required />
            <input type="text" class="form-control" name="nm_wil_kode" id="nm_wil_kode" placeholder="Wilayah"  required />
            <div class="input-group-addon">
                <span onclick="lookup('<?=base_url()?>wilayah/lookup','wil_kode');" style="cursor: pointer;">Cari</span>
            </div>
            </div>
        </div>
	    <div class="form-group col-md-12">
            <label for="datetime">Tanggal Pendaftaran </label>
            <input type="date" class="form-control" name="sim_tglpendaftaran" id="todays-date" placeholder="Sim Tglpendaftaran"  required />
        </div>
        <input type="hidden" class="form-control" name="sim_status" id="sim_status" placeholder="sim_status"  />
        </div>
        <div class="form-group col-md-3">
	    <button type="submit" class="btn btn-primary">Proses Simpanan</button> 
	    <a href="<?php echo site_url('simpanan') ?>" class="btn btn-default">Batal</a>
        </div>
	</div>
            </form>
                </div>
            </div>
            
            </div>
        </div>
    </div>
</div>
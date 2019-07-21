<div class="row">
    <div class="col-lg-12">
        <div class="ibox">
            <div class="ibox-content">
            
            <div class="jumbotron">
            
                <div class="row" style="margin-bottom: 10px, margin-top:10px">
                    <form action="<?php echo site_url('simkesan/pendaftaran_action'); ?>" method="post">
                    <div class="ibox-content col-md-12">
                    <div class="col-md-12"> 
                    <div class="col-md-6">
                    <div class="form-group">
                        <label for="tinyint">Rekening Simkesan</label>
                        <input type="text" class="form-control" name="sik_kode" id="sik_kode" placeholder="Rekening Simkesan" value="<?php echo $kode; ?>" readonly />
                    </div>

                    <div class="form-group">
                        <label for="varchar">Anggota</label>
                        <div class="input-group">
                        <input type="hidden" name="ang_no" id="ang_no" value="" />
                        <input type="text" class="form-control" name="nm_ang_no" id="nm_ang_no" placeholder="Anggota" value="" readonly/>
                        <div class="input-group-addon">
                            <span onclick="lookup('<?=base_url()?>anggota/lookup','ang_no');" style="cursor: pointer;">Cari</span>
                        </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="varchar">Karyawan</label>
                        <div class="input-group">
                        <input type="hidden" name="kar_kode" id="kar_kode" value="" />
                        <input type="text" class="form-control" name="nm_kar_kode" id="nm_kar_kode" placeholder="Karyawan" value="" readonly/>
                        <div class="input-group-addon">
                            <span onclick="lookup('<?=base_url()?>karyawan/lookup','kar_kode');" style="cursor: pointer;">Cari</span>
                        </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="int">Plan Simkesan</label>
                        <div class="input-group">
                        <input type="hidden" name="psk_id" id="psk_id" value="" />
                        <input type="text" class="form-control" name="nm_psk_id" id="nm_psk_id" placeholder="Plan Simkesan" value="" readonly/>
                        <div class="input-group-addon">
                            <span onclick="lookup('<?=base_url()?>plansimkesan/lookup','psk_id');" style="cursor: pointer;">Cari</span>
                        </div>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label for="varchar">Wilayah</label>
                        <div class="input-group">
                        <input type="hidden" name="wil_kode" id="wil_kode" value="" />
                        <input type="text" class="form-control" name="nm_wil_kode" id="nm_wil_kode" placeholder="Wilayah" value="" readonly/>
                        <div class="input-group-addon">
                            <span onclick="lookup('<?=base_url()?>wilayah/lookup','wil_kode');" style="cursor: pointer;">Cari</span>
                        </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="datetime">Tanggal Pendaftaran</label>
                        <input type="date" class="form-control" name="sik_tglpendaftaran" id="todays-date" placeholder="Tanggal Pendaftaran" value="" />
                    </div>

                    <div class="col-md-">
                    <h3>Form Ahli Waris</h3>
                    <div class="form-group">
                        <label for="varchar">Nama</label>
                        <input type="text" class="form-control" name="aws_nama" id="aws_nama" placeholder="Nama" value="" required="required"  />
                    </div>
                    <div class="form-group">
                        <label for="varchar">Ahli Waris ID</label>
                        <input type="text" class="form-control" name="aws_noid" id="aws_noid" placeholder="Ahli Waris ID" value="" />
                    </div>
                    <div class="form-group">
                        <label for="varchar">Jenis ID </label>
                        <input type="text" class="form-control" name="aws_jenisid" id="aws_jenisid" placeholder="Jenis ID" value="" />
                    </div>
                    <div class="form-group">
                        <label for="aws_alamat">Alamat </label>
                        <textarea class="form-control" rows="3" name="aws_alamat" id="aws_alamat" placeholder="Alamat" required="required" ></textarea>
                    </div>
                    <div class="form-group">
                        <label for="varchar">Hubungan </label>
                        <input type="text" class="form-control" name="aws_hubungan" id="aws_hubungan" placeholder="Hubungan" value="" required="required" />
                    </div>
                    <div class="form-group">
                        <label for="aws_lampiran">Lampiran</label>
                        <textarea class="form-control" rows="3" name="aws_lampiran" id="aws_lampiran" placeholder="Lampiran" required="required" ></textarea>
                    </div>
                    </div>
                    <div class="col-md-8">
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    <a href="<?php echo site_url('simkesan/?p=1') ?>" class="btn btn-default">Batal</a>
                    </div>
                    </form>
                    </div>
            </div>
            
</div>
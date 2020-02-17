<div class="row">
<div class="col-lg-12">
    <div class="ibox">
        <div class="ibox-content">
        <div class="jumbotron">
                <div class="row" style="margin-bottom: 10px, margin-top:10px">

                    <form action="<?php echo site_url('pinjaman/pengajuan_action'); ?>" method="POST">
                    <div class="ibox-content col-md-12">
                        <div class="col-md-8">
                            <h3>Form Pengajuan</h3>
                            <div class="col-md-6">
                            <div class="form-group">
                                <label for="varchar">Rekening Pinjaman</label>
                                <input type="text" class="form-control" name="pin_id" id="pin_id" placeholder="Rekening Pinjaman" value="<?php echo $kode; ?>" readonly required/>
                            </div>

                            <div class="form-group">
                                <label for="varchar">Anggota</label>
                                <div class="input-group">
                                <input type="hidden" name="ang_no" id="ang_no" required/>
                                <input type="text" class="form-control" name="nm_ang_no" id="nm_ang_no" placeholder="Anggota" required autocomplete="off" onkeypress="return false"/>
                                <div class="input-group-addon">
                                    <span onclick="lookup('<?=base_url()?>anggota/lookup','ang_no');" style="cursor: pointer;"><i class="glyphicon glyphicon-search"></i></span>
                                </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="int">Setting Angsuran (bulan)</label>
                                <div class="input-group">
                                <input type="hidden" name="sea_id" id="sea_id" required="required" />
                                <input type="text" class="form-control" name="nm_sea_id" id="nm_sea_id" placeholder="Setting Angsuran" required autocomplete="off" onkeypress="return false" />
                                <div class="input-group-addon">
                                    <span onclick="lookup('<?=base_url()?>settingangsuran/lookup','sea_id');" style="cursor: pointer;"><i class="glyphicon glyphicon-search"></i></span>
                                </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="int">Bunga Pinjaman (persen)</label>
                                <div class="input-group">
                                <input type="hidden" name="bup_id" id="bup_id" required />
                                <input type="text" class="form-control" name="nm_bup_id" id="nm_bup_id" placeholder="Bunga Pinjaman" required autocomplete="off" onkeypress="return false"/>
                                <div class="input-group-addon">
                                    <span onclick="lookup('<?=base_url()?>bungapinjaman/lookup','bup_id');" style="cursor: pointer;"><i class="glyphicon glyphicon-search"></i></span>
                                </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="int">Potongan Provisi (persen)</label>
                                <div class="input-group">
                                <input type="hidden" name="pop_id" id="pop_id" required />
                                <input type="text" class="form-control" name="nm_pop_id" id="nm_pop_id" placeholder="Potongan Provisi" required autocomplete="off" onkeypress="return false" />
                                <div class="input-group-addon">
                                    <span onclick="lookup('<?=base_url()?>potonganprovisi/lookup','pop_id');" style="cursor: pointer;"><i class="glyphicon glyphicon-search"></i></span>
                                </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="varchar">Wilayah</label>
                                <div class="input-group">
                                <input type="hidden" name="wil_kode" id="wil_kode" required/>
                                <input type="text" class="form-control" name="nm_wil_kode" id="nm_wil_kode" placeholder="Wilayah" autocomplete="off" onkeypress="return false" />
                                <div class="input-group-addon">
                                    <span onclick="lookup('<?=base_url()?>wilayah/lookup','wil_kode');" style="cursor: pointer;"><i class="glyphicon glyphicon-search"></i></span>
                                </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="int">Kategori Peminjam</label>
                                <div class="input-group">
                                <input type="hidden" name="skp_id" id="skp_id" required />
                                <input type="text" class="form-control" name="nm_skp_id" id="nm_skp_id" placeholder="Kategori Peminjam" requaired autocomplete="off" onkeypress="return false" />
                                <div class="input-group-addon">
                                    <span onclick="lookup('<?=base_url()?>settingkategoripeminjam/lookup','skp_id');" style="cursor: pointer;"><i class="glyphicon glyphicon-search"></i></span>
                                </div>
                                </div>
                            </div>
                            </div>

                            <div class="col-md-6">
                            <div class="form-group">
                                <label for="float">Pengajuan</label>
                                <input type="number" id="searchTxt" min="500000" class="form-control" name="pin_pengajuan"  placeholder="Jumlah Pengajuan" required/>
                            </div>
                            <div class="form-group">
                                <label for="datetime">Tanggal Pengajuan</label>
                                <input type="date" class="form-control" name="pin_tglpengajuan" id="todays-date" placeholder="Tanggal Pengajuan" value="" />
                            </div>
                            <div class="form-group">
                                <label for="varchar">Marketing</label>
                                <div class="input-group">
                                <input type="hidden" name="mkar_kode" id="mkar_kode" required />
                                <input type="text" class="form-control" name="nm_mkar_kode" id="nm_mkar_kode" placeholder="Karyawan" required autocomplete="off" onkeypress="return false" />
                                <div class="input-group-addon">
                                    <span onclick="lookup('<?=base_url()?>karyawan/lookup','mkar_kode');" style="cursor: pointer;">Cari</span>
                                </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="varchar">Surveyor</label>
                                <div class="input-group">
                                <input type="hidden" name="skar_kode" id="skar_kode" required />
                                <input type="text" class="form-control" name="nm_skar_kode" id="nm_skar_kode" placeholder="Karyawan" required autocomplete="off" onkeypress="return false" />
                                <div class="input-group-addon">
                                    <span onclick="lookup('<?=base_url()?>karyawan/lookup','skar_kode');" style="cursor: pointer;">Cari</span>
                                </div>
                                </div></div>
                        </div>
                        </div>

                        <div class="col-md-4">
                            <h3>Form Jaminan</h3>
                            <div class="form-group">
                                <label for="varchar">Jenis Jaminan</label>
                                <div class="input-group">
                                <input type="hidden" name="jej_id" id="jej_id" required />
                                <input type="text" class="form-control" name="nm_jej_id" id="nm_jej_id" placeholder="Jenis Jaminan" autocomplete="off" onkeypress="return false"/>
                                <div class="input-group-addon">
                                    <span onclick="lookup('<?=base_url()?>jenisjaminan/lookup','jej_id');" style="cursor: pointer;"><i class="glyphicon glyphicon-search"></i></span>
                                </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="varchar">Nomor Jaminan</label>
                                <input type="text" class="form-control" name="jam_nomor" id="jam_nomor" placeholder="Nomor Jaminan" required />
                            </div>
                            <div class="form-group">
                                <label for="jam_keterangan">Keterangan</label>
                                <textarea class="form-control" rows="3" name="jam_keterangan" id="jam_keterangan" placeholder="keterangan" value=" "></textarea>
                            </div>

                            <h3>Form Penjamin</h3>
                            <div class="form-group">
                                <label for="varchar">No KTP</label>
                                <input type="text" class="form-control" name="pen_noktp" id="pen_noktp" placeholder="No KTP" required />
                            </div>
                            <div class="form-group">
                                <label for="varchar">Nama</label>
                                <input type="text" class="form-control" name="pen_nama" id="pen_nama" placeholder="Nama" required />
                            </div>
                            <div class="form-group">
                                <label for="varchar">Hubungan</label>
                                <input type="text" class="form-control" name="pen_hubungan" id="pen_hubungan" placeholder="Hubungan" required/>
                            </div>
                            <div class="form-group">
                                <label for="pen_alamat">Alamat</label>
                                <textarea class="form-control" rows="3" name="pen_alamat" id="pen_alamat" placeholder="Alamat"></textarea>
                            </div>
                            <div class="form-group">
                                <label for="varchar">No Handphone</label>
                                <input type="number" class="form-control" name="pen_nohp" id="pen_nohp" placeholder="No Handphone" required />
                            </div>
                        </div>

                        <div class="col-lg-12">
                            <button type="submit" class="btn btn-primary"  onclick="return confirm('Click OK jika benar menajukan pinjaman sejumlah Rp ' + rubah(searchTxt.value))">Submit Pengajuan</button> 
                            <a href="<?php echo site_url('pinjaman') ?>" class="btn btn-default">Batal</a>
                        </div>
                    </form>
            </div>
</div>
</div>
</div>
</div>
</div>
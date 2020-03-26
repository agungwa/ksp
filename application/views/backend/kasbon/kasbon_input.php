

                <div class="ibox-title">
                    <h2 style="margin-top:0px"><?php echo $button ?> Kasbon </h2>
                </div>
        
        <form action="<?php echo $action; ?>" method="post">

	    <div class="ibox-content col-lg-12">
	    <div class="col-lg-4">
            <div class="form-group">
                <label for="float">Jumlah</label>
                <input type="text" class="form-control numeric" name="ksb_keluar" id="searchTxt" placeholder="Jumlah" required />
            </div>

            <div>
                <label for="int">Wilayah</label>
                <div class="input-group">
                <input type="hidden" name="wil_kode" id="wil_kode" required />
                <input type="text" class="form-control" name="nm_wil_kode" id="nm_wil_kode" autocomplete="off" onkeypress="return false" placeholder="Wilayah"  required />
                <div class="input-group-addon">
                    <span onclick="lookup('<?=base_url()?>wilayah/lookup','wil_kode');" style="cursor: pointer;">Cari</span>
                </div>
                </div>
            </div>

            <div>
                <label for="int">Karyawan</label>
                <div class="input-group">
                <input type="hidden" name="kar_kode" id="kar_kode" required />
                <input type="text" class="form-control" name="nm_kar_kode" id="nm_kar_kode" autocomplete="off" onkeypress="return false" placeholder="Karyawan"  required />
                <div class="input-group-addon">
                    <span onclick="lookup('<?=base_url()?>karyawan/lookup','kar_kode');" style="cursor: pointer;">Cari</span>
                </div>
                </div>
            </div>

            <div class="form-group">
                <label for="ksb_keterangan">Keterangan</label>
                <textarea class="form-control" rows="3" name="ksb_keterangan" id="ksb_keterangan" placeholder="Keterangan"> </textarea>
            </div>

            <div class="form-group">
                <label for="datetime">Tanggal</label>
                <input type="date" class="form-control" name="ksb_tanggal" id="todays-date" placeholder="Tanggal" required />
            </div>
	    <input type="hidden" name="ksb_no" value="<?php echo $ksb_no; ?>" /> 
	    <button type="submit" class="btn btn-primary" onclick="return confirm('Click OK jika benar menyetor sejumlah Rp ' + rubah(searchTxt.value))"><?php echo $button ?></button> 
        <a href="<?php echo site_url('kasbon') ?>" class="btn btn-default">Cancel</a>
        </div>

        <div class="row">
	    <div class="col-lg-4">
            <div class="form-group"><h3>Jenis : </h3></div>
            
            <div class="radio radio-danger"><input type="radio" for="radio1"  checked="" value="0" name="ksb_jenis">
                                                        <label for="radio1">
                                                            Simpanan
                                                        </label>
            <div class="radio radio-danger"><input type="radio" for="radio2" value="1" name="ksb_jenis"> 
                                                        <label for="radio2">
                                                            Investasi
                                                        </label>
            <div class="radio radio-danger"><input type="radio" for="radio3" value="2" name="ksb_jenis"> 
                                                        <label for="radio3">
                                                            Simkesan
                                                        </label>
            <div class="radio radio-danger"><input type="radio" for="radio4" value="3" name="ksb_jenis"> 
                                                        <label for="radio4">
                                                             Pinjaman
                                                        </label>
        </div>
        </div>

</div>
    </form>
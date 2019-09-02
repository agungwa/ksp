<div class="row">
    <div class="col-lg-12">
        <div class="ibox">
            <div class="ibox-content">
            
            <div class="jumbotron">
                <div class="row" style="margin-bottom: 10px, margin-top:10px">
                    <form action="<?php echo site_url('investasiberjangka/pendaftaran_action'); ?>" method="POST">
        <div class="ibox-content col-md-12">
        <div class="col-md-8">
        <div class="col-md-6">
        <div class="form-group">
            <label for="varchar">Rekening Investasi</label>
            <input type="text" class="form-control" name="ivb_kode" id="ivb_kode" placeholder="Rekening Investasi" value="<?php echo $kode; ?>" required="required" readonly/>
        </div>
        <div class="form-group">
            <label for="varchar">Anggota </label>
            <div class="input-group">
            <input type="hidden" name="ang_no" id="ang_no" value="" required="required"/>
            <input type="text" class="form-control" name="nm_ang_no" id="nm_ang_no" placeholder="Anggota" value="" required="required" readonly/>
            <div class="input-group-addon">
                <span onclick="lookup('<?=base_url()?>anggota/lookup','ang_no');" style="cursor: pointer;">Cari</span>
            </div>
            </div>
        </div>
	    <div class="form-group">
            <label for="varchar">Karyawan</label>
            <div class="input-group">
            <input type="hidden" name="kar_kode" id="kar_kode" value="" required="required" />
            <input type="text" class="form-control" name="nm_kar_kode" id="nm_kar_kode" placeholder="Karyawan" value="" required="required" readonly/>
            <div class="input-group-addon">
                <span onclick="lookup('<?=base_url()?>karyawan/lookup','kar_kode');" style="cursor: pointer;">Cari</span>
            </div>
            </div>
        </div>
        
        
	    <div class="form-group">
            <label for="varchar">Wilayah</label>
            <div class="input-group">
            <input type="hidden" name="wil_kode" id="wil_kode" value="" required="required" />
            <input type="text" class="form-control" name="nm_wil_kode" id="nm_wil_kode" placeholder="Wilayah" value="" required="required" readonly/>
            <div class="input-group-addon">
                <span onclick="lookup('<?=base_url()?>wilayah/lookup','wil_kode');" style="cursor: pointer;">Cari</span>
            </div>
            </div>
        </div>
        </div>
        <div class="col-md-6">
        <div class="form-group">
            <label for="int">Jangka Waktu</label>
            <div class="input-group">
            <input type="hidden" name="jwi_id" id="jwi_id" value="" required="required" />
            <input type="text" class="form-control" name="nm_jwi_id" id="nm_jwi_id" placeholder="Jangka Waktu" value="" required="required" readonly/>
            <div class="input-group-addon">
                <span onclick="lookup('<?=base_url()?>jangkawaktuinvestasi/lookup','jwi_id');" style="cursor: pointer;">Cari</span>
            </div>
            </div>
        </div>
        <div class="form-group">
            <label for="int">Jasa Investasi </label>
            <div class="input-group">
            <input type="hidden" name="jiv_id" id="jiv_id" value="" required="required" />
            <input type="text" class="form-control" name="nm_jiv_id" id="nm_jiv_id" placeholder="Jasa Investasi" value="" required="required" readonly/>
            <div class="input-group-addon">
                <span onclick="lookup('<?=base_url()?>jasainvestasi/lookup','jiv_id');" style="cursor: pointer;">Cari</span>
            </div>
            </div>
        </div>
       
        <div class="form-group">
            <label for="int">Bunga (dalam persen) </label>
            <div class="input-group">
            <input type="hidden" name="biv_id" id="biv_id" value="" required="required" />
            <input type="text" class="form-control" name="nm_biv_id" id="nm_biv_id" placeholder="Bunga Investasi" value="" required="required" readonly/>
            <div class="input-group-addon">
                <span onclick="lookup('<?=base_url()?>bungainvestasi/lookup','biv_id');" style="cursor: pointer;">Cari</span>
            </div>
            </div>
        </div>
	    <div class="form-group">
            <label for="datetime">Jumlah</label>
            <input type="number" id="searchTxt" class="form-control" min="2000000" name="ivb_jumlah" id="ivb_jumlah" placeholder="Jumlah" value="" required="required" />
        </div>
	    <div class="form-group">
            <label for="datetime">Tanggal Pendaftaran</label>
            <input type="date" class="form-control" name="ivb_tglpendaftaran" id="todays-date" placeholder="Tanggal Pendaftaran" value="" required="required" />
        </div>
	    <!--<div class="form-group">
            <label for="datetime">Tanggal Perpanjangan</label>
            <input type="date" class="form-control" name="ivb_tglperpanjangan" id="ivb_tglperpanjangan" placeholder="Tanggal Perpanjangan" value="" required="required" />
        </div>-->
	    <button type="submit" class="btn btn-primary" onclick="return confirm(searchTxt.value)">Submit Pendaftaran</button> 
	    <a href="<?php echo site_url('investasiberjangka') ?>" class="btn btn-default">Batal</a>
        </div>
        </div>
	</div>
            </form>
                </div>
            </div>
            
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-lg-12">
        <div class="ibox">
            <div class="ibox-content">
            
            <div class="jumbotron">
                <div class="row" style="margin-bottom: 10px, margin-top:10px">
                    <form action="<?php echo site_url('simpanana/pendaftaran_action'); ?>" method="POST">
        <div class="ibox-content col-md-12">
        <div class="col-md-8">
        <h3> Form Anggota </h3>
        <div class="col-md-6">

        <div class="form-group">
            <label for="varchar">Nomor Anggota </label>
            <input type="text" class="form-control" name="ang_no" id="ang_no" placeholder="Nomor Anggota" value="" required="required" ?>
        </div>

	    <div class="form-group">
            <label for="varchar">Nama </label>
            <input type="text" class="form-control" name="ang_nama" id="ang_nama" placeholder="Nama" />
        </div>

	    <div class="form-group">
            <label for="ang_alamat">Alamat </label>
            <textarea class="form-control" rows="3" name="ang_alamat" id="ang_alamat" placeholder="Alamat" value="" required="required"> </textarea>
        </div>

	    <div class="form-group">
            <label for="varchar">Nomor KTP </label>
            <input type="number" class="form-control" name="ang_noktp" id="ang_noktp" placeholder="Nomor KTP" value="" required="required" />
        </div>

	    <div class="form-group">
            <label for="varchar">Nomor KK </label>
            <input type="number" class="form-control" name="ang_nokk" id="ang_nokk" placeholder="Nomor KK" value="" required="required" />
        </div>
        </div>
        
        <div class="col-md-6">

	    <div class="form-group">
            <label for="varchar">No Handphone </label>
            <input type="number" class="form-control" name="ang_nohp" id="ang_nohp" placeholder="08.." value="" required="required" />
        </div>

	    <div class="form-group">
            <label for="date">Tanggal Lahir </label>
            <input type="date" class="form-control" name="ang_tgllahir" id="ang_tgllahir" placeholder="Tgl Lahir" value="" required="required" />
        </div>

	    <div class="form-group">
            <label for="tinyint">Status </label>
            <input type="number" class="form-control" name="ang_status" id="ang_status" placeholder="status" value="" required="required" />
        </div>
        </div>
        </div>
        
        <div class="col-md-4">
        <h3>Form Simpanan Pokok</h3>

        <div class="form-group">
            <label for="varchar">Setting Simpanan </label>
            <div class="input-group">
            <input type="hidden" name="ses_id" id="ses_id" value="" required="required"/>
            <input type="text" class="form-control" name="nm_ses_id" id="nm_ses_id" placeholder="Setting Simpanan" value="" required="required" readonly/>
            <div class="input-group-addon">
                <span onclick="lookup('<?=base_url()?>settingsimpanan/lookup','ses_id');" style="cursor: pointer;">Cari</span>
            </div>
            </div>
        </div>

	    <div class="form-group">
            <label for="datetime">Tanggal Bayar </label>
            <input type="date" class="form-control" name="sip_tglbayar" id="todays-date" placeholder="Sip Tglbayar" value="" required="required" />
        </div>

        <h3>Form Simpanan Wajib</h3>
        <div class="form-group">
            <label for="varchar">Setting Simpanan </label>
            <div class="input-group">
            <input type="hidden" name="ses_id" id="ses_id" value="" required="required" />
            <input type="text" class="form-control" name="nm_ses_id" id="nm_ses_id" placeholder="Setting Simpanan" value="" required="required" readonly/>
            <div class="input-group-addon">
                <span onclick="lookup('<?=base_url()?>settingsimpanan/lookup','ses_id');" style="cursor: pointer;">Cari</span>
            </div>
            </div>
        </div>

	    <div class="form-group">
            <label for="datetime">Tanggal Bayar </label>
            <input type="date" class="form-control" name="siw_tglbayar" id="todays-date" placeholder="Tanggal Bayar" value="" required="required" />
        </div>

	    <!--<div class="form-group">
            <label for="tinyint">Status</label>
            <input type="text" class="form-control" name="siw_status" id="siw_status" placeholder="Status" value="" />
        </div>

	    <div class="form-group">
            <label for="datetime">Tanggal Ambil</label>
            <input type="date" class="form-control" name="siw_tglambil" id="siw_tglambil" placeholder="Tanggal Ambil" value="" />
        </div>-->
        </div>

                    </form>
                </div>
            </div>
            
            </div>
        </div>
    </div>
</div>
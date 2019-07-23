<div class="row">
    <div class="col-lg-12">
        <div class="ibox">
            <div class="ibox-content">
            
            <div class="jumbotron">
                <div class="row" style="margin-bottom: 10px, margin-top:10px">
                    <form action="<?php echo site_url('anggota/pengajuanupdate_action'); ?>" method="POST">
        <div class="ibox-content col-md-12">
        <div class="col-md-8">
        <h3> Form Anggota </h3>
        <div class="col-md-6">

        <div class="form-group">
            <label for="varchar">Nomor Anggota </label>
            <input type="text" class="form-control" name="ang_no" id="ang_no" placeholder="Nomor Anggota" value="<?php echo $ang_no; ?>" readonly required="required" ?>
        </div>

	    <div class="form-group">
            <label for="varchar">Nama </label>
            <input type="text" class="form-control" name="ang_nama" id="ang_nama" placeholder="Nama" value="<?php echo $ang_nama; ?>"/>
        </div>

	    <div class="form-group">
            <label for="ang_alamat">Alamat </label>
            <textarea class="form-control" rows="3" name="ang_alamat" id="ang_alamat" placeholder="Alamat"  required="required"><?php echo $ang_alamat; ?> </textarea>
        </div>

	    <div class="form-group">
            <label for="varchar">Nomor KTP </label>
            <input type="number" class="form-control" name="ang_noktp" id="ang_noktp" placeholder="Nomor KTP" value="<?php echo $ang_noktp; ?>" required="required" />
        </div>

	    <div class="form-group">
            <label for="varchar">Nomor KK </label>
            <input type="number" class="form-control" name="ang_nokk" id="ang_nokk" placeholder="Nomor KK" value="<?php echo $ang_nokk; ?>" required="required" />
        </div>
        </div>
        
        <div class="col-md-6">

	    <div class="form-group">
            <label for="varchar">No Handphone </label>
            <input type="number" class="form-control" name="ang_nohp" id="ang_nohp" placeholder="08.." value="<?php echo $ang_nohp; ?>" required="required" />
        </div>

	    <div class="form-group">
            <label for="date">Tanggal Lahir </label>
            <input type="date" class="form-control" name="ang_tgllahir" id="ang_tgllahir" placeholder="Tgl Lahir" value="<?php echo $ang_tgllahir; ?>" required="required" />
        </div>

        </div>
        </div>
        
        <div class="col-md-4">
        <h3>Form Simpanan Pokok</h3>
	    <div class="form-group">
            <label for="datetime">Tanggal Bayar </label>
            <input type="date" class="form-control" name="sip_tglbayar" id="todays-date" placeholder="tanggal bayar" value="" required="required" />
        </div>
        <div class="form-group">
            <label for="number">Setor Simpanan Pokok </label>
            <input type="number" class="form-control" name="sip_setoran" id="sip_setoran" placeholder="<?php echo $setting_data->ses_min; ?>" value="<?php echo $setting_data->ses_min; ?>" readonly required="required" />
        </div>
</div>

        <div class="col-lg-12">
                            <button type="submit" class="btn btn-primary">Edit</button> 
                            <a href="<?php echo site_url('anggota/?p=2') ?>" class="btn btn-default">Batal</a>
                        </div>
        </div>

                    </form>
                </div>
            </div>
            
            </div>
        </div>
    </div>
</div>
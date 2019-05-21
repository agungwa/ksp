<div class="row">
    <div class="col-lg-12">
        <div class="ibox">
            <div class="ibox-content">
            
            <div class="jumbotron">
                <div class="row" style="margin-bottom: 10px, margin-top:10px">
                
        <form action="<?php echo site_url('statuspeminjam/status_action'); ?>" method="post">
        <div class="ibox-content col-md-12">
        <div class="col-md-4">
        <div class="form-group">
            <label for="varchar">Anggota </label>
            <div class="input-group">
            <input type="hidden" name="ang_no" id="ang_no" value="" required="required" />
            <input type="text" class="form-control" name="nm_ang_no" id="nm_ang_no" placeholder="Anggota" value="" required="required" readonly/>
            <div class="input-group-addon">
                <span onclick="lookup('<?=base_url()?>Anggota/lookup','ang_no');" style="cursor: pointer;">Cari</span>
            </div>
            </div>
        </div>
        <div class="form-group">
            <label for="int">Status Peminjam </label>
            <div class="input-group">
            <input type="hidden" name="ssp_id" id="ssp_id" value="" required="required" />
            <input type="text" class="form-control" name="nm_ssp_id" id="nm_ssp_id" placeholder="Status Peminjam" value="" required="required" readonly/>
            <div class="input-group-addon">
                <span onclick="lookup('<?=base_url()?>settingstatuspeminjam/lookup','ssp_id');" style="cursor: pointer;">Cari</span>
            </div>
            </div>
        </div>
        <div class="form-group">
            <label for="int">Rekening Pinjaman </label>
            <div class="input-group">
            <input type="hidden" name="pin_id" id="pin_id" value="" required="required" />
            <input type="text" class="form-control" name="nm_pin_id" id="nm_pin_id" placeholder="Rekening Pinjaman" value="" required="required" readonly/>
            <div class="input-group-addon">
                <span onclick="lookup('<?=base_url()?>Pinjaman/lookup','pin_id');" style="cursor: pointer;">Cari</span>
            </div>
            </div>
        </div>
	    <input type="hidden" name="stp_id" value="" /> 
	    <button type="submit" class="btn btn-primary">Simpan</button>
	    <a href="<?php echo site_url('statuspeminjam') ?>" class="btn btn-default">Batal</a>
        </div>
	</div>
            </form>
                </div>
            </div>
            
            </div>
        </div>
    </div>
</div>
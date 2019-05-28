<div class="row">
    <div class="col-lg-12">
        <div class="ibox float-e-margins">        
        <form action="<?php echo site_url('setoransimkesan/setoran'); ?>; ?>" method="post">
        <div class="ibox-content col-md-10">
        <div class="col-md-4">
    	    <div class="form-group">
                <label for="varchar">Rekening Simkesan</label>
                <div class="input-group">
                <input type="hidden" name="sik_kode" id="sik_kode" value="" />
                <input type="text" class="form-control" name="nm_sik_kode" id="nm_sik_kode" placeholder="Simkesan" value="" readonly/>
                <div class="input-group-addon">
                    <span onclick="lookup('<?=base_url()?>simkesan/lookup','sik_kode');" style="cursor: pointer;">Cari</span>
                </div>
                </div>
            </div>

    	    <div class="form-group">
                <label for="datetime">Tanggal Setoran</label>
                <input type="date" class="form-control" name="ssk_tglsetoran" id="todays-date" placeholder="Tanggal Setoran" value="" />
            </div>
    	    <div class="form-group">
                <label for="datetime">Tanggal Bayar</label>
                <input type="date" class="form-control" name="ssk_tglbayar" id="ssk_tglbayar" placeholder="Tanggal Bayar" value="" />
            </div>
    	    <div class="form-group">
                <label for="float">Jumlah Setor</label>
                <input type="number" class="form-control" name="ssk_jmlsetor" id="ssk_jmlsetor" placeholder="Jumlah Setor" value="" />
            </div>
    	    <div class="form-group">
                <label for="tinyint">Status</label>
                <input type="text" class="form-control" name="ssk_status" id="ssk_status" placeholder="Status" value="" />
            </div> 
    	    <button type="submit" class="btn btn-primary">Simpan Setoran</button> 
    	    <a href="<?php echo site_url('setoransimkesan/?p=1') ?>" class="btn btn-default">Batal</a>
	</div>
            </form>
        </div>
        </div>
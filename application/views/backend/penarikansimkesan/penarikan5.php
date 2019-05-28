<div class="row">
        <div class="col-lg-12">
            <div class="ibox float-e-margins">        
            <form action="<?php site_url('penarikansimkesan/limath'); ?>" method="post">
                <div class="ibox-content col-md-12">
                <div class="col-md-6">
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
                    <label for="int">Jenis Penarikan</label>
                    <div class="input-group">
                    <input type="hidden" name="jps_id" id="jps_id" value="" />
                    <input type="text" class="form-control" name="nm_jps_id" id="nm_jps_id" placeholder="Jenis Penarikan" value="" readonly/>
                    <div class="input-group-addon">
                        <span onclick="lookup('<?=base_url()?>jenispenarikansimkesan/lookup','jps_id');" style="cursor: pointer;">Cari</span>
                    </div>
                    </div>
                </div>

                <div class="form-group">
                    <label for="datetime">Tanggal Penarikan</label>
                    <input type="date" class="form-control" name="pns_tglpenarikan" id="todays-date" placeholder="Tanggal Penarikan" value="" />
                </div>
                </div>

                <div class="col-md-6">        	    
        	    <div class="form-group">
                    <label for="float">Jumlah Simkesan</label>
                    <input type="number" class="form-control" name="pns_jmlsimkesan" id="pns_jmlsimkesan" placeholder="Jumlah Simkesan" value="" />
                </div>
        	    <div class="form-group">
                    <label for="float">Jumlah Penarikan</label>
                    <input type="number" class="form-control" name="pns_jmlpenarikan" id="pns_jmlpenarikan" placeholder="Jumlah Penarikan" value="" />
                </div>
        	    <div class="form-group">
                    <label for="pns_catatan">Catatan</label>
                    <textarea class="form-control" rows="3" name="pns_catatan" id="pns_catatan" placeholder="Catatan"></textarea>
                </div>
        	    <button type="submit" class="btn btn-primary">Simpan</button> 
        	    <a href="<?php echo site_url('penarikansimkesan/?p=1') ?>" class="btn btn-default">Batal</a>
            </div>
	        </div>
            </form>
        </div>
</div>
</div>
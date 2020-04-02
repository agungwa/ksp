<div class="row">
    <div class="col-lg-12">
        <div class="ibox float-e-margins">        
        <form action="<?php echo site_url('setoransimkesan/update_action'); ?>" method="post">
        <div class="ibox-content col-md-10">
        <div class="col-md-4">
    	    <div class="form-group">
                <label for="float">Rekening Simkesan</label>
                <input type="text" class="form-control" name="sik_kode" id="sik_kode" value="<?php echo $sik_kode ?>" readonly />
            </div>
    	    <div class="form-group">
                <label for="float">Jumlah Setor</label>
                <input type="number" class="form-control" name="ssk_jmlsetor" id="ssk_jmlsetor" placeholder="Jumlah Setor" value="<?php echo $ssk_jmlsetor ?>" />
            </div>
    	    <div class="form-group">
                <label for="datetime">Tanggal Setoran</label>
                <input type="text" class="form-control date" name="ssk_tglsetoran" placeholder="Tanggal Setoran" value="<?php echo $ssk_tglsetoran ?>" />
            </div>
            <input type="hidden" class="form-control" name="ssk_id" id="ssk_id" value="<?php echo $ssk_id ?>" />
    	    <button type="submit" class="btn btn-primary">Simpan Setoran</button> 
    	    <a href="<?php echo site_url('setoransimkesan/?p=1') ?>" class="btn btn-default hBack">kembali</a>
	</div>
            </form>
        </div>
        </div>
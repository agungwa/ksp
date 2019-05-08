<!doctype html>
<html>
    <head>
        <title></title>
    </head>
    <body>
    <div class="row">
        <div class="col-lg-12">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h2 style="margin-top:0px"><?php echo $button ?> Anggota </h2>
                </div>
            </div>
        </div>
        
        <form action="<?php echo $action; ?>" method="post">
        <div class="ibox-content col-md-12">
        <div class="col-md-3">
        <div class="form-group col-md-12">
            <label for="varchar">Nomor Anggota <?php echo form_error('ang_no') ?></label>
            <input type="text" class="form-control" name="ang_no" id="ang_no" placeholder="Nomor Anggota" value="<?php echo $ang_no; ?>" />
        </div>
	    <div class="form-group col-md-12">
            <label for="varchar">Nama <?php echo form_error('ang_nama') ?></label>
            <input type="text" class="form-control" name="ang_nama" id="ang_nama" placeholder="Nama" value="<?php echo $ang_nama; ?>" />
        </div>
	    <div class="form-group col-md-12">
            <label for="ang_alamat">Alamat <?php echo form_error('ang_alamat') ?></label>
            <textarea class="form-control" rows="3" name="ang_alamat" id="ang_alamat" placeholder="Alamat"><?php echo $ang_alamat; ?></textarea>
        </div>
        </div>
        <div class="form-group col-md-12">
	    <div class="form-group col-md-6">
            <label for="varchar">Nomor KTP <?php echo form_error('ang_noktp') ?></label>
            <input type="number" class="form-control" name="ang_noktp" id="ang_noktp" placeholder="Nomor KTP" value="<?php echo $ang_noktp; ?>" />
        </div>
	    <div class="form-group col-md-6">
            <label for="varchar">Nomor KK <?php echo form_error('ang_nokk') ?></label>
            <input type="number" class="form-control" name="ang_nokk" id="ang_nokk" placeholder="Nomor KK" value="<?php echo $ang_nokk; ?>" />
        </div>
	    <div class="form-group col-md-6">
            <label for="varchar">No Handphone <?php echo form_error('ang_nohp') ?></label>
            <input type="number" class="form-control" name="ang_nohp" id="ang_nohp" placeholder="085.." value="<?php echo '085',$ang_nohp; ?>" />
        </div>
	    <div class="form-group col-md-6">
            <label for="date">Tanggal Lahir <?php echo form_error('ang_tgllahir') ?></label>
            <input type="date" class="form-control" name="ang_tgllahir" id="ang_tgllahir" placeholder="Tgl Lahir" value="<?php echo $ang_tgllahir; ?>" />
        </div>
        </div>
        <div class="form-group col-md-3">
	    <div class="form-group col-md-12">
            <label for="tinyint">Status <?php echo form_error('ang_status') ?></label>
            <input type="number" class="form-control" name="ang_status" id="ang_status" placeholder="status" value="<?php echo $ang_status; ?>" />
        </div>
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('anggota') ?>" class="btn btn-default">Cancel</a>
        </div>
	    </div>
            </form>
    </div>  
  
    </body>
</html>
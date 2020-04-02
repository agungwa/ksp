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
                    <h2 style="margin-top:0px"><?php echo $button ?> Setoran Simpanan </h2>
                </div>
        
        <form action="<?php echo $action; ?>" method="post">
        <div class="ibox-content col-md-12">
        <div class="col-md-6">
        <div class="form-group">
            <label for="varchar">Rekening Simpanan <?php echo form_error('sim_kode') ?></label>
            <div class="input-group">
            <input type="text" class="form-control" name="sim_kode" id="sim_kode" placeholder="Rekening Simpanan" value="<?php echo $nm_sim_kode; ?>" readonly/>
            
            </div>
        </div>
	    <div class="form-group">
            <label for="datetime">Tanggal Setor <?php echo form_error('ssi_tglsetor') ?></label>
            <input type="date" class="form-control" name="ssi_tglsetor" placeholder="Tanggal Setor" value="<?php echo $ssi_tglsetor; ?>" />
        </div>
	    <div class="form-group">
            <label for="float">Jumlah Setor <?php echo form_error('ssi_jmlsetor') ?></label>
            <input type="number" class="form-control" name="ssi_jmlsetor" id="searchTxt" placeholder="Jumalah Setor" value="<?php echo $ssi_jmlsetor; ?>" />
        </div>
	   <!--<div class="form-group">
            <label for="float">Jumlah Bunga <?php echo form_error('ssi_jmlbunga') ?></label>
            <input type="number" class="form-control" name="ssi_jmlbunga" id="ssi_jmlbunga" placeholder="Jumlah Bunga" value="<?php echo $ssi_jmlbunga; ?>" />
        </div>-->

	    <input type="hidden" name="ssi_id" value="<?php echo $ssi_id; ?>" /> 
        <!--<input type="button" name="btn" value="Submit" id="submitBtn" data-toggle="modal" data-target="#confirm-submit" class="btn btn-default" />
        <input type="button" name="btn" value="Reset" onclick="window.location='fillup.php'" class="btn btn-default" data-modal-type="confirm"/>-->
        <button type="submit" class="btn btn-primary" onclick="return confirm('Click OK jika benar menyetor sejumlah Rp ' + rubah(searchTxt.value))"><?php echo $button ?></button>
	    <a href="<?php echo site_url('simpanan/listsetoran') ?>" class="btn btn-default">Batal</a>
	</div>
    </div>
            </form>
        </div>
        </div>
        <!--<script>
        $('#submitBtn').click(function() {
            $('#lname').text($('#lastname').val());
            $('#fname').text($('#firstname').val());
             });

        $('#submit').click(function(){
            alert('submitting');
            $('#formfield').submit();
        });
        </script>-->
    </body>
</html>
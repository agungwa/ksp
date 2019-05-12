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
                    <h2 style="margin-top:0px"><?php echo $button ?> Titipansimkesan </h2>
                </div>
        
        <form action="<?php echo $action; ?>" method="post">
        <div class="ibox-content col-md-12">
        <div class="col-md-4">
	    <div class="form-group">
            <label for="varchar">Rekening Simkesan <?php echo form_error('sik_kode') ?></label>
            <div class="input-group">
            <input type="hidden" name="sik_kode" id="sik_kode" value="69" />
            <input type="text" class="form-control" name="nm_sik_kode" id="nm_sik_kode" placeholder="Simkesan" value="<?php echo $nm_sik_kode; ?>" readonly/>
            <div class="input-group-addon">
                <span onclick="lookup('<?=base_url()?>simkesan/lookup','sik_kode');" style="cursor: pointer;">Cari</span>
            </div>
            </div>
        </div>
	    <div class="form-group">
            <label for="datetime">Tanggal Titip <?php echo form_error('tts_tgltitip') ?></label>
            <input type="date" class="form-control" name="tts_tgltitip" id="todays-date" placeholder="Tts Tgltitip" value="<?php echo $tts_tgltitip; ?>" />
        </div>
	    <div class="form-group">
            <label for="float">Jumlah Titip <?php echo form_error('tts_jmltitip') ?></label>
            <input type="number" class="form-control" name="tts_jmltitip" id="tts_jmltitip" placeholder="Tts Jmltitip" value="<?php echo $tts_jmltitip; ?>" />
        </div>
	    <div class="form-group">
            <label for="float">Jumlah Ambil <?php echo form_error('tts_jmlambil') ?></label>
            <input type="number" class="form-control" name="tts_jmlambil" id="tts_jmlambil" placeholder="Tts Jmlambil" value="<?php echo $tts_jmlambil; ?>" />
        </div>
	    <div class="form-group">
            <label for="tinyint">Status <?php echo form_error('tts_status') ?></label>
            <input type="text" class="form-control" name="tts_status" id="tts_status" placeholder="Tts Status" value="<?php echo $tts_status; ?>" />
        </div>
	    <input type="hidden" name="tts_id" value="<?php echo $tts_id; ?>" /> 
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('titipansimkesan') ?>" class="btn btn-default">Batal</a>
        </div>
	</div>
            </form>
        </div>
        </div>
    </body>
</html>
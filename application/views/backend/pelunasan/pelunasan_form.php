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
                    <h2 style="margin-top:0px"><?php echo $button ?> Pelunasan </h2>
                </div>
        
        <form action="<?php echo $action; ?>" method="post">
        <div class="ibox-content">
	    <div class="form-group">
            <label for="varchar">Pin Id <?php echo form_error('pin_id') ?></label>
            <input type="text" class="form-control" name="pin_id" id="pin_id" placeholder="Pin Id" value="<?php echo $pin_id; ?>" />
        </div>
	    <div class="form-group">
            <label for="tinyint">Pel Jenis <?php echo form_error('pel_jenis') ?></label>
            <input type="text" class="form-control" name="pel_jenis" id="pel_jenis" placeholder="Pel Jenis" value="<?php echo $pel_jenis; ?>" />
        </div>
	    <div class="form-group">
            <label for="tinyint">Pel Tenor <?php echo form_error('pel_tenor') ?></label>
            <input type="text" class="form-control" name="pel_tenor" id="pel_tenor" placeholder="Pel Tenor" value="<?php echo $pel_tenor; ?>" />
        </div>
	    <div class="form-group">
            <label for="float">Pel Angsuran <?php echo form_error('pel_angsuran') ?></label>
            <input type="text" class="form-control" name="pel_angsuran" id="pel_angsuran" placeholder="Pel Angsuran" value="<?php echo $pel_angsuran; ?>" />
        </div>
	    <div class="form-group">
            <label for="float">Pel Bungaangsuran <?php echo form_error('pel_bungaangsuran') ?></label>
            <input type="text" class="form-control" name="pel_bungaangsuran" id="pel_bungaangsuran" placeholder="Pel Bungaangsuran" value="<?php echo $pel_bungaangsuran; ?>" />
        </div>
	    <div class="form-group">
            <label for="float">Pel Totalkekuranganpokok <?php echo form_error('pel_totalkekuranganpokok') ?></label>
            <input type="text" class="form-control" name="pel_totalkekuranganpokok" id="pel_totalkekuranganpokok" placeholder="Pel Totalkekuranganpokok" value="<?php echo $pel_totalkekuranganpokok; ?>" />
        </div>
	    <div class="form-group">
            <label for="float">Pel Totalbungapokok <?php echo form_error('pel_totalbungapokok') ?></label>
            <input type="text" class="form-control" name="pel_totalbungapokok" id="pel_totalbungapokok" placeholder="Pel Totalbungapokok" value="<?php echo $pel_totalbungapokok; ?>" />
        </div>
	    <div class="form-group">
            <label for="float">Pel Bungatambahan <?php echo form_error('pel_bungatambahan') ?></label>
            <input type="text" class="form-control" name="pel_bungatambahan" id="pel_bungatambahan" placeholder="Pel Bungatambahan" value="<?php echo $pel_bungatambahan; ?>" />
        </div>
	    <div class="form-group">
            <label for="float">Pel Totaldenda <?php echo form_error('pel_totaldenda') ?></label>
            <input type="text" class="form-control" name="pel_totaldenda" id="pel_totaldenda" placeholder="Pel Totaldenda" value="<?php echo $pel_totaldenda; ?>" />
        </div>
	    <div class="form-group">
            <label for="datetime">Pel Tglpelunasan <?php echo form_error('pel_tglpelunasan') ?></label>
            <input type="text" class="form-control" name="pel_tglpelunasan" id="pel_tglpelunasan" placeholder="Pel Tglpelunasan" value="<?php echo $pel_tglpelunasan; ?>" />
        </div>
	    <div class="form-group">
            <label for="datetime">Pel Tgl <?php echo form_error('pel_tgl') ?></label>
            <input type="text" class="form-control" name="pel_tgl" id="pel_tgl" placeholder="Pel Tgl" value="<?php echo $pel_tgl; ?>" />
        </div>
	    <div class="form-group">
            <label for="tinyint">Pel Flag <?php echo form_error('pel_flag') ?></label>
            <input type="text" class="form-control" name="pel_flag" id="pel_flag" placeholder="Pel Flag" value="<?php echo $pel_flag; ?>" />
        </div>
	    <div class="form-group">
            <label for="pel_info">Pel Info <?php echo form_error('pel_info') ?></label>
            <textarea class="form-control" rows="3" name="pel_info" id="pel_info" placeholder="Pel Info"><?php echo $pel_info; ?></textarea>
        </div>
	    <input type="hidden" name="pel_id" value="<?php echo $pel_id; ?>" /> 
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('pelunasan') ?>" class="btn btn-default">Cancel</a>
	</div>
            </form>
        </div>
        </div>
    </body>
</html>
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
                    <h2 style="margin-top:0px"><?php echo $button ?> Angsuranbayar </h2>
                </div>
        
        <form action="<?php echo $action; ?>" method="post">
        <div class="ibox-content">
	    <div class="form-group">
            <label for="int">Angsuran <?php echo form_error('ags_id') ?></label>
            <input type="text" class="form-control" name="ags_id" id="ags_id" placeholder="Ags Id" value="<?php echo $ags_id; ?>" />
        </div>
	    <div class="form-group">
            <label for="float">Bayar Pokok <?php echo form_error('agb_pokok') ?></label>
            <input type="text" class="form-control" name="agb_pokok" id="agb_pokok" placeholder="Bayar Pokok" value="<?php echo $agb_pokok; ?>" />
        </div>
	    <div class="form-group">
            <label for="float">Bayar Bunga <?php echo form_error('agb_bunga') ?></label>
            <input type="text" class="form-control" name="agb_bunga" id="agb_bunga" placeholder="Bayar Bunga" value="<?php echo $agb_bunga; ?>" />
        </div>
	    <div class="form-group">
            <label for="float">Bayar Denda <?php echo form_error('agb_denda') ?></label>
            <input type="text" class="form-control" name="agb_denda" id="agb_denda" placeholder="Bayar Denda" value="<?php echo $agb_denda; ?>" />
        </div>
	    <div class="form-group">
            <label for="tinyint">Bayar Status <?php echo form_error('agb_status') ?></label>
            <input type="text" class="form-control" name="agb_status" id="agb_status" placeholder="Bayar Status" value="<?php echo $agb_status; ?>" />
        </div>
	    <div class="form-group">
            <label for="datetime">Bayar Tglpokok <?php echo form_error('agb_tglpokok') ?></label>
            <input type="text" class="form-control" name="agb_tglpokok" id="agb_tglpokok" placeholder="Bayar Tglpokok" value="<?php echo $agb_tglpokok; ?>" />
        </div>
	    <div class="form-group">
            <label for="datetime">Bayar Tglbunga <?php echo form_error('agb_tglbunga') ?></label>
            <input type="text" class="form-control" name="agb_tglbunga" id="agb_tglbunga" placeholder="Bayar Tglbunga" value="<?php echo $agb_tglbunga; ?>" />
        </div>
	    <div class="form-group">
            <label for="datetime">Bayar Tgllunas <?php echo form_error('agb_tgllunas') ?></label>
            <input type="text" class="form-control" name="agb_tgllunas" id="agb_tgllunas" placeholder="Bayar Tgllunas" value="<?php echo $agb_tgllunas; ?>" />
        </div>
	    <input type="hidden" name="agb_id" value="<?php echo $agb_id; ?>" /> 
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('angsuranbayar') ?>" class="btn btn-default">Cancel</a>
	</div>
            </form>
        </div>
        </div>
    </body>
</html>
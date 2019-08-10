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
                    <h2 style="margin-top:0px"><?php echo $button ?> Neraca kewajiban jangka panjang </h2>
                </div>
        
        <form action="<?php echo $action; ?>" method="post">
        <div class="ibox-content">
	    <div class="form-group">
            <label for="datetime">Tanggal <?php echo form_error('njp_tanggal') ?></label>
            <input type="date" class="form-control" name="njp_tanggal" id="todays-date" placeholder="Tanggal" value="<?php echo $njp_tanggal; ?>" />
        </div>
	    <div class="form-group">
            <label for="float">Rekening Koran <?php echo form_error('njp_rekeningkoran') ?></label>
            <input type="number" class="form-control" name="njp_rekeningkoran" id="njp_rekeningkoran" placeholder="Rekeningkoran" value="<?php echo $njp_rekeningkoran; ?>" />
        </div>
	    <div class="form-group">
            <label for="float">Modal Penyertaan <?php echo form_error('njp_modalpenyertaan') ?></label>
            <input type="number" class="form-control" name="njp_modalpenyertaan" id="njp_modalpenyertaan" placeholder="Modalpenyertaan" value="<?php echo $njp_modalpenyertaan; ?>" />
        </div>
	    <input type="hidden" name="njp_id" value="<?php echo $njp_id; ?>" /> 
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('neracakewajibanjangkapanjang') ?>" class="btn btn-default">Cancel</a>
	</div>
            </form>
        </div>
        </div>
    </body>
</html>
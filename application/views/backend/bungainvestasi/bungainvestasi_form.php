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
                    <h2 style="margin-top:0px"><?php echo $button ?> Bunga Investasi </h2>
                </div>
        
        <form action="<?php echo $action; ?>" method="post">
        <div class="ibox-content col-md-12">
        <div class="col-md-4">
	    <div class="form-group">
            <label for="float">Bunga Investasi (dalam persen) <?php echo form_error('biv_bunga') ?></label>
            <input type="number" step="0.01" class="form-control" name="biv_bunga" id="biv_bunga" placeholder="Bunga" value="<?php echo $biv_bunga; ?>" />
        </div>
	    <div class="form-group">
            <label for="biv_keterangan">Keterangan <?php echo form_error('biv_keterangan') ?></label>
            <textarea class="form-control" rows="3" name="biv_keterangan" id="biv_keterangan" placeholder="Keterangan"><?php echo $biv_keterangan; ?></textarea>
        </div>
	    <input type="hidden" name="biv_id" value="<?php echo $biv_id; ?>" /> 
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('bungainvestasi') ?>" class="btn btn-default">Batal</a>
        </div>
	</div>
            </form>
        </div>
        </div>
    </body>
</html>
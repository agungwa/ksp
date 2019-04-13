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
                    <h2 style="margin-top:0px"><?php echo $button ?> Bungainvestasi </h2>
                </div>
        
        <form action="<?php echo $action; ?>" method="post">
        <div class="ibox-content">
	    <div class="form-group">
            <label for="float">Biv Bunga <?php echo form_error('biv_bunga') ?></label>
            <input type="text" class="form-control" name="biv_bunga" id="biv_bunga" placeholder="Biv Bunga" value="<?php echo $biv_bunga; ?>" />
        </div>
	    <div class="form-group">
            <label for="biv_keterangan">Biv Keterangan <?php echo form_error('biv_keterangan') ?></label>
            <textarea class="form-control" rows="3" name="biv_keterangan" id="biv_keterangan" placeholder="Biv Keterangan"><?php echo $biv_keterangan; ?></textarea>
        </div>
	    <input type="hidden" name="biv_id" value="<?php echo $biv_id; ?>" /> 
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('bungainvestasi') ?>" class="btn btn-default">Cancel</a>
	</div>
            </form>
        </div>
        </div>
    </body>
</html>
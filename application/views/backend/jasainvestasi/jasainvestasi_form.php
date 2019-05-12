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
                    <h2 style="margin-top:0px"><?php echo $button ?> Jasa Investasi </h2>
                </div>
        
        <form action="<?php echo $action; ?>" method="post">
        <div class="ibox-content col-md-12">
        <div class="col-md-4">
	    <div class="form-group">
            <label for="varchar">Jasa <?php echo form_error('jiv_jasa') ?></label>
            <input type="text" class="form-control" name="jiv_jasa" id="jiv_jasa" placeholder="Jasa" value="<?php echo $jiv_jasa; ?>" />
        </div>
	    <div class="form-group">
            <label for="jiv_keterangan">Keterangan <?php echo form_error('jiv_keterangan') ?></label>
            <textarea class="form-control" rows="3" name="jiv_keterangan" id="jiv_keterangan" placeholder="Keterangan"><?php echo $jiv_keterangan; ?></textarea>
        </div>
	    <input type="hidden" name="jiv_id" value="<?php echo $jiv_id; ?>" /> 
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('jasainvestasi') ?>" class="btn btn-default">Batal</a>
        </div>
	</div>
            </form>
        </div>
        </div>
    </body>
</html>
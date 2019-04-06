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
                    <h2 style="margin-top:0px"><?php echo $button ?> Jangkawaktuinvestasi </h2>
                </div>
        
        <form action="<?php echo $action; ?>" method="post">
        <div class="ibox-content">
	    <div class="form-group">
            <label for="tinyint">Jwi Jangkawaktu <?php echo form_error('jwi_jangkawaktu') ?></label>
            <input type="text" class="form-control" name="jwi_jangkawaktu" id="jwi_jangkawaktu" placeholder="Jwi Jangkawaktu" value="<?php echo $jwi_jangkawaktu; ?>" />
        </div>
	    <div class="form-group">
            <label for="jwi_keterangan">Jwi Keterangan <?php echo form_error('jwi_keterangan') ?></label>
            <textarea class="form-control" rows="3" name="jwi_keterangan" id="jwi_keterangan" placeholder="Jwi Keterangan"><?php echo $jwi_keterangan; ?></textarea>
        </div>
	    <input type="hidden" name="jwi_id" value="<?php echo $jwi_id; ?>" /> 
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('jangkawaktuinvestasi') ?>" class="btn btn-default">Cancel</a>
	</div>
            </form>
        </div>
        </div>
    </body>
</html>
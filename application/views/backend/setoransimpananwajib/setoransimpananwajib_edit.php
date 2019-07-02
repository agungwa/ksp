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
                    <h2 style="margin-top:0px"><?php echo $button ?> Setoran Simpanan Wajib </h2>
                </div>
        
        <form action="<?php echo $action; ?>" method="post">
        <div class="ibox-content col-md-12">
        <div class="col-md-4">
	    <div class="form-group">
            <label for="date">Tanggal Setor</label>
            <input type="date" class="form-control" name="ssw_tglsetor" id="ssw_tglsetor" placeholder="Tanggal Setor" value="<?php echo $ssw_tglsetor; ?>" />
        </div>
	    <div class="form-group">
            <label for="float">Jumlah Setor</label>
            <?php
             ?>
            <input type="number" min="20000" max="100000" class="form-control" name="ssw_jmlsetor" id="ssw_jmlsetor" placeholder="Jumlah Setor" value="<?php echo $ssw_jmlsetor; ?>" />
            
        </div>
	    <input type="hidden" name="ssw_id" value="<?php echo $ssw_id; ?>" /> 
	    <input type="hidden" name="siw_id" value="<?php echo $siw_id; ?>" /> 
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('simpananwajib/setorsimpananwajib/'.$siw_id) ?>" class="btn btn-default">Cancel</a>
        </div>
	</div>
            </form>
        </div>
        </div>
    </body>
</html>
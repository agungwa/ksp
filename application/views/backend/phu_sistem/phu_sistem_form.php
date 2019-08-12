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
                    <h2 style="margin-top:0px"><?php echo $button ?> Phu_sistem </h2>
                </div>
        
        <form action="<?php echo $action; ?>" method="post">
        <div class="ibox-content">
	    <div class="form-group">
            <label for="float">Psis Pendapatan <?php echo form_error('psis_pendapatan') ?></label>
            <input type="text" class="form-control" name="psis_pendapatan" id="psis_pendapatan" placeholder="Psis Pendapatan" value="<?php echo $psis_pendapatan; ?>" />
        </div>
	    <div class="form-group">
            <label for="float">Psis Pengeluaran <?php echo form_error('psis_pengeluaran') ?></label>
            <input type="text" class="form-control" name="psis_pengeluaran" id="psis_pengeluaran" placeholder="Psis Pengeluaran" value="<?php echo $psis_pengeluaran; ?>" />
        </div>
        </div>
	    <input type="hidden" name="psis_id" value="<?php echo $psis_id; ?>" /> 
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('phu_sistem') ?>" class="btn btn-default">Cancel</a>
	</div>
            </form>
        </div>
        </div>
    </body>
</html>
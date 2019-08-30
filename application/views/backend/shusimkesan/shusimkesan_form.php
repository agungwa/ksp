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
                    <h2 style="margin-top:0px"><?php echo $button ?> Shu Simkesan </h2>
                </div>
        
        <form action="<?php echo $action; ?>" method="post">
        <div class="ibox-content">
	    <div class="form-group">
            <label for="float">Shus Pendapatan <?php echo form_error('shus_pendapatan') ?></label>
            <input type="text" class="form-control numeric" name="shus_pendapatan" id="shus_pendapatan" placeholder="Shus Pendapatan" value="<?php echo $shus_pendapatan; ?>" />
        </div>
	    <div class="form-group">
            <label for="float">Shus Pengeluaran <?php echo form_error('shus_pengeluaran') ?></label>
            <input type="text" class="form-control numeric" name="shus_pengeluaran" id="shus_pengeluaran" placeholder="Shus Pengeluaran" value="<?php echo $shus_pengeluaran; ?>" />
        </div>
	    <div class="form-group">
            <label for="float">Shus Jumlah <?php echo form_error('shus_jumlah') ?></label>
            <input type="text" class="form-control numeric" name="shus_jumlah" id="shus_jumlah" placeholder="Shus Jumlah" value="<?php echo $shus_jumlah; ?>" />
        </div>
	    <input type="hidden" name="shus_id" value="<?php echo $shus_id; ?>" /> 
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('shusimkesan') ?>" class="btn btn-default">Cancel</a>
	</div>
            </form>
        </div>
        </div>
    </body>
</html>
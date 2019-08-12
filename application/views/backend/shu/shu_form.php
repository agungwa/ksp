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
                    <h2 style="margin-top:0px"><?php echo $button ?> Shu </h2>
                </div>
        
        <form action="<?php echo $action; ?>" method="post">
        <div class="ibox-content">
	    <div class="form-group">
            <label for="float">Shu Pendapatan <?php echo form_error('shu_pendapatan') ?></label>
            <input type="text" class="form-control" name="shu_pendapatan" id="shu_pendapatan" placeholder="Shu Pendapatan" value="<?php echo $shu_pendapatan; ?>" />
        </div>
	    <div class="form-group">
            <label for="float">Shu Pengeluaran <?php echo form_error('shu_pengeluaran') ?></label>
            <input type="text" class="form-control" name="shu_pengeluaran" id="shu_pengeluaran" placeholder="Shu Pengeluaran" value="<?php echo $shu_pengeluaran; ?>" />
        </div>
	    <div class="form-group">
            <label for="float">Shu Jumlah <?php echo form_error('shu_jumlah') ?></label>
            <input type="text" class="form-control" name="shu_jumlah" id="shu_jumlah" placeholder="Shu Jumlah" value="<?php echo $shu_jumlah; ?>" />
        </div>
	    <div class="form-group">
            <label for="datetime">Shu Tanggal <?php echo form_error('shu_tanggal') ?></label>
            <input type="text" class="form-control" name="shu_tanggal" id="shu_tanggal" placeholder="Shu Tanggal" value="<?php echo $shu_tanggal; ?>" />
        </div>
	    <div class="form-group">
            <label for="int">Phu Id <?php echo form_error('phu_id') ?></label>
            <input type="text" class="form-control" name="phu_id" id="phu_id" placeholder="Phu Id" value="<?php echo $phu_id; ?>" />
        </div>
	    <div class="form-group">
            <label for="int">Psis Id <?php echo form_error('psis_id') ?></label>
            <input type="text" class="form-control" name="psis_id" id="psis_id" placeholder="Psis Id" value="<?php echo $psis_id; ?>" />
        </div>
	    <input type="hidden" name="shu_id" value="<?php echo $shu_id; ?>" /> 
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('shu') ?>" class="btn btn-default">Cancel</a>
	</div>
            </form>
        </div>
        </div>
    </body>
</html>
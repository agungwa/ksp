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
                    <h2 style="margin-top:0px"><?php echo $button ?> Tunai_kasir </h2>
                </div>
        
        <form action="<?php echo $action; ?>" method="post">
        <div class="ibox-content">
	    <div class="form-group">
            <label for="float">Tun Jumlah <?php echo form_error('tun_jumlah') ?></label>
            <input type="text" class="form-control" name="tun_jumlah" id="tun_jumlah" placeholder="Tun Jumlah" value="<?php echo $tun_jumlah; ?>" />
        </div>
	    <div class="form-group">
            <label for="tinyint">Tun Jenis <?php echo form_error('tun_jenis') ?></label>
            <input type="text" class="form-control" name="tun_jenis" id="tun_jenis" placeholder="Tun Jenis" value="<?php echo $tun_jenis; ?>" />
        </div>
	    <div class="form-group">
            <label for="tinyint">Tun Kantor <?php echo form_error('tun_kantor') ?></label>
            <input type="text" class="form-control" name="tun_kantor" id="tun_kantor" placeholder="Tun Kantor" value="<?php echo $tun_kantor; ?>" />
        </div>
	    <div class="form-group">
            <label for="datetime">Tun Tanggal <?php echo form_error('tun_tanggal') ?></label>
            <input type="text" class="form-control" name="tun_tanggal" id="tun_tanggal" placeholder="Tun Tanggal" value="<?php echo $tun_tanggal; ?>" />
        </div>
	    <div class="form-group">
            <label for="datetime">Tun Tgl <?php echo form_error('tun_tgl') ?></label>
            <input type="text" class="form-control" name="tun_tgl" id="tun_tgl" placeholder="Tun Tgl" value="<?php echo $tun_tgl; ?>" />
        </div>
	    <div class="form-group">
            <label for="tinyint">Tun Flag <?php echo form_error('tun_flag') ?></label>
            <input type="text" class="form-control" name="tun_flag" id="tun_flag" placeholder="Tun Flag" value="<?php echo $tun_flag; ?>" />
        </div>
	    <div class="form-group">
            <label for="tun_info">Tun Info <?php echo form_error('tun_info') ?></label>
            <textarea class="form-control" rows="3" name="tun_info" id="tun_info" placeholder="Tun Info"><?php echo $tun_info; ?></textarea>
        </div>
	    <input type="hidden" name="tun_id" value="<?php echo $tun_id; ?>" /> 
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('tunai_kasir') ?>" class="btn btn-default">Cancel</a>
	</div>
            </form>
        </div>
        </div>
    </body>
</html>
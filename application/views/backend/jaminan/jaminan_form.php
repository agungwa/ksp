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
                    <h2 style="margin-top:0px"><?php echo $button ?> Jaminan </h2>
                </div>
        
        <form action="<?php echo $action; ?>" method="post">
        <div class="ibox-content">
	    <div class="form-group">
            <label for="int">Pin Id <?php echo form_error('pin_id') ?></label>
            <input type="text" class="form-control" name="pin_id" id="pin_id" placeholder="Pin Id" value="<?php echo $pin_id; ?>" />
        </div>
	    <div class="form-group">
            <label for="tinyint">Jej Id <?php echo form_error('jej_id') ?></label>
            <input type="text" class="form-control" name="jej_id" id="jej_id" placeholder="Jej Id" value="<?php echo $jej_id; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Jam Nomor <?php echo form_error('jam_nomor') ?></label>
            <input type="text" class="form-control" name="jam_nomor" id="jam_nomor" placeholder="Jam Nomor" value="<?php echo $jam_nomor; ?>" />
        </div>
	    <div class="form-group">
            <label for="jam_keterangan">Jam Keterangan <?php echo form_error('jam_keterangan') ?></label>
            <textarea class="form-control" rows="3" name="jam_keterangan" id="jam_keterangan" placeholder="Jam Keterangan"><?php echo $jam_keterangan; ?></textarea>
        </div>
	    <div class="form-group">
            <label for="jam_file">Jam File <?php echo form_error('jam_file') ?></label>
            <textarea class="form-control" rows="3" name="jam_file" id="jam_file" placeholder="Jam File"><?php echo $jam_file; ?></textarea>
        </div>
	    <div class="form-group">
            <label for="datetime">Jam Tgl <?php echo form_error('jam_tgl') ?></label>
            <input type="text" class="form-control" name="jam_tgl" id="jam_tgl" placeholder="Jam Tgl" value="<?php echo $jam_tgl; ?>" />
        </div>
	    <div class="form-group">
            <label for="tinyint">Jam Flag <?php echo form_error('jam_flag') ?></label>
            <input type="text" class="form-control" name="jam_flag" id="jam_flag" placeholder="Jam Flag" value="<?php echo $jam_flag; ?>" />
        </div>
	    <div class="form-group">
            <label for="jam_info">Jam Info <?php echo form_error('jam_info') ?></label>
            <textarea class="form-control" rows="3" name="jam_info" id="jam_info" placeholder="Jam Info"><?php echo $jam_info; ?></textarea>
        </div>
	    <input type="hidden" name="jam_id" value="<?php echo $jam_id; ?>" /> 
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('jaminan') ?>" class="btn btn-default">Cancel</a>
	</div>
            </form>
        </div>
        </div>
    </body>
</html>
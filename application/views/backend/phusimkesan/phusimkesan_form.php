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
                    <h2 style="margin-top:0px"><?php echo $button ?> PHU simkesan </h2>
                </div>
        
        <form action="<?php echo $action; ?>" method="post">
        <div class="ibox-content">
	    <div class="form-group">
            <label for="float">Insentif <?php echo form_error('phus_insentif') ?></label>
            <!--<input type="text" class="form-control numeric" name="phus_insentif" id="harga" placeholder="Phus Insentif" value="<?php echo $phus_insentif; ?>" onkeydown="return numbersonly(this, event);" onkeyup="javascript:tandaPemisahTitik(this);"/>-->
            <input type="text" class="form-control numeric" name="phus_insentif" id="phus_insentif" placeholder="Phus Insentif" value="<?php echo $phus_insentif; ?>" />
           
        </div>
	    <div class="form-group">
            <label for="float">Gaji <?php echo form_error('phus_gaji') ?></label>
            <input type="text" class="form-control numeric" name="phus_gaji" id="phus_gaji" placeholder="Phus Gaji" value="<?php echo $phus_gaji; ?>" />
        </div>
	    <div class="form-group">
            <label for="float">Promosi</label>
            <input type="text" class="form-control numeric" name="phus_promosi" id="phus_promosi" placeholder="Phus Promosi" value="<?php echo $phus_promosi; ?>" />
        </div>
	    <div class="form-group">
            <label for="float">Lainlain</label>
            <input type="text" class="form-control numeric" name="phus_lainlain" id="phus_lainlain" placeholder="Phus Lainlain" value="<?php echo $phus_lainlain; ?>" />
        </div>
	    <input type="hidden" name="phus_id" value="<?php echo $phus_id; ?>" /> 
	    <button type="submit" class="btn btn-primary" onclick="harga()" value="Convert"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('phusimkesan') ?>" class="btn btn-default">Cancel</a>
	</div>
            </form>
        </div>
        </div>
    </body>
</html>
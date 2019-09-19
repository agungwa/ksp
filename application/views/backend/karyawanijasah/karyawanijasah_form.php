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
                    <h2 style="margin-top:0px"><?php echo $button ?> Karyawanijasah </h2>
                </div>
        
        <form action="<?php echo $action; ?>" method="post">
        <div class="ibox-content">
	    <div class="form-group">
            <label for="varchar"> Kode Karyawan</label>
            <input type="text" class="form-control" name="kar_kode" id="searchTxt" placeholder="Kode Karyawan" value="<?php echo $kar_kode; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">ijazah Sd</label>
            <input type="text" class="form-control" name="kij_sd" id="kij_sd" placeholder="ijazah Sd" value="<?php echo $kij_sd; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">ijazah Smp </label>
            <input type="text" class="form-control" name="kij_smp" id="kij_smp" placeholder="ijazah Smp" value="<?php echo $kij_smp; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">ijazah Sma</label>
            <input type="text" class="form-control" name="kij_sma" id="kij_sma" placeholder="ijazah Sma" value="<?php echo $kij_sma; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">ijazah D3 </label>
            <input type="text" class="form-control" name="kij_d3" id="kij_d3" placeholder="ijazah D3" value="<?php echo $kij_d3; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">ijazah S1 </label>
            <input type="text" class="form-control" name="kij_s1" id="kij_s1" placeholder="ijazah S1" value="<?php echo $kij_s1; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">ijazah S2 </label>
            <input type="text" class="form-control" name="kij_s2" id="kij_s2" placeholder="ijazah S2" value="<?php echo $kij_s2; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">ijazah S3 </label>
            <input type="text" class="form-control" name="kij_s3" id="kij_s3" placeholder="ijazah S3" value="<?php echo $kij_s3; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Lainlain </label>
            <input type="text" class="form-control" name="kij_lainlain" id="kij_lainlain" placeholder="Lainlain" value="<?php echo $kij_lainlain; ?>" />
        </div><!--
	    <div class="form-group">
            <label for="tinyint">Kij Status </label>
            <input type="text" class="form-control" name="kij_status" id="kij_status" placeholder="Kij Status" value="<?php echo $kij_status; ?>" />
        </div>-->
	    <input type="hidden" name="kij_id" value="<?php echo $kij_id; ?>" /> 
	    <button type="submit" class="btn btn-primary" onclick="return confirm('Click OK jika benar kode karyawan adalah ' + searchTxt.value)"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('karyawanijasah') ?>" class="btn btn-default">Cancel</a>
	</div>
            </form>
        </div>
        </div>
    </body>
</html>
<!doctype html>
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<div class="row">
    <div class="col-lg-12">
        <div class="ibox">
        <div class="ibox-title">
            <h2><b>Neraca Simpanan</b></h2>
        </div>

        <div class="ibox-content">
        <div class="row" style="margin-bottom: 10px, margin-top:10px">
            <form action="<?php echo base_url()?>neracasimpanan" class="form-inline" method="get">
            <div class="col-md-8 text-right">
                <div class="col-md-2"><h3>Filter : </h3></div>
                <select class="form-control col-md-3"  name="w">
                    <option value="">Semua Wilayah</option>
                    <?php
                        foreach ($wilayah as $value) { 
                        	if ($w == $value->wil_kode) {
                        		echo "<option value='{$value->wil_kode}' selected>{$value->wil_nama}</option>";
                        	} else {
								echo "<option value='{$value->wil_kode}'>{$value->wil_nama}</option>";
                        	}
                        	?>
                    <?php        
                        }
                    ?>
                </select>
                <select class="form-control col-md-3" name="b" required="required">
                    <option value="">Pilih Bulan</option>
                    <?php
                    	$bulan = array("Januari","Februari","Maret","April","Mei","Juni","Juli","Agustus","September","Oktober","November","Desember");
                        foreach ($bulan as $key => $value) { 
                        	if ($b<>'' && $b == $key) {
                        		echo "<option value='{$key}' selected>{$value}</option>";
                        	} else {
                        		echo "<option value='{$key}'>{$value}</option>";
                        	}
                        	?>
                    <?php        
                        }
                    ?>
                </select>
                <select class="form-control col-md-3" name="t" required="required">
                    <option value="">Pilih Tahun</option>
                    <?php
                    	$bulan = array("Januari","Februari","Maret","April","Mei","Juni","Juli","Agustus","September","Oktober","November","Desember");
                    	$years = range(date('Y'), 2000);
                        foreach ($years as $value) { 

                        	if ($t<>'' && $t == $value) {
                        		echo "<option value='{$value}' selected>{$value}</option>";
                        	} else {
                        		echo "<option value='{$value}'>{$value}</option>";
                        	}
                        	?>
                    <?php        
                        }
                    ?>
                </select>
            </div>
            
            <div class="col-md-4 text-right">
                    <div class="input-group">
                        <span class="input-group-btn">
                            <?php 
                                if ($w <> '' || $b <> '' || $t <> '')
                                {
                                    ?>
                                    <a href="<?php echo base_url()?>neracasimpanan" class="btn btn-default">Reset</a>
                                    <?php
                                }
                            ?>
                          <button class="btn btn-primary" type="submit">Tampilkan</button>
                        </span>
                    </div>
            </div>
            </form>
        </div>

        <table class="table table-bordered table-hover table-condensed" style="margin-bottom: 10px; margin-top:10px">
            <thead class="thead-light">
            <tr>
                <th class="text-left">Saldo Lalu</th>
				<th class="text-center">RP </th>
            </tr>
            <tr>
                <th class="text-left">Saldo Masuk</th>
				<th class="text-center">RP </th>
            </tr>
            <tr>
                <th class="text-left">Saldo Keluar</th>
				<th class="text-center">RP </th>
            </tr>
            <tr>
                <th class="text-left">Saldo Kini</th>
				<th class="text-center">RP </th>
            </tr>
            <tr>
                <th class="text-left">Lain-Lain</th>
				<th class="text-center">RP <input type="number" /></th>
            </tr>
            <tr>
                <th class="text-left">Mutasi Masuk</th>
				<th class="text-center">RP </th>
            </tr>
            <tr>
                <th class="text-left">Mutasi Keluar</th>
				<th class="text-center">RP </th>
            </tr>
            <tr>
                <th class="text-left">Bunga Keluar</th>
				<th class="text-center">RP </th>
            </tr>
            <tr>
                <th class="text-left">Bunga Tanggungan</th>
				<th class="text-center">RP </th>
            </tr>
            </thead>
			<tbody>
            </tbody>
        </table>
        <div class="row">
            <div class="col-md-6">
                
	    	</div>
        	<div class="col-md-6 text-right">
                
            </div>
        </div>

        </div>
    </div>
    </div>
    </div>
    </body>
</html>
</body>
</html>
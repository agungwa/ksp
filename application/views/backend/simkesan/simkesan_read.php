<!doctype html>
<html>
    <head>
        <title></title>
    </head>
    <body>
    <div class="col-lg-12">
    <div class="ibox float-e-margins">
        <div class="ibox-title">
            <h2 style="margin-top:0px">Simkesan Read</h2>
            <div class="ibox-tools">
            </div>
        </div>
        <div class="ibox-content">
        
        <table class="table">
	    <tr><td>Rekening Simkesan</td><td><?php echo $sik_kode; ?></td></tr>
	    <tr><td>Id Anggota</td><td><?php echo $ang_no," | ",$nm_ang_no; ?></td></tr>
	    <tr><td>Plan Simkesan</td><td><?php echo $psk_id; ?></td></tr>
	    <tr><td>Wilayah</td><td><?php echo $wil_kode; ?></td></tr>
	    <tr><td>Tanggal Pendaftaran</td><td><?php echo $sik_tglpendaftaran," | Estimasi Berakhir : ",$estimasi_berakhir," | Estimasi Pengembangan : ",$estimasi_pengembangan; ?></td></tr>
	    <tr><td>Setoran Perbulan</td><td><?php echo 'Rp ',number_format($setor_psk_id, 0, ".", "."); ?></td></tr>
	    <tr><td>Estimasi Pokok</td><td><?php echo 'Rp ',number_format($setor_psk_id*60, 0, ".", ".")," | Potensi Pengembangan : Rp ",number_format($setor_psk_id*60*5/3, 0, ".", "."); ?></td></tr>
	    <tr><td>Tanggal Berakhir</td><td><?php echo $sik_tglberakhir; ?></td></tr>
	    <tr><td>Status</td><td><?php echo $this->statusSimkesan[$sik_status]; ?></td></tr>
        <tr>
        <td>
        <td><form action="<?php echo site_url('simkesan/setoransimkesan/'.$sik_kode); ?>" method="post">
            <?php
	        	?>
            <div class="col-md-4">
                <input type="hidden" class="form-control" name="pin_id" id="pin_id" placeholder="Survey" value="" required="required"/>            
	            <button type="submit" class="btn btn-primary">SETOR SIMKESAN</button> 
            </div>
            <?php 
	        	?>
            </form>
        </td>
        </tr>
            <tr><td>Penarikan</td>
            <td>
            <form action="<?php echo site_url('simkesan/penarikansepuluh/'.$sik_kode); ?>" method="post">
            <div class="col-md-4">            
	            <button type="submit" class="btn btn-primary">Penarikan 10</button> 
            </div>
            </form>
            <form action="<?php echo site_url('simkesan/penarikanlima/'.$sik_kode); ?>" method="post">
            <?php
	        	?>
            <div class="col-md-4">
                <input type="hidden" class="form-control" name="pin_id" id="pin_id" placeholder="Survey" value="" required="required"/>            
	            <button type="submit" class="btn btn-primary">Penarikan 5</button> 
            </div>
            <?php 
	        	?>
            </form>
            </td><td></td></tr>
            <tr><td>Klaim</td>
            <td>
    <form action="<?php echo site_url('pinjaman/action_surveysetuju'); ?>" method="post">
            <?php
	        	?>
            <div class="col-md-4">
                <input type="hidden" class="form-control" name="pin_id" id="pin_id" placeholder="Survey" value="" required="required"/>            
	            <button type="submit" class="btn btn-primary">Klaim 2</button> 
            </div>
            <?php 
	        	?>
            </form>
    <form action="<?php echo site_url('pinjaman/action_surveysetuju'); ?>" method="post">
            <?php
	        	?>
            <div class="col-md-4">
                <input type="hidden" class="form-control" name="pin_id" id="pin_id" placeholder="Survey" value="" required="required"/>            
	            <button type="submit" class="btn btn-primary">Klaim 3</button> 
            </div>
            <?php 
	        	?>
            </form>
    <form action="<?php echo site_url('pinjaman/action_surveysetuju'); ?>" method="post">
            <?php
	        	?>
            <div class="col-md-4">
                <input type="hidden" class="form-control" name="pin_id" id="pin_id" placeholder="Survey" value="" required="required"/>            
	            <button type="submit" class="btn btn-primary">Klaim 4</button> 
            </div>
            <?php 
	        	?>
            </form>
    <form action="<?php echo site_url('pinjaman/action_surveysetuju'); ?>" method="post">
            <?php
	        	?>
            <div class="col-md-4">
                <input type="hidden" class="form-control" name="pin_id" id="pin_id" placeholder="Survey" value="" required="required"/>            
	            <button type="submit" class="btn btn-primary">Klaim 5</button> 
            </div>
            <?php 
	        	?>
            </form>
    <form action="<?php echo site_url('pinjaman/action_surveysetuju'); ?>" method="post">
            <?php
	        	?>
            <div class="col-md-4">
                <input type="hidden" class="form-control" name="pin_id" id="pin_id" placeholder="Survey" value="" required="required"/>            
	            <button type="submit" class="btn btn-primary">Klaim 6</button> 
            </div>
            <?php 
	        	?>
            </form>
    <form action="<?php echo site_url('pinjaman/action_surveysetuju'); ?>" method="post">
            <?php
	        	?>
            <div class="col-md-4">
                <input type="hidden" class="form-control" name="pin_id" id="pin_id" placeholder="Survey" value="" required="required"/>            
	            <button type="submit" class="btn btn-primary">Klaim 7</button> 
            </div>
            <?php 
	        	?>
            </form>
    <form action="<?php echo site_url('pinjaman/action_surveysetuju'); ?>" method="post">
            <?php
	        	?>
            <div class="col-md-4">
                <input type="hidden" class="form-control" name="pin_id" id="pin_id" placeholder="Survey" value="" required="required"/>            
	            <button type="submit" class="btn btn-primary">Klaim 8</button> 
            </div>
            <?php 
	        	?>
            </form>
    <form action="<?php echo site_url('pinjaman/action_surveysetuju'); ?>" method="post">
            <?php
	        	?>
            <div class="col-md-4">
                <input type="hidden" class="form-control" name="pin_id" id="pin_id" placeholder="Survey" value="" required="required"/>            
	            <button type="submit" class="btn btn-primary">Klaim 9</button> 
            </div>
            <?php 
	        	?>
            </form>
    <form action="<?php echo site_url('pinjaman/action_surveysetuju'); ?>" method="post">
            <?php
	        	?>
            <div class="col-md-4">
                <input type="hidden" class="form-control" name="pin_id" id="pin_id" placeholder="Survey" value="" required="required"/>            
	            <button type="submit" class="btn btn-primary">Klaim 10</button> 
            </div>
            <?php 
	        	?>
            </form>
            </td></tr>
    <tr><td></td><td><a href="<?php echo site_url('simkesan') ?>" class="btn btn-default">Batal</a> </td></tr>
	</table>
    <table class="table table-bordered table-hover table-condensed" style="margin-bottom: 10px">
            <thead class="thead-light">
            <tr>
                <th class="text-center">No</th>
        		<th class="text-center">Tanggal Setoran</th>
        		<th class="text-center">Tanggal Bayar</th>
        		<th class="text-center">Jumlah Setor</th>
        		<th class="text-center">Total Setor</th>
        		<th class="text-center">Kekurangan Setor</th>
        		<th class="text-center">Tanggal</th>
            </tr>
            </thead>
			<tbody><?php
            $no=1;
            $totalsetor=0;
            foreach ($setoran_data as $setoran)
            {
                $totalsetor+=$setoran->ssk_jmlsetor;
                $kekurangan = ($setor_psk_id*60)-$totalsetor;
                ?>
                <tr>
    			<td width="80px"><?php echo $no ?></td>
    			<td><?php echo $setoran->ssk_tglsetoran ?></td>
    			<td><?php echo $setoran->ssk_tglbayar ?></td>
    			<td><?php echo $setoran->ssk_jmlsetor ?></td>
    			<td><?php echo $totalsetor ?></td>
    			<td><?php echo $kekurangan ?></td>
    			<td><?php echo dateFormat($setoran->ssk_tgl) ?></td>
		</tr>
        
                <?php
               
                $no++;
            }
            ?>
           </div>
            </tbody>
        </table>
   
          
        </div>
    </div>
    </div>
    </body>
</html>
<div class="row">
    <div class="col-lg-12">
        <div class="ibox">
        <div class="ibox-content">
        <div class="jumbotron">
        <div class="row" style="margin-bottom: 10px, margin-top:10px">
            <form action="<?php echo site_url('investasiberjangka/investasiberjangka'); ?>" class="form-inline" method="get">

            <div class="col-md-4 text-left">
                    <div class="input-group">
                        <input type="text" class="form-control" name="q" value="<?php echo $q; ?>" placeholder="id investasi" readonly>
                        <span class="input-group-btn">
                            <?php 
                                if ($q <> '')
                                {
                                    ?>
                                    <a href="<?php echo site_url('investasiberjangka/?p=4'); ?>" class="btn btn-default">Reset</a>
                                    <?php
                                }
                            ?>
                          <button class="btn btn-primary" type="submit">Tampilkan</button>
                        </span>
                    </div>
            </div>
            </form>
        </div>

	  <div class="row" style="margin-top: 10px">
	        	<?php 
	        	if ($tarik != null) {
	        	?>
                </div>
        <div class="ibox-content">
        <table class="table">
        <tr><td>Rekening Investasi</td><td><?php echo $tarik['ivb_kode']; ?></td></tr>
	    <tr><td>Kode Anggota</td><td><?php echo $tarik['ang_no']; ?></td></tr>
	    <tr><td>Nama Anggota</td><td><?php echo $tarik['nama_ang_no']; ?></td></tr>
	    <tr><td>Karyawan</td><td><?php echo $tarik['kar_kode']; ?></td></tr>
	    <tr><td>Wilayah</td><td><?php echo $tarik['wil_kode']; ?></td></tr>
	    <tr><td>Jangka Waktu</td><td><?php echo $tarik['jwi_id'], " Bulan"; ?></td></tr>
	    <tr><td>Jumlah</td><td><?php echo rupiahsimpanan($tarik['ivb_jumlah']); ?></td></tr>
	    <tr><td>Jasa</td><td><?php echo $tarik['jiv_id']; ?></td></tr>
	    <tr><td>Bunga</td><td><?php echo $tarik['biv_id'], " %"; ?></td></tr>
	    <tr><td>Jasa Total</td><td><?php echo rupiahsimpanan($tarik['ivb_jumlah']*$tarik['biv_id']/100*$tarik['jwi_id']); ?></td></tr>
	    <tr><td>Tanggal Pendaftaran</td><td><?php echo $tarik['ivb_tglpendaftaran']; ?></td></tr>
	    <tr><td>Tanggal Jatuh Tempo</td><td><?php echo $tarik['jatuhtempo']; ?></td></tr>
	    <tr><td>Status</td><td><?php echo $tarik['ivb_status']; ?></td></tr>
	    <tr><td></td><td><a href="<?php echo site_url('investasiberjangka/?p=4') ?>" class="btn btn-default">Batal</a></td></tr>
    </table>
    <table class="table table-bordered table-hover table-condensed" style="margin-bottom: 10px">
            <thead class="thead-light">
                <tr>
                    <th class="text-center">No</th>
            <th class="text-center">Rekening Investasi</th>
            <th class="text-center">Penarikanke</th>
            <th class="text-center">Jumlah Keuntungan</th>
            <th class="text-center">Jumlah Diterima</th>
            </tr>
            </thead>
			<tbody><?php
            $jasa=($tarik['ivb_jumlah']*$tarik['biv_id']/100*$tarik['jwi_id'])/$tarik['jwi_id'];
            $total = $tarik['ivb_jumlah']*$tarik['biv_id']/100*$tarik['jwi_id'];
            $totaljasa = 0;
            $no = 1;
            foreach ($tarik['penarikaninvestasiberjangka_data'] as $penarikaninvestasiberjangka)
            {
                $totaljasa += $jasa;
                 ?>
            <tr>
			<td width="80px"><?php echo $no ?></td>
			<td><?php echo $penarikaninvestasiberjangka->ivb_kode ?></td>
			<td><?php echo $penarikaninvestasiberjangka->pib_penarikanke ?></td>
			<td><?php echo rupiahsimpanan($totaljasa) ?></td>
			<td><?php echo rupiahsimpanan($penarikaninvestasiberjangka->pib_jmlditerima) ?></td>
		</tr>

            <?php
			$no++;
            }
            ?>
            </tbody>
            </div>
	</div>
    <form action="<?php echo site_url('investasiberjangka/tarik_action'); ?>" method="post">
            <?php
	        	?>
            <div class="col-md-4">
                <input type="text" class="form-control date" name="ivb_tglditutup" placeholder="input tanggal" required="required"/>            
                <input type="hidden" class="form-control" name="ivb_kode" id="ivb_kode" placeholder="ivb_kode" value="<?php echo $tarik['ivb_kode'];?>" required="required"/>            
	            <button type="submit" class="btn btn-primary">Tutup</button> 
                <a href="<?php echo site_url('investasiberjangka/?p=4') ?>" class="btn btn-default">Batal</a>
            </div>
            <?php 
	        	?>
            </form>
            </div>

            <div class="col-md-12">
    
	        	<?php
	        	} ?>
	    </div>
        </div>
        </div>
    </div>
</div>
</div>

  <div class="row">
    <div class="col-lg-12">
        <div class="ibox">
        <div class="ibox-content">
        <div class="jumbotron">
        <div class="row" style="margin-bottom: 10px, margin-top:10px">
            <form action="<?php echo site_url('simpanan/tariksimpanan'); ?>" class="form-inline" method="get">

            <div class="col-md-4 text-left">
                    <div class="input-group">
                        <input type="text" class="form-control" name="q" value="<?php echo $q; ?>" placeholder="No Simpanan">
                        <span class="input-group-btn">
                            <?php 
                                if ($q <> '')
                                {
                                    ?>
                                    <a href="<?php echo site_url('simpanan/?p=4'); ?>" class="btn btn-default">Reset</a>
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
	        	if ($penarikan != null) {
	        	?>
                </div>
        <div class="ibox-content">
        
        <table class="table">
	    <tr><td>Kode Simpanan</td><td><?php echo $penarikan['sim_kode']; ?></td></tr>
	    <tr><td>Angggota</td><td><?php echo $penarikan['ang_no']; ?></td></tr>
	    <tr><td>Bunga</td><td><?php echo $penarikan['bus_id'],' %'; ?></td></tr>
	    <tr><td>Jenis Simpanan</td><td><?php echo $penarikan['jsi_id'],' bulan'; ?></td></tr>
	    <tr><td>Jenis Setoran</td><td><?php echo $penarikan['jse_id']; ?></td></tr>
	    <tr><td>Wilayah</td><td><?php echo $penarikan['wil_kode']; ?></td></tr>
        <tr><td>Tanggal Pendaftaran</td><td><?php echo $penarikan['sim_tglpendaftaran']; ?></td></tr>
        <tr><td>Status</td><td><?php echo $penarikan['sim_status']; ?></td></tr>
	</table>
    <form action="<?php echo site_url('simpanan/tariksimpanan_action'); ?>" method="post">
    <table class="table table-bordered table-hover table-condensed" style="margin-bottom: 10px">
            <thead class="thead-light">
            <tr>
                <th class="text-center">No</th>
        <th class="text-center">Rekening Simpanan</th>
        <th class="text-center">Setoran</th>
		<th class="text-center">Tanggal Setoran</th>
		<th class="text-center">Saldo</th>
		<th class="text-center">Bunga</th>
		<th class="text-center">Total</th>
            </tr>
            </thead>
			<tbody><?php
            $no = 1;
            $total_setoran = 0;
            $bunga = 0;
            foreach ($penarikan['setoran_data'] as $setoran)
            {
                $sim_kode = $penarikan['sim_kode'];
                $total_setoran += $setoran->ssi_jmlsetor;
                $bunga += $setoran->ssi_jmlsetor * $penarikan['bus_id']/100;
                $pes_jumlah = $total_setoran+$bunga;
            ?>
            <tr>
			<td width="80px"><?php echo $no ?></td>
			<td><?php echo $sim_kode ?></td>
			<td><?php echo 'Rp ',$setoran->ssi_jmlsetor ?></td>
			<td><?php echo $setoran->ssi_tglsetor ?></td>
			<td><?php echo 'Rp ',$total_setoran ?></td>
			<td><?php echo 'Rp ',$bunga ?></td>
			<td><?php echo 'Rp ',$pes_jumlah?></td>
            <input type="hidden" class="form-control" name="pes_jumlah" id="pes_jumlah" placeholder="pes_jumlah" value="<?php echo $pes_jumlah; ?>" />
            <input type="hidden" class="form-control" name="sim_kode" id="sim_kode" placeholder="sim_kode" value="<?php echo $sim_kode; ?>" />
		</tr>

            <?php
			$no++;
            }
            ?>
            </tbody>
            </div>
	</div>
    <div>
	    <button type="submit" class="btn btn-primary">Tarik Simpanan</button> 
	    <a href="<?php echo site_url('simpanan/?p=4') ?>" class="btn btn-default">Batal</a>
    </div>
            </form>
	        	<?php
	        	} ?>
	    </div>
        </div>
        </div>
    </div>
</div>
</div>
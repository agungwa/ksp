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
		<th class="text-center">Saldo Pokok</th>
            </tr>
            </thead>
			<tbody><?php
            $no = 1;
            $total_setoran = 0;
            foreach ($penarikan['setoran_data'] as $setoran)
            {
                $sim_kode = $penarikan['sim_kode'];
                $total_setoran += $setoran->ssi_jmlsetor;
            ?>
            <tr>
			<td width="80px"><?php echo $no ?></td>
			<td><?php echo $sim_kode ?></td>
			<td><?php echo 'Rp ',$setoran->ssi_jmlsetor ?></td>
			<td><?php echo $setoran->ssi_tglsetor ?></td>
			<td><?php echo 'Rp ',ceil($total_setoran) ?></td>
            
		</tr>

            <?php
			$no++;
            }
            ?>
            
            </tbody>
            </div>
	</div>

    <table class="table table-bordered table-hover table-condensed" style="margin-bottom: 10px">
            <thead class="thead-light">
            <tr>
                <th class="text-center">No</th>
		<th class="text-center">Saldo simpanan</th>
		<th class="text-center">Saldo Sekarang (Pokok+Bunga)</th>
		<th class="text-center">Total Saldo</th>
		<th class="text-center">Tanggal Bunga</th>
		<th class="text-center">Action</th>
            </tr>
            </thead>
            <tbody><?php
            $phbuku = 20000;
            $administasi = 1/100;
            $totalsaldo = 0;
            foreach ($penarikan['bungasetoran'] as $databunga)
            { 
                $totalsaldo += $databunga->bss_saldobulanini;
                $pes_administrasi = $totalsaldo*$administasi;
                $pes_jmltarik = $totalsaldo - $pes_administrasi - $phbuku;
                $bunga = $totalsaldo-$total_setoran;
                ?>
                <tr>
			<td width="80px"><?php echo ++$start ?></td>
			<td><?php echo $databunga->sim_kode ?></td>
			<td><?php echo $databunga->bss_saldosimpanan ?></td>
			<td><?php echo $databunga->bss_saldobulanini ?></td>
			<td><?php echo $totalsaldo ?></td>
			<td><?php echo $databunga->bss_tglbunga ?></td>
            </td>
            </tr>
            <input type="hidden" class="form-control" name="pes_jumlah" id="pes_jumlah" placeholder="pes_jumlah" value="<?php echo $totalsaldo; ?>" />
            <input type="hidden" class="form-control" name="pes_phbuku" id="pes_phbuku" placeholder="pes_phbuku" value="<?php echo $phbuku; ?>" />
            <input type="hidden" class="form-control" name="pes_administrasi" id="pes_administrasi" placeholder="pes_administrasi" value="<?php echo $pes_administrasi; ?>" />
            <input type="hidden" class="form-control" name="pes_jmltarik" id="pes_jmltarik" placeholder="pes_jmltarik" value="<?php echo $pes_jmltarik; ?>" />
            <input type="hidden" class="form-control" name="pes_bunga" id="pes_bunga" placeholder="pes_bunga" value="<?php echo $bunga; ?>" />
            <input type="hidden" class="form-control" name="sim_kode" id="sim_kode" placeholder="sim_kode" value="<?php echo $sim_kode; ?>" />
            <input type="hidden" class="form-control" name="pes_saldopokok" id="pes_saldopokok" placeholder="pes_saldopokok" value="<?php echo $total_setoran; ?>" />
                <?php
            }
            ?>
            </tbody>
        </table>
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
<div class="row">
    <div class="col-lg-12">
        <div class="ibox">
        <div class="ibox-content">
        <div class="jumbotron">
        <div class="row" style="margin-bottom: 10px, margin-top:10px">
            <form action="<?php echo site_url('penarikaninvestasiberjangka/tarikpenarikandidepan'); ?>" class="form-inline" method="get">

            <div class="col-md-4 text-left">
                    <div class="input-group">
                        <input type="text" class="form-control" name="q" value="<?php echo $q; ?>" placeholder="id investasi" readonly>
                        <span class="input-group-btn">
                            <?php 
                                if ($q <> '')
                                {
                                    ?>
                                    <a href="<?php echo site_url('penarikaninvestasiberjangka/?p=1'); ?>" class="btn btn-default">Reset</a>
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
	        	if ($tarikpenarikandidepan != null) {
	        	?>
                </div>
        <div class="ibox-content">
        <table class="table">
        <tr><td>Rekening Investasi</td><td><?php echo $tarikpenarikandidepan['ivb_kode']; ?></td></tr>
	    <tr><td>Kode Anggota</td><td><?php echo $tarikpenarikandidepan['ang_no']; ?></td></tr>
	    <tr><td>Nama Anggota</td><td><?php echo $tarikpenarikandidepan['nama_ang_no']; ?></td></tr>
	    <tr><td>Karyawan</td><td><?php echo $tarikpenarikandidepan['kar_kode']; ?></td></tr>
	    <tr><td>Wilayah</td><td><?php echo $tarikpenarikandidepan['wil_kode']; ?></td></tr>
	    <tr><td>Jangka Waktu</td><td><?php echo $tarikpenarikandidepan['jwi_id'], " Bulan"; ?></td></tr>
	    <tr><td>Jumlah</td><td><?php echo rupiahsimpanan($tarikpenarikandidepan['ivb_jumlah']); ?></td></tr>
	    <tr><td>Jasa</td><td><?php echo $tarikpenarikandidepan['jiv_id']; ?></td></tr>
	    <tr><td>Bunga</td><td><?php echo $tarikpenarikandidepan['biv_id'], " %"; ?></td></tr>
	    <tr><td>Jasa Total</td><td><?php echo rupiahsimpanan($tarikpenarikandidepan['ivb_jumlah']*$tarikpenarikandidepan['biv_id']/100*$tarikpenarikandidepan['jwi_id']); ?></td></tr>
	    <tr><td>Tanggal Pendaftaran</td><td><?php echo $tarikpenarikandidepan['ivb_tglpendaftaran']; ?></td></tr>
	    <tr><td>Tanggal Jatuh Tempo</td><td><?php echo $tarikpenarikandidepan['jatuhtempo']; ?></td></tr>
	    <tr><td>Status</td><td><?php echo $tarikpenarikandidepan['ivb_status']; ?></td></tr>
	    <tr><td></td><td><a href="<?php echo site_url('penarikaninvestasiberjangka/?p=2') ?>" class="btn btn-default">Batal</a></td></tr>
    </table>
    <form action="<?php echo site_url('penarikaninvestasiberjangka/tarikpenarikandidepan_action'); ?>" method="post">
    <table class="table table-bordered table-hover table-condensed" style="margin-bottom: 10px">
            <thead class="thead-light">
                <tr>
                    <th class="text-center">No</th>
            <th class="text-center">Rekening Investasi</th>
            <th class="text-center">Penarikanke</th>
            <th class="text-center">Jumlah Keuntungan</th>
            <th class="text-center">Jumlah Diterima</th>
            <th class="text-center">Sisa</th>
            </tr>
            </thead>
			<tbody><?php
            $jasa=$tarikpenarikandidepan['ivb_jumlah']*$tarikpenarikandidepan['biv_id']/100*$tarikpenarikandidepan['jwi_id'];
            $total = $tarikpenarikandidepan['ivb_jumlah']*$tarikpenarikandidepan['biv_id']/100*$tarikpenarikandidepan['jwi_id'];
            $totaljasa = 0;
            $no = 1;
            foreach ($tarikpenarikandidepan['penarikaninvestasiberjangka_data'] as $penarikaninvestasiberjangka)
            {
                $totaljasa += $jasa;
                 ?>
            <tr>
			<td width="80px"><?php echo $no ?></td>
			<td><?php echo $penarikaninvestasiberjangka->ivb_kode ?></td>
			<td><?php echo $penarikaninvestasiberjangka->pib_penarikanke ?></td>
			<td><?php echo rupiahsimpanan($totaljasa) ?></td>
			<td><?php echo rupiahsimpanan($penarikaninvestasiberjangka->pib_jmlditerima) ?></td>
			<td><?php echo rupiahsimpanan($total-$penarikaninvestasiberjangka->pib_jmlditerima) ?></td>
		</tr>

            <?php
			$no++;
            }
            ?>
   <div class="form-group col-md-4">
        <label for="varchar">Penarikan <?php echo '(Penarikan Rp ',number_format($jasa, 0, ".", "."),')'?></label>
        <input type="hidden" class="form-control" name="ivb_kode" id="ivb_kode" placeholder="ivb_kode" value="<?php echo $tarikpenarikandidepan['ivb_kode'];?>" required="required"/>            
        <input type="hidden" class="form-control" name="pib_penarikanke" id="pib_penarikanke" placeholder="pib_penarikanke" value="<?php echo $no; ?>" required="required" />
        <input type="number" class="form-control" name="pib_jmlditerima" id="pib_jmlditerima" placeholder="pib_jmlditerima" value="<?php echo $jasa; ?>"/>
        
        <?php if(is_allow('M_EDITINVESTASI')): ?>
        <input type="date" class="form-control" name="pib_tgl" id="todays-date" />
        <?php endif; ?>
        <input type="hidden" class="form-control" name="ivb_kode" id="ivb_kode" placeholder="ivb_kode" value="<?php echo $tarikpenarikandidepan['ivb_kode']; ?>" readonly/>
        <input type="hidden" class="form-control" name="pib_jmlkeuntungan"id="pib_jmlkeuntungan" placeholder="pib_jmlkeuntungan" value="<?php echo $total; ?>" required="required" />
    </div>
            </tbody>
            </div>
	</div>
    
    <div class="form-group col-md-12">
	    <button type="submit" class="btn btn-primary">tarik</button>
        <a href="<?php echo site_url('penarikaninvestasiberjangka/?p=1') ?>" class="btn btn-default">Batal</a> 
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

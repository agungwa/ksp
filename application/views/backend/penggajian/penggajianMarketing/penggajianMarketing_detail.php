
<div class="row">
	<div class="col-lg-12">
		<div class="ibox">
			<div class="ibox-content">
				<div class="jumbotron">
					<div class="row" style="margin-bottom: 10px, margin-top:10px">
						<form action="<?= base_url()?>penggajianmarketing/lihatgaji" class="form-inline" method="get">
							<div class="col-md-8 text-left">
								<div class="input-group">
									<input type="hidden" name="kode" value="<?= $karyawan['kar_kode'] ?>">
									<span class="input-group-btn">
										<div class="col-md-3">
											<input class="form-control" type="date" name="f" value="<?= $f;?>" required="required">
										</div>
										<div style="margin-left:20px" class="col-md-3">
											<input class="form-control" type="date" name="t" value="<?= $t;?>" required="required">
										</div>
									
										<button style="margin-left:40px" class="btn btn-primary" type="submit">Tampilkan</button>
									</span>
								</div>
							</div>
						</form>
						
					</div>
					
					<?php if ($f != null && $t != null) { ?>
						<div class="row" style="margin-top: 10px"></div>
						<div class="ibox-content">
							
							<table class="table">
								<tr><td width="190px" class='active'>Kode Karyawan</td><td><?= $karyawan['kar_kode'] ?></td></tr>
								<tr><td class='active'>Nama Karyawan</td><td><?= $karyawan['kar_nama'] ?></td></tr>
								<tr><td class='active'>Alamat</td><td><?= $karyawan['kar_alamat'] ?></td></tr>
								<tr><td class='active'>Nomor HP</td><td><?= $karyawan['kar_nohp'] ?></td></tr>
								<tr><td class='active'>Total Setor</td><td><?= format_rupiah($target) ?></td></tr>
								<!--<tr><td class='active'>All Bpkb U 2008</td><td><?= $aplikasi['tot_bpkb_U_2008'] ?></td></tr>
								<tr><td class='active'>All Bpkb A 2008</td><td><?= $aplikasi['tot_bpkb_A_2008'] ?></td></tr>
								<tr><td class='active'>Mobil Bpkb U 2008</td><td><?= $aplikasi['tot_mobil_bpkb_U_2008_10'] ?></td></tr>
								<tr><td class='active'>Mobil Bpkb A 2008</td><td><?= $aplikasi['tot_mobil_bpkb_A_2008_10'] ?></td></tr>
								<tr><td class='active'>Sertifikat</td><td><?= $aplikasi['tot_srtfkt_shbg'] ?></td></tr>
								--><tr><td class='active'>Total Aplikasi</td><td><?= $aplikasi['tot_aplikasi'] ?></td></tr>
							</table>
							
							<?php
								$tot_bon_jns_apl =
									  ($aplikasi['tot_mobil_bpkb_U_2008_10'] * 130000)
									+ ($aplikasi['tot_mobil_bpkb_A_2008_10'] * 200000)
									+ ($aplikasi['tot_bpkb_U_2008'] * 80000)
									+ ($aplikasi['tot_bpkb_A_2008'] * 150000)
									+ ($aplikasi['tot_srtfkt_shbg'] * 50000);
							?>
							
							<table class="table" style="width:300px">
								<tr><td>Gaji Pokok</td><td><?= format_rupiah($gp) ?></td></tr>
								<tr><td width="190px" >Bonus Aplikasi</td><td><?= format_rupiah($aplikasi['tot_aplikasi'] * 20000) ?></td></tr>
								<tr><td width="190px" >Bonus Jenis Aplikasi</td><td><?= format_rupiah($tot_bon_jns_apl) ?></td></tr>
								<tr class="danger"><td><b>Total Gaji</b></td><td><b><?= format_rupiah($gaji) ?></b></td></tr>
							</table>
							<a href="<?= site_url('penggajianmarketing/lihatGaji?save=1&') ?>f=<?= $f ?>&t=<?= $t ?>&kode=<?= $karyawan['kar_kode'] ?>" class="btn btn-primary">Simpan Gaji</a>
						</div>
					<?php }?>
				</div>
			</div>
		</div>
	</div>
</div>
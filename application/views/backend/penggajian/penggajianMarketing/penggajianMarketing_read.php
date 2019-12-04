<div class="col-lg-12">
    <div class="ibox float-e-margins">
        <div class="ibox-title">
            <h2 style="margin-top:0px">Penggajian Marketing Read</h2>
            <div class="ibox-tools">
            </div>
        </div>
		
        <div class="ibox-content">
			<table class="table">
				<tr><td width="200px" class="active">Kode Karyawan</td><td class="active"><?= $data_gaji['kar_kode'] ?></td></tr>
				<tr><td class="active">Nama Karyawan</td><td class="active"><?= $data_gaji['kar_nama'] ?></td></tr>
				<tr><td class="active">Periode Gaji</td><td class="active"><?= $data_gaji['per_awal'] ?> - <?= $data_gaji['per_akhir'] ?></td></tr>
			</table>
			
			<?php if($data_gaji['tipe_kar'] != 0){ ?>
			<h5>Aplikasi</h5>
			<table class="table">
				<tr><td><b>Pencairan < 10 Juta</b></td><td></td><td><b>Pencairan Mobil > 10 Juta</b></td></tr>
				<tr><td width="200px" class="active">BPKB < 2008</td><td class="active"><?= $data_gaji['all_bpkb_U_2008'] ?> x 80.000</td><td width="200px" class="active">BPKB < 2008</td><td class="active"><?= $data_gaji['mobil_bpkb_U_2008_10'] ?> x 130.000</td></tr>
				<tr><td class="active">BPKB > 2008</td><td class="active"><?= $data_gaji['all_bpkb_A_2008'] ?> x 150.000</td><td class="active">BPKB > 2008</td><td class="active"><?= $data_gaji['mobil_bpkb_A_2008_10'] ?> x 200.000</td></tr>
				<tr><td class="active">Sertifikat</td><td class="active"><?= $data_gaji['srtfkt_shbg'] ?> x 50.000</td><td class="active"></td><td class="active"></td></tr>
				<tr><td class="danger">Total Aplikasi</td><td class="danger"><?= $data_gaji['total_apl'] ?></td><td class="danger"></td><td class="danger"></td></tr>
			</table>
			
			<h5>Bonus</h5>
			<table class="table">
				
				<tr><td width="200px" class="active">Bonus Aplikasi</td><td class="active"></td><td class="active"><?= $data_gaji['bonus_aplikasi'] ?></td></tr>
				<tr><td class="active">Bonus Jenis Aplikasi</td><td class="active"></td><td class="active"><?= $data_gaji['bonus_jenis_aplikasi'] ?></td></tr>
			</table>
			
			<?php } ?>
			
			<table class="table">
				<?php $jml_gaji = $data_gaji['jml_setor'] + $data_gaji['bonus_aplikasi'] + $data_gaji['bonus_jenis_aplikasi'] + $data_gaji['gaji_pokok'] ?>
				<tr><td width="200px" class="active">Total Setoran</td><td class="active"></td><td class="active"><?= format_rupiah($data_gaji['jml_setor']) ?></td></tr>
			<?php if($data_gaji['tipe_kar'] != 0){ ?>
				<tr><td class="active">Total Bonus</td><td class="active"></td><td class="active"><?= format_rupiah($data_gaji['bonus_aplikasi'] + $data_gaji['bonus_jenis_aplikasi']) ?></td></tr>
				<tr><td class="active">Gaji Pokok</td><td class="active"></td><td class="active"><?= format_rupiah($data_gaji['gaji_pokok']) ?></td></tr>
				<tr><td class="danger">Total Gaji</td><td class="danger"></td><td class="active"><?= format_rupiah($jml_gaji) ?></td></tr>
			<?php } if($data_gaji['tipe_kar'] == 0){ ?>
				<tr><td class="danger">Total Gaji</td><td class="danger"></td><td class="active"><?= format_rupiah($data_gaji['jml_setor'] * 3.5) ?></td></tr>
			<?php } ?>
			</table>
        </div>
    </div>
</div>
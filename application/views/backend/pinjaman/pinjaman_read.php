<!doctype html>
<html>
    <head>
        <title></title>
    </head>
    <body>
    <div class="col-lg-12">
    <div class="ibox float-e-margins">
        <div class="ibox-title">
            <h2 style="margin-top:0px">Detail Pinjaman</h2>
            <div class="ibox-tools">
            </div>
        </div>
        <div class="ibox-content">
        
        <table class="table">
        <?php 
        $angsuranbunga=$pin_pinjaman*$bup_id/100;
        $provisi=$pin_pinjaman*$pop_id/100;
        $pinjamanditerima=$pin_pinjaman-$provisi;
        $angsuran=($pin_pinjaman/$sea_id)+$angsuranbunga;
        ?>
	    <tr><td>Rekening Pinjaman</td><td><?php echo $pin_id; ?></td></tr>
	    <tr><td>Anggota</td><td><?php echo $ang_no; ?></td></tr>
	    <tr><td>Tenor</td><td><?php echo $sea_id," Bulan"; ?></td></tr>
	    <tr><td>Bunga Pinjaman</td><td><?php echo $bup_id," % (Bunga/bulan ",rupiah($angsuranbunga),")"; ?></td></tr>
	    <tr><td>Potongan Provisi</td><td><?php echo $pop_id," % (Potongan provisi ",rupiah($provisi),")"; ?></td></tr>
	    <tr><td>Wilayah</td><td><?php echo $wil_kode; ?></td></tr>
	    <tr><td>Kategori Peminjam</td><td><?php echo $skp_id; ?></td></tr>
	    <tr><td>Pengajuan</td><td><?php echo rupiah($pin_pengajuan); ?></td></tr>
	    <tr><td>Pinjaman</td><td><?php echo rupiah($pin_pinjaman); ?></td></tr>
	    <tr><td>Pinjaman Diterima</td><td><?php echo rupiah($pinjamanditerima); ?></td></tr>
	    <tr><td>Tanggal Pengajuan</td><td><?php echo dateFormat($pin_tglpengajuan); ?></td></tr>
	    <tr><td>Tanggal Pencairan</td><td><?php echo dateFormat($pin_tglpencairan); ?></td></tr>
	    <tr><td>Angsuran Perbulan</td><td><?php echo round($angsuran,-3) ; ?></td></tr>
	    <tr><td>Marketing</td><td><?php echo $pin_marketing; ?></td></tr>
	    <tr><td>Surveyor</td><td><?php echo $pin_surveyor; ?></td></tr>
	    <tr><td>Survey</td><td><?php echo $pin_survey; ?></td></tr>
	    <tr><td>Status Pinjaman</td><td><?php echo $pin_statuspinjaman; ?></td></tr>
	    <tr><td></td><td><a href="<?php echo site_url('pinjaman/?p=4') ?>" class="btn btn-default">Kembali</a></td></tr>
	</table>
            </div>
        </div>
    </div>
    </div>
    </body>
</html>
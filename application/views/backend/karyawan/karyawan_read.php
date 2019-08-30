<!doctype html>
<html>
    <head>
        <title></title>
    </head>
    <body>
    <div class="col-lg-12">
    <div class="ibox float-e-margins">
        <div class="ibox-title">
            <h2 style="margin-top:0px">Karyawan Read</h2>
            <div class="ibox-tools">
            </div>
        </div>
        <div class="ibox-content">
        
        <table class="table">
	    <tr><td>Nama</td><td><?php echo $kar_nama; ?></td></tr>
	    <tr><td>NO KTP</td><td><?php echo $kar_nik; ?></td></tr>
	    <tr><td>Jabatan</td><td><?php echo $jab_kode; ?></td></tr>
	    <tr><td>Alamat</td><td><?php echo $kar_alamat; ?></td></tr>
	    <tr><td>Nomor HP</td><td><?php echo $kar_nohp; ?></td></tr>
	    <tr class='danger'><td>Status Karyawan</td><td><?php echo $this->statusKaryawan[$kar_status]; ?></td></tr>
	    <tr><td>Simpanan</td><td><?php echo neraca($karyawansimpanan->ksi_simpanan); ?></td></tr>
	    <tr class='danger'><td>Status Simpanan</td><td><?php echo $this->statusSimpanankaryawan[$karyawansimpanan->ksi_status]; ?></td></tr>
	    <tr><td>KELUARGA KARYAWAN</td><td></td></tr>
	    <tr><td>Nama</td><td><?php echo $karyawankeluarga->kka_nama; ?></td></tr>
	    <tr><td>Hubungan</td><td><?php echo $karyawankeluarga->kka_hubungan; ?></td></tr>
	    <tr><td>Alamat</td><td><?php echo $karyawankeluarga->kka_alamat; ?></td></tr>
	    <tr><td>Nomor HP</td><td><?php echo $karyawankeluarga->kka_nohp; ?></td></tr>
	    <tr><td>IJAZAH KARYAWAN</td><td></td></tr>
	    <tr><td>SD/MI</td><td><?php echo $karyawanijasah->kij_sd; ?></td></tr>
	    <tr><td>SMP/MTs</td><td><?php echo $karyawanijasah->kij_smp; ?></td></tr>
	    <tr><td>SMA/MA/SMK</td><td><?php echo $karyawanijasah->kij_sma; ?></td></tr>
	    <tr><td>D3</td><td><?php echo $karyawanijasah->kij_d3; ?></td></tr>
	    <tr><td>S1</td><td><?php echo $karyawanijasah->kij_s1; ?></td></tr>
	    <tr><td>S2</td><td><?php echo $karyawanijasah->kij_s2; ?></td></tr>
	    <tr><td>S3</td><td><?php echo $karyawanijasah->kij_s3; ?></td></tr>
	    <tr class='danger'><td>Status</td><td><?php echo $this->statusIjasahkaryawan[$karyawanijasah->kij_status]; ?></td></tr>
	    <tr><td></td><td><a href="<?php echo site_url('karyawan') ?>" class="btn btn-default">Batal</a></td></tr>
	</table>
            </div>
        </div>
    </div>
    </div>
    </body>
</html>
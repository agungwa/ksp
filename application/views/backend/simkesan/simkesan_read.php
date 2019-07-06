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
	    <tr><td>Id Anggota</td><td><?php echo $ang_no; ?></td></tr>
	    <tr><td>Nama Anggota</td><td><?php echo $nm_ang_no; ?></td></tr>
	    <tr><td>Karyawan</td><td><?php echo $kar_kode; ?></td></tr>
	    <tr><td>Plan Simkesan</td><td><?php echo $psk_id; ?></td></tr>
	    <tr><td>Wilayah</td><td><?php echo $wil_kode; ?></td></tr>
	    <tr><td>Tanggal Pendaftaran</td><td><?php echo $sik_tglpendaftaran; ?></td></tr>
	    <tr><td>Estimasi Berakhir</td><td><?php echo $estimasi_berakhir; ?></td></tr>
	    <tr><td>Setoran Perbulan</td><td><?php echo 'Rp ',number_format($setor_psk_id, 0, ".", "."); ?></td></tr>
	    <tr><td>Estimasi Pokok</td><td><?php echo 'Rp ',number_format($setor_psk_id*60, 0, ".", "."); ?></td></tr>
	    <tr><td>Estimasi Pengembangan</td><td><?php echo 'Rp ',number_format($setor_psk_id*60*5/3, 0, ".", "."); ?></td></tr>
	    <tr><td>Tanggal Berakhir</td><td><?php echo $sik_tglberakhir; ?></td></tr>
	    <tr><td>Status</td><td><?php echo $this->statusSimkesan[$sik_status]; ?></td></tr>
	    <tr><td></td><td><a href="<?php echo site_url('simkesan') ?>" class="btn btn-default">Batal</a></td></tr>
	</table>
            </div>
        </div>
    </div>
    </div>
    </body>
</html>
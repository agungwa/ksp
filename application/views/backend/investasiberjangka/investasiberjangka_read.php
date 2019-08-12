<!doctype html>
<html>
    <head>
        <title></title>
    </head>
    <body>
    <div class="col-lg-12">
    <div class="ibox float-e-margins">
        <div class="ibox-title">
            <h2 style="margin-top:0px">Investasiberjangka Read</h2>
            <div class="ibox-tools">
            </div>
        </div>
        <div class="ibox-content">
        
        <table class="table">
        <tr><td>Rekenging Investasi</td><td><?php echo $ivb_kode; ?></td></tr>
	    <tr><td>Kode Anggota</td><td><?php echo $ang_no; ?></td></tr>
	    <tr><td>Nama Anggota</td><td><?php echo $nama_ang_no; ?></td></tr>
	    <tr><td>Karyawan</td><td><?php echo $kar_kode; ?></td></tr>
	    <tr><td>Wilayah</td><td><?php echo $wil_kode; ?></td></tr>
	    <tr><td>Jangka Waktu</td><td><?php echo $jwi_id, " Bulan"; ?></td></tr>
	    <tr><td>Jumlah</td><td><?php echo rupiahsimpanan($ivb_jumlah); ?></td></tr>
	    <tr><td>Jasa</td><td><?php echo $jiv_id; ?></td></tr>
	    <tr><td>Bunga</td><td><?php echo $biv_id, " %"; ?></td></tr>
	    <tr><td>Jasa Total</td><td><?php echo rupiahsimpanan($ivb_jumlah*$biv_id/100*$jwi_id); ?></td></tr>
	    <tr><td>Tanggal Pendaftaran</td><td><?php echo $ivb_tglpendaftaran; ?></td></tr>
	    <tr><td>Tanggal Jatuh Tempo</td><td><?php echo $jatuhtempo; ?></td></tr>
	    <tr><td>Status</td><td><?php echo $ivb_status; ?></td></tr>
	    <tr><td></td><td><a href="<?php echo site_url('investasiberjangka/?p=2') ?>" class="btn btn-default">Batal</a></td></tr>
	</table>
            </div>
        </div>
    </div>
    </div>
    </body>
</html>
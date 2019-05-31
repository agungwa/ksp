<!doctype html>
<html>
    <head>
        <title></title>
    </head>
    <body>
    <div class="col-lg-12">
    <div class="ibox float-e-margins">
        <div class="ibox-title">
            <h2 style="margin-top:0px">Simpanan Read</h2>
            <div class="ibox-tools">
            </div>
        </div>
        <div class="ibox-content">
        
        <table class="table">
	    <tr><td>Kode Simpanan</td><td><?php echo $sim_kode; ?></td></tr>
	    <tr><td>Angggota</td><td><?php echo $ang_no; ?></td></tr>
	    <tr><td>Karyawan</td><td><?php echo $kar_kode; ?></td></tr>
	    <tr><td>Bunga</td><td><?php echo $bus_id,' %'; ?></td></tr>
	    <tr><td>Jenis Simpanan</td><td><?php echo $jsi_id,' bulan'; ?></td></tr>
	    <tr><td>Jenis Setoran</td><td><?php echo $jse_id; ?></td></tr>
	    <tr><td>Wilayah</td><td><?php echo $wil_kode; ?></td></tr>
	    <tr><td>Tanggal Pendaftaran</td><td><?php echo $sim_tglpendaftaran; ?></td></tr>
	    <tr><td>Status</td><td><?php echo $sim_status; ?></td></tr>
	    <tr><td></td><td><a href="<?php echo site_url('simpanan') ?>" class="btn btn-default">Batal</a></td></tr>
	</table>
    <table class="table table-bordered table-hover table-condensed" style="margin-bottom: 10px">
            <thead class="thead-light">
            <tr>
                <th class="text-center">No</th>
		<th class="text-center">Setoran</th>
		<th class="text-center">Saldo</th>
		<th class="text-center">Bunga</th>
		<th class="text-center">Total</th>
            </tr>
            </thead>
			<tbody><?php
            $no = 1;
            foreach ($setoran_data as $setoran)
            {
            
            ?>
            <tr>
			<td width="80px"><?php echo $no ?></td>
			<td><?php echo $setoran->ssi_jmlsetor ?></td>
			<td><?php echo 'baby, hold on' ?></td>
			<td><?php echo 'baby, hold on' ?></td>
			<td><?php echo 'baby, hold on' ?></td>
		</tr>

            <?php
			$no++;
            }
            ?>
            </tbody>
            </div>
        </div>
    </div>
    </div>
    </body>
</html>
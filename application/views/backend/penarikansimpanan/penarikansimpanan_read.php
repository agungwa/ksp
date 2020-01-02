<!doctype html>
<html>
    <head>
        <title></title>
    </head>
    <body>
    <div class="col-lg-12">
    <div class="ibox float-e-margins">
        <div class="ibox-title">
            <h2 style="margin-top:0px">Detail Penarikan Simpanan</h2>
            <div class="ibox-tools">
            </div>
        </div>
        <div class="ibox-content">
        
        <table class="table">
			<tr><td>Kode Simpanan</td><td><?php echo $sim_kode; ?></td></tr>
			<tr><td>Nama Anggota</td><td><?php echo $ang_nama; ?></td></tr>
			<tr><td>Alamat</td><td><?php echo $ang_alamat; ?></td></tr>
			<tr><td>Tanggal Tarik</td><td><?php echo dateFormataja($pes_tglpenarikan); ?></td></tr>
			<tr><td>Saldo</td><td><?php echo $pes_saldopokok; ?></td></tr>
			<tr><td>Bunga</td><td><?php echo $pes_bunga; ?></td></tr>
			<tr><td>Jumlah</td><td><?php echo $pes_jumlah; ?></td></tr>
			<tr><td>PH Buku</td><td><?php echo $pes_phbuku; ?></td></tr>
			<tr><td>Administrasi</td><td><?php echo $pes_administrasi; ?></td></tr>
			<tr><td>Jumlah Tarik</td><td><?php echo $pes_jmltarik; ?></td></tr>
			<tr>
				<td></td>
				<td>
					<a href="<?php echo site_url('simpanan/?p=9') ?>" class="btn btn-default">Batal</a>
				</td>
			</tr>
		</table>
            </div>
        </div>
    </div>
    </div>
    </body>
</html>
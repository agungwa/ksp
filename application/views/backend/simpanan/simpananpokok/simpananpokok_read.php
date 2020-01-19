<!doctype html>
<html>
    <head>
        <title></title>
    </head>
    <body>
    <div class="col-lg-12">
    <div class="ibox float-e-margins">
        <div class="ibox-title">
            <h2 style="margin-top:0px">Simpanan Pokok Detail</h2>
            <div class="ibox-tools">
            </div>
        </div>
        <div class="ibox-content">
        
        <table class="table">
	    <tr><td>No Anggota</td><td><?= $ang_no; ?></td></tr>
	    <tr><td>Nama Angggota</td><td><?= $ang_nama; ?></td></tr>
	    <tr><td>Jenis Simpanan</td><td><?= $ses_nama; ?></td></tr>
	    <tr><td>Jumlah Setoran</td><td><?= $sip_setoran; ?></td></tr>
	    <tr><td>Tanggal Bayar</td><td><?= $sip_tglbayar; ?></td></tr>
	    <tr>
			<td></td>
			<td>
				<a href="<?= base_url()?><?=$sip_id?>" class="btn btn-default">Print</a>
                <a href="<?= site_url() ?>" class="btn btn-default">Batal</a>
			</td>
		</tr>
	</table>
            </div>
        </div>
    </div>
    </div>
    </body>
</html>
<!doctype html>
<html>
    <head>
        <title></title>
    </head>
    <body>
    <div class="row">
        <div class="col-lg-12">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h2><b>Data Rekening</b></h2>
                </div>
                <div class="ibox-content">
        <div class="row" style="margin-bottom: 10px">
            <div class="col-md-8">
            </div>          
            
            <div class="col-md-1 text-right">
            </div>
            <div class="col-md-3 text-right">
                <form action="<?php echo site_url('simpananpokok/index'); ?>" class="form-inline" method="get">
                    <div class="input-group">
                          <button class="btn btn-primary" type="submit">Tampilkan</button>
                        </span>
                    </div>
                </form>
            </div>
        </div>
        <table class="table table-bordered table-hover table-condensed" style="margin-bottom: 10px">
            <tbody class="thead-light">
            <tr>
                <td class="text-left">Saldo Simpanan</td>
				<td class="text-center">RP <?= $saldosimpanan-$saldosimpananditarik;?></td>
            </tr>
            <tr>
                <td class="text-left">Saldo Simpanan Ditarik</td>
				<td class="text-center">RP <?= $saldosimpananditarik;?></td>
            </tr>
            <tr>
                <td class="text-left">Bunga Simpanan</td>
				<td class="text-center">RP <?= $bungasimpanan;?></td>
            </tr>
            <tr>
                <td class="text-left">Saldo Simpanan Wajib</td>
				<td class="text-center">RP <?= $saldosimpananwajib;?></td>
            </tr>
            <tr>
                <td class="text-left">Saldo Simpanan Wajib Ditarik</td>
				<td class="text-center">RP <?= $saldosimpananwajib;?></td>
            </tr>
            <tr>
                <td class="text-left">Saldo Simpanan Pokok</td>
				<td class="text-center">RP <?= $saldosimpananpokok;?></td>
            </tr>
            <tr>
                <td class="text-left">PH Buku</td>
				<td class="text-center">RP <?= $phbuku;?></td>
            </tr>
            <tr>
                <td class="text-left">Administrasi</td>
				<td class="text-center">RP <?= $administrasi;?></td>
            </tr>
            </tbody>
        </table>
        <div class="row">
            <div class="col-md-6">
                <!-- <a href="#" class="btn btn-primary">Total Record : <?php echo $total_rows ?></a> -->
	    </div>
            <div class="col-md-6 text-right">
                <!-- <?php echo $pagination ?> -->
            </div>
        </div>
        </div>
    </div>
    </div>
    </div>
    </body>
</html>
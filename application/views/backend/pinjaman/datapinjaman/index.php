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
                    <h2><b>Data Laporan Sirkulasi Pinjaman</b></h2>
                </div>
                <div class="ibox-content">
        <div class="row" style="margin-bottom: 10px">
            <form action="<?php echo base_url()?>datapinjaman" class="form-inline" method="get">
            <div class="col-md-8 text-right">
                <div class="col-md-3"><h4>Rentang Tanggal : </h4></div>
                <div class="col-md-3">
                    <input class="form-control" type="date" name="f" required="required" value="<?= $f;?>">
                </div>
                <div class="col-md-3">
                    <input class="form-control" type="date" name="t" value="<?= $t;?>" required="required">
                </div>
                <select class="form-control col-md-3"  name="w">
                    <option value="all">Semua Wilayah</option>
                    <?php
                        foreach ($wilayah_data as $value) { ?>
                            <option value="<?= $value->wil_kode?>"><?= $value->wil_nama?></option>
                    <?php        
                        }
                    ?>
                </select>
            </div>
           
            
            <div class="col-md-4 text-right">
                    <div class="input-group">
                        <span class="input-group-btn">
                            <?php 
                                if ($f <> '' || $t <> '')
                                {
                                    ?>
                                    <a href="<?php echo base_url()?>datapinjaman" class="btn btn-default">Reset</a>
                                    <?php
                                }
                            ?>
                        </span>
                        <span class="input-group-btn">
                                    <a href="<?php echo base_url()?>PrintPinjaman/printsirkulasipinjaman?f=<?=$f?>&t=<?=$t?>&w=<?=$w?>" class="btn btn-default">Print</a>
                        </span>
                        <button class="btn btn-primary" type="submit">Tampilkan</button>
                    </div>
            </div>
            </form>
        </div>
        <table class="table table-bordered table-hover table-condensed" style="margin-bottom: 10px">
            <tbody class="thead-light">
            <tr>
                <td class="text-left">Saldo Pinjaman Lalu</td>
				<td class="text-center"><?= neraca($saldolalupinjaman) ;?></td>
            </tr>
            <tr>
                <td class="text-left">Saldo Drop</td>
				<td class="text-center"><?= neraca($saldodroppinjaman+$saldolunaskini);?></td>
            </tr>
            <tr>
                <td class="text-left">Angsuran Masuk (pokok)</td>
				<td class="text-center"><?= neraca($pokokangsuran+$pokokangsuranpelunasan);?></td>
				<!-- <td class="text-center"><?= rupiah($pokokangsuran);?></td> -->

            </tr>
            <tr>
                <td class="text-left">Saldo Kini</td>
				<td class="text-center"><?= neraca($saldolalupinjaman+$saldodroppinjaman+$saldolunaskini-$pokokangsuran-$pokokangsuranpelunasan);?></td>
            </tr>
            <tr>
                <td class="text-left">Bunga Angsuran</td>
				<td class="text-center"><?= neraca($bungaangsuran + $bungapelunasan);?></td>
				<!--<td class="text-center"><?php echo 'bunga angsuran = ', $bungaangsuran, ' ,  bunga pelunasan = ', $bungadendapelunasan, ' ,  bunga kurang = ', $bungapelunasan;?></td>-->
            </tr>
            <tr>
                <td class="text-left">Denda Angsuran</td>
				<td class="text-center"><?= neraca($dendaangsuran + $dendapelunasan);?></td>
            </tr>
            <tr>
                <td class="text-left">Administrasi</td>
				<td class="text-center"><?= rupiah($provisipinjaman);?></td>
            </tr>
            <tr class="danger">
                <td class="text-left">Total Angsuran Masuk</td>
				<td class="text-center"><?= neraca($pokokangsuran+$pokokangsuranpelunasan+$bungaangsuran+$bungapelunasan+$dendaangsuran+$dendapelunasan);?></td>
            </tr>
            <tr>
                <td class="text-left">Rekening Masuk Lalu</td>
				<td class="text-center"><?= $totalrekeningmasuklalu;?></td>
            </tr>  
            <tr>
                <td class="text-left">Rekening Masuk Kini</td>
				<td class="text-center"><?= $totalrekeningmasuk;?></td>
            </tr>
            <tr>
                <td class="text-left">Rekening Masuk Setelah</td>
				<td class="text-center"><?= $totalrekeningmasuksetelah;?></td>
            </tr>
            <tr>
                <td class="text-left">Rekening Keluar Lalu</td>
				<td class="text-center"><?= $totalrekeningkeluarlalu;?></td>
            </tr>
            <tr>
                <td class="text-left">Rekening Keluar Kini</td>
				<td class="text-center"><?= $totalrekeningkeluar;?></td>
            </tr>
            <tr>
                <td class="text-left">Rekening Keluar Setelah</td>
				<td class="text-center"><?= $totalrekeningkeluarsetelah;?></td>
            </tr>
            <tr>
                <td class="text-left">Rekening Kini</td>
				<td class="text-center"><?= $totalrekening;?></td>
            </tr>
            </tbody>
        </table>
        <div class="row">
        </div>
        </div>
    </div>
    </div>
    </div>
    </body>
</html>
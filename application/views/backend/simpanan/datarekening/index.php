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
            <form action="<?php echo base_url()?>datarekening" class="form-inline" method="get">
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
                                    <a href="<?php echo base_url()?>datarekening" class="btn btn-default">Reset</a>
                                    <?php
                                }
                            ?>
                        </span>
                        <span class="input-group-btn">
                                    <a href="<?php echo base_url()?>printsimpanan/printsirkulasisimpanan?f=<?=$f?>&t=<?=$t?>&w=<?=$w?>" class="btn btn-default">Print</a>
                        </span>
                          <button class="btn btn-primary" type="submit">Tampilkan</button>
                       
                    </div>
            </div>
            </form>
        </div>
        <table class="table table-bordered table-hover table-condensed" style="margin-bottom: 10px">
            <tbody class="thead-light">
            <tr>
                <td class="text-left">Saldo Simpanan</td>
				<td class="text-center"><?= rupiahsimpanan($saldosimpanan);?></td>
            </tr>
            <tr>
                <td class="text-left">Penarikan Simpanan</td>
				<td class="text-center"><?= rupiahsimpanan($saldosimpananditarik);?></td>
            </tr>
            <tr>
                <td class="text-left">Bunga Simpanan</td>
				<td class="text-center"><?= rupiahsimpanan($bungasimpanan);?></td>
            </tr>
            <tr>
                <td class="text-left">Saldo Simpanan Wajib</td>
				<td class="text-center"><?= rupiahsimpanan($saldosimpananwajib);?></td>
            </tr>
            <tr>
                <td class="text-left">Simpanan Wajib Ditarik</td>
				<td class="text-center"><?= rupiahsimpanan($saldosimpananwajibditarik);?></td>
            </tr>
            <tr>
                <td class="text-left">Saldo Simpanan Pokok</td>
				<td class="text-center"><?= rupiahsimpanan($saldosimpananpokok);?></td>
            </tr>
            <tr>
                <td class="text-left">PH Buku</td>
				<td class="text-center"><?= rupiahsimpanan($phbuku);?></td>
            </tr>
            <tr>
                <td class="text-left">Administrasi</td>
				<td class="text-center"><?= rupiahsimpanan($administrasi);?></td>
            </tr>
            <tr>
                <td class="text-left">Rekening Kini</td>
				<td class="text-center"><?= rupiahsimpanan($totalrekening);?></td>
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
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
                    <h2><b>NERACA</b></h2>
                </div>
                <div class="ibox-content">
        <div class="row" style="margin-bottom: 10px">
            <form action="<?php echo base_url()?>neraca/neraca" class="form-inline" method="get">
            <div class="col-md-8 text-right">
                <div class="col-md-3"><h4>Rentang Tanggal : </h4></div>
                <div class="col-md-3">
                    <input class="form-control" type="date" name="f" required="required" value="<?= $f;?>">
                </div><!--
                <div class="col-md-3">
                    <input class="form-control" type="date" name="t" value="<?= $t;?>" required="required">
                </div>-->
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
                                    <a href="<?php echo base_url()?>neraca/neraca" class="btn btn-default">Reset</a>
                                    <?php
                                }
                            ?>
                        </span>
                        <!--
                        <span class="input-group-btn">
                                    <a href="<?php echo base_url()?>PrintPinjaman/printsirkulasipinjaman?f=<?=$f?>&t=<?=$t?>&w=<?=$w?>" class="btn btn-default">Print</a>
                        </span>-->
                        <button class="btn btn-primary" type="submit">Tampilkan</button>
                    </div>
            </div>
            </form>
        </div>
        <!--<form action="<?php echo site_url('neraca/perhitungan_action'); ?>" method="post"> -->
        <table class="table table-bordered table-hover table-condensed" style="margin-bottom: 10px">
            <tbody class="thead-light">
            <h3> AKTIVA </h3>
            <h4> AKTIVA LANCAR </h4>
            <tr>
                <td class="text-left">Kas</td>
				<td class="text-left"><?= neraca($shudata + $saldoinvestasi + $pokokangsuranpelunasan + $pokokangsuran + $saldosimpanan);?></td>
            </tr>
            <tr>
                <td class="text-left">Kas diBank</td>
				<td class="text-left"><?= neraca($kasbankdata);?></td>
            </tr>
            <tr>
                <td class="text-left">Piutang Umum</td>
				<td class="text-left"><?= neraca($saldopinjamanumum);?></td>
            </tr>
            <tr>
                <td class="text-left">Piutang Karyawan</td>
				<td class="text-left"><?= neraca($saldopinjamankaryawan);?></td>
            </tr>
            <tr>
                <td class="text-left">Piutang Umum</td>
				<td class="text-left"><?= neraca($saldopinjamankhusus);?></td>
            </tr>
            <tr class='danger'>
            <td class="text-left">Jumlah Aktiva Lancar</td>
                <td class="text-left"><?= neraca($kasbankdata + $saldopinjamanumum + $saldopinjamankaryawan+$saldopinjamanumum + $shudata + $saldoinvestasi + $pokokangsuranpelunasan + $pokokangsuran + $saldosimpanan);?></td>
            </td>
            </tr>
            </tbody>
            
        </table>
        <table class="table table-bordered table-hover table-condensed" style="margin-bottom: 10px">
            <tbody class="thead-light">
            <h4> AKTIVA TETAP </h4>
            <tr>
                <td class="text-left">Tanah</td>
				<td class="text-left"><?= neraca($aktivatetaptanah);?></td>
            </tr>
            <tr>
                <td class="text-left">Bangunan</td>
				<td class="text-left"><?= neraca($aktivatetapbangunan);?></td>
            </tr>
            <tr>
                <td class="text-left">Elektronik</td>
				<td class="text-left"><?= neraca($aktivatetapelektronik);?></td>
            </tr>
            <tr>
                <td class="text-left">Kendaraan</td>
				<td class="text-left"><?= neraca($aktivatetapkendaraan);?></td>
            </tr>
            <tr>
                <td class="text-left">Peralatan</td>
				<td class="text-left"><?= neraca($aktivatetapperalatan);?></td>
            </tr>
            <tr>
                <td class="text-left">Akumulasi Penyusutan AT</td>
				<td class="text-left"><?= neraca($aktivatetappenyusutan);?></td>
            </tr>
            <tr class='danger'>
                <td class="text-left">Jumlah Aktiva Tetap</td>
				<td class="text-left"><?= neraca($aktivatetaptanah+$aktivatetapbangunan+$aktivatetapelektronik+$aktivatetapkendaraan+$aktivatetapperalatan+$aktivatetappenyusutan);?></td>
            </tr>
            </tbody>
        </table>
        <table class="table table-bordered table-hover table-condensed" style="margin-bottom: 10px">
            <tbody class="thead-light">
            <h3> PASIVA </h3>
            <h4> KEWAJIBAN LANCAR</h4>
            <tr>
                <td class="text-left">Simpanan Berjangka</td>
				<td class="text-left"><?= neraca($saldosimpanan);?></td>
            </tr>
            <tr>
                <td class="text-left">Utang Pihak Ketiga</td>
				<td class="text-left"><?= neraca($bungasimpanan);?></td>
            </tr>
            <tr class='danger'>
                <td class="text-left">Jumalah Kewajiban Lancar</td>
				<td class="text-left"><?= neraca($saldosimpanan+$bungasimpanan);?></td>
            </tr>
            </tbody>
        </table>
        <table class="table table-bordered table-hover table-condensed" style="margin-bottom: 10px">
            <tbody class="thead-light">
            <h4> KEWAJIBAN JANGKA PANJANG</h4>
            <tr>
                <td class="text-left">Investasi Berjangka</td>
				<td class="text-left"><?= neraca($saldoinvestasi);?></td>
            </tr>
            <tr>
                <td class="text-left">Simpanan Karyawan</td>
				<td class="text-left"><?= neraca($simpanankaryawandata);?></td>
            </tr>
            <tr class='danger'>
                <td class="text-left">Jumalah Kewajiban Lancar</td>
				<td class="text-left"><?= neraca($saldosimpanan+$bungasimpanan);?></td>
            </tr>
            </tbody>
        </table>
        
        </div>
        <!--</form>-->

        <div class="row">
        </div>
        </div>
    </div>
    </div>
    </div>
    </body>
</html>
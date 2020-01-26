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
                                    <a href="<?php echo base_url()?>neraca/neraca" class="btn btn-default">Reset</a>
                                    <?php
                                }
                            ?>
                        </span>
                        
                        <span class="input-group-btn">
                                    <a href="<?php echo base_url()?>Printneraca/neraca?f=<?=$f?>&w=<?=$w?>" class="btn btn-default">Print</a>
                        </span>
                        <button class="btn btn-info" type="submit">Tampilkan</button>
                    </div>
            </div>
            </form>
        </div>
        <?php
        
        $jat=$aktivatetaptanah+$aktivatetapbangunan+$aktivatetapelektronik+$aktivatetapkendaraan+$aktivatetapperalatan+$phupenyusutan;
        $kas=$shudata + $simpanancdr + $donasi + $bungasimpanan + $rekeningkoran + $modalpenyertaan +$saldoinvestasi + $saldosimpananwajib+$saldosimpananpokok + $saldosimpananneraca - $saldopinjamanumumbelum - $saldopinjamankaryawanbelum-$saldopinjamankhususbelum - $jat;
        $jal=$kas + $kasbankdata + $saldopinjamanumumbelum + $saldopinjamankaryawanbelum+$saldopinjamankhususbelum;
        $jkl=$saldosimpananneraca+$bungasimpanan;
        $jkp=$saldoinvestasi+$simpanankaryawandata+$rekeningkoran+$modalpenyertaan;
        $jek=$saldosimpananwajib+$saldosimpananpokok+$simpanancdr+$donasi+$shudata;
        ?>
        <table class="table table-bordered table-hover table-condensed" style="margin-bottom: 10px">
            <tbody class="thead-light">
         <!-- <?php echo 'shu',neraca($shudata), ' + utangbunga', neraca($bungasimpanan), ' + ivb', neraca($saldoinvestasi),' + simwa', neraca($saldosimpananwajib), ' + simpok', neraca($saldosimpananpokok), ' + pokpel', neraca($pokokangsuranpelunasan), ' + pokang', neraca($pokokangsuran), ' - simpananneraca', neraca($saldosimpananneraca), ' - jat', neraca($jat), ' - pinum',  neraca($saldopinjamanumum), ' - pinkar', neraca($saldopinjamankaryawan), ' - pinkhus', neraca($saldopinjamankhusus); ?> -->
            <h3> AKTIVA </h3>
            <h4> AKTIVA LANCAR </h4>
            <tr>
                <td class="text-left">Kas</td>
				<td class="text-left" ><?= rupiah($kas);?></td>
            </tr>
            <tr>
                <td class="text-left">Kas diBank</td>
				<td class="text-left"><?= neraca($kasbankdata);?></td>
            </tr>
            <tr>
                <td class="text-left">Piutang Anggota</td>
				<td class="text-left"><?= rupiahsimpanan($saldopinjamanumumbelum);?></td>
            </tr>
            <tr>
                <td class="text-left">Piutang Karyawan</td>
				<td class="text-left"><?= rupiahsimpanan($saldopinjamankaryawanbelum);?></td>
            </tr>
            <tr>
                <td class="text-left">Piutang Khusus</td>
				<td class="text-left"><?= rupiahsimpanan($saldopinjamankhususbelum);?></td>
            </tr>
            <tr class='info'>
            <td class="text-left">Jumlah Aktiva Lancar</td>
                <td class="text-left" width="380px"><?= rupiah($jal);?></td>
            </td>
            </tr>
            </tbody>
            
        </table>
        <table class="table table-bordered table-hover table-condensed" style="margin-bottom: 10px">
            <tbody class="thead-light">
            <h4> AKTIVA TETAP </h4>
            <tr>
                <td class="text-left" width="660px">Tanah</td>
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
				<td class="text-left"><?= neraca($phupenyusutan);?></td>
            </tr>
            <tr class='info'>
                <td class="text-left">Jumlah Aktiva Tetap</td>
				<td class="text-left"><?= neraca($jat);?></td>
            </tr>
            </tbody>
            <table class="table table-bordered table-hover table-condensed" style="margin-bottom: 10px">
            <tbody class="thead-light">
            <tr class='danger'>
                <td class="text-left">Jumlah</td>
				<td class="text-left"><?= rupiah($jat+$jal);?></td>
            </tr>
            </tbody>
        </table>
        <table class="table table-bordered table-hover table-condensed" style="margin-bottom: 10px">
            <tbody class="thead-light">
            <h3> PASIVA </h3>
            <h4> KEWAJIBAN LANCAR</h4>
            <tr>
                <td class="text-left" width="660px">Simpanan Berjangka</td>
				<td class="text-left"><?= neraca($saldosimpananneraca);?></td>
            </tr>
            <tr>
                <td class="text-left">Utang Bunga</td>
				<td class="text-left"><?= neraca($bungasimpanan);?></td>
            </tr>
            <tr class='info'>
                <td class="text-left">Jumalah Kewajiban Lancar</td>
				<td class="text-left"><?= neraca($jkl);?></td>
            </tr>
            </tbody>
        </table>
        <table class="table table-bordered table-hover table-condensed" style="margin-bottom: 10px">
            <tbody class="thead-light">
            <h4> KEWAJIBAN JANGKA PANJANG</h4>
            <tr>
                <td class="text-left" width="660px">Investasi Berjangka</td>
				<td class="text-left"><?= neraca($saldoinvestasi);?></td>
            </tr>
            <tr>
                <td class="text-left">Simpanan Karyawan</td>
				<td class="text-left"><?= neraca($simpanankaryawandata);?></td>
            </tr>
            <tr>
                <td class="text-left">Rekening Koran (BRI)</td>
				<td class="text-left"><?= neraca($rekeningkoran);?></td>
            </tr>
            <tr>
                <td class="text-left">Modal Penyertaan</td>
				<td class="text-left"><?= neraca($modalpenyertaan);?></td>
            </tr>
            <tr class='info'>
                <td class="text-left">Jumlah Kewajiban Lancar</td>
				<td class="text-left"><?= neraca($jkp);?></td>
                
            </tr>
            </tbody>
        </table>
        <table class="table table-bordered table-hover table-condensed" style="margin-bottom: 10px">
            <tbody class="thead-light">
            <h4> EKUITAS</h4>
            <tr>
                <td class="text-left" width="660px">Simpanan Wajib</td>
				<td class="text-left"><?= neraca($saldosimpananwajib);?></td>
            </tr>
            <tr>
                <td class="text-left">Simpanan Pokok</td>
				<td class="text-left"><?= neraca($saldosimpananpokok);?></td>
            </tr>
            <tr>
                <td class="text-left">Simpanan CDR</td>
				<td class="text-left"><?= neraca($simpanancdr);?></td>
            </tr>
            <tr>
                <td class="text-left">Donasi</td>
				<td class="text-left"><?= neraca($donasi);?></td>
            </tr>
            <tr>
                <td class="text-left">SHU</td>
				<td class="text-left"><?= neraca($shudata);?></td>
            </tr>
            <tr class='info'>
                <td class="text-left">Jumlah Ekuitas</td>
				<td class="text-left"><?= neraca($jek);?></td>
            </tr>
            </tbody>
        </table>
            <table class="table table-bordered table-hover table-condensed" style="margin-bottom: 10px">
            <tbody class="thead-light">
            <tr class='danger'>
                <td class="text-left">Jumlah</td>
				<td class="text-left"><?= rupiah($jek+$jkl+$jkp);?></td>
            </tr>
            </tbody>
        </table>
        
        </div>

        <div class="row">
        </div>
        </div>
    </div>
    </div>
    </div>
    </body>
</html>
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
                    <h2><b>NERACA SIMKESAN</b></h2>
                </div>
                <div class="ibox-content">
        <div class="row" style="margin-bottom: 10px">
            <form action="<?php echo base_url()?>datasimkesan/neraca" class="form-inline" method="get">
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
                                    <a href="<?php echo base_url()?>datasimkesan/neraca" class="btn btn-default">Reset</a>
                                    <?php
                                }
                            ?>
                        </span>
                        <span class="input-group-btn">
                                    <a href="<?php echo base_url()?>Printneraca/neracasimkesan?f=<?=$f?>&w=<?=$w?>" class="btn btn-default">Print</a>
                        </span>
                        <button class="btn btn-info" type="submit">Tampilkan</button>
                    </div>
            </div>
            </form>
        </div>
        <!--<form action="<?php echo site_url('neraca/perhitungan_action'); ?>" method="post"> -->
        <?php
        $pihutanga = ($totalRekeninga*3000000)-$saldoSimkesana;
        $pihutangb = ($totalRekeningb*5000000)-$saldoSimkesanb;
        $pihutangc = ($totalRekeningc*9000000)-$saldoSimkesanc;
        $kas=$saldosimkesan + $saldotitipan - $saldoambiltitipan + $shusimkesandata;
        $jal=$kas + $kasbankdata +$pihutanga + $pihutangb + $pihutangc;
        $jumlahpihutang= $pihutanga + $pihutangb + $pihutangc;

        $hutanga = ($saldoSimkesana/50000) * 17000;
        $hutangb = ($saldoSimkesanb/100000) * 34000;
        $hutangc = ($saldoSimkesanc/150000) * 50000;
        $jkl=$saldoSimkesana+$saldoSimkesanb+$saldoSimkesanc;

        $titipantotal = $saldotitipan - $saldoambiltitipan;
        
        $hutangjangka=$hutanga+$hutangb+$hutangc;
        $jkp=$hutangjangka;
        $pasiva = $jkp+$titipantotal+$shusimkesandata;
        $estimasi=$jal- $pasiva;
        $jumlahpasiva=$jkp+$estimasi+$titipantotal+$shusimkesandata;
        ?>
        <table class="table table-bordered table-hover table-condensed" style="margin-bottom: 10px">
            <tbody class="thead-light">
            <h3> AKTIVA </h3>
            <h4> AKTIVA LANCAR </h4>
            <tr>
                <td class="text-left">Kas</td>
				<td class="text-left" ><?= neraca($kas);?></td>
            </tr>
            <tr>
                <td class="text-left">Kas diBank</td>
				<td class="text-left"><?= neraca($kasbankdata);?></td>
            </tr>
            <tr>
                <td class="text-left">PIUTANG</td>
            </tr>
            <tr>
                <td class="text-left">Plan A</td>
				<td class="text-left"><?= rupiah($pihutanga);?></td>
            </tr>
            <tr>
                <td class="text-left">Plan B</td>
				<td class="text-left"><?= rupiah($pihutangb);?></td>
            </tr>
            <tr>
                <td class="text-left">Plan C</td>
				<td class="text-left"><?= rupiah($pihutangc);?></td>
            </tr>
            <tr class='info'>
                <td class="text-left">Jumlah Pihutang</td>
				<td class="text-left"><?= neraca($jumlahpihutang);?></td>
            </tr>
            <tr class='danger'>
            <td class="text-left">Jumlah Aktiva</td>
                <td class="text-left" width="380px"><?= rupiah($jal);?></td>
            </td>
            </tr>
            </tbody>
            
        </table>
        <table class="table table-bordered table-hover table-condensed" style="margin-bottom: 10px">
            <tbody class="thead-light">
            <h3> PASIVA </h3>
            <h4> KEWAJIBAN LANCAR</h4>
            <h4> Hutang Pokok</h4>
            <tr>
                <td class="text-left" width="660px">Plan A</td>
				<td class="text-left"><?= neraca($saldoSimkesana);?></td>
            </tr>
            <tr>
                <td class="text-left">Plan B</td>
				<td class="text-left"><?= neraca($saldoSimkesanb);?></td>
            </tr>
            <tr>
                <td class="text-left">Plan C</td>
				<td class="text-left"><?= neraca($saldoSimkesanc);?></td>
            </tr>
            <tr class='info'>
                <td class="text-left">Jumlah Hutang Pokok</td>
				<td class="text-left"><?= neraca($jkl);?></td>
            </tr>
            </tbody>
        </table>
        <table class="table table-bordered table-hover table-condensed" style="margin-bottom: 10px">
            <tbody class="thead-light">
            <h4> KEWAJIBAN MASA DEPAN</h4>
            <tr>
                <td class="text-left" width="660px">Plan A</td>
				<td class="text-left"><?= neraca($hutanga);?></td>
            </tr>
            <tr>
                <td class="text-left">Plan B</td>
				<td class="text-left"><?= neraca($hutangb);?></td>
            </tr>
            <tr>
                <td class="text-left">Plan C</td>
				<td class="text-left"><?= neraca($hutangc);?></td>
            </tr>
            <tr class='info'>
                <td class="text-left">Jumlah Kewajiban Manfaat Masadepan</td>
				<td class="text-left"><?= neraca($jkp);?></td>
            </tr>
            <tr>
                <td class="text-left" width="660px">Estimasi Kewajiban Klaim</td>
				<td class="text-left"><?= neraca($estimasi);?></td>
            </tr>
            <tr class='info'>
                <td class="text-left" width="660px">Jumlah Kewajiban Lancar</td>
				<td class="text-left"><?= neraca($estimasi+$jkp);?></td>
            </tr>
            <tr>
                <td class="text-left">Titipan</td>
				<td class="text-left"><?= neraca($titipantotal);?></td>
            </tr>
            </tbody>
        </table>
        <table class="table table-bordered table-hover table-condensed" style="margin-bottom: 10px">
            <tbody class="thead-light">
            <h4> EKUITAS</h4>
            <tr>
                <td class="text-left">SHU</td>
				<td class="text-left"><?= neraca($shusimkesandata);?></td>
            </tr>
            <tr class='info'>
                <td class="text-left">Jumlah Ekuitas</td>
				<td class="text-left"><?= neraca($shusimkesandata);?></td>
            </tr>
            </tbody>
        </table>
            <table class="table table-bordered table-hover table-condensed" style="margin-bottom: 10px">
            <tbody class="thead-light">
            <tr class='danger'>
                <td class="text-left">Jumlah Pasiva</td>
				<td class="text-left"><?= neraca($jumlahpasiva);?></td>
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
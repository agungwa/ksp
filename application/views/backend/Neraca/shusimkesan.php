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
                    <h2><b>SHU</b></h2>
                </div>
                <div class="ibox-content">
        <div class="row" style="margin-bottom: 10px">
            <form action="<?php echo base_url()?>datasimkesan/hitungphu" class="form-inline" method="get">
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
                                    <a href="<?php echo base_url()?>datasimkesan/hitungphu" class="btn btn-default">Reset</a>
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
        <?php
        $pendapatanklaim = $saldosetorklaim + $saldotunggakanklaim - $saldojumlahklaim;
        $pendapatantarik = $saldosetortarik + $saldotunggakantarik - $saldojumlahtarik;
        $administrasiall = $administrasiklaim + $administrasitarik;
        $pendapatanjumlah = $pendapatanklaim + $pendapatantarik + $saldosimkesanhangus;
        ?>
        <form action="<?php echo site_url('datasimkesan/hitungphu_action'); ?>" method="post">
        <table class="table table-bordered table-hover table-condensed" style="margin-bottom: 10px">
            <tbody class="thead-light">
            <h3> Pendapatan </h3>
            <tr>
                <td class="text-left">Klaim</td>
				<td class="text-left"><?= neraca($pendapatanklaim);?></td>
            </tr>
            <tr>
                <td class="text-left">Tarik</td>
				<td class="text-left"><?= neraca($pendapatantarik);?></td>
            </tr>
            <tr>
                <td class="text-left">Gugur</td>
				<td class="text-left"><?= neraca($saldosimkesanhangus);?></td>
            </tr>
            <tr>
                <td class="text-left">Administrasi</td>
				<td class="text-left"><?= neraca($administrasiall);?></td>
            </tr>
            <tr>
                <td class="text-left">Lain-lain</td>
                <td class="text-left" width="660px"><input type="text" class="form-control numeric" name="phsp_lainlain" id="phsp_lainlain" placeholder="lain-lain" value="" required/></td>  
            </td>
            <tr>
                <td class="text-left">Jumlah</td>
				<td class="text-left"><?= neraca($pendapatanjumlah);?></td></td>
            </tr>
            </tbody>
            
        </table>
        <table class="table table-bordered table-hover table-condensed" style="margin-bottom: 10px">
            <tbody class="thead-light">
            <h3> Biaya </h3>
            <tr>
                <td class="text-left">Insentif</td>
				<td class="text-left"><?= neraca($phuinsentif);?></td>
            </tr>
            <tr>
                <td class="text-left">Gaji</td>
				<td class="text-left"><?= neraca($phugaji);?></td>
            </tr>
            <tr>
                <td class="text-left">Promosi</td>
				<td class="text-left"><?= neraca($phupromosi);?></td>
            </tr>
            <tr>
                <td class="text-left">Lain Lain</td>
				<td class="text-left"><?= neraca($phulainlain);?></td>
            </tr>
        <?php
            $totalpengeluaran = $phuinsentif+ $phugaji + $phupromosi + $phulainlain;
            $totalpendapatan = $pendapatanjumlah;
            $jumlahshu = $totalpendapatan - $totalpengeluaran;
        ?>
            <tr>
                <td class="text-left">Total Biaya</td>
				<td class="text-left"><?= neraca($totalpengeluaran);?></td>
            </tr>
            </tbody>
        </table>
   
        <input type="hidden" class="form-control" name="shus_pendapatan" id="shus_pendapatan" placeholder="shus_pendapatan" value="<?php echo $totalpendapatan ?>" required="required" />
        <input type="hidden" class="form-control" name="shus_pengeluaran" id="shus_pengeluaran" placeholder="shus_pengeluaran" value="<?php echo $totalpengeluaran ?>" required="required" />
        <input type="hidden" class="form-control" name="shus_jumlah" id="shus_jumlah" placeholder="shus_jumlah" value="<?php echo $jumlahshu ?>" required="required" />
        <input type="hidden" class="form-control" name="phsp_id" id="phsp_id" placeholder="phsp_id" required="required" />
        <input type="hidden" class="form-control" name="phsp_klaim" id="phsp_klaim" placeholder="phsp_klaim" value="<?php echo $pendapatanklaim ?>" required="required" />
        <input type="hidden" class="form-control" name="phsp_tarik" id="phsp_tarik" placeholder="phsp_tarik" value="<?php echo $pendapatantarik ?>" required="required" />
        <input type="hidden" class="form-control" name="phsp_gugur" id="phsp_gugur" placeholder="phsp_gugur" value="<?php echo $saldosimkesanhangus ?>" required="required" />
        <input type="hidden" class="form-control" name="phsp_administrasi" id="phsp_administrasi" placeholder="phsp_administrasi" value="<?php echo $administrasiall ?>" required="required" />
        <div class="form-group col-md-3">
	    <button type="submit" class="btn btn-primary">Hitung SHU</button> 
	    <a href="<?php echo site_url('datasimkesan/hitungphu') ?>" class="btn btn-default">Batal</a>
        </div>
        </form>

        <div class="row">
        </div>
        </div>
    </div>
    </div>
    </div>
    </body>
</html>
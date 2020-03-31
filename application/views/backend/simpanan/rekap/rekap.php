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
                    <h2><b>Rekap Simpanan</b></h2>
                </div>
                <div class="ibox-content">
        <div class="row" style="margin-bottom: 10px">
            <form action="<?php echo base_url()?>Tunai/" class="form-inline" method="get">
            <input type="hidden" name="p" value="2" />
            <div class="col-md-8 text-right">
                <div class="col-md-3"><h4>Rentang Tanggal : </h4></div>
                <div class="col-md-3">
                    <input class="form-control" type="date" name="f" required="required" value="<?= $f;?>">
                </div>
                <select class="form-control col-md-3"  name="w" required>
                <?php 
                if( $w == NULL OR $w =="all"){
                    $wil_nama = NULL;
                } else {
                    $wil = $this->db->get_where('wilayah', array('wil_kode' => $w))->row();
                    $wil_nama = $wil->wil_nama;
                }
                ?>
                    <option value="<?php echo $w ?>"><?= $wil_nama ?></option>
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
                                if ($f <> '')
                                {
                                    ?>
                                    <a href="<?php echo base_url()?>Tunai/?p=2" class="btn btn-default">Reset</a>
                                    <?php
                                }
                            ?>
                        </span>
                        <span class="input-group-btn">
                                    <a href="<?php echo base_url()?>Tunai/?p=3&f=<?=$f?>&w=<?=$w?>" class="btn btn-default" onclick="return confirm('Click OK jika benar menyetor tunai Rp ' + rubah($totalrekapsimpanan))">Print</a>
                        </span>
                          <button class="btn btn-primary" type="submit">Tampilkan</button>
                       
                    </div>
            </div>
            </form>
        </div>
        <table class="table table-bordered table-hover table-condensed" style="margin-bottom: 10px">
            <tbody class="thead-light">
            <h4 align="center"> Kas Masuk </h4>
            <tr>
                <td class="text-left">Kabon</td>
				<td class="text-center"><?= neraca($ksbs);?></td>
            </tr>
            <tr>
                <td class="text-left">Setoran Simpanan Masuk</td>
				<td class="text-center"><?= neraca($saldosimpanan);?></td>
            </tr>
            <tr>
                <td class="text-left">PH Buku</td>
				<td class="text-center"><?= neraca($phbuku);?></td>
            </tr>
            <tr>
                <td class="text-left">Administrasi</td>
				<td class="text-center"><?= neraca($administrasi);?></td>
            </tr>
            <tr>
                <td class="text-left">lain-lain</td>
				<td class="text-center"><?= neraca($lsm);?></td>
            </tr>
            <tr>
                <td class="text-left">Total masuk</td>
				<td class="text-center"><?= neraca($totalmasuk);?></td>
            </tr>
            </tbody>
        </table>
        <table class="table table-bordered table-hover table-condensed" style="margin-bottom: 10px">
            <tbody class="thead-light">
            <h4 align="center"> Kas Keluar </h4>
            <tr>
                <td class="text-left">Penarikan Simpanan</td>
				<td class="text-center"><?= neraca($saldosimpananditarik);?></td>
            </tr>
            <tr>
                <td class="text-left">Bunga Simpanan Ditarik</td>
				<td class="text-center"><?= neraca($bungaditarik);?></td>
            </tr>
            <tr>
                <td class="text-left">Lain-lain</td>
				<td class="text-center"><?= neraca($lsk);?></td>
            </tr>
            <tr>
                <td class="text-left">Total keluar</td>
				<td class="text-center"><?= neraca($totalkeluar);?></td>
            </tr>
            </tbody>
        </table>
        <table class="table table-bordered table-hover table-condensed" style="margin-bottom: 10px">
            <tbody class="thead-light">
            <tr>
                <td class="text-left danger">Total Rekap Simpanan</td>
				<td class="text-center"><?= neraca($totalrekapsimpanan);?></td>
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
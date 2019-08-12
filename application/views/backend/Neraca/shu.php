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
            <form action="<?php echo base_url()?>neraca/perhitungan" class="form-inline" method="get">
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
                                    <a href="<?php echo base_url()?>neraca/perhitungan" class="btn btn-default">Reset</a>
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
        <form action="<?php echo site_url('neraca/perhitungan_action'); ?>" method="post">
        <table class="table table-bordered table-hover table-condensed" style="margin-bottom: 10px">
            <tbody class="thead-light">
            <h3> Pendapatan </h3>
            <tr>
                <td class="text-left">Jasa Pinjaman</td>
				<td class="text-left"><?= neraca($bungaangsuran + $bungadendapelunasan);?></td>
            </tr>
            <tr>
                <td class="text-left">Administrasi</td>
				<td class="text-left"><?= neraca($provisipinjaman);?></td>
            </tr>
            <tr>
                <td class="text-left">Pinalti</td>
				<td class="text-left"><?= neraca($dendaangsuran);?></td>
            </tr>
            <tr>
                <td class="text-left">Administrasi 1%</td>
				<td class="text-left"><?= neraca($administrasi);?></td>
            </tr>
            <tr>
                <td class="text-left">Buku</td>
				<td class="text-left"><?= neraca($phbuku);?></td>
            </tr>
            <tr>
                <td class="text-left">Lain-lain</td>
                <td class="text-left" width="660px"><input type="number" class="form-control" name="psis_lainlain" id="psis_lainlain" placeholder="lain-lain" value="" required/></td>  
            </td>
            </tr>
            </tbody>
            
        </table>
        <table class="table table-bordered table-hover table-condensed" style="margin-bottom: 10px">
            <tbody class="thead-light">
            <h3> Pengeluaran </h3>
            <tr>
                <td class="text-left">Bunga Simpanan</td>
				<td class="text-left"><?= neraca($bungasimpanan);?></td>
            </tr>
            <tr>
                <td class="text-left">Bunga Investasi</td>
				<td class="text-left"><?= neraca($jasainvestasiditarik);?></td>
            </tr>
            <?php
            $totalphu=0;
            $item = array ();
            foreach ($dataphu as $key => $item)
            {
                $totalphu = $item['phu_gaji']+$item['phu_operasional']+$item['phu_lps']
                +$item['phu_komunikasi']+$item['phu_perlengkapan']+$item['phu_penyusutan']
                +$item['phu_asuransi']+$item['phu_insentif']+$item['phu_pajakkendaraan']+$item['phu_rapat']
                +$item['phu_atk']+$item['phu_keamanan']+$item['phu_phpinjaman']+$item['phu_sosial']
                +$item['phu_sosial']+$item['phu_tayakuran']+$item['phu_koran']+$item['phu_pajakkoprasi']
                +$item['phu_servicekendaraan']+$item['phu_konsumsi']+$item['phu_rat']+$item['phu_thr']
                +$item['phu_nonoprasional']+$item['phu_perawatankantor'];
                ?>
                <tr>   
		    <td class="text-left">Phu Gaji</td>
			<td><?php echo neraca($item['phu_gaji']) ?></td>
            </tr>
            <tr>
		    <td class="text-left">Phu Operasional</td>
			<td><?php echo neraca($item['phu_operasional']) ?></td>
            </tr>
            <tr>
            <td class="text-left">Phu LPS</td>
			<td><?php echo neraca($item['phu_lps'])?></td>
            </tr>
            <tr>
            <td class="text-left">Phu Komunikasi</td>
			<td><?php echo neraca($item['phu_komunikasi']) ?></td>
            </tr>
            <tr>
            <td class="text-left">Phu Perlengkapan</td>
			<td><?php echo neraca($item['phu_perlengkapan']) ?></td>
            </tr>
            <tr>
            <td class="text-left">Phu Penyusutan</td>
			<td><?php echo neraca($item['phu_penyusutan']) ?></td>
            </tr>
            <tr>
            <td class="text-left">Phu Asuransi</td>
			<td><?php echo neraca($item['phu_asuransi']) ?></td>
            </tr>
            <tr>
            <td class="text-left">Phu Insentif</td>
			<td><?php echo neraca($item['phu_insentif']) ?></td>
            </tr>
            <tr>
            <td class="text-left">Phu Pajak Kendaraan</td>
			<td><?php echo neraca($item['phu_pajakkendaraan']) ?></td>
            </tr>
            <tr>
            <td class="text-left">Phu Rapat</td>
			<td><?php echo neraca($item['phu_rapat']) ?></td>
            </tr>
            <tr>
            <td class="text-left">Phu ATK</td>
			<td><?php echo neraca($item['phu_atk']) ?></td>
            </tr>
            <tr>
            <td class="text-left">Phu Keamanan</td>
			<td><?php echo neraca($item['phu_keamanan']) ?></td>
            </tr>
            <tr>
            <td class="text-left">Phu Phpinjaman</td>
			<td><?php echo neraca($item['phu_phpinjaman']) ?></td>
            </tr>
            <tr>
            <td class="text-left">Phu Sosial</td>
			<td><?php echo neraca($item['phu_sosial']) ?></td>
            </tr>
            <tr>
            <td class="text-left">Phu Tasyakuran</td>
			<td><?php echo neraca($item['phu_tayakuran']) ?></td>
            </tr>
            <tr>
            <td class="text-left">Phu Koran</td>
			<td><?php echo neraca($item['phu_koran']) ?></td>
            </tr>
            <tr>
            <td class="text-left">Phu Pajak Koprasi</td>
			<td><?php echo neraca($item['phu_pajakkoprasi']) ?></td>
            </tr>
            <tr>
            <td class="text-left">Phu Service Kendaraan</td>
			<td><?php echo neraca($item['phu_servicekendaraan']) ?></td>
            </tr>
            <tr>
            <td class="text-left">Phu Konsumsi</td>
			<td><?php echo neraca($item['phu_konsumsi']) ?></td>
            </tr>
            <tr>
            <td class="text-left">Phu RAT</td>
			<td><?php echo neraca($item['phu_rat']) ?></td>
            </tr>
            <tr>
            <td class="text-left">Phu thr</td>
			<td><?php echo neraca($item['phu_thr']) ?></td>
            </tr>
            <tr>
            <td class="text-left">Phu Non Oprasional</td>
			<td><?php echo neraca($item['phu_nonoprasional']) ?></td>
            </tr>
            <tr>
            <td class="text-left">Phu Perawatan Kantor</td>
			<td><?php echo neraca($item['phu_perawatankantor']) ?></td>
            </tr>
            <tr>
            <td class="text-left">Phu Keterangan</td>
			<td><?php echo $item['phu_keterangan'] ?></td>
            </tr>
            
        <input type="hidden" class="form-control" name="phu_id" id="phu_id" placeholder="phu_id" value="<?php echo $item['phu_id'] ?>" required="required" />
		</tr>
                
                <?php
            }
            ?>
            </tbody>
        </table>
        <?php
            $pengeluaranpsis = $bungasimpanan+$jasainvestasiditarik;
            $totalpengeluaran = $totalphu+$bungasimpanan+$jasainvestasiditarik;
            $totalpendapatan = $bungaangsuran + $bungadendapelunasan + $provisipinjaman + $dendaangsuran + $administrasi + $phbuku;
           $jumlahshu = $totalpendapatan - $totalpengeluaran;
        ?>
   
        <input type="hidden" class="form-control" name="shu_pendapatan" id="shu_pendapatan" placeholder="shu_pendapatan" value="<?php echo $totalpendapatan ?>" required="required" />
        <input type="hidden" class="form-control" name="shu_pengeluaran" id="shu_pengeluaran" placeholder="shu_pengeluaran" value="<?php echo $totalpengeluaran ?>" required="required" />
        <input type="hidden" class="form-control" name="psis_pengeluaran" id="psis_pengeluaran" placeholder="psis_pengeluaran" value="<?php echo $pengeluaranpsis ?>" required="required" />
        <input type="hidden" class="form-control" name="shu_jumlah" id="shu_jumlah" placeholder="shu_jumlah" value="<?php echo $jumlahshu ?>" required="required" />
        <input type="hidden" class="form-control" name="shu_tanggal" id="todays-date" placeholder="shu_tanggal" required="required" />
        <input type="hidden" class="form-control" name="psis_id" id="psis_id" placeholder="psis_id" value="<?php echo $kode ?>" required="required" />
        <input type="hidden" class="form-control" name="psis_adminsim" id="psis_adminsim" placeholder="psis_adminsim" value="<?php echo $administrasi ?>" required="required" />
        <input type="hidden" class="form-control" name="psis_pinalti" id="psis_pinalti" placeholder="psis_pinalti" value="<?php echo $dendaangsuran ?>" required="required" />
        <input type="hidden" class="form-control" name="psis_adminpin" id="psis_adminpin" placeholder="psis_adminpin" value="<?php echo $provisipinjaman ?>" required="required" />
        <input type="hidden" class="form-control" name="psis_jasapinjaman" id="psis_jasapinjaman" placeholder="psis_jasapinjaman" value="<?php echo ($bungaangsuran + $bungadendapelunasan) ?>" required="required" />
        <div class="form-group col-md-3">
	    <button type="submit" class="btn btn-primary">Hitung SHU</button> 
	    <a href="<?php echo site_url('neraca/perhitungan') ?>" class="btn btn-default">Batal</a>
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
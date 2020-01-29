<style>
table#00 {
  border-collapse: collapse;
  width: 100%;
  height: 100%;
}

th, td {
  text-align: left;
  padding: 8px;
}

td#01 {
    
  text-align: left;
  padding: 8px;
  width: 330px;
  
}

tr:nth-child(even){background-color: #f2f2f2; }

th {
  background-color: #4CAF50;
  color: white;
}
 	h2{text-align: center}
 	h3{text-align: center}
    tr#01{background-color: #eb3131;}
    tr#02{background-color: #536fee;}
    tr#11{background-color: #FFFFFF;}
 
table#01 {
    border-collapse: collapse;
    width: 100%;
    text-align: center;
}
table#02 {
    text-align: justify;
}
table#03 {
    text-align: center;
}
table#04 {
    text-align: right;
}
h2{text-align: center}
h3{text-align: center}
h4{text-align: center}
h5{text-align: center}
</style> 
<p style="margin-top:0pt; margin-bottom:0pt; text-align:center; font-size:11pt"><span
    style="font-family:Cambria">PERHITUNGAN HASIL USAHA (PHU)</span></p>
<p style="margin-top:0pt; margin-bottom:0pt; text-align:center; font-size:11pt"><span
    style="font-family:Cambria">KSP Sido Mukti Makmur</span></p>
 <?php $wil_kode = $this->db->get_where('wilayah', array('wil_kode' => $w))->row(); ?></p>
<p style="margin-top:0pt; margin-bottom:0pt; text-align:center; font-size:11pt"><span
    style="font-family:Cambria">Tanggal : <?=dateFormataja($f)?></p>
 <!--<h3><b>Wilayah <?=$w?> <?php //if($w='all'){echo 'semua wilayah';}else {echo $wil_kode->wil_nama;}?></b></h3>-->

 <p style="margin-top:0pt; margin-bottom:0pt; text-align:center; font-size:11pt"><span
                style="font-family:Cambria">Pendapatan</span></p>
        <table id="00">
            <tbody>
            <tr>
                <td width="150px">Jasa Pinjaman</td>
				<td width="150px"><?= neraca($bungaangsuran + $bungadendapelunasan);?></td>
                <td width="150px">Administrasi</td>
				<td width="150px"><?= neraca($provisipinjaman);?></td>
            </tr>
            <tr>
                <td width="150px">Pinalti</td>
				<td width="150px"><?= neraca($dendaangsuran);?></td>
                <td width="150px">Administrasi 1%</td>
				<td width="150px"><?= neraca($administrasi);?></td>
            </tr>
            <tr>
                <td width="150px">Buku</td>
				<td width="150px"><?= neraca($phbuku);?></td>
                <td width="150px">Lain-lain</td>
                <td width="150px"><?= neraca($this->input->post('psis_lainlain',TRUE));?></td> 
            </tr>
            <tr id="01">
                <td>Jumlah</td>
				<td><?= neraca($bungaangsuran + $bungadendapelunasan+$provisipinjaman+$dendaangsuran+$administrasi+$phbuku);?></td></td>
            </tr>
            </tbody>
            
        </table>
        <p style="margin-top:0pt; margin-bottom:0pt; text-align:center; font-size:11pt"><span
                style="font-family:Cambria">Biaya</span></p>
        <table id="00">
            <tbody>
            <tr>
                <td width="150px">Bunga Simpanan</td>
				<td width="150px"><?= neraca($bungasimpanan);?></td>
                <td width="150px">Bunga Investasi</td>
				<td width="150px"><?= neraca($jasainvestasiditarik);?></td>
            </tr>
            <tr>
                <td width="150px">Gaji</td>
				<td width="150px"><?= neraca($phugaji);?></td>
                <td width="150px">Listrik</td>
				<td width="150px"><?= neraca($phulps);?></td>
            </tr>
            <tr>
                <td width="150px">Komunikasi</td>
				<td width="150px"><?= neraca($phukomunikasi);?></td>
                <td width="150px">Perlengkapan</td>
				<td width="150px"><?= neraca($phuperlengkapan);?></td>
            </tr>
            <tr>
                <td width="150px">Penyusutan</td>
				<td width="150px"><?= neraca($phupenyusutan);?></td>
                <td width="150px">Asuransi</td>
				<td width="150px"><?= neraca($phuasuransi);?></td>
            </tr>
            <tr>
                <td width="150px">Isentif</td>
				<td width="150px"><?= neraca($phuisentif);?></td>
                <td width="150px">Pajak Kendaraan</td>
				<td width="150px"><?= neraca($phupajakkendaraan);?></td>
            </tr>
            <tr>
                <td width="150px">Rapat</td>
				<td width="150px"><?= neraca($phurapat);?></td>
                <td width="150px">ATK</td>
				<td width="150px"><?= neraca($phuatk);?></td>
            </tr>
            <tr>
                <td width="150px">Keamanan</td>
				<td width="150px"><?= neraca($phukeamanan);?></td>
                <td width="150px">PH Pinjaman</td>
				<td width="150px"><?= neraca($phuphpinjaman);?></td>
            </tr>
            <tr>
                <td width="150px">Sosial</td>
				<td width="150px"><?= neraca($phusosial);?></td>
                <td width="150px">Tasyakuran</td>
				<td width="150px"><?= neraca($phutasyakuran);?></td>
            </tr>
            <tr>
                <td width="150px">Koran</td>
				<td width="150px"><?= neraca($phukoran);?></td>
                <td width="150px">Pajak Koprasi</td>
				<td width="150px"><?= neraca($phupajakkoprasi);?></td>
            </tr>
            <tr>
                <td width="150px">Service Kendaraan</td>
				<td width="150px"><?= neraca($phuservicekendaraan);?></td>
                <td width="150px">Konsumsi</td>
				<td width="150px"><?= neraca($phukonsumsi);?></td>
            </tr>
            <tr>
                <td width="150px">RAT</td>
				<td width="150px"><?= neraca($phurat);?></td>
                <td width="150px">THR</td>
				<td width="150px"><?= neraca($phuthr);?></td>
            </tr>
            <tr>
                <td width="150px" >Non Oprasional</td>
				<td width="150px"><?= neraca($phunonoprasional);?></td>
                <td width="150px">Perawatan Kantor</td>
				<td width="150px"><?= neraca($phuperawatankantor);?></td>
            </tr>
            
        <?php
        $totalphu = $phugaji+ $phuoprasional + $phulps + $phukomunikasi + $phuperlengkapan + $phupenyusutan + $phuasuransi + $phuisentif + $phupajakkendaraan + $phurapat + $phuatk + $phukeamanan + $phuphpinjaman + $phusosial +$phutasyakuran + $phukoran + $phupajakkoprasi + $phuservicekendaraan + $phukonsumsi + $phurat + $phuthr + $phunonoprasional + $phuperawatankantor; 
            $pengeluaranpsis = $bungasimpanan+$jasainvestasiditarik;
            $totalpengeluaran = $totalphu+$bungasimpanan+$jasainvestasiditarik;
            $totalpendapatan = $bungaangsuran + $bungadendapelunasan + $provisipinjaman + $dendaangsuran + $administrasi + $phbuku;
           $jumlahshu = $totalpendapatan - $totalpengeluaran;
        ?>
            <tr id="01">
                <td>Total Biaya</td>
				<td><?= neraca($totalpengeluaran);?></td>
            </tr>
            <tr id="02">
                <td>SHU</td>
				<td><?= neraca($totalpendapatan-$totalpengeluaran);?></td>
            </tr>
            </tbody>
        </table>
        <p style="margin-top:0pt; margin-bottom:0pt; text-align:justify; font-size:11pt"><span
                style="font-family:Cambria">&nbsp;</span></p>
        <table id="03" text-align="right" style="border-collapse:collapse" cellspacing="0" cellpadding="0">
            <tbody>
                <tr text-align="right">
                    <td style="width:600.1pt; padding-right:5.4pt; padding-left:5.4pt; vertical-align:top; text-align:right;">
                        <p
                            style="margin-top:0pt; margin-bottom:10pt; text-align:right; line-height:115%; font-size:11pt">
                            <span style="font-family:Cambria">Temanggung</span><span style="font-family:Cambria">,
                            </span><span style="font-family:Cambria"> <?php echo hari_ini(),' , ',dateFormataja($this->tgl) ?></span></p>
                    </td>
                </tr>
            </tbody>
        </table>
        <table id="03" style="border-collapse:collapse" cellspacing="0" cellpadding="0">
            <tbody>
                <tr id="11">
                    <td style="width:200.8pt; padding-right:5.4pt; padding-left:5.4pt; vertical-align:top; text-align:center;">
                        <p
                            style="margin-top:0pt; margin-bottom:10pt; text-align:center; line-height:115%; font-size:11pt">
                            <span style="font-family:Cambria">Direktur</span></p><p
                            style="margin-top:0pt; margin-bottom:10pt; text-align:center; line-height:115%; font-size:11pt">
                            <span style="font-family:Cambria">KSP Sido Mukti Makmur</span></p>
                    </td>
                    <td style="width:200.85pt; padding-right:5.4pt; padding-left:5.4pt; vertical-align:top">
                        <p style="margin-top:0pt; margin-bottom:0pt; text-align:justify; font-size:11pt"><span
                                style="font-family:Cambria">&nbsp;</span></p>
                    </td>
                    <td style="width:200.85pt; padding-right:5.4pt; padding-left:5.4pt; vertical-align:top; text-align:center;">
                        <p
                            style="margin-top:0pt; margin-bottom:10pt; text-align:center; line-height:115%; font-size:11pt">
                            <span style="font-family:Cambria">Kasir</span></p>
                    </td>
                </tr>
                <tr id="11">
                    <td style="width:200.8pt; padding-right:5.4pt; padding-left:5.4pt; vertical-align:top; text-align:center;">
                        <p
                            style="margin-top:0pt; margin-bottom:10pt; text-align:center; line-height:115%; font-size:11pt">
                            <span style="font-family:Cambria"></span></p>
                    </td>
                    <td style="width:200.85pt; padding-right:5.4pt; padding-left:5.4pt; vertical-align:top">
                        <p
                            style="margin-top:0pt; margin-bottom:10pt; text-align:center; line-height:115%; font-size:11pt">
                            <span style="font-family:Cambria"></span><span style="font-family:Cambria">
                            </span><span style="font-family:Cambria"></span></p>
                    </td>
                    <td style="width:200.85pt; padding-right:5.4pt; padding-left:5.4pt; vertical-align:top">
                        <p style="margin-top:0pt; margin-bottom:0pt; text-align:justify; font-size:11pt"><span
                                style="font-family:Cambria">&nbsp;</span></p>
                    </td>
                </tr>
                <tr id="11">
                    <td style="width:200.8pt; padding-right:5.4pt; padding-left:5.4pt; vertical-align:top">
                        <p style="margin-top:0pt; margin-bottom:0pt; text-align:justify; font-size:11pt"><span
                                style="font-family:Cambria">&nbsp;</span></p>
                        <p style="margin-top:0pt; margin-bottom:0pt; text-align:justify; font-size:11pt"><span
                                style="font-family:Cambria">&nbsp;</span></p>
                        <!--<p style="margin-top:0pt; margin-bottom:0pt; text-align:justify; font-size:11pt"><span
                                style="font-family:Cambria">&nbsp;</span></p>
                        <p style="margin-top:0pt; margin-bottom:0pt; text-align:justify; font-size:11pt"><span
                                style="font-family:Cambria">&nbsp;</span></p>
                        <p style="margin-top:0pt; margin-bottom:0pt; text-align:justify; font-size:11pt"><span
                                style="font-family:Cambria">&nbsp;</span></p>
                        <p style="margin-top:0pt; margin-bottom:0pt; text-align:justify; font-size:11pt"><span
                                style="font-family:Cambria">&nbsp;</span></p>-->
                    </td>
                    <!--<td style="width:200.85pt; padding-right:5.4pt; padding-left:5.4pt; vertical-align:top">
                        <p style="margin-top:0pt; margin-bottom:0pt; text-align:justify; font-size:11pt"><span
                                style="font-family:Cambria">&nbsp;</span></p>
                        <p style="margin-top:0pt; margin-bottom:0pt; text-align:justify; font-size:11pt"><span
                                style="font-family:Cambria">&nbsp;</span></p>
                        <p style="margin-top:0pt; margin-bottom:0pt; text-align:justify; font-size:11pt"><span
                                style="font-family:Cambria">&nbsp;</span></p>
                        <p style="margin-top:0pt; margin-bottom:0pt; text-align:justify; font-size:11pt"><span
                                style="font-family:Cambria">&nbsp;</span></p>
                        <p style="margin-top:0pt; margin-bottom:0pt; text-align:justify; font-size:11pt"><span
                                style="font-family:Cambria">&nbsp;</span></p>
                        <p style="margin-top:0pt; margin-bottom:0pt; text-align:justify; font-size:11pt"><span
                                style="font-family:Cambria">&nbsp;</span></p>
                    </td>
                    <td style="width:200.85pt; padding-right:5.4pt; padding-left:5.4pt; vertical-align:top">
                        <p style="margin-top:0pt; margin-bottom:0pt; text-align:justify; font-size:11pt"><span
                                style="font-family:Cambria">&nbsp;</span></p>
                        <p style="margin-top:0pt; margin-bottom:0pt; text-align:justify; font-size:11pt"><span
                                style="font-family:Cambria">&nbsp;</span></p>
                        <p style="margin-top:0pt; margin-bottom:0pt; text-align:justify; font-size:11pt"><span
                                style="font-family:Cambria">&nbsp;</span></p>
                        <p style="margin-top:0pt; margin-bottom:0pt; text-align:justify; font-size:11pt"><span
                                style="font-family:Cambria">&nbsp;</span></p>
                        <p style="margin-top:0pt; margin-bottom:0pt; text-align:justify; font-size:11pt"><span
                                style="font-family:Cambria">&nbsp;</span></p>
                        <p style="margin-top:0pt; margin-bottom:0pt; text-align:justify; font-size:11pt"><span
                                style="font-family:Cambria">&nbsp;</span></p>
                    </td>-->
                </tr>
                <tr id="11">
                    <td style="width:200.8pt; padding-right:5.4pt; padding-left:5.4pt; vertical-align:top; text-align:center;">
                        <p
                            style="margin-top:0pt; margin-bottom:10pt; text-align:center; line-height:115%; font-size:11pt">
                            <span style="font-family:Cambria; text-decoration:underline">Aryadi, S.E</span></p>
                    </td>
                    <td style="width:200.85pt; padding-right:5.4pt; padding-left:5.4pt; vertical-align:top">
                        <p
                            style="margin-top:0pt; margin-bottom:10pt; text-align:center; line-height:115%; font-size:11pt">
                            <span style="font-family:Cambria ; text-decoration:underline"></span></p>
                    </td>
                    <td style="width:200.85pt; padding-right:5.4pt; padding-left:5.4pt; vertical-align:top; text-align:center;">
                        <p
                            style="margin-top:12pt; margin-bottom:10pt; text-align:center; line-height:115%; font-size:11pt">
                            <span style="font-family:Cambria; text-decoration:underline">Erni Setyowati</span></p>
                    </td>
                </tr>
            </tbody>
        </table>
        <p style="margin-top:0pt; margin-bottom:0pt; text-align:justify; font-size:11pt"><span
                style="font-family:Cambria">&nbsp;</span></p>
        <!-- <table id="03" style="border-collapse:collapse" cellspacing="0" cellpadding="0">
            <tbody>
                <tr>
                    <td style="width:600.1pt; padding-right:5.4pt; padding-left:5.4pt; vertical-align:top">
                        <p style="margin-top:0pt; margin-bottom:0pt; text-align:center; font-size:11pt"><span
                                style="font-family:Cambria">Mengetahui</span><span style="font-family:Cambria">,</span>
                        </p>
                    </td>
                </tr>
            </tbody>
        </table>

       <p style="margin-top:0pt; margin-bottom:0pt; text-align:justify; font-size:11pt"><span
                style="font-family:Cambria">&nbsp;</span></p>
        <table id="03" style="border-collapse:collapse" cellspacing="0" cellpadding="0">
            <tbody>
                <tr>
                    <td style="width:300.15pt; padding-right:5.4pt; padding-left:5.4pt; vertical-align:top">
                        <p
                            style="margin-top:0pt; margin-bottom:10pt; text-align:center; line-height:115%; font-size:11pt">
                            <span style="font-family:Cambria">KEPALA DESA</span></p>
                    </td>
                    <td style="width:300.15pt; padding-right:5.4pt; padding-left:5.4pt; vertical-align:top">
                        <p
                            style="margin-top:0pt; margin-bottom:10pt; text-align:center; line-height:115%; font-size:11pt">
                            <span style="font-family:Cambria">PENJAMIN</span></p>
                    </td>
                </tr>
                <tr>
                    <td style="width:300.15pt; padding-right:5.4pt; padding-left:5.4pt; vertical-align:top">
                        <p style="margin-top:0pt; margin-bottom:0pt; text-align:justify; font-size:11pt"><span
                                style="font-family:Cambria">&nbsp;</span></p>
                        <p style="margin-top:0pt; margin-bottom:0pt; text-align:justify; font-size:11pt"><span
                                style="font-family:Cambria">&nbsp;</span></p>
                        <p style="margin-top:0pt; margin-bottom:0pt; text-align:justify; font-size:11pt"><span
                                style="font-family:Cambria">&nbsp;</span></p>
                        <p style="margin-top:0pt; margin-bottom:0pt; text-align:justify; font-size:11pt"><span
                                style="font-family:Cambria">&nbsp;</span></p>
                        <p style="margin-top:0pt; margin-bottom:0pt; text-align:justify; font-size:11pt"><span
                                style="font-family:Cambria">&nbsp;</span></p>
                        <p style="margin-top:0pt; margin-bottom:0pt; text-align:justify; font-size:11pt"><span
                                style="font-family:Cambria">&nbsp;</span></p>
                    </td>
                    <td style="width:300.15pt; padding-right:5.4pt; padding-left:5.4pt; vertical-align:top">
                        <p style="margin-top:0pt; margin-bottom:0pt; text-align:justify; font-size:11pt"><span
                                style="font-family:Cambria">&nbsp;</span></p>
                        <p style="margin-top:0pt; margin-bottom:0pt; text-align:justify; font-size:11pt"><span
                                style="font-family:Cambria">&nbsp;</span></p>
                        <p style="margin-top:0pt; margin-bottom:0pt; text-align:justify; font-size:11pt"><span
                                style="font-family:Cambria">&nbsp;</span></p>
                        <p style="margin-top:0pt; margin-bottom:0pt; text-align:justify; font-size:11pt"><span
                                style="font-family:Cambria">&nbsp;</span></p>
                        <p style="margin-top:0pt; margin-bottom:0pt; text-align:justify; font-size:11pt"><span
                                style="font-family:Cambria">&nbsp;</span></p>
                        <p style="margin-top:0pt; margin-bottom:0pt; text-align:justify; font-size:11pt"><span
                                style="font-family:Cambria">&nbsp;</span></p>
                    </td>
                </tr>
                <tr>
                    <td style="width:300.15pt; padding-right:5.4pt; padding-left:5.4pt; vertical-align:top">
                        <p style="margin-top:0pt; margin-bottom:0pt; text-align:center; font-size:11pt"><span
                                style="font-family:Cambria">( …………………… )</span></p>
                    </td>
                    <td style="width:300.15pt; padding-right:5.4pt; padding-left:5.4pt; vertical-align:top">
                        <p style="margin-top:0pt; margin-bottom:0pt; text-align:center; font-size:11pt"><span
                                style="font-family:Cambria">( ........ )</span></p>
                    </td>
                </tr>
            </tbody>
        </table>-->
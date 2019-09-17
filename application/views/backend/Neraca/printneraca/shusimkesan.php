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
    style="font-family:Cambria">PERHITUNGAN HASIL USAHA (PHU) SIMKESAN</span></p>
<p style="margin-top:0pt; margin-bottom:0pt; text-align:center; font-size:11pt"><span
    style="font-family:Cambria">KSP Sido Mukti Makmur</span></p>
 <?php $wil_kode = $this->db->get_where('wilayah', array('wil_kode' => $w))->row(); ?></p>
<p style="margin-top:0pt; margin-bottom:0pt; text-align:center; font-size:11pt"><span
    style="font-family:Cambria">Tanggal : <?=dateFormataja($f)?></p>
 <!--<h3><b>Wilayah <?=$w?> <?php //if($w='all'){echo 'semua wilayah';}else {echo $wil_kode->wil_nama;}?></b></h3>-->

        <?php
        $pendapatansimkesan = ($saldosimkesan + $saldotitipan) * 2/100;
        $pendapatanklaim = $saldosetorklaim + $saldotunggakanklaim - $saldojumlahklaim;
        $pendapatantarik = $saldosetortarik + $saldotunggakantarik - $saldojumlahtarik;
        $administrasiall = $administrasiklaim + $administrasitarik;
        $pendapatanjumlah = $pendapatanklaim + $pendapatantarik + $saldosimkesanhangus + $pendapatansimkesan;
        ?>
        
        <h3> Pendapatan </h3>
        <table id="00">
            <tbody class="thead-light">
            <tr>
                <td width="300px">Klaim</td>
				<td width="300px"><?= neraca($pendapatanklaim);?></td>
            </tr>
            <tr>
                <td width="300px">Tarik</td>
				<td width="300px"><?= neraca($pendapatantarik);?></td>
            </tr>
            <tr>
                <td width="300px">Gugur</td>
				<td width="300px"><?= neraca($saldosimkesanhangus);?></td>
            </tr>
            <tr>
                <td width="300px">Administrasi</td>
				<td width="300px"><?= neraca($administrasiall);?></td>
            </tr>
            <tr>
                <td width="300px">Pendapatan Simkesan</td>
				<td width="300px"><?= neraca($pendapatansimkesan);?></td>
            </tr>
            <tr>
                <td width="300px">Lain-lain</td>
                <td width="300px"><?= neraca(0);?></td>  
            </td>
            <tr id="01">
                <td width="300px">Jumlah</td>
				<td width="300px"><?= neraca($pendapatanjumlah);?></td></td>
            </tr>
            </tbody>
            
        </table>
        
        <h3> Biaya </h3>
        <table id="00">
            <tbody class="thead-light">
            <tr>
                <td width="300px">Insentif</td>
				<td width="300px"><?= neraca($phuinsentif);?></td>
            </tr>
            <tr>
                <td width="300px">Gaji</td>
				<td width="300px"><?= neraca($phugaji);?></td>
            </tr>
            <tr>
                <td width="300px">Promosi</td>
				<td width="300px"><?= neraca($phupromosi);?></td>
            </tr>
            <tr>
                <td width="300px">Lain Lain</td>
				<td width="300px"><?= neraca($phulainlain);?></td>
            </tr>
        <?php
            $totalpengeluaran = $phuinsentif+ $phugaji + $phupromosi + $phulainlain;
            $totalpendapatan = $pendapatanjumlah;
            $jumlahshu = $totalpendapatan - $totalpengeluaran;
        ?>
            <tr id="01">
                <td width="300px">Total Biaya</td>
				<td width="300px"><?= neraca($totalpengeluaran);?></td>
            </tr>
            <tr id="02">
                <td width="300px">SHU</td>
				<td width="300px"><?= neraca($jumlahshu);?></td>
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
        <table id="03">
            <tbody>
                <tr id="11">
                    <td style="width:200.8pt; padding-right:5.4pt; padding-left:5.4pt; vertical-align:top; text-align:center;">
                        <p
                            style="margin-top:0pt; margin-bottom:10pt; text-align:center; line-height:115%; font-size:11pt">
                            <span style="font-family:Cambria">Administrasi Simkesan</span></p><p
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
                            <span style="font-family:Cambria; text-decoration:underline">Maya Syarifatul F</span></p>
                    </td>
                    <td style="width:200.85pt; padding-right:5.4pt; padding-left:5.4pt; vertical-align:top">
                        <p
                            style="margin-top:0pt; margin-bottom:10pt; text-align:center; line-height:115%; font-size:11pt">
                            <span style="font-family:Cambria ; text-decoration:underline"></span></p>
                    </td>
                    <td style="width:200.85pt; padding-right:5.4pt; padding-left:5.4pt; vertical-align:top; text-align:center;">
                        <p
                            style="margin-top:12pt; margin-bottom:10pt; text-align:center; line-height:115%; font-size:11pt">
                            <span style="font-family:Cambria; text-decoration:underline">Dina Adriyanti, S.Akun</span></p>
                    </td>
                </tr>
            </tbody>
        </table>
        <p style="margin-top:0pt; margin-bottom:0pt; text-align:justify; font-size:11pt"><span
                style="font-family:Cambria">&nbsp;</span></p>
        <table id="03" style="border-collapse:collapse" cellspacing="0" cellpadding="0">
            <tbody>
                <tr>
                    <td style="width:600.1pt; padding-right:5.4pt; padding-left:5.4pt; vertical-align:top; text-align:center;">
                        <p style="margin-top:0pt; margin-bottom:0pt; text-align:center; font-size:11pt"><span
                                style="font-family:Cambria">Mengetahui</span><span style="font-family:Cambria">,</span>
                        </p>
                    </td>
                </tr>
            </tbody>
        </table>
        <table id="03">
            <tbody>
                <tr id="11">
                    <td style="width:200.8pt; padding-right:5.4pt; padding-left:5.4pt; vertical-align:top; text-align:center;">
                        <p
                            style="margin-top:0pt; margin-bottom:10pt; text-align:center; line-height:115%; font-size:11pt">
                            <span style="font-family:Cambria"></span></p><p
                            style="margin-top:0pt; margin-bottom:10pt; text-align:center; line-height:115%; font-size:11pt">
                            <span style="font-family:Cambria"></span></p>
                    </td>
                    <td style="width:200.85pt; padding-right:5.4pt; padding-left:5.4pt; vertical-align:top; text-align:center;">
                        <p style="margin-top:0pt; margin-bottom:0pt; text-align:justify; font-size:11pt"><span
                                style="font-family:Cambria">&nbsp;Direktur</span></p>
                        <p style="margin-top:0pt; margin-bottom:0pt; text-align:justify; font-size:11pt"><span
                                style="font-family:Cambria">&nbsp;KSP Sidomukti Makmur</span></p>
                    </td>
                    <td style="width:200.85pt; padding-right:5.4pt; padding-left:5.4pt; vertical-align:top; text-align:center;">
                        <p
                            style="margin-top:0pt; margin-bottom:10pt; text-align:center; line-height:115%; font-size:11pt">
                            <span style="font-family:Cambria"></span></p>
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
                            <span style="font-family:Cambria; text-decoration:underline"></span></p>
                    </td>
                    <td style="width:200.85pt; padding-right:5.4pt; padding-left:5.4pt; vertical-align:top; text-align:center;">
                        <p
                            style="margin-top:0pt; margin-bottom:10pt; text-align:center; line-height:115%; font-size:11pt">
                            <span style="font-family:Cambria ; text-decoration:underline">Aryadi, A.Md</span></p>
                    </td>
                    <td style="width:200.85pt; padding-right:5.4pt; padding-left:5.4pt; vertical-align:top; text-align:center;">
                        <p
                            style="margin-top:12pt; margin-bottom:10pt; text-align:center; line-height:115%; font-size:11pt">
                            <span style="font-family:Cambria; text-decoration:underline"></span></p>
                    </td>
                </tr>
            </tbody>
        </table>
      
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
    style="font-family:Cambria">SIRKULASI PINJAMAN</span></p>
<p style="margin-top:0pt; margin-bottom:0pt; text-align:center; font-size:11pt"><span
    style="font-family:Cambria">KSP Sido Mukti Makmur</span></p>
 <?php
 $wil_kode = $this->db->get_where('wilayah', array('wil_kode' => $w))->row();
 ?></p>
<p style="margin-top:0pt; margin-bottom:0pt; text-align:center; font-size:11pt"><span
    style="font-family:Cambria">Rentang Tanggal : <?=dateFormataja($f)?> Sampai <?=dateFormataja($t)?></p>
<p style="margin-top:0pt; margin-bottom:0pt; text-align:center; font-size:11pt"><span
    style="font-family:Cambria">Wilayah : <?php if($w!='all'){echo $wil_kode->wil_nama;} else if ($w='all') {echo 'Semua Wilayah';}?></p>
        <table id="00">
            <tbody>
            <tr>
                <td>Saldo Pinjaman Lalu</td>
				<td><?= neraca($saldolalupinjaman+$pokokangsuran+$pokokangsuranpelunasan);?></td>
            </tr>
            <tr>
                <td>Saldo Drop</td>
				<td><?= neraca($saldodroppinjaman);?></td>
            </tr>
            <tr>
                <td>Angsuran Masuk (pokok)</td>
				<td><?= neraca($pokokangsuran+$pokokangsuranpelunasan);?></td>
            </tr>
            <tr>
                <td>Saldo Kini</td>
				<td><?= neraca(($saldolalupinjaman+$saldodroppinjaman+$pokokangsuran+$pokokangsuranpelunasan)-($pokokangsuran+$pokokangsuranpelunasan));?></td>
            </tr>
            <tr>
                <td>Bunga Angsuran</td>
				<td><?= neraca($bungaangsuran + $bungadendapelunasan);?></td>
            </tr>
            <tr>
                <td>Denda Angsuran</td>
				<td><?= neraca($dendaangsuran);?></td>
            </tr>
            <tr>
                <td>Administrasi</td>
				<td><?= neraca($provisipinjaman);?></td>
            </tr>
            <tr>
                <td>Total Angsuran Masuk</td>
				<td><?= neraca($totalangsuran+$totalangsurantunggakan);?></td>
            </tr>
            <tr>
                <td>Rekening Lalu</td>
				<td><?= $totalrekeninglalu+$totalrekeningkeluar;?></td>
            </tr>
            <tr>
                <td>Rekening Masuk</td>
				<td><?= $totalrekening;?></td>
            </tr>
            <tr>
                <td>Rekening Keluar</td>
				<td><?= $totalrekeningkeluar;?></td>
            </tr>
            <tr>
                <td>Rekening Kini</td>
				<td><?= $totalrekeninglalu+$totalrekening-$totalrekeningkeluar+$totalrekeningkeluar;?></td>
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
                        
                    <p style="margin-top:0pt; margin-bottom:0pt; text-align:justify; font-size:11pt"><span
                                style="font-family:Cambria">&nbsp;Direktur</span></p>
                        <p style="margin-top:0pt; margin-bottom:0pt; text-align:justify; font-size:11pt"><span
                                style="font-family:Cambria">&nbsp;KSP Sidomukti Makmur</span></p>
                    </td>
                    <td style="width:200.85pt; padding-right:5.4pt; padding-left:5.4pt; vertical-align:top">
                        <p style="margin-top:0pt; margin-bottom:0pt; text-align:justify; font-size:11pt"><span
                                style="font-family:Cambria">&nbsp;</span></p>
                    </td>
                    <td style="width:200.85pt; padding-right:5.4pt; padding-left:5.4pt; vertical-align:top; text-align:center;">
                        <p
                            style="margin-top:0pt; margin-bottom:10pt; text-align:center; line-height:115%; font-size:11pt">
                            <span style="font-family:Cambria">Administrasi</span></p>
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
                            <span style="font-family:Cambria; text-decoration:underline">Aryadi, A.Md</span></p>
                    </td>
                    <td style="width:200.85pt; padding-right:5.4pt; padding-left:5.4pt; vertical-align:top">
                        <p
                            style="margin-top:0pt; margin-bottom:10pt; text-align:center; line-height:115%; font-size:11pt">
                            <span style="font-family:Cambria ; text-decoration:underline"></span></p>
                    </td>
                    <td style="width:200.85pt; padding-right:5.4pt; padding-left:5.4pt; vertical-align:top; text-align:center;">
                        <p
                            style="margin-top:12pt; margin-bottom:10pt; text-align:center; line-height:115%; font-size:11pt">
                            <span style="font-family:Cambria; text-decoration:underline">Erlin Amalia</span></p>
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
                                style="font-family:Cambria"></span><span style="font-family:Cambria">,</span>
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
                                style="font-family:Cambria">&nbsp;</span></p>
                        <p style="margin-top:0pt; margin-bottom:0pt; text-align:justify; font-size:11pt"><span
                                style="font-family:Cambria">&nbsp;</span></p>
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
                            <span style="font-family:Cambria ; text-decoration:underline"></span></p>
                    </td>
                    <td style="width:200.85pt; padding-right:5.4pt; padding-left:5.4pt; vertical-align:top; text-align:center;">
                        <p
                            style="margin-top:12pt; margin-bottom:10pt; text-align:center; line-height:115%; font-size:11pt">
                            <span style="font-family:Cambria; text-decoration:underline"></span></p>
                    </td>
                </tr>
            </tbody>
        </table>
      
        
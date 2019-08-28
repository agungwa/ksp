<style>
table#02 {
    border-collapse: collapse;
    width: 100%;
    text-align: center;
}
table#04 {
    text-align: center;
}
table#03 {
    text-align: right;
}
table#05 {
    text-align: justify;
}
</style>

<?php include('header2.php');?>
    <div>
        <table id="02" style="margin-right:9pt; margin-left:9pt; border-collapse:collapse; float:left" cellspacing="0"
            cellpadding="0">
            <tbody>
                <tr>
                    <td style="width:528.7pt; padding-right:5.4pt; padding-left:5.4pt; vertical-align:top">
                        <p style="margin-top:0pt; margin-bottom:0pt; text-align:center; font-size:10pt"><span
                                style="font-family:Cambria; font-weight:bold; text-decoration:underline">SURAT
                                IJIN</span></p>
                    </td>
                </tr>
                <tr>
                    <td style="width:528.7pt; padding-right:5.4pt; padding-left:5.4pt; vertical-align:top">
                        <p style="margin-top:0pt; margin-bottom:0pt; text-align:center; font-size:10pt"><span
                                style="font-family:Cambria; font-weight:bold; text-decoration:underline">PENGAMBILAN
                                UNIT </span><span
                                style="font-family:Cambria; font-weight:bold; text-decoration:underline"><?php echo ' ',$jaminan_data->jam_unit ?></span>
                        </p>
                    </td>
                </tr>
            </tbody>
        </table>
        <p style="margin-top:0pt; margin-bottom:0pt; font-size:10pt"><span style="font-family:Cambria">&nbsp;</span></p>
        <table style="border-collapse:collapse" cellspacing="0" cellpadding="0">
            <tbody>
                <tr>
                    <td colspan="3" style="width:528.7pt; padding-right:5.4pt; padding-left:5.4pt; vertical-align:top">
                        <p style="margin-top:0pt; margin-bottom:0pt; text-align:justify; font-size:10pt"><span
                                style="font-family:Cambria">Saya yang bertandatangan di bawah ini:</span></p>
                    </td>
                </tr>
                <tr>
                    <td style="width:132.95pt; padding-right:5.4pt; padding-left:5.4pt; vertical-align:top">
                        <p style="margin-top:0pt; margin-bottom:0pt; font-size:10pt"><span
                                style="font-family:Cambria">Nama</span></p>
                    </td>
                    <td style="width:7.2pt; padding-right:5.4pt; padding-left:5.4pt; vertical-align:top">
                        <p style="margin-top:0pt; margin-bottom:0pt; font-size:10pt"><span
                                style="font-family:Cambria">:</span></p>
                    </td>
                    <td style="width:366.95pt; padding-right:5.4pt; padding-left:5.4pt; vertical-align:top">
                        <p style="margin-top:0pt; margin-bottom:0pt; font-size:10pt"><span
                                style="font-family:Cambria"><?php echo $ang_nama ?></span>
                        </p>
                    </td>
                </tr>
                <tr>
                    <td style="width:132.95pt; padding-right:5.4pt; padding-left:5.4pt; vertical-align:top">
                        <p style="margin-top:0pt; margin-bottom:0pt; font-size:10pt"><span
                                style="font-family:Cambria">Tempat, Tanggal Lahir</span></p>
                    </td>
                    <td style="width:7.2pt; padding-right:5.4pt; padding-left:5.4pt; vertical-align:top">
                        <p style="margin-top:0pt; margin-bottom:0pt; font-size:10pt"><span
                                style="font-family:Cambria">:</span></p>
                    </td>
                    <td style="width:366.95pt; padding-right:5.4pt; padding-left:5.4pt; vertical-align:top">
                        <p style="margin-top:0pt; margin-bottom:0pt; font-size:10pt"><span
                                style="font-family:Cambria"><?php echo dateFormataja($ang_tgllahir) ?></span>
                        </p>
                    </td>
                </tr>
                <tr>
                    <td style="width:132.95pt; padding-right:5.4pt; padding-left:5.4pt; vertical-align:top">
                        <p style="margin-top:0pt; margin-bottom:0pt; font-size:10pt"><span
                                style="font-family:Cambria">Alamat</span></p>
                    </td>
                    <td style="width:7.2pt; padding-right:5.4pt; padding-left:5.4pt; vertical-align:top">
                        <p style="margin-top:0pt; margin-bottom:0pt; font-size:10pt"><span
                                style="font-family:Cambria">:</span></p>
                    </td>
                    <td style="width:366.95pt; padding-right:5.4pt; padding-left:5.4pt; vertical-align:top">
                        <p style="margin-top:0pt; margin-bottom:0pt; font-size:10pt"><span
                                style="font-family:Cambria"><?php echo $ang_alamat ?></span>
                        </p>
                    </td>
                </tr>
                <tr>
                    <td style="width:132.95pt; padding-right:5.4pt; padding-left:5.4pt; vertical-align:top">
                        <p style="margin-top:0pt; margin-bottom:0pt; font-size:10pt"><span
                                style="font-family:Cambria">Nomor KTP</span></p>
                    </td>
                    <td style="width:7.2pt; padding-right:5.4pt; padding-left:5.4pt; vertical-align:top">
                        <p style="margin-top:0pt; margin-bottom:0pt; font-size:10pt"><span
                                style="font-family:Cambria">:</span></p>
                    </td>
                    <td style="width:366.95pt; padding-right:5.4pt; padding-left:5.4pt; vertical-align:top">
                        <p style="margin-top:0pt; margin-bottom:0pt; font-size:10pt"><span
                                style="font-family:Cambria"><?php echo $ang_noktp ?></span>
                        </p>
                    </td>
                </tr>
                <tr>
                    <td style="width:132.95pt; padding-right:5.4pt; padding-left:5.4pt; vertical-align:top">
                        <p style="margin-top:0pt; margin-bottom:0pt; font-size:10pt"><span
                                style="font-family:Cambria">No. Tlp/HP</span></p>
                    </td>
                    <td style="width:7.2pt; padding-right:5.4pt; padding-left:5.4pt; vertical-align:top">
                        <p style="margin-top:0pt; margin-bottom:0pt; font-size:10pt"><span
                                style="font-family:Cambria">:</span></p>
                    </td>
                    <td style="width:366.95pt; padding-right:5.4pt; padding-left:5.4pt; vertical-align:top">
                        <p style="margin-top:0pt; margin-bottom:0pt; font-size:10pt"><span
                                style="font-family:Cambria"><?php echo $ang_nohp ?></span>
                        </p>
                    </td>
                </tr>
            </tbody>
        </table>
        <p style="margin-top:0pt; margin-bottom:0pt; text-align:justify; font-size:10pt"><span
                style="font-family:Cambria">&nbsp;</span></p>
        <table id="05" style="border-collapse:collapse" cellspacing="0" cellpadding="0">
            <tbody>
                <tr>
                    <td style="width:528.7pt; padding-right:5.4pt; padding-left:5.4pt; vertical-align:top">
                        <p style="margin-top:0pt; margin-bottom:0pt; text-align:justify; font-size:10pt"><span
                                style="font-family:Cambria">Menyatakan bahwa, saya mengijinkan dari pihak KSP SIDO MUKTI
                                MAKMUR untuk mengambil unit </span><span
                                style="font-family:Cambria"><?php echo ' ',$jaminan_data->jam_unit ?> </span><span
                                style="font-family:Cambria"> di sembarang tempat dengan identitas sebagai berikut
                                :</span></p>
                    </td>
                </tr>
            </tbody>
        </table>
        <p style="margin-top:0pt; margin-bottom:0pt; text-align:justify; font-size:10pt"><span
                style="font-family:Cambria">&nbsp;</span></p>
        <table style="border-collapse:collapse" cellspacing="0" cellpadding="0">
            <tbody>
                <tr>
                    <td style="width:133.2pt; padding-right:5.4pt; padding-left:5.4pt; vertical-align:top">
                        <p style="margin-top:0pt; margin-bottom:0pt; text-align:justify; font-size:10pt"><span
                                style="font-family:Cambria">Satu Unit</span></p>
                    </td>
                    <td style="width:7.2pt; padding-right:5.4pt; padding-left:5.4pt; vertical-align:top">
                        <p style="margin-top:0pt; margin-bottom:0pt; text-align:justify; font-size:10pt"><span
                                style="font-family:Cambria">:</span></p>
                    </td>
                    <td style="width:365.85pt; padding-right:5.4pt; padding-left:5.4pt; vertical-align:top">
                        <p style="margin-top:0pt; margin-bottom:0pt; text-align:justify; font-size:10pt"><span
                                style="font-family:Cambria"><?php echo ' ',$jaminan_data->jam_unit ?></span></p>
                    </td>
                </tr>
                <tr>
                    <td style="width:133.2pt; padding-right:5.4pt; padding-left:5.4pt; vertical-align:top">
                        <p style="margin-top:0pt; margin-bottom:0pt; text-align:justify; font-size:10pt"><span
                                style="font-family:Cambria">Nomor Registrasi</span></p>
                    </td>
                    <td style="width:7.2pt; padding-right:5.4pt; padding-left:5.4pt; vertical-align:top">
                        <p style="margin-top:0pt; margin-bottom:0pt; text-align:justify; font-size:10pt"><span
                                style="font-family:Cambria">:</span></p>
                    </td>
                    <td style="width:365.85pt; padding-right:5.4pt; padding-left:5.4pt; vertical-align:top">
                        <p style="margin-top:0pt; margin-bottom:0pt; text-align:justify; font-size:10pt"><span
                                style="font-family:Cambria"><?php echo $jaminan_data->jam_noregistrasi ?></span></p>
                    </td>
                </tr>
                <tr>
                    <td style="width:133.2pt; padding-right:5.4pt; padding-left:5.4pt; vertical-align:top">
                        <p style="margin-top:0pt; margin-bottom:0pt; text-align:justify; font-size:10pt"><span
                                style="font-family:Cambria">Nomor BPKB</span></p>
                    </td>
                    <td style="width:7.2pt; padding-right:5.4pt; padding-left:5.4pt; vertical-align:top">
                        <p style="margin-top:0pt; margin-bottom:0pt; text-align:justify; font-size:10pt"><span
                                style="font-family:Cambria">:</span></p>
                    </td>
                    <td style="width:365.85pt; padding-right:5.4pt; padding-left:5.4pt; vertical-align:top">
                        <p style="margin-top:0pt; margin-bottom:0pt; text-align:justify; font-size:10pt"><span
                                style="font-family:Cambria"><?php echo $jaminan_data->jam_nomor ?></span></p>
                    </td>
                </tr>
                <tr>
                    <td style="width:133.2pt; padding-right:5.4pt; padding-left:5.4pt; vertical-align:top">
                        <p style="margin-top:0pt; margin-bottom:0pt; text-align:justify; font-size:10pt"><span
                                style="font-family:Cambria">Tahun Pembuatan</span></p>
                    </td>
                    <td style="width:7.2pt; padding-right:5.4pt; padding-left:5.4pt; vertical-align:top">
                        <p style="margin-top:0pt; margin-bottom:0pt; text-align:justify; font-size:10pt"><span
                                style="font-family:Cambria">:</span></p>
                    </td>
                    <td style="width:365.85pt; padding-right:5.4pt; padding-left:5.4pt; vertical-align:top">
                        <p style="margin-top:0pt; margin-bottom:0pt; text-align:justify; font-size:10pt"><span
                                style="font-family:Cambria"><?php echo $jaminan_data->jam_tahunpembuatan ?></span></p>
                    </td>
                </tr>
                <tr>
                    <td style="width:133.2pt; padding-right:5.4pt; padding-left:5.4pt; vertical-align:top">
                        <p style="margin-top:0pt; margin-bottom:0pt; text-align:justify; font-size:10pt"><span
                                style="font-family:Cambria">Atas Nama</span></p>
                    </td>
                    <td style="width:7.2pt; padding-right:5.4pt; padding-left:5.4pt; vertical-align:top">
                        <p style="margin-top:0pt; margin-bottom:0pt; text-align:justify; font-size:10pt"><span
                                style="font-family:Cambria">:</span></p>
                    </td>
                    <td style="width:365.85pt; padding-right:5.4pt; padding-left:5.4pt; vertical-align:top">
                        <p style="margin-top:0pt; margin-bottom:0pt; text-align:justify; font-size:10pt"><span
                                style="font-family:Cambria"><?php echo $jaminan_data->jam_atasnama ?></span></p>
                    </td>
                </tr>
                <tr>
                    <td style="width:133.2pt; padding-right:5.4pt; padding-left:5.4pt; vertical-align:top">
                        <p style="margin-top:0pt; margin-bottom:0pt; text-align:justify; font-size:10pt"><span
                                style="font-family:Cambria">Alamat</span></p>
                    </td>
                    <td style="width:7.2pt; padding-right:5.4pt; padding-left:5.4pt; vertical-align:top">
                        <p style="margin-top:0pt; margin-bottom:0pt; text-align:justify; font-size:10pt"><span
                                style="font-family:Cambria">:</span></p>
                    </td>
                    <td style="width:365.85pt; padding-right:5.4pt; padding-left:5.4pt; vertical-align:top">
                        <p style="margin-top:0pt; margin-bottom:0pt; text-align:justify; font-size:10pt"><span
                                style="font-family:Cambria"><?php echo $jaminan_data->jam_alamat ?></span></p>
                    </td>
                </tr>
            </tbody>
        </table> 
        
        <p style="margin-top:0pt; margin-bottom:0pt; text-align:justify; font-size:10pt"><span
                style="font-family:Cambria">&nbsp;</span></p>
        <table id="05" style="border-collapse:collapse" cellspacing="0" cellpadding="0">
            <tbody>
                <tr>
                    <td style="width:528.7pt; padding-right:5.4pt; padding-left:5.4pt; vertical-align:top">
                        <p style="margin-top:0pt; margin-bottom:0pt; text-align:justify; font-size:10pt"><span
                                style="font-family:Cambria">Dikarenakan saya tidak memenuhi kewajiban mengangsur
                                selama 2 (dua) bulan sesuai perjanjian yang telah ada dan saya berikan kuasa sepenuhnya kepada KSP “Sido Mukti
                                Makmur” untuk proses selanjutnya.</span></p>
                    </td>
                </tr>
            </tbody>
        </table>
        <p style="margin-top:0pt; margin-bottom:0pt; text-align:justify; font-size:10pt"><span
                style="font-family:Cambria">&nbsp;</span></p>
        <table id="05" style="border-collapse:collapse" cellspacing="0" cellpadding="0">
            <tbody>
                <tr>
                    <td style="width:528.7pt; padding-right:5.4pt; padding-left:5.4pt; vertical-align:top">
                        <p style="margin-top:0pt; margin-bottom:0pt; text-align:justify; font-size:10pt"><span
                                style="font-family:Cambria">Demikian
                                surat pernyataan ini saya buat tanpa adanya paksaan dari pihak manapun
                                dan dapat digunakan sesuai dengan hukum yang berlaku.</span></p>
                    </td>
                </tr>
            </tbody>
        </table>
        <p style="margin-top:0pt; margin-bottom:0pt; text-align:justify; font-size:10pt"><span
                style="font-family:Cambria">&nbsp;</span></p>
        <table id="03" style="border-collapse:collapse" cellspacing="0" cellpadding="0">
            <tbody>
                <tr>
                    <td style="width:528.7pt; padding-right:5.4pt; padding-left:5.4pt; vertical-align:top">
                        <p style="margin-top:0pt; margin-bottom:0pt; text-align:right; font-size:10pt"><span
                                style="font-family:Cambria">Temanggung,
                                <?php echo hari_ini(),' , ',dateFormataja($this->tgl) ?>.</span></p>
                    </td>
                </tr>
            </tbody>
        </table>
        <p style="margin-top:0pt; margin-bottom:0pt; text-align:justify; font-size:10pt"><span
                style="font-family:Cambria">&nbsp;</span></p>
        <table id="04" style="border-collapse:collapse" cellspacing="0" cellpadding="0">
            <tbody>
                <tr>
                    <td style="width:258.95pt; padding-right:5.4pt; padding-left:5.4pt; vertical-align:top">
                        <p style="margin-top:0pt; margin-bottom:0pt; text-align:center; font-size:10pt"><span
                                style="font-family:Cambria">Saksi</span></p>
                    </td>
                    <td style="width:258.95pt; padding-right:5.4pt; padding-left:5.4pt; vertical-align:top">
                        <p style="margin-top:0pt; margin-bottom:0pt; text-align:center; font-size:10pt"><span
                                style="font-family:Cambria">Yang Menyatakan</span></p>
                    </td>
                </tr>
                <tr>
                    <td style="width:258.95pt; padding-right:5.4pt; padding-left:5.4pt; vertical-align:top">
                        <p style="margin-top:0pt; margin-bottom:0pt; text-align:justify; font-size:10pt"><span
                                style="font-family:Cambria">&nbsp;</span></p>
                        <p style="margin-top:0pt; margin-bottom:0pt; text-align:justify; font-size:10pt"><span
                                style="font-family:Cambria">&nbsp;</span></p>
                        <p style="margin-top:0pt; margin-bottom:0pt; text-align:justify; font-size:10pt"><span
                                style="font-family:Cambria">&nbsp;</span></p>
                        <p style="margin-top:0pt; margin-bottom:0pt; text-align:justify; font-size:10pt"><span
                                style="font-family:Cambria">&nbsp;</span></p>
                        <p style="margin-top:0pt; margin-bottom:0pt; text-align:justify; font-size:10pt"><span
                                style="font-family:Cambria">&nbsp;</span></p>
                        <p style="margin-top:0pt; margin-bottom:0pt; text-align:justify; font-size:10pt"><span
                                style="font-family:Cambria">&nbsp;</span></p>
                    </td>
                    <td style="width:258.95pt; padding-right:5.4pt; padding-left:5.4pt; vertical-align:top">
                        <p style="margin-top:0pt; margin-bottom:0pt; text-align:justify; font-size:10pt"><span
                                style="font-family:Cambria">&nbsp;</span></p>
                        <p style="margin-top:0pt; margin-bottom:0pt; text-align:justify; font-size:10pt"><span
                                style="font-family:Cambria">&nbsp;</span></p>
                        <p style="margin-top:0pt; margin-bottom:0pt; text-align:justify; font-size:10pt"><span
                                style="font-family:Cambria">&nbsp;</span></p>
                        <p style="margin-top:0pt; margin-bottom:0pt; text-align:justify; font-size:10pt"><span
                                style="font-family:Cambria">&nbsp;</span></p>
                        <p style="margin-top:0pt; margin-bottom:0pt; text-align:justify; font-size:10pt"><span
                                style="font-family:Cambria">&nbsp;</span></p>
                        <p style="margin-top:0pt; margin-bottom:0pt; text-align:justify; font-size:10pt"><span
                                style="font-family:Cambria">&nbsp;</span></p>
                        <p style="margin-top:0pt; margin-bottom:0pt; text-align:justify; font-size:10pt"><span
                                style="font-family:Cambria">&nbsp;</span></p>
                        <p style="margin-top:0pt; margin-bottom:0pt; text-align:justify; font-size:10pt"><span
                                style="font-family:Cambria">&nbsp;</span></p>
                    </td>
                </tr>
                <tr>
                    <td style="width:258.95pt; padding-right:5.4pt; padding-left:5.4pt; vertical-align:top">
                        <p style="margin-top:0pt; margin-bottom:0pt; text-align:center; font-size:10pt"><span
                                style="font-family:Cambria; font-weight:bold">(</span><span
                                style="font-family:Cambria; font-weight:bold">........................................</span><span
                                style="font-family:Cambria; font-weight:bold">)</span></p>
                    </td>
                    <td style="width:258.95pt; padding-right:5.4pt; padding-left:5.4pt; vertical-align:top">
                        <p style="margin-top:0pt; margin-bottom:0pt; text-align:center; font-size:10pt"><span
                                style="font-family:Cambria; font-weight:bold">(</span><span
                                style="font-family:Cambria; font-weight:bold"><?php echo $ang_nama ?></span><span
                                style="font-family:Cambria; font-weight:bold">)</span></p>
                    </td>
                </tr>
            </tbody>
        </table>
        <p style="margin-top:0pt; margin-bottom:0pt; text-align:justify; font-size:10pt"><span
                style="font-family:Cambria">&nbsp;</span></p>
        <p style="margin-top:0pt; margin-bottom:0pt; font-size:11pt"><span style="font-family:Calibri">&nbsp;</span></p>
        <p style="margin-top:0pt; margin-bottom:0pt; font-size:11pt"><span style="font-family:Calibri">&nbsp;</span></p>
        <p style="margin-top:0pt; margin-bottom:0pt; font-size:11pt"><span style="font-family:Calibri">&nbsp;</span></p>
        <p style="margin-top:0pt; margin-bottom:0pt; font-size:11pt"><span style="font-family:Calibri">&nbsp;</span></p>
        <p style="margin-top:0pt; margin-bottom:0pt; font-size:11pt"><span style="font-family:Calibri">&nbsp;</span></p>
        <p style="margin-top:0pt; margin-bottom:0pt; font-size:11pt"><span style="font-family:Calibri">&nbsp;</span></p>
        <p style="margin-top:0pt; margin-bottom:0pt; font-size:11pt"><span style="font-family:Calibri">&nbsp;</span></p>
        <p style="margin-top:0pt; margin-bottom:0pt; font-size:11pt"><span style="font-family:Calibri">&nbsp;</span></p>
        <p style="margin-top:0pt; margin-bottom:0pt; font-size:11pt"><span style="font-family:Calibri">&nbsp;</span></p>
        <p style="margin-top:0pt; margin-bottom:0pt; font-size:11pt"><span style="font-family:Calibri">&nbsp;</span></p>
        <p style="margin-top:0pt; margin-bottom:0pt; font-size:11pt"><span style="font-family:Calibri">&nbsp;</span></p>
        <p style="margin-top:0pt; margin-bottom:0pt; font-size:11pt"><span style="font-family:Calibri">&nbsp;</span></p>
        <p style="margin-top:0pt; margin-bottom:0pt; font-size:11pt"><span style="font-family:Calibri">&nbsp;</span></p>
        <p style="margin-top:0pt; margin-bottom:0pt; font-size:11pt"><span style="font-family:Calibri">&nbsp;</span></p>
        <p style="margin-top:0pt; margin-bottom:0pt; font-size:11pt"><span style="font-family:Calibri">&nbsp;</span></p>
        <p style="margin-top:0pt; margin-bottom:0pt; font-size:11pt"><span style="font-family:Calibri">&nbsp;</span></p>
        <p style="margin-top:0pt; margin-bottom:0pt; font-size:11pt"><span style="font-family:Calibri">&nbsp;</span></p>
    </div>

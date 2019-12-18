<style>
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
</style>
<?php 
        $angsuranbunga=$pin_pinjaman*$bup_id/100;
        $provisi=$pin_pinjaman*$pop_id/100;
        $pinjamanditerima=$pin_pinjaman-$provisi;
        $angsuran=($pin_pinjaman/$sea_id)+$angsuranbunga;
        $angsuranpokok=$pin_pinjaman/$sea_id;
        ?>
<?php include('header1.php');?>
    <div>
        <table id="01" style="border-collapse:collapse" cellspacing="0" cellpadding="0">
            <tbody>
                <tr>
                    <td style="width:482.4pt; padding-right:5.4pt; padding-left:5.4pt; vertical-align:top">
                        <p style="margin-top:0pt; margin-bottom:0pt; text-align:center; font-size:10pt"><span
                                style="font-family:Cambria; font-weight:bold">SURAT PERNYATAAN PENGAKUAN HUTANG</span>
                        </p>
                    </td>
                </tr>
                <tr>
                    <td style="width:482.4pt; padding-right:5.4pt; padding-left:5.4pt; vertical-align:top">
                        <p style="margin-top:0pt; margin-bottom:0pt; text-align:center; font-size:10pt"><span
                                style="font-family:Cambria; font-weight:bold text-decoration:underline">NO. </span><span
                                style="font-family:Cambria; font-weight:bold text-decoration:underline">SPK :</span><span
                                style="font-family:Cambria; font-weight:bold text-decoration:underline"><?php echo $pin_id ?></span><span
                                style="font-family:Cambria; font-weight:bold text-decoration:underline">/SHGB/SMM.K/</span><span
                                style="font-family:Cambria; font-weight:bold text-decoration:underline"><?php
                                $array_bln = array(1=>"I","II","III", "IV", "V","VI","VII","VIII","IX","X", "XI","XII");
                                $bln = $array_bln[date('n')];
                                echo $bln;
                                ?></span><span
                                style="font-family:Cambria; font-weight:bold text-decoration:underline">/</span><span
                                style="font-family:Cambria; font-weight:bold text-decoration:underline"><?php echo date('Y'); ?></span></p>
                    </td>
                </tr>
            </tbody>
        </table>
        <p style="margin-top:0pt; margin-bottom:0pt; font-size:10pt"><span
                style="font-family:Cambria; font-weight:bold">&nbsp;</span></p>
        <table style="border-collapse:collapse" cellspacing="0" cellpadding="0">
            <tbody>
                <tr>
                    <td style="width:482.4pt; padding-right:5.4pt; padding-left:5.4pt; vertical-align:top">
                        <p style="margin-top:0pt; margin-bottom:0pt; text-align:justify; font-size:10pt"><span
                                style="font-family:Cambria">Pada</span><span style="font-family:Cambria"> </span><span
                                style="font-family:Cambria">hari</span><span style="font-family:Cambria"> </span><span
                                style="font-family:Cambria">ini</span><span style="font-family:Cambria">, </span><span
                                style="font-family:Cambria"><?php echo hari_ini(),' , ',dateFormataja($this->tgl) ?></span><span
                                style="font-family:Cambria"> </span><span style="font-family:Cambria">, kami yang
                            </span><span style="font-family:Cambria">bertanda</span><span style="font-family:Cambria">
                            </span><span style="font-family:Cambria">tangan</span><span style="font-family:Cambria">
                            </span><span style="font-family:Cambria">dibawah</span><span style="font-family:Cambria">
                            </span><span style="font-family:Cambria">ini</span><span style="font-family:Cambria">
                                :</span></p>
                    </td>
                </tr>
            </tbody>
        </table>
        <p style="margin-top:0pt; margin-bottom:0pt; font-size:3pt"><span style="font-family:Cambria">&nbsp;</span></p>
        <table style="border-collapse:collapse" cellspacing="0" cellpadding="0">
            <tbody>
                <tr>
                    <td style="width:149.75pt; padding-right:5.4pt; padding-left:5.4pt; vertical-align:top">
                        <p style="margin-top:0pt; margin-bottom:0pt; font-size:10pt"><span
                                style="font-family:Cambria">Nama</span></p>
                    </td>
                    <td style="width:3.9pt; padding-right:5.4pt; padding-left:5.4pt; vertical-align:top">
                        <p style="margin-top:0pt; margin-bottom:0pt; font-size:10pt"><span
                                style="font-family:Cambria">: </span></p>
                    </td>
                    <td style="width:295.85pt; padding-right:5.4pt; padding-left:5.4pt; vertical-align:top">
                        <p style="margin-top:0pt; margin-bottom:0pt; font-size:10pt"><span
                                style="font-family:Cambria"><?php echo $ang_nama ?></span></p>
                    </td>
                </tr>
                <tr>
                    <td style="width:149.75pt; padding-right:5.4pt; padding-left:5.4pt; vertical-align:top">
                        <p style="margin-top:0pt; margin-bottom:0pt; font-size:10pt"><span
                                style="font-family:Cambria">Tempat, Tanggal Lahir</span></p>
                    </td>
                    <td style="width:3.9pt; padding-right:5.4pt; padding-left:5.4pt; vertical-align:top">
                        <p style="margin-top:0pt; margin-bottom:0pt; font-size:10pt"><span
                                style="font-family:Cambria">: </span></p>
                    </td>
                    <td style="width:295.85pt; padding-right:5.4pt; padding-left:5.4pt; vertical-align:top">
                        <p style="margin-top:0pt; margin-bottom:0pt; font-size:10pt"><span
                                style="font-family:Cambria"><?php echo $ang_tempatlahir,', ',dateFormataja($ang_tgllahir) ?></span></p>
                    </td>
                </tr>
                <tr>
                    <td style="width:149.75pt; padding-right:5.4pt; padding-left:5.4pt; vertical-align:top">
                        <p style="margin-top:0pt; margin-bottom:0pt; font-size:10pt"><span
                                style="font-family:Cambria">Alamat</span></p>
                    </td>
                    <td style="width:3.9pt; padding-right:5.4pt; padding-left:5.4pt; vertical-align:top">
                        <p style="margin-top:0pt; margin-bottom:0pt; font-size:10pt"><span
                                style="font-family:Cambria">:</span></p>
                    </td>
                    <td style="width:295.85pt; padding-right:5.4pt; padding-left:5.4pt; vertical-align:top">
                        <p style="margin-top:0pt; margin-bottom:0pt; font-size:10pt"><span
                                style="font-family:Cambria"><?php echo $ang_alamat ?></span></p>
                    </td>
                </tr>
                <tr>
                    <td style="width:149.75pt; padding-right:5.4pt; padding-left:5.4pt; vertical-align:top">
                        <p style="margin-top:0pt; margin-bottom:0pt; font-size:10pt"><span
                                style="font-family:Cambria">Nomor KTP</span></p>
                    </td>
                    <td style="width:3.9pt; padding-right:5.4pt; padding-left:5.4pt; vertical-align:top">
                        <p style="margin-top:0pt; margin-bottom:0pt; font-size:10pt"><span
                                style="font-family:Cambria">: </span></p>
                    </td>
                    <td style="width:295.85pt; padding-right:5.4pt; padding-left:5.4pt; vertical-align:top">
                        <p style="margin-top:0pt; margin-bottom:0pt; font-size:10pt"><span
                                style="font-family:Cambria"><?php echo $ang_noktp ?></span></p>
                    </td>
                </tr>
                <tr>
                    <td style="width:149.75pt; padding-right:5.4pt; padding-left:5.4pt; vertical-align:top">
                        <p style="margin-top:0pt; margin-bottom:0pt; font-size:10pt"><span
                                style="font-family:Cambria">No. Tlp/HP</span></p>
                    </td>
                    <td style="width:3.9pt; padding-right:5.4pt; padding-left:5.4pt; vertical-align:top">
                        <p style="margin-top:0pt; margin-bottom:0pt; font-size:10pt"><span
                                style="font-family:Cambria">: </span></p>
                    </td>
                    <td style="width:295.85pt; padding-right:5.4pt; padding-left:5.4pt; vertical-align:top">
                        <p style="margin-top:0pt; margin-bottom:0pt; font-size:10pt"><span
                                style="font-family:Cambria"><?php echo $ang_nohp ?></span></p>
                    </td>
                </tr>
            </tbody>
        </table>   
        <table id="02" style="border-collapse:collapse" cellspacing="0" cellpadding="0">
            <tbody>
                <tr>
                    <td style="width:500pt; padding-right:5.4pt; padding-left:5.4pt; vertical-align:top">
                        <p style="margin-top:0pt; margin-bottom:0pt; text-align:justify; font-size:10pt"><span
                                style="font-family:Cambria">Saya</span><span style="font-family:Cambria"> </span><span
                                style="font-family:Cambria">selaku</span><span style="font-family:Cambria"> </span><span
                                style="font-family:Cambria">anggota</span><span style="font-family:Cambria"> KSP ”SIDO
                                MUKTI MAKMUR” yang </span><span style="font-family:Cambria">beralamat</span><span
                                style="font-family:Cambria"> di Jl. Raya </span><span
                                style="font-family:Cambria">Kedu</span><span style="font-family:Cambria"> – </span><span
                                style="font-family:Cambria">Jumo</span><span style="font-family:Cambria"> Km 6.5
                                (</span><span style="font-family:Cambria">Sroyo</span><span style="font-family:Cambria">
                                – </span><span style="font-family:Cambria">Kedu</span><span
                                style="font-family:Cambria">) </span><span style="font-family:Cambria">Kedu</span><span
                                style="font-family:Cambria">, </span><span
                                style="font-family:Cambria">Temanggung</span><span style="font-family:Cambria">,
                            </span><span style="font-family:Cambria">dengan</span><span style="font-family:Cambria">
                            </span><span style="font-family:Cambria">ini</span><span style="font-family:Cambria">
                            </span><span style="font-family:Cambria">membuat</span><span style="font-family:Cambria">
                            </span><span style="font-family:Cambria">pernyataan</span><span style="font-family:Cambria">
                            </span><span style="font-family:Cambria">sebagai</span><span style="font-family:Cambria">
                            </span><span style="font-family:Cambria">berikut</span><span style="font-family:Cambria">
                                :</span></p>
                    </td>
                </tr>
                <tr>
                    <td style="width:500pt; padding-right:5.4pt; padding-left:5.4pt; vertical-align:top">
                        <p style="margin-top:0pt; margin-bottom:0pt; text-align:justify; font-size:10pt"><span
                                style="font-family:Cambria">Pasal</span><span style="font-family:Cambria"> 1
                            </span><span style="font-family:Cambria">:</span><span
                                style="font-family:Cambria">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </span><span
                                style="font-family:Cambria">Saya</span><span style="font-family:Cambria"> </span><span
                                style="font-family:Cambria">menyatakan</span><span style="font-family:Cambria">
                            </span><span style="font-family:Cambria">mengikat</span><span style="font-family:Cambria">
                            </span><span style="font-family:Cambria">diri</span><span style="font-family:Cambria">
                            </span><span style="font-family:Cambria">dan</span><span style="font-family:Cambria">
                            </span><span style="font-family:Cambria">berjanji</span><span style="font-family:Cambria">
                            </span><span style="font-family:Cambria">membayar</span><span style="font-family:Cambria">
                            </span><span style="font-family:Cambria">lunas</span><span style="font-family:Cambria">
                            </span><span style="font-family:Cambria">atau</span><span style="font-family:Cambria">
                            </span><span style="font-family:Cambria">kredit</span><span style="font-family:Cambria">
                                yang </span><span style="font-family:Cambria">diterima</span><span
                                style="font-family:Cambria"> </span><span style="font-family:Cambria">berupa</span><span
                                style="font-family:Cambria"> </span><span style="font-family:Cambria">uang</span><span
                                style="font-family:Cambria"> </span><span
                                style="font-family:Cambria">sebesar</span><span style="font-family:Cambria"> :</span>
                        </p>
                    </td>
                </tr>
            </tbody>
        </table>
         <table style="margin-left:44.75pt; border-collapse:collapse" cellspacing="0" cellpadding="0">
            <tbody>
                <tr>
                    <td style="width:117.5pt; padding-right:5.4pt; padding-left:5.4pt; vertical-align:top">
                        <p style="margin-top:0pt; margin-bottom:0pt; font-size:10pt"><span
                                style="font-family:Cambria">Pinjaman</span></p>
                    </td>
                    <td style="width:7.2pt; padding-right:5.4pt; padding-left:5.4pt; vertical-align:top">
                        <p style="margin-top:0pt; margin-bottom:0pt; font-size:10pt"><span
                                style="font-family:Cambria">:</span></p>
                    </td>
                    <td style="width:279.4pt; padding-right:5.4pt; padding-left:5.4pt; vertical-align:top">
                        <p style="margin-top:0pt; margin-bottom:0pt; font-size:10pt"><span
                                style="font-family:Cambria"><?php echo rupiah($pin_pinjaman) ?></span></p>
                    </td>
                </tr>
                <tr>
                    <td style="width:117.5pt; padding-right:5.4pt; padding-left:5.4pt; vertical-align:top">
                        <p style="margin-top:0pt; margin-bottom:0pt; font-size:10pt"><span
                                style="font-family:Cambria">Pokok</span></p>
                    </td>
                    <td style="width:7.2pt; padding-right:5.4pt; padding-left:5.4pt; vertical-align:top">
                        <p style="margin-top:0pt; margin-bottom:0pt; font-size:10pt"><span
                                style="font-family:Cambria">:</span></p>
                    </td>
                    <td style="width:279.4pt; padding-right:5.4pt; padding-left:5.4pt; vertical-align:top">
                        <p style="margin-top:0pt; margin-bottom:0pt; font-size:10pt"><span
                                style="font-family:Cambria"><?php echo rupiah($angsuranpokok) ?></span></p>
                    </td>
                </tr>
                <tr>
                    <td style="width:117.5pt; padding-right:5.4pt; padding-left:5.4pt; vertical-align:top">
                        <p style="margin-top:0pt; margin-bottom:0pt; font-size:10pt"><span
                                style="font-family:Cambria">Bunga</span></p>
                    </td>
                    <td style="width:7.2pt; padding-right:5.4pt; padding-left:5.4pt; vertical-align:top">
                        <p style="margin-top:0pt; margin-bottom:0pt; font-size:10pt"><span
                                style="font-family:Cambria">:</span></p>
                    </td>
                    <td style="width:279.4pt; padding-right:5.4pt; padding-left:5.4pt; vertical-align:top">
                        <p style="margin-top:0pt; margin-bottom:0pt; font-size:10pt"><span
                                style="font-family:Cambria"><?php echo rupiah($angsuranbunga) ?></span></p>
                    </td>
                </tr>
                <tr>
                    <td style="width:117.5pt; padding-right:5.4pt; padding-left:5.4pt; vertical-align:top">
                        <p style="margin-top:0pt; margin-bottom:0pt; font-size:10pt"><span
                                style="font-family:Cambria">Angsuran</span></p>
                    </td>
                    <td style="width:7.2pt; padding-right:5.4pt; padding-left:5.4pt; vertical-align:top">
                        <p style="margin-top:0pt; margin-bottom:0pt; font-size:10pt"><span
                                style="font-family:Cambria">:</span></p>
                    </td>
                    <td style="width:279.4pt; padding-right:5.4pt; padding-left:5.4pt; vertical-align:top">
                        <p style="margin-top:0pt; margin-bottom:0pt; font-size:10pt"><span
                                style="font-family:Cambria"><?php echo rupiah($angsuran) ?></span><span style="font-family:Cambria">
                            </span><span style="font-family:Cambria">x </span><span
                                style="font-family:Cambria"><?php echo $sea_id ?></span><span style="font-family:Cambria">
                            </span><span style="font-family:Cambria">Bulan</span></p>
                    </td>
                </tr>
                <tr>
                    <td style="width:200.5pt; padding-right:5.4pt; padding-left:5.4pt; vertical-align:top">
                        <p style="margin-top:0pt; margin-bottom:0pt; font-size:10pt"><span
                                style="font-family:Cambria">Jatuh</span><span
                                style="font-family:Cambria"> Tempo </span><span
                                style="font-family:Cambria">Pembayaran</span></p>
                    </td>
                    <td style="width:7.2pt; padding-right:5.4pt; padding-left:5.4pt; vertical-align:top">
                        <p style="margin-top:0pt; margin-bottom:0pt; font-size:10pt"><span
                                style="font-family:Cambria">:</span></p>
                    </td>
                    <td style="width:279.4pt; padding-right:5.4pt; padding-left:5.4pt; vertical-align:top">
                        <p style="margin-top:0pt; margin-bottom:0pt; font-size:10pt"><span
                                style="font-family:Cambria"><?php echo dateFormatTanggal($pin_tglpencairan) ?></span><span style="font-family:Cambria">
                            </span><span style="font-family:Cambria">Tiap</span><span style="font-family:Cambria">
                            </span><span style="font-family:Cambria">Bulan</span></p>
                    </td>
                </tr>
                <tr>
                    <td style="width:200.5pt; padding-right:5.4pt; padding-left:5.4pt; vertical-align:top">
                        <p style="margin-top:0pt; margin-bottom:0pt; font-size:10pt"><span
                                style="font-family:Cambria">Waktu</span><span style="font-family:Cambria"> </span><span
                                style="font-family:Cambria">Pelunasan</span></p>
                    </td>
                    <td style="width:7.2pt; padding-right:5.4pt; padding-left:5.4pt; vertical-align:top">
                        <p style="margin-top:0pt; margin-bottom:0pt; font-size:10pt"><span
                                style="font-family:Cambria">:</span></p>
                    </td>
                    <td style="width:279.4pt; padding-right:5.4pt; padding-left:5.4pt; vertical-align:top">
                        <p style="margin-top:0pt; margin-bottom:0pt; font-size:10pt"><span
                                style="font-family:Cambria"><?php echo dateFormataja($tgl_pelunasan) ?></span></p>
                    </td>
                </tr>
                <tr>
                    <td style="width:117.5pt; padding-right:5.4pt; padding-left:5.4pt; vertical-align:top">
                        <p style="margin-top:0pt; margin-bottom:0pt; font-size:10pt"><span
                                style="font-family:Cambria">Denda</span></p>
                    </td>
                    <td style="width:7.2pt; padding-right:5.4pt; padding-left:5.4pt; vertical-align:top">
                        <p style="margin-top:0pt; margin-bottom:0pt; font-size:10pt"><span
                                style="font-family:Cambria">:</span></p>
                    </td>
                    <td style="width:279.4pt; padding-right:5.4pt; padding-left:5.4pt; vertical-align:top">
                        <p style="margin-top:0pt; margin-bottom:0pt; font-size:10pt"><span
                                style="font-family:Cambria">0.5% per </span><span
                                style="font-family:Cambria">hari</span><span style="font-family:Cambria"> </span><span
                                style="font-family:Cambria">dari</span><span style="font-family:Cambria"> </span><span
                                style="font-family:Cambria">sisa</span><span style="font-family:Cambria"> </span><span
                                style="font-family:Cambria">angsuran</span></p>
                    </td>
                </tr>
            </tbody>
        </table>
        <table id="02" style="border-collapse:collapse" cellspacing="0" cellpadding="0">
            <tbody>
                <tr>
                    <td style="width:50pt; padding-right:5.4pt; padding-left:5.4pt; vertical-align:top">
                        <p style="margin-top:0pt; margin-bottom:0pt; text-align:justify; font-size:10pt"><span
                                style="font-family:Cambria">Pasal 2 :</span>
                        </p>
                    </td>
                    <td colspan="3" style="width:450.5pt; padding-right:5.4pt; padding-left:5.4pt; vertical-align:top">
                        <p style="margin-top:0pt; margin-bottom:0pt; text-align:justify; font-size:10pt"><span
                                style="font-family:Cambria">Atas</span><span style="font-family:Cambria"> </span><span
                                style="font-family:Cambria">pinjaman</span><span style="font-family:Cambria">
                            </span><span style="font-family:Cambria">tersebut</span><span style="font-family:Cambria">
                            </span><span style="font-family:Cambria">diatas</span><span style="font-family:Cambria">
                            </span><span style="font-family:Cambria">saya</span><span style="font-family:Cambria">
                            </span><span style="font-family:Cambria">menjaminkan</span><span
                                style="font-family:Cambria"> </span><span style="font-family:Cambria">berupa</span><span
                                style="font-family:Cambria"> :</span></p>
                    </td>
                </tr>
                <tr>
                    <td style="width:38.45pt; padding-right:5.4pt; padding-left:5.4pt; vertical-align:top">
                        <p style="margin-top:0pt; margin-bottom:0pt; text-align:justify; font-size:10pt"><span
                                style="font-family:Cambria">&nbsp;</span></p>
                    </td>
                    <td style="width:115.2pt; padding-right:5.4pt; padding-left:5.4pt; vertical-align:top">
                        <p style="margin-top:0pt; margin-bottom:0pt; text-align:justify; font-size:10pt"><span
                                style="font-family:Cambria">SHGB</span><span style="font-family:Cambria">
                            </span><span style="font-family:Cambria">atas</span><span style="font-family:Cambria">
                            </span><span style="font-family:Cambria">Nama</span></p>
                    </td>
                    <td style="width:7.2pt; padding-right:5.4pt; padding-left:5.4pt; vertical-align:top">
                        <p style="margin-top:0pt; margin-bottom:0pt; text-align:justify; font-size:10pt"><span
                                style="font-family:Cambria">:</span></p>
                    </td>
                    <td style="width:277.2pt; padding-right:5.4pt; padding-left:5.4pt; vertical-align:top">
                        <p style="margin-top:0pt; margin-bottom:0pt; text-align:justify; font-size:10pt"><span
                                style="font-family:Cambria"><?php echo $jaminan_data->jam_atasnama ?></span></p>
                    </td>
                </tr>
                <tr>
                    <td style="width:38.45pt; padding-right:5.4pt; padding-left:5.4pt; vertical-align:top">
                        <p style="margin-top:0pt; margin-bottom:0pt; text-align:justify; font-size:10pt"><span
                                style="font-family:Cambria">&nbsp;</span></p>
                    </td>
                    <td style="width:115.2pt; padding-right:5.4pt; padding-left:5.4pt; vertical-align:top">
                        <p style="margin-top:0pt; margin-bottom:0pt; text-align:justify; font-size:10pt"><span
                                style="font-family:Cambria">Nomor</span><span style="font-family:Cambria"> </span><span
                                style="font-family:Cambria">Hak</span><span style="font-family:Cambria"> </span><span
                                style="font-family:Cambria">Milik</span></p>
                    </td>
                    <td style="width:7.2pt; padding-right:5.4pt; padding-left:5.4pt; vertical-align:top">
                        <p style="margin-top:0pt; margin-bottom:0pt; text-align:justify; font-size:10pt"><span
                                style="font-family:Cambria">:</span></p>
                    </td>
                    <td style="width:277.2pt; padding-right:5.4pt; padding-left:5.4pt; vertical-align:top">
                        <p style="margin-top:0pt; margin-bottom:0pt; text-align:justify; font-size:10pt"><span
                                style="font-family:Cambria"><?php echo $jaminan_data->jam_nomor ?></span></p>
                    </td>
                </tr>
                <tr>
                    <td style="width:38.45pt; padding-right:5.4pt; padding-left:5.4pt; vertical-align:top">
                        <p style="margin-top:0pt; margin-bottom:0pt; text-align:justify; font-size:10pt"><span
                                style="font-family:Cambria">&nbsp;</span></p>
                    </td>
                    <td style="width:115.2pt; padding-right:5.4pt; padding-left:5.4pt; vertical-align:top">
                        <p style="margin-top:0pt; margin-bottom:0pt; text-align:justify; font-size:10pt"><span
                                style="font-family:Cambria">Luas</span></p>
                    </td>
                    <td style="width:7.2pt; padding-right:5.4pt; padding-left:5.4pt; vertical-align:top">
                        <p style="margin-top:0pt; margin-bottom:0pt; text-align:justify; font-size:10pt"><span
                                style="font-family:Cambria">:</span></p>
                    </td>
                    <td style="width:277.2pt; padding-right:5.4pt; padding-left:5.4pt; vertical-align:top">
                        <p style="margin-top:0pt; margin-bottom:0pt; text-align:justify; font-size:10pt"><span
                                style="font-family:Cambria"><?php echo $jaminan_data->jam_luas ?></span><span
                                style="font-family:Cambria"> M2</span></p>
                    </td>
                </tr>
                <tr>
                <td style="width:50pt; padding-right:5.4pt; padding-left:5.4pt; vertical-align:top">
                        <p style="margin-top:0pt; margin-bottom:0pt; text-align:justify; font-size:10pt"><span
                                style="font-family:Cambria">Pasal</span><span style="font-family:Cambria"> 3 :</span>
                        </p>
                    </td>
                    <td colspan="3" style="width:450.5pt; padding-right:5.4pt; padding-left:5.4pt; vertical-align:top">
                        <p style="margin-top:0pt; margin-bottom:0pt; text-align:justify; font-size:10pt"><span
                                style="font-family:Cambria">Pinjaman</span><span style="font-family:Cambria">
                            </span><span style="font-family:Cambria">tersebut</span><span style="font-family:Cambria">
                            </span><span style="font-family:Cambria">harus</span><span style="font-family:Cambria">
                            </span><span style="font-family:Cambria">dibayarkan</span><span style="font-family:Cambria">
                            </span><span style="font-family:Cambria">kembali</span><span style="font-family:Cambria">
                            </span><span style="font-family:Cambria">oleh</span><span style="font-family:Cambria"> YANG
                                BERHUTANG </span><span style="font-family:Cambria">terhitung</span><span
                                style="font-family:Cambria"> </span><span style="font-family:Cambria">sejak</span><span
                                style="font-family:Cambria"> </span><span
                                style="font-family:Cambria">ditanda</span><span style="font-family:Cambria">
                            </span><span style="font-family:Cambria">tanganinya</span><span style="font-family:Cambria">
                            </span><span style="font-family:Cambria">surat</span><span style="font-family:Cambria">
                            </span><span style="font-family:Cambria">pernyataan</span><span style="font-family:Cambria">
                            </span><span style="font-family:Cambria">ini</span><span style="font-family:Cambria">.
                            </span><span style="font-family:Cambria">Oleh</span><span style="font-family:Cambria">
                            </span><span style="font-family:Cambria">karenanya</span><span style="font-family:Cambria">
                            </span><span style="font-family:Cambria">harus</span><span style="font-family:Cambria">
                            </span><span style="font-family:Cambria">sudah</span><span style="font-family:Cambria">
                            </span><span style="font-family:Cambria">dibayar</span><span style="font-family:Cambria">
                            </span><span style="font-family:Cambria">lunas</span><span style="font-family:Cambria">
                            </span><span style="font-family:Cambria">seluruhnya</span><span style="font-family:Cambria">
                            </span><span style="font-family:Cambria">selambat</span><span style="font-family:Cambria"> –
                            </span><span style="font-family:Cambria">lambatnya</span><span style="font-family:Cambria">
                            </span><span style="font-family:Cambria">pada</span><span style="font-family:Cambria">
                            </span><span style="font-family:Cambria">waktu</span><span style="font-family:Cambria">
                            </span><span style="font-family:Cambria">pelunasam</span><span style="font-family:Cambria">
                            </span><span style="font-family:Cambria">tanggal</span><span
                                style="font-family:Cambria">.</span></p>
                    </td>
                </tr>
                <tr>
                    <td style="width:38.45pt; padding-right:5.4pt; padding-left:5.4pt; vertical-align:top">
                        <p style="margin-top:0pt; margin-bottom:0pt; text-align:justify; font-size:10pt"><span
                                style="font-family:Cambria">Pasal</span><span style="font-family:Cambria"> 4</span><span
                                style="font-family:Cambria"> </span><span style="font-family:Cambria">:</span></p>
                    </td>
                    <td colspan="3" style="width:450.5pt; padding-right:5.4pt; padding-left:5.4pt; vertical-align:top">
                        <p
                            style="margin-top:0pt; margin-left:40.5pt; margin-bottom:0pt; text-indent:-40.5pt; text-align:justify; font-size:10pt">
                            <span style="font-family:Cambria">Segala</span><span style="font-family:Cambria">
                            </span><span style="font-family:Cambria">pembayaran</span><span style="font-family:Cambria">
                            </span><span style="font-family:Cambria">harus</span><span style="font-family:Cambria">
                            </span><span style="font-family:Cambria">dengan</span><span style="font-family:Cambria">
                            </span><span style="font-family:Cambria">kwitansi</span><span style="font-family:Cambria">
                            </span><span style="font-family:Cambria">pembayaran</span><span style="font-family:Cambria">
                                yang </span><span style="font-family:Cambria">resmi</span><span
                                style="font-family:Cambria"> </span><span style="font-family:Cambria">atau</span><span
                                style="font-family:Cambria"> yang </span><span
                                style="font-family:Cambria">sah</span><span style="font-family:Cambria">.</span></p>
                    </td>
                </tr>
                <tr>
                    <td style="width:50pt; padding-right:5.4pt; padding-left:5.4pt; vertical-align:top">
                        <p style="margin-top:0pt; margin-bottom:0pt; text-align:justify; font-size:10pt"><span
                                style="font-family:Cambria">Pasal</span><span style="font-family:Cambria"> 5 :</span>
                        </p>
                    </td>
                    <td colspan="3" style="width:450.5pt; padding-right:5.4pt; padding-left:5.4pt; vertical-align:top">
                        <p style="margin-top:0pt; margin-bottom:0pt; text-align:justify; font-size:10pt"><span
                                style="font-family:Cambria">Apabila</span><span style="font-family:Cambria"> YANG
                                BERHUTANG </span><span style="font-family:Cambria">melunasi</span><span
                                style="font-family:Cambria"> </span><span
                                style="font-family:Cambria">pinjaman</span><span style="font-family:Cambria">
                            </span><span style="font-family:Cambria">sebelum</span><span style="font-family:Cambria">
                            </span><span style="font-family:Cambria">berakhirnya</span><span
                                style="font-family:Cambria"> </span><span style="font-family:Cambria">jangka</span><span
                                style="font-family:Cambria"> </span><span style="font-family:Cambria">waktu</span><span
                                style="font-family:Cambria"> </span><span
                                style="font-family:Cambria">pelunasan</span><span style="font-family:Cambria"> (
                            </span><span style="font-family:Cambria">pelunasan</span><span style="font-family:Cambria">
                            </span><span style="font-family:Cambria">dipercepat</span><span style="font-family:Cambria">
                                ), </span><span style="font-family:Cambria">maka</span><span
                                style="font-family:Cambria"> </span><span style="font-family:Cambria">atas</span><span
                                style="font-family:Cambria"> </span><span
                                style="font-family:Cambria">pelunasan</span><span style="font-family:Cambria">
                            </span><span style="font-family:Cambria">tersebut</span><span style="font-family:Cambria">
                                YANG BERHUTANG </span><span style="font-family:Cambria">berkewajiban</span><span
                                style="font-family:Cambria"> </span><span
                                style="font-family:Cambria">membayar</span><span style="font-family:Cambria"> :</span>
                        </p>
                    </td>
                </tr>
                <tr>
                    <td style="width:38.45pt; padding-right:5.4pt; padding-left:5.4pt; vertical-align:top">
                        <p style="margin-top:0pt; margin-bottom:0pt; text-align:justify; font-size:10pt"><span
                                style="font-family:Cambria">&nbsp;</span></p>
                    </td>
                    <td colspan="3" style="width:450.5pt; padding-right:5.4pt; padding-left:5.4pt; vertical-align:top">
                        <p
                            style="margin-top:0pt; margin-left:26.2pt; margin-bottom:0pt; text-indent:-110pt; text-align:justify; font-size:10pt">
                            <span style="font-family:Calibri">-</span><span
                                style="font:7pt 'Times New Roman'">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            </span><span style="font-family:Cambria">Sisa</span><span style="font-family:Cambria">
                            </span><span style="font-family:Cambria">Pokok</span></p>
                        <p
                            style="margin-top:0pt; margin-left:26.2pt; margin-bottom:0pt; text-indent:-110pt; text-align:justify; font-size:10pt">
                            <span style="font-family:Calibri">-</span><span
                                style="font:7pt 'Times New Roman'">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            </span><span style="font-family:Cambria">Bunga</span><span style="font-family:Cambria">
                            </span><span style="font-family:Cambria">berjalanan</span><span style="font-family:Cambria">
                                / </span><span style="font-family:Cambria">Dua</span><span style="font-family:Cambria">
                                kali </span><span style="font-family:Cambria">bunga</span></p>
                        <p
                            style="margin-top:0pt; margin-left:26.2pt; margin-bottom:0pt; text-indent:-110pt; text-align:justify; font-size:10pt">
                            <span style="font-family:Calibri">-</span><span
                                style="font:7pt 'Times New Roman'">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            </span><span style="font-family:Cambria">Denda</span><span style="font-family:Cambria"> (
                            </span><span style="font-family:Cambria">bila</span><span style="font-family:Cambria">
                            </span><span style="font-family:Cambria">ada</span><span style="font-family:Cambria">
                                )</span></p>
                    </td>
                </tr>
                <tr>
                    <td style="width:50pt; padding-right:5.4pt; padding-left:5.4pt; vertical-align:top">
                        <p style="margin-top:0pt; margin-bottom:0pt; text-align:justify; font-size:10pt"><span
                                style="font-family:Cambria">Pasal</span><span style="font-family:Cambria"> 6 :</span>
                        </p>
                    </td>
                    <td colspan="3" style="width:450.5pt; padding-right:5.4pt; padding-left:5.4pt; vertical-align:top">
                        <p
                            style="margin-top:0pt; margin-left:0.9pt; margin-bottom:0pt; text-indent:-0.9pt; text-align:justify; font-size:10pt">
                            <span style="font-family:Cambria">Apabila</span><span style="font-family:Cambria">
                            </span><span style="font-family:Cambria">saya</span><span style="font-family:Cambria">
                            </span><span style="font-family:Cambria">telat</span><span style="font-family:Cambria">
                            </span><span style="font-family:Cambria">dalam</span><span style="font-family:Cambria">
                            </span><span style="font-family:Cambria">pembayaran</span><span style="font-family:Cambria">
                            </span><span style="font-family:Cambria">tiap</span><span style="font-family:Cambria">
                            </span><span style="font-family:Cambria">bulannya</span><span style="font-family:Cambria">
                            </span><span style="font-family:Cambria">maka</span><span style="font-family:Cambria">
                            </span><span style="font-family:Cambria">saya</span><span style="font-family:Cambria">
                            </span><span style="font-family:Cambria">bersedia</span><span style="font-family:Cambria">
                            </span><span style="font-family:Cambria">membayar</span><span style="font-family:Cambria">
                            </span><span style="font-family:Cambria">denda</span><span style="font-family:Cambria">
                            </span><span style="font-family:Cambria">setiap</span><span style="font-family:Cambria">
                            </span><span style="font-family:Cambria">hari</span><span style="font-family:Cambria"> 0.5%
                            </span><span style="font-family:Cambria">dari</span><span style="font-family:Cambria">
                            </span><span style="font-family:Cambria">sisa</span><span style="font-family:Cambria">
                            </span><span style="font-family:Cambria">angsuran</span><span style="font-family:Cambria">
                            </span><span style="font-family:Cambria">saya</span><span style="font-family:Cambria">
                            </span><span style="font-family:Cambria">selama</span><span style="font-family:Cambria">
                            </span><span style="font-family:Cambria">masa</span><span style="font-family:Cambria">
                            </span><span style="font-family:Cambria">keterlambatan</span><span
                                style="font-family:Cambria"> </span><span style="font-family:Cambria">( </span><span
                                style="font-family:Cambria">hari</span><span style="font-family:Cambria"> </span><span
                                style="font-family:Cambria">minggu</span><span style="font-family:Cambria"> </span><span
                                style="font-family:Cambria">tetap</span><span style="font-family:Cambria"> </span><span
                                style="font-family:Cambria">dikenakan</span><span style="font-family:Cambria">
                            </span><span style="font-family:Cambria">denda</span><span style="font-family:Cambria"> ).
                            </span><span style="font-family:Cambria">Terhitungnya</span><span
                                style="font-family:Cambria"> </span><span style="font-family:Cambria">denda</span><span
                                style="font-family:Cambria"> </span><span style="font-family:Cambria">yaitu</span><span
                                style="font-family:Cambria"> 3 (</span><span
                                style="font-family:Cambria">tiga</span><span style="font-family:Cambria">) </span><span
                                style="font-family:Cambria">hari</span><span style="font-family:Cambria"> </span><span
                                style="font-family:Cambria">setelah</span><span style="font-family:Cambria">
                            </span><span style="font-family:Cambria">jatoh</span><span style="font-family:Cambria">
                                tempo </span><span style="font-family:Cambria">pembayaran</span><span
                                style="font-family:Cambria">.</span></p>
                    </td>
                </tr>
                <tr>
                    <td style="width:50pt; padding-right:5.4pt; padding-left:5.4pt; vertical-align:top">
                        <p style="margin-top:0pt; margin-bottom:0pt; text-align:justify; font-size:10pt"><span
                                style="font-family:Cambria">Pasal</span><span style="font-family:Cambria"> 7 :</span>
                        </p>
                    </td>
                    <td colspan="3" style="width:450.5pt; padding-right:5.4pt; padding-left:5.4pt; vertical-align:top">
                        <p style="margin-top:0pt; margin-bottom:0pt; text-align:justify; font-size:10pt"><span
                                style="font-family:Cambria">Apabila</span><span style="font-family:Cambria"> 2
                                (</span><span style="font-family:Cambria">dua</span><span style="font-family:Cambria">)
                            </span><span style="font-family:Cambria">bulan</span><span style="font-family:Cambria">
                            </span><span style="font-family:Cambria">berturut</span><span style="font-family:Cambria"> –
                            </span><span style="font-family:Cambria">turut</span><span style="font-family:Cambria">
                            </span><span style="font-family:Cambria">tidak</span><span style="font-family:Cambria">
                            </span><span style="font-family:Cambria">ada</span><span style="font-family:Cambria">
                            </span><span style="font-family:Cambria">angsuran</span><span style="font-family:Cambria">
                            </span><span style="font-family:Cambria">masuk</span><span style="font-family:Cambria">
                            </span><span style="font-family:Cambria">maka</span><span style="font-family:Cambria">
                            </span><span style="font-family:Cambria">SHGB</span><span style="font-family:Cambria">
                            </span><span style="font-family:Cambria">dan</span><span style="font-family:Cambria">
                            </span><span
                                style="font-family:Cambria"><?php echo $jaminan_data->jam_unit ?>
                            </span><span style="font-family:Cambria">tersebut </span><span
                                style="font-family:Cambria; font-weight:bold">SAYA KUASAKAN SEPENUHNYA</span><span
                                style="font-family:Cambria"> </span><span style="font-family:Cambria">kepada</span><span
                                style="font-family:Cambria"> </span><span
                                style="font-family:Cambria; font-weight:bold">KSP ”</span><span
                                style="font-family:Cambria; font-weight:bold">SIDO MUKTI MAKMUR”</span><span
                                style="font-family:Cambria"> </span><span style="font-family:Cambria">untuk</span><span
                                style="font-family:Cambria"> proses </span><span
                                style="font-family:Cambria">selanjutnya</span><span style="font-family:Cambria">.</span>
                        </p>
                    </td>
                </tr>
                <tr>
                    <td style="width:50pt; padding-right:5.4pt; padding-left:5.4pt; vertical-align:top">
                        <p style="margin-top:0pt; margin-bottom:0pt; text-align:justify; font-size:10pt"><span
                                style="font-family:Cambria">Pasal</span><span style="font-family:Cambria"> 8 :</span>
                        </p>
                    </td>
                    <td colspan="3" style="width:450.5pt; padding-right:5.4pt; padding-left:5.4pt; vertical-align:top">
                        <p style="margin-top:0pt; margin-bottom:0pt; text-align:justify; font-size:10pt"><span
                                style="font-family:Cambria">Selama</span><span style="font-family:Cambria"> </span><span
                                style="font-family:Cambria">dalam</span><span style="font-family:Cambria"> </span><span
                                style="font-family:Cambria">masa</span><span style="font-family:Cambria"> </span><span
                                style="font-family:Cambria">kredit</span><span style="font-family:Cambria">,
                            </span><span style="font-family:Cambria">SHGB, </span><span
                                style="font-family:Cambria">kendaraan</span><span style="font-family:Cambria"> / unit
                            </span><span style="font-family:Cambria">jaminan</span><span style="font-family:Cambria">
                            </span><span style="font-family:Cambria">tidak</span><span style="font-family:Cambria">
                            </span><span style="font-family:Cambria">boleh</span><span style="font-family:Cambria">
                            </span><span style="font-family:Cambria">dipindah</span><span style="font-family:Cambria">
                            </span><span style="font-family:Cambria">tangankan</span><span style="font-family:Cambria">
                            </span><span style="font-family:Cambria">ke</span><span style="font-family:Cambria"> PIHAK
                                MANAPUN.</span></p>
                    </td>
                </tr>
            </tbody>
        </table>
        <p
            style="margin-top:0pt; margin-left:40.5pt; margin-bottom:0pt; text-indent:-40.5pt; text-align:justify; font-size:10pt">
            <span style="font-family:Cambria">&nbsp;</span></p>
        <table id="02" style="border-collapse:collapse" cellspacing="0" cellpadding="0">
            <tbody>
                <tr>
                    <td style="width:500.5pt; padding-right:5.4pt; padding-left:5.4pt; vertical-align:top">
                        <p style="margin-top:0pt; margin-bottom:0pt; text-align:justify; font-size:10pt"><span
                                style="font-family:Cambria">Demikian</span><span style="font-family:Cambria">
                            </span><span style="font-family:Cambria">surat</span><span style="font-family:Cambria">
                            </span><span style="font-family:Cambria">pernyataan</span><span style="font-family:Cambria">
                            </span><span style="font-family:Cambria">ini</span><span style="font-family:Cambria">
                            </span><span style="font-family:Cambria">saya</span><span style="font-family:Cambria">
                            </span><span style="font-family:Cambria">buat</span><span style="font-family:Cambria">
                            </span><span style="font-family:Cambria">dengan</span><span style="font-family:Cambria">
                            </span><span style="font-family:Cambria">sebenarnya</span><span style="font-family:Cambria">
                            </span><span style="font-family:Cambria">dan</span><span style="font-family:Cambria">
                            </span><span style="font-family:Cambria">dalam</span><span style="font-family:Cambria">
                            </span><span style="font-family:Cambria">kedaan</span><span style="font-family:Cambria">
                            </span><span style="font-family:Cambria">sehat</span><span style="font-family:Cambria">
                            </span><span style="font-family:Cambria">jasmani</span><span style="font-family:Cambria">
                            </span><span style="font-family:Cambria">dan</span><span style="font-family:Cambria">
                            </span><span style="font-family:Cambria">rohani</span><span style="font-family:Cambria">,
                            </span><span style="font-family:Cambria">serta</span><span style="font-family:Cambria">
                            </span><span style="font-family:Cambria">tanpa</span><span style="font-family:Cambria">
                            </span><span style="font-family:Cambria">ada</span><span style="font-family:Cambria">
                            </span><span style="font-family:Cambria">unsur</span><span style="font-family:Cambria">
                            </span><span style="font-family:Cambria">paksaan</span><span style="font-family:Cambria">
                            </span><span style="font-family:Cambria">dari</span><span style="font-family:Cambria">
                            </span><span style="font-family:Cambria">pihak</span><span style="font-family:Cambria">
                            </span><span style="font-family:Cambria">manapun</span><span style="font-family:Cambria">
                            </span><span style="font-family:Cambria">dan</span><span style="font-family:Cambria">
                            </span><span style="font-family:Cambria">dapat</span><span style="font-family:Cambria">
                            </span><span style="font-family:Cambria">digunakan</span><span style="font-family:Cambria">
                            </span><span style="font-family:Cambria">sesuai</span><span style="font-family:Cambria">
                            </span><span style="font-family:Cambria">hukum</span><span style="font-family:Cambria"> yang
                            </span><span style="font-family:Cambria">berlaku</span><span
                                style="font-family:Cambria">.</span></p>
                    </td>
                </tr>
            </tbody>
        </table>
        <p style="margin-top:0pt; margin-bottom:0pt; font-size:5pt"><span style="font-family:Cambria">&nbsp;</span></p>
        <table id="04" style="border-collapse:collapse" cellspacing="0" cellpadding="0">
            <tbody>
                <tr>
                    <td style="width:500.5pt; padding-right:5.4pt; padding-left:5.4pt; vertical-align:top">
                        <p style="margin-top:0pt; margin-bottom:0pt; text-align:right; font-size:10pt"><span
                                style="font-family:Cambria">Temanggung</span><span
                                style="font-family:Cambria">,</span><span style="font-family:Cambria">
                                <?php echo hari_ini(),' , ',dateFormataja($this->tgl) ?></span></p>
                    </td>
                </tr>
            </tbody>
        </table>
        <table id="03" style="border-collapse:collapse" cellspacing="0" cellpadding="0">
            <tbody>
                <tr>
                    <td style="width:166.10pt; padding-right:5.4pt; padding-left:5.4pt; vertical-align:top">
                        <p style="margin-top:0pt; margin-bottom:0pt; text-align:center; font-size:10pt"><span
                                style="font-family:Cambria">a.n </span><span style="font-family:Cambria">Direktur</span>
                        </p>
                    </td>
                    <td style="width:166.85pt; padding-right:5.4pt; padding-left:5.4pt; vertical-align:top">
                        <p style="margin-top:0pt; margin-bottom:0pt; font-size:10pt"><span
                                style="font-family:Cambria">&nbsp;</span></p>
                    </td>
                    <td style="width:166.85pt; padding-right:5.4pt; padding-left:5.4pt; vertical-align:top">
                        <p style="margin-top:0pt; margin-bottom:0pt; font-size:10pt"><span
                                style="font-family:Cambria">&nbsp;</span></p>
                    </td>
                </tr>
                <tr>
                    <td style="width:166.10pt; padding-right:5.4pt; padding-left:5.4pt; vertical-align:top">
                        <p style="margin-top:0pt; margin-bottom:0pt; text-align:center; font-size:10pt"><span
                                style="font-family:Cambria">KSP </span><span
                                style="font-family:Cambria">Sido</span><span style="font-family:Cambria"> </span><span
                                style="font-family:Cambria">Mukti</span><span style="font-family:Cambria"> </span><span
                                style="font-family:Cambria">Makmur</span></p>
                    </td>
                    <td style="width:166.85pt; padding-right:5.4pt; padding-left:5.4pt; vertical-align:top">
                        <p style="margin-top:0pt; margin-bottom:0pt; text-align:center; font-size:10pt"><span
                                style="font-family:Cambria">Kabag</span><span style="font-family:Cambria">. </span><span
                                style="font-family:Cambria">Pinjaman</span></p>
                    </td>
                    <td style="width:166.85pt; padding-right:5.4pt; padding-left:5.4pt; vertical-align:top">
                        <p style="margin-top:0pt; margin-bottom:0pt; text-align:center; font-size:10pt"><span
                                style="font-family:Cambria">Yang </span><span
                                style="font-family:Cambria">membuat</span><span style="font-family:Cambria">
                            </span><span style="font-family:Cambria">pernyataan</span><span
                                style="font-family:Cambria">,</span></p>
                    </td>
                </tr>
                <tr>
                    <td style="width:166.10pt; padding-right:5.4pt; padding-left:5.4pt; vertical-align:top">
                        <p style="margin-top:0pt; margin-bottom:0pt; font-size:10pt"><span
                                style="font-family:Cambria">&nbsp;</span></p>
                        <p style="margin-top:0pt; margin-bottom:0pt; font-size:10pt"><span
                                style="font-family:Cambria">&nbsp;</span></p>
                        <p style="margin-top:0pt; margin-bottom:0pt; font-size:10pt"><span
                                style="font-family:Cambria">&nbsp;</span></p>
                        <p style="margin-top:0pt; margin-bottom:0pt; font-size:10pt"><span
                                style="font-family:Cambria">&nbsp;</span></p>
                        <p style="margin-top:0pt; margin-bottom:0pt; font-size:10pt"><span
                                style="font-family:Cambria">&nbsp;</span></p>
                        <p style="margin-top:0pt; margin-bottom:0pt; font-size:10pt"><span
                                style="font-family:Cambria">&nbsp;</span></p>
                        <p style="margin-top:0pt; margin-bottom:0pt; font-size:10pt"><span
                                style="font-family:Cambria">&nbsp;</span></p>
                    </td>
                    <td style="width:166.85pt; padding-right:5.4pt; padding-left:5.4pt; vertical-align:top">
                        <p style="margin-top:0pt; margin-bottom:0pt; font-size:10pt"><span
                                style="font-family:Cambria">&nbsp;</span></p>
                    </td>
                    <td style="width:166.85pt; padding-right:5.4pt; padding-left:5.4pt; vertical-align:top">
                        <p style="margin-top:0pt; margin-bottom:0pt; font-size:10pt"><span
                                style="font-family:Cambria">&nbsp;</span></p>
                    </td>
                </tr>
                <tr>
                    <td style="width:166.10pt; padding-right:5.4pt; padding-left:5.4pt; vertical-align:top">
                        <p style="margin-top:0pt; margin-bottom:0pt; text-align:center; font-size:10pt"><span
                                style="font-family:Cambria; font-weight:bold">(Dina Andriyanti, S.Akun)</span></p>
                    </td>
                    <td style="width:166.85pt; padding-right:5.4pt; padding-left:5.4pt; vertical-align:top">
                        <p style="margin-top:0pt; margin-bottom:0pt; text-align:center; font-size:10pt"><span
                                style="font-family:Cambria; font-weight:bold">(</span><span
                                style="font-family:Cambria; font-weight:bold">Vika Amelia N, S.E</span><span
                                style="font-family:Cambria; font-weight:bold">)</span></p>
                    </td>
                    <td style="width:166.85pt; padding-right:5.4pt; padding-left:5.4pt; vertical-align:top">
                        <p style="margin-top:0pt; margin-bottom:0pt; text-align:center; font-size:10pt"><span
                                style="font-family:Cambria; font-weight:bold">(</span><span
                                style="font-family:Cambria; font-weight:bold"><?php echo $ang_nama ?></span><span
                                style="font-family:Cambria; font-weight:bold">)</span></p>
                    </td>
                </tr>
            </tbody>
        </table>
        <p style="margin-top:0pt; margin-bottom:0pt; font-size:10pt"><span style="font-family:Cambria">&nbsp;</span></p>
        <table id="03" style="border-collapse:collapse" cellspacing="0" cellpadding="0">
            <tbody>
                <tr>
                    <td style="width:166.10pt; padding-right:5.4pt; padding-left:5.4pt; vertical-align:top">
                        
                    </td>
                    <td style="width:166.85pt; padding-right:5.4pt; padding-left:5.4pt; vertical-align:top">
                    <p style="margin-top:0pt; margin-bottom:0pt; text-align:center; font-size:10pt"><span
                                style="font-family:Cambria"></span> Mengetahui <span style="font-family:Cambria"></span>
                        </p>
                    </td>
                    <td style="width:166.85pt; padding-right:5.4pt; padding-left:5.4pt; vertical-align:top">
                        <p style="margin-top:0pt; margin-bottom:0pt; font-size:10pt"><span
                                style="font-family:Cambria">&nbsp;</span></p>
                    </td>
                </tr>
                <tr>
                    <td style="width:166.10pt; padding-right:5.4pt; padding-left:5.4pt; vertical-align:top">
                        <p style="margin-top:0pt; margin-bottom:0pt; text-align:center; font-size:10pt"><span
                                style="font-family:Cambria">Kepala Desa</span></p>
                    </td>
                    
                    <td style="width:166.85pt; padding-right:5.4pt; padding-left:5.4pt; vertical-align:top">
                    </td>
                    <td style="width:166.85pt; padding-right:5.4pt; padding-left:5.4pt; vertical-align:top">
                        <p style="margin-top:0pt; margin-bottom:0pt; text-align:center; font-size:10pt"><span
                                style="font-family:Cambria"><?php echo $penjamin_data->pen_hubungan ?></span></p>
                    </td>
                </tr>
                <tr>
                    <td style="width:166.10pt; padding-right:5.4pt; padding-left:5.4pt; vertical-align:top">
                        <p style="margin-top:0pt; margin-bottom:0pt; font-size:10pt"><span
                                style="font-family:Cambria">&nbsp;</span></p>
                        <p style="margin-top:0pt; margin-bottom:0pt; font-size:10pt"><span
                                style="font-family:Cambria">&nbsp;</span></p>
                        <p style="margin-top:0pt; margin-bottom:0pt; font-size:10pt"><span
                                style="font-family:Cambria">&nbsp;</span></p>
                        <p style="margin-top:0pt; margin-bottom:0pt; font-size:10pt"><span
                                style="font-family:Cambria">&nbsp;</span></p>
                        <p style="margin-top:0pt; margin-bottom:0pt; font-size:10pt"><span
                                style="font-family:Cambria">&nbsp;</span></p>
                        <p style="margin-top:0pt; margin-bottom:0pt; font-size:10pt"><span
                                style="font-family:Cambria">&nbsp;</span></p>
                        <p style="margin-top:0pt; margin-bottom:0pt; font-size:10pt"><span
                                style="font-family:Cambria">&nbsp;</span></p>
                    </td>
                    <td style="width:166.85pt; padding-right:5.4pt; padding-left:5.4pt; vertical-align:top">
                        <p style="margin-top:0pt; margin-bottom:0pt; font-size:10pt"><span
                                style="font-family:Cambria">&nbsp;</span></p>
                    </td>
                    <td style="width:166.85pt; padding-right:5.4pt; padding-left:5.4pt; vertical-align:top">
                        <p style="margin-top:0pt; margin-bottom:0pt; font-size:10pt"><span
                                style="font-family:Cambria">&nbsp;</span></p>
                    </td>
                </tr>
                <tr>
                    <td style="width:166.10pt; padding-right:5.4pt; padding-left:5.4pt; vertical-align:top">
                        <p style="margin-top:0pt; margin-bottom:0pt; text-align:center; font-size:10pt"><span
                                style="font-family:Cambria; font-weight:bold">(.....................)</span></p>
                    </td>
                    <td style="width:166.85pt; padding-right:5.4pt; padding-left:5.4pt; vertical-align:top">
                    </td>
                    <td style="width:166.85pt; padding-right:5.4pt; padding-left:5.4pt; vertical-align:top">
                        <p style="margin-top:0pt; margin-bottom:0pt; text-align:center; font-size:10pt"><span
                                style="font-family:Cambria; font-weight:bold">(</span><span
                                style="font-family:Cambria; font-weight:bold"><?php echo $penjamin_data->pen_nama ?></span><span
                                style="font-family:Cambria; font-weight:bold">)</span></p>
                    </td>
                </tr>
            </tbody>
        </table>
        
    </div>
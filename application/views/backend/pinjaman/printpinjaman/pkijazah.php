<style>
table#02 {
    border-collapse: collapse;
    width: 100%;
    text-align: center;
}
table#03 {
    text-align: justify;
}
table#05 {
    text-align: center;
}
table#06 {
    text-align: right;
}
</style>

<?php include('header1.php');?>
<?php   
        $angsuranbunga=$pin_pinjaman*$bup_id/100;
        $provisi=$pin_pinjaman*$pop_id/100;
        $pinjamanditerima=$pin_pinjaman-$provisi;
        $angsuran=($pin_pinjaman/$sea_id)+$angsuranbunga;
        $angsuranpokok=$pin_pinjaman/$sea_id;
        ?>

    <div>
        <table id="02" style="border-collapse:collapse" cellspacing="0" cellpadding="0">
            <tbody>
                <tr>
                    <td style="width:538.7pt; padding-right:5.4pt; padding-left:5.4pt; vertical-align:top">
                        <p style="margin-top:0pt; margin-bottom:0pt; text-align:center; font-size:16pt"><span
                                style="font-family:Cambria; font-weight:bold; text-decoration:underline">SURAT
                                PERNYATAAN</span></p>
                    </td>
                </tr>
                <tr>
                    <td style="width:538.7pt; padding-right:5.4pt; padding-left:5.4pt; vertical-align:top">
                        <p style="margin-top:0pt; margin-bottom:0pt; text-align:center; font-size:11pt"><span
                                style="font-family:Cambria; font-weight:bold">No. </span><span
                                style="font-family:Cambria; font-weight:bold"><?php echo $pin_id ?></span><span
                                style="font-family:Cambria; font-weight:bold"></span><span
                                style="font-family:Cambria; font-weight:bold"></span><span
                                style="font-family:Cambria; font-weight:bold">/SMM.K/</span><span
                                style="font-family:Cambria; font-weight:bold"> <?php
                    $array_bln = array(1=>"I","II","III", "IV", "V","VI","VII","VIII","IX","X", "XI","XII");
                    $bln = $array_bln[date('n')];
                    echo $bln;
                    ?>/<?php echo date('Y'); ?></span>
                        </p>
                    </td>
                </tr>
            </tbody>
        </table>
        <p style="margin-top:0pt; margin-bottom:0pt; font-size:11pt"><span style="font-family:Cambria">&nbsp;</span></p>
        <table style="border-collapse:collapse" cellspacing="0" cellpadding="0">
            <tbody>
                <tr>
                    <td style="width:538.7pt; padding-right:5.4pt; padding-left:5.4pt; vertical-align:top">
                        <p style="margin-top:0pt; margin-bottom:0pt; font-size:11pt"><span
                                style="font-family:Cambria">Yang </span><span
                                style="font-family:Cambria">bertandatangan</span><span style="font-family:Cambria"> di
                            </span><span style="font-family:Cambria">bawah</span><span style="font-family:Cambria">
                            </span><span style="font-family:Cambria">ini</span><span style="font-family:Cambria">
                                :</span></p>
                    </td>
                </tr>
            </tbody>
        </table>
        <p style="margin-top:0pt; margin-bottom:0pt; font-size:11pt"><span style="font-family:Cambria">&nbsp;</span></p>
        <table style="border-collapse:collapse" cellspacing="0" cellpadding="0">
            <tbody>
                <tr>
                    <td style="width:179.3pt; padding-right:5.4pt; padding-left:5.4pt; vertical-align:top">
                        <p style="margin-top:0pt; margin-bottom:0pt; font-size:11pt"><span
                                style="font-family:Cambria">Nama</span></p>
                    </td>
                    <td style="width:3.85pt; padding-right:5.4pt; padding-left:5.4pt; vertical-align:top">
                        <p style="margin-top:0pt; margin-bottom:0pt; font-size:11pt"><span
                                style="font-family:Cambria">:</span></p>
                    </td>
                    <td style="width:295.85pt; padding-right:5.4pt; padding-left:5.4pt; vertical-align:top">
                        <p style="margin-top:0pt; margin-bottom:0pt; font-size:11pt"><span
                                style="font-family:Cambria"><?php echo $ang_nama ?></span></p>
                    </td>
                </tr>
                <tr>
                    <td style="width:179.3pt; padding-right:5.4pt; padding-left:5.4pt; vertical-align:top">
                        <p style="margin-top:0pt; margin-bottom:0pt; font-size:11pt"><span
                                style="font-family:Cambria">Alamat</span></p>
                    </td>
                    <td style="width:3.85pt; padding-right:5.4pt; padding-left:5.4pt; vertical-align:top">
                        <p style="margin-top:0pt; margin-bottom:0pt; font-size:11pt"><span
                                style="font-family:Cambria">:</span></p>
                    </td>
                    <td style="width:295.85pt; padding-right:5.4pt; padding-left:5.4pt; vertical-align:top">
                        <p style="margin-top:0pt; margin-bottom:0pt; font-size:11pt"><span
                                style="font-family:Cambria"><?php echo $ang_alamat ?></span></p>
                    </td>
                </tr>
                <tr>
                    <td style="width:179.3pt; padding-right:5.4pt; padding-left:5.4pt; vertical-align:top">
                        <p style="margin-top:0pt; margin-bottom:0pt; font-size:11pt"><span
                                style="font-family:Cambria">Tempat</span><span style="font-family:Cambria">,
                            </span><span style="font-family:Cambria">Tanggal</span><span style="font-family:Cambria">
                            </span><span style="font-family:Cambria">Lahir</span></p>
                    </td>
                    <td style="width:3.85pt; padding-right:5.4pt; padding-left:5.4pt; vertical-align:top">
                        <p style="margin-top:0pt; margin-bottom:0pt; font-size:11pt"><span
                                style="font-family:Cambria">:</span></p>
                    </td>
                    <td style="width:295.85pt; padding-right:5.4pt; padding-left:5.4pt; vertical-align:top">
                        <p style="margin-top:0pt; margin-bottom:0pt; font-size:11pt"><span
                                style="font-family:Cambria"><?php echo dateFormataja($ang_tgllahir) ?></span></p>
                    </td>
                </tr>
                <!--<tr>
                    <td style="width:179.3pt; padding-right:5.4pt; padding-left:5.4pt; vertical-align:top">
                        <p style="margin-top:0pt; margin-bottom:0pt; font-size:11pt"><span
                                style="font-family:Cambria">Pekerjaan</span></p>
                    </td>
                    <td style="width:3.85pt; padding-right:5.4pt; padding-left:5.4pt; vertical-align:top">
                        <p style="margin-top:0pt; margin-bottom:0pt; font-size:11pt"><span
                                style="font-family:Cambria">:</span></p>
                    </td>
                    <td style="width:295.85pt; padding-right:5.4pt; padding-left:5.4pt; vertical-align:top">
                        <p style="margin-top:0pt; margin-bottom:0pt; font-size:11pt"><span
                                style="font-family:Cambria">...............................................</span></p>
                    </td>
                </tr>-->
                <tr>
                    <td style="width:179.3pt; padding-right:5.4pt; padding-left:5.4pt; vertical-align:top">
                        <p style="margin-top:0pt; margin-bottom:0pt; font-size:11pt"><span
                                style="font-family:Cambria">No HP</span></p>
                    </td>
                    <td style="width:3.85pt; padding-right:5.4pt; padding-left:5.4pt; vertical-align:top">
                        <p style="margin-top:0pt; margin-bottom:0pt; font-size:11pt"><span
                                style="font-family:Cambria">:</span></p>
                    </td>
                    <td style="width:295.85pt; padding-right:5.4pt; padding-left:5.4pt; vertical-align:top">
                        <p style="margin-top:0pt; margin-bottom:0pt; font-size:11pt"><span
                                style="font-family:Cambria"><?php echo $ang_nohp ?></span></p>
                    </td>
                </tr>
            </tbody>
        </table>
        <p style="margin-top:0pt; margin-bottom:0pt; font-size:11pt"><span style="font-family:Cambria">&nbsp;</span></p>
        <table id="03" style="border-collapse:collapse" cellspacing="0" cellpadding="0">
            <tbody>
                <tr>
                    <td style="width:538.7pt; padding-right:5.4pt; padding-left:5.4pt; vertical-align:top">
                        <p style="margin-top:0pt; margin-bottom:0pt; font-size:11pt"><span
                                style="font-family:Cambria">Selaku Anggota KSP “SIDO MUKTI MAKMUR” Alamat Jl. Raya Kedu – Jumo Km 6,5 No.2 
                                Temanggung Telp. (0293)5592941. Dengan ini menyatakan mengikat diri 
                                dan berjanji membayar lunas atau kredit yang diterima berupa uang sebesar : </span><span style="font-family:Cambria">
                                :</span></p>
                    </td>
                </tr>
            </tbody>
        </table>
        <p style="margin-top:0pt; margin-bottom:0pt; font-size:11pt"><span style="font-family:Cambria">&nbsp;</span></p>
        <table style="border-collapse:collapse" cellspacing="0" cellpadding="0">
            <tbody>
                <tr>
                    <td style="width:179.3pt; padding-right:5.4pt; padding-left:5.4pt; vertical-align:top">
                        <p style="margin-top:0pt; margin-bottom:0pt; font-size:11pt"><span
                                style="font-family:Cambria">Pinjaman</span></p>
                    </td>
                    <td style="width:3.85pt; padding-right:5.4pt; padding-left:5.4pt; vertical-align:top">
                        <p style="margin-top:0pt; margin-bottom:0pt; font-size:11pt"><span
                                style="font-family:Cambria">:</span></p>
                    </td>
                    <td style="width:295.85pt; padding-right:5.4pt; padding-left:5.4pt; vertical-align:top">
                        <p style="margin-top:0pt; margin-bottom:0pt; font-size:11pt"><span
                                style="font-family:Cambria"><?php echo rupiah($pin_pinjaman) ?></span></p>
                    </td>
                </tr>
                <tr>
                    <td style="width:179.3pt; padding-right:5.4pt; padding-left:5.4pt; vertical-align:top">
                        <p style="margin-top:0pt; margin-bottom:0pt; font-size:11pt"><span
                                style="font-family:Cambria">Pokok</span></p>
                    </td>
                    <td style="width:3.85pt; padding-right:5.4pt; padding-left:5.4pt; vertical-align:top">
                        <p style="margin-top:0pt; margin-bottom:0pt; font-size:11pt"><span
                                style="font-family:Cambria">:</span></p>
                    </td>
                    <td style="width:295.85pt; padding-right:5.4pt; padding-left:5.4pt; vertical-align:top">
                        <p style="margin-top:0pt; margin-bottom:0pt; font-size:11pt"><span
                                style="font-family:Cambria"><?php echo rupiah($angsuranpokok) ?></span></p>
                    </td>
                </tr>
                <tr>
                    <td style="width:179.3pt; padding-right:5.4pt; padding-left:5.4pt; vertical-align:top">
                        <p style="margin-top:0pt; margin-bottom:0pt; font-size:11pt"><span
                                style="font-family:Cambria">Bunga</span></p>
                    </td>
                    <td style="width:3.85pt; padding-right:5.4pt; padding-left:5.4pt; vertical-align:top">
                        <p style="margin-top:0pt; margin-bottom:0pt; font-size:11pt"><span
                                style="font-family:Cambria">:</span></p>
                    </td>
                    <td style="width:295.85pt; padding-right:5.4pt; padding-left:5.4pt; vertical-align:top">
                        <p style="margin-top:0pt; margin-bottom:0pt; font-size:11pt"><span
                                style="font-family:Cambria"><?php echo rupiah($angsuranbunga) ?></span></p>
                    </td>
                </tr>
                <tr>
                    <td style="width:179.3pt; padding-right:5.4pt; padding-left:5.4pt; vertical-align:top">
                        <p style="margin-top:0pt; margin-bottom:0pt; font-size:11pt"><span
                                style="font-family:Cambria">Angsuran</span></p>
                    </td>
                    <td style="width:3.85pt; padding-right:5.4pt; padding-left:5.4pt; vertical-align:top">
                        <p style="margin-top:0pt; margin-bottom:0pt; font-size:11pt"><span
                                style="font-family:Cambria">:</span></p>
                    </td>
                    <td style="width:350.85pt; padding-right:5.4pt; padding-left:5.4pt; vertical-align:top">
                        <p style="margin-top:0pt; margin-bottom:0pt; font-size:11pt"><span
                                style="font-family:Cambria"><?php echo rupiah($angsuran) ?>  X <?php echo $sea_id ?> </span><p style="margin-top:0pt; margin-bottom:0pt; font-size:11pt"></p>
                    </td>
                </tr>
                <tr>
                    <td style="width:179.3pt; padding-right:5.4pt; padding-left:5.4pt; vertical-align:top">
                        <p style="margin-top:0pt; margin-bottom:0pt; font-size:11pt"><span
                                style="font-family:Cambria">Tanggal</span><span style="font-family:Cambria">
                            </span><span style="font-family:Cambria">Jatuh</span><span style="font-family:Cambria">
                                Tempo</span></p>
                    </td>
                    <td style="width:3.85pt; padding-right:5.4pt; padding-left:5.4pt; vertical-align:top">
                        <p style="margin-top:0pt; margin-bottom:0pt; font-size:11pt"><span
                                style="font-family:Cambria">:</span></p>
                    </td>
                    <td style="width:295.85pt; padding-right:5.4pt; padding-left:5.4pt; vertical-align:top">
                        <p style="margin-top:0pt; margin-bottom:0pt; font-size:11pt"><span
                                style="font-family:Cambria"><?php echo dateFormatTanggal($pin_tglpencairan) ?></span><span style="font-family:Cambria">
                            </span><span style="font-family:Cambria">Tiap</span><span style="font-family:Cambria">
                            </span><span style="font-family:Cambria">bulan</span></p>
                    </td>
                </tr>
                <tr>
                    <td style="width:179.3pt; padding-right:5.4pt; padding-left:5.4pt; vertical-align:top">
                        <p style="margin-top:0pt; margin-bottom:0pt; font-size:11pt"><span
                                style="font-family:Cambria">Tanggal</span><span style="font-family:Cambria">
                            </span><span style="font-family:Cambria">Pelunasan</span></p>
                    </td>
                    <td style="width:3.85pt; padding-right:5.4pt; padding-left:5.4pt; vertical-align:top">
                        <p style="margin-top:0pt; margin-bottom:0pt; font-size:11pt"><span
                                style="font-family:Cambria">:</span></p>
                    </td>
                    <td style="width:295.85pt; padding-right:5.4pt; padding-left:5.4pt; vertical-align:top">
                        <p style="margin-top:0pt; margin-bottom:0pt; font-size:11pt"><span
                                style="font-family:Cambria"><?php echo dateFormataja($tgl_pelunasan) ?></span></p>
                    </td>
                </tr>
            </tbody>
        </table>
        <p style="margin-top:0pt; margin-bottom:0pt; font-size:11pt"><span style="font-family:Cambria">&nbsp;</span></p>
        <table id="03" style="border-collapse:collapse" cellspacing="0" cellpadding="0">
            <tbody>
                <tr>
                    <td style="width:538.7pt; padding-right:5.4pt; padding-left:5.4pt; vertical-align:top">
                        <p style="margin-top:0pt; margin-bottom:0pt; font-size:11pt"><span
                                style="font-family:Cambria">Atas pinjaman tersebut di atas saya menjaminkan berupa : 
                                    JAMINAN KERJA di KSP “SIDO MUKTI MAKMUR”
                                    Apabila saya belum bisa melunasi pnjaman tersebut maka IJAZAH, JAMINAN KERJA saya belum bisa di ambil.
                                    .</span></p>
                    </td>
                </tr>
            </tbody>
        </table>
        <p style="margin-top:0pt; margin-bottom:0pt; text-align:justify; font-size:11pt"><span
                style="font-family:Cambria">&nbsp;</span></p>
        
        <p style="margin-top:0pt; margin-bottom:0pt; font-size:11pt"><span style="font-family:Cambria">&nbsp;</span></p>
        <table id="03" style="border-collapse:collapse" cellspacing="0" cellpadding="0">
            <tbody>
                <tr>
                    <td style="width:538.7pt; padding-right:5.4pt; padding-left:5.4pt; vertical-align:top">
                        <p style="margin-top:0pt; margin-bottom:0pt; font-size:11pt"><span
                                style="font-family:Cambria">Demikian pernyataan ini saya buat dengan sebenarnya tanpa ada unsur paksaan dari pihak lain.</span></p>
                    </td>
                </tr>
            </tbody>
        </table>
        <p style="margin-top:0pt; margin-bottom:0pt; text-align:justify; font-size:11pt"><span
                style="font-family:Cambria">&nbsp;</span></p>
        <table id="06" style="border-collapse:collapse" cellspacing="0" cellpadding="0">
            <tbody>
                <tr>
                    <td style="width:538.7pt; padding-right:5.4pt; padding-left:5.4pt; vertical-align:top">
                        <p
                            style="margin-top:0pt; margin-bottom:10pt; text-align:right; line-height:115%; font-size:11pt">
                            <span style="font-family:Cambria">Temanggung</span><span style="font-family:Cambria">,
                            </span><span style="font-family:Cambria"> <?php echo hari_ini(),' , ',dateFormataja($this->tgl) ?></span></p>
                    </td>
                </tr>
            </tbody>
        </table>
        <p style="margin-top:0pt; margin-bottom:0pt; text-align:justify; font-size:11pt"><span
                style="font-family:Cambria">&nbsp;</span></p>
        <table id="05" style="border-collapse:collapse" cellspacing="0" cellpadding="0">
            <tbody>
                <tr>
                    <td style="width:179.3pt; padding-right:5.4pt; padding-left:5.4pt; vertical-align:top">
                        <p
                            style="margin-top:0pt; margin-bottom:10pt; text-align:center; line-height:115%; font-size:11pt">
                            <span style="font-family:Cambria">a.n Direktur</span></p>
                    </td>
                    <td style="width:179.35pt; padding-right:5.4pt; padding-left:5.4pt; vertical-align:top">
                        <p style="margin-top:0pt; margin-bottom:0pt; text-align:justify; font-size:11pt"><span
                                style="font-family:Cambria">&nbsp;</span></p>
                    </td>
                    <td style="width:179.35pt; padding-right:5.4pt; padding-left:5.4pt; vertical-align:top">
                        <p
                            style="margin-top:0pt; margin-bottom:10pt; text-align:center; line-height:115%; font-size:11pt">
                            <span style="font-family:Cambria">Yang </span><span
                                style="font-family:Cambria">membuat</span><span style="font-family:Cambria">
                            </span><span style="font-family:Cambria">pernyataan</span><span
                                style="font-family:Cambria">,</span></p>
                    </td>
                </tr>
                <tr>
                    <td style="width:179.3pt; padding-right:5.4pt; padding-left:5.4pt; vertical-align:top">
                        <p
                            style="margin-top:0pt; margin-bottom:10pt; text-align:center; line-height:115%; font-size:11pt">
                            <span style="font-family:Cambria">KSP Sido Mukti Makmur</span></p>
                    </td>
                    <td style="width:179.35pt; padding-right:5.4pt; padding-left:5.4pt; vertical-align:top">
                        <p
                            style="margin-top:0pt; margin-bottom:10pt; text-align:center; line-height:115%; font-size:11pt">
                            <span style="font-family:Cambria">Kepala</span><span style="font-family:Cambria">
                            </span><span style="font-family:Cambria">Mantri</span></p>
                    </td>
                    <td style="width:179.35pt; padding-right:5.4pt; padding-left:5.4pt; vertical-align:top">
                        <p style="margin-top:0pt; margin-bottom:0pt; text-align:justify; font-size:11pt"><span
                                style="font-family:Cambria">&nbsp;</span></p>
                    </td>
                </tr>
                <tr>
                    <td style="width:179.3pt; padding-right:5.4pt; padding-left:5.4pt; vertical-align:top">
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
                    <td style="width:179.35pt; padding-right:5.4pt; padding-left:5.4pt; vertical-align:top">
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
                    <td style="width:179.35pt; padding-right:5.4pt; padding-left:5.4pt; vertical-align:top">
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
                    <td style="width:179.3pt; padding-right:5.4pt; padding-left:5.4pt; vertical-align:top">
                        <p
                            style="margin-top:0pt; margin-bottom:10pt; text-align:center; line-height:115%; font-size:11pt">
                            <span style="font-family:Cambria">( </span><span style="font-family:Cambria">Dina
                                Andriyanti, S.Akun</span><span style="font-family:Cambria"> )</span></p>
                    </td>
                    <td style="width:179.35pt; padding-right:5.4pt; padding-left:5.4pt; vertical-align:top">
                        <p
                            style="margin-top:0pt; margin-bottom:10pt; text-align:center; line-height:115%; font-size:11pt">
                            <span style="font-family:Cambria">( </span><span style="font-family:Cambria">Vika Amelia N,
                                S.E )</span></p>
                    </td>
                    <td style="width:179.35pt; padding-right:5.4pt; padding-left:5.4pt; vertical-align:top">
                        <p
                            style="margin-top:12pt; margin-bottom:10pt; text-align:center; line-height:115%; font-size:11pt">
                            <span style="font-family:Cambria">(</span><span
                                style="font-family:Cambria"> <?php echo $ang_nama ?> )</span></p>
                    </td>
                </tr>
            </tbody>
        </table>
        <p style="margin-top:0pt; margin-bottom:0pt; text-align:justify; font-size:11pt"><span
                style="font-family:Cambria">&nbsp;</span></p>
        <p style="margin-top:0pt; margin-bottom:0pt; text-align:justify; font-size:11pt"><span
                style="font-family:Cambria">&nbsp;</span></p>
        <p style="margin-top:0pt; margin-bottom:10pt; line-height:115%; font-size:11pt"><span
                style="font-family:Calibri">&nbsp;</span></p>
    </div>
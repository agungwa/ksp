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
<p style="margin-top:0pt; margin-bottom:0pt; font-size:3pt"><span style="font-family:Calibri">&nbsp;</span></p>
<div>
    <table id="02" style="border-collapse:collapse" cellspacing="0" cellpadding="0">
        <tbody>
            <tr>
                <td style="width:528.7pt; padding-right:5.4pt; padding-left:5.4pt; vertical-align:top">
                    <p style="margin-top:0pt; margin-bottom:0pt; text-align:center; font-size:10pt">
                        <span style="font-family:Cambria; font-weight:bold; text-align: center;">SURAT PERNYATAAN
                            PENGAKUAN HUTANG</span>
                    </p>
                </td>
            </tr>
            <tr>
                <td style="width:528.7pt; padding-right:5.4pt; padding-left:5.4pt; vertical-align:top">
                    <p style="margin-top:0pt; margin-bottom:0pt; text-align:center; font-size:9pt">
                        <span style="font-family:'Times New Roman'; font-weight:bold; text-decoration:underline">NO.SPPH
                            : <?php echo $pin_id ?>/BP/SMM.K/
                            <?php
                    $array_bln = array(1=>"I","II","III", "IV", "V","VI","VII","VIII","IX","X", "XI","XII");
                    $bln = $array_bln[date('n')];
                    echo $bln;
                    ?>/<?php echo date('Y'); ?>
                        </span></p>
                </td>
            </tr>
    </table>

    <table>
        <tr>
            <td style="width:528.7pt; padding-right:5.4pt; padding-left:5.4pt; vertical-align:top">
                <p style="margin-top:0pt; margin-bottom:0pt; font-size:10pt">
                    <span style="font-family:Cambria">
                        Pada hari ini &nbsp; <?php echo  hari_ini()," , ", dateFormataja($this->tgl) ?> &nbsp;, yang bertanda tangan
                        dibawah ini:</span></p>
            </td>
        </tr>
        </tbody>
    </table>
    <p style="margin-top:0pt; margin-bottom:0pt; font-size:3pt"><span style="font-family:Calibri">&nbsp;</span></p>
    <table style="border-collapse:collapse" cellspacing="0" cellpadding="0">
        <tbody>
            <tr>
                <td style="width:116.55pt; padding-right:5.4pt; padding-left:5.4pt; vertical-align:top">
                    <p style="margin-top:0pt; margin-bottom:0pt; font-size:10pt">
                        <span style="font-family:Cambria">Nama</span>
                        <span style="width:11.11pt; display:inline-block">&nbsp;</span>
                    </p>
                </td>
                <td style="width:3.35pt; padding-right:5.4pt; padding-left:5.4pt; vertical-align:top">
                    <p style="margin-top:0pt; margin-bottom:0pt; font-size:10pt">
                        <span style="font-family:Cambria">:</span></p>
                </td>
                <td style="width:387.2pt; padding-right:5.4pt; padding-left:5.4pt; vertical-align:top">
                    <p style="margin-top:0pt; margin-bottom:0pt; font-size:10pt">
                        <span style="font-family:Cambria"><?php echo $ang_nama ?></span></p>
                </td>
            </tr>
            <tr>
                <td style="width:116.55pt; padding-right:5.4pt; padding-left:5.4pt; vertical-align:top">
                    <p style="margin-top:0pt; margin-bottom:0pt; font-size:10pt">
                        <span style="font-family:Cambria">Tanggal Lahir</span></p>
                </td>
                <td style="width:3.35pt; padding-right:5.4pt; padding-left:5.4pt; vertical-align:top">
                    <p style="margin-top:0pt; margin-bottom:0pt; font-size:10pt"><span
                            style="font-family:Cambria">:</span></p>
                </td>
                <td style="width:387.2pt; padding-right:5.4pt; padding-left:5.4pt; vertical-align:top">
                    <p style="margin-top:0pt; margin-bottom:0pt; font-size:10pt">
                        <span style="font-family:Cambria"><?php echo dateFormataja($ang_tgllahir) ?></span></p>
                </td>
            </tr>
            <tr>
                <td style="width:116.55pt; padding-right:5.4pt; padding-left:5.4pt; vertical-align:top">
                    <p style="margin-top:0pt; margin-bottom:0pt; font-size:10pt">
                        <span style="font-family:Cambria">Alamat</span></p>
                </td>
                <td style="width:3.35pt; padding-right:5.4pt; padding-left:5.4pt; vertical-align:top">
                    <p style="margin-top:0pt; margin-bottom:0pt; font-size:10pt">
                        <span style="font-family:Cambria">:</span></p>
                </td>
                <td style="width:387.2pt; padding-right:5.4pt; padding-left:5.4pt; vertical-align:top">
                    <p style="margin-top:0pt; margin-bottom:0pt; font-size:10pt">
                        <span style="font-family:Cambria"><?php echo $ang_alamat ?></span></p>
                </td>
            </tr>
            <!--<tr>
                <td style="width:116.55pt; padding-right:5.4pt; padding-left:5.4pt; vertical-align:top">
                    <p style="margin-top:0pt; margin-bottom:0pt; font-size:10pt"><span
                            style="font-family:Cambria">Pekerjaan</span>
                    </p>
                </td>
                <td style="width:3.35pt; padding-right:5.4pt; padding-left:5.4pt; vertical-align:top">
                    <p style="margin-top:0pt; margin-bottom:0pt; font-size:10pt"><span
                            style="font-family:Cambria">:</span></p>
                </td>
                <td style="width:387.2pt; padding-right:5.4pt; padding-left:5.4pt; vertical-align:top">
                    <p style="margin-top:0pt; margin-bottom:0pt; font-size:10pt"><span
                            style="font-family:Cambria">........................................................</span>
                    </p>
                </td>
            </tr>-->
            <tr>
                <td style="width:116.55pt; padding-right:5.4pt; padding-left:5.4pt; vertical-align:top">
                    <p style="margin-top:0pt; margin-bottom:0pt; font-size:10pt">
                        <span style="font-family:Cambria">Nomor KTP</span></p>
                </td>
                <td style="width:3.35pt; padding-right:5.4pt; padding-left:5.4pt; vertical-align:top">
                    <p style="margin-top:0pt; margin-bottom:0pt; font-size:10pt"><span
                            style="font-family:Cambria">:</span></p>
                </td>
                <td style="width:387.2pt; padding-right:5.4pt; padding-left:5.4pt; vertical-align:top">
                    <p style="margin-top:0pt; margin-bottom:0pt; font-size:10pt">
                        <span style="font-family:Cambria"><?php echo $ang_noktp ?></span></p>
                </td>
            </tr>
            <tr>
                <td style="width:116.55pt; padding-right:5.4pt; padding-left:5.4pt; vertical-align:top">
                    <p style="margin-top:0pt; margin-bottom:0pt; font-size:10pt"><span style="font-family:Cambria">No.
                            Tlp/HP</span></p>
                </td>
                <td style="width:3.35pt; padding-right:5.4pt; padding-left:5.4pt; vertical-align:top">
                    <p style="margin-top:0pt; margin-bottom:0pt; font-size:10pt"><span
                            style="font-family:Cambria">:</span></p>
                </td>
                <td style="width:387.2pt; padding-right:5.4pt; padding-left:5.4pt; vertical-align:top">
                    <p style="margin-top:0pt; margin-bottom:0pt; font-size:10pt">
                        <span style="font-family:Cambria"><?php echo $ang_nohp ?></span></p>
                </td>
            </tr>
        </tbody>
    </table>
    <p style="margin-top:0pt; margin-bottom:0pt; font-size:3pt"><span style="font-family:Calibri">&nbsp;</span></p>
    <p style="margin-top:0pt; margin-bottom:0pt; font-size:3pt"><span style="font-family:Calibri"></span></p>
    <p style="margin-top:0pt; margin-bottom:0pt; text-align:justify; font-size:10pt">

        <span style="font-family:Cambria">
            Pada hari ini &nbsp; <?php echo hari_ini()," , ", dateFormataja($this->tgl) ?> &nbsp;,
            saya selaku anggota KSP Sido Mukti Makmur yang beralamat di Jl.
            Kedu-Jumo Km 6,5 (Sroyo, Bojonegoro) Kec. Kedu, Kab. Temanggung, dengan
            ini membuat pernyataan sebagai berikut:
        </span></p>
    <p style="margin-top:0pt; margin-bottom:0pt; font-size:3pt"><span style="font-family:Calibri">&nbsp;</span></p>
    <table id="03" style="border-collapse:collapse" cellspacing="0" cellpadding="0">
        <tbody>
            <tr>
                <td style="width:45.65pt; padding-right:5.4pt; padding-left:5.4pt; vertical-align:top">
                    <p style="margin-top:0pt; margin-bottom:0pt; text-align:justify; font-size:10pt">
                        <span style="font-family:Cambria">Pasal 1</span></p>
                </td>
                <td style="width:3.4pt; padding-right:5.4pt; padding-left:5.4pt; vertical-align:top">
                    <p style="margin-top:0pt; margin-bottom:0pt; text-align:justify; font-size:10pt">
                        <span style="font-family:Cambria">:</span></p>
                </td>
                <td colspan="6" style="width:458.05pt; padding-right:5.4pt; padding-left:5.4pt; vertical-align:top">
                    <p style="margin-top:0pt; margin-bottom:0pt; text-align:justify; font-size:10pt">
                        <span style="font-family:Cambria">Saya menyatakan telah mengikatkan diri dalam suatu Perjanjian
                            Hutang dengan KSP Sido Mukti Makmur.</span></p>
                </td>
            </tr>
            <tr>
                <td style="width:45.65pt; padding-right:5.4pt; padding-left:5.4pt; vertical-align:top">
                    <p style="margin-top:0pt; margin-bottom:0pt; text-align:justify; font-size:10pt">
                        <span style="font-family:Cambria">Pasal 2</span></p>
                </td>
                <td style="width:3.4pt; padding-right:5.4pt; padding-left:5.4pt; vertical-align:top">
                    <p style="margin-top:0pt; margin-bottom:0pt; text-align:justify; font-size:10pt">
                        <span style="font-family:Cambria">:</span></p>
                </td>
                <td colspan="6" style="width:458.05pt; padding-right:5.4pt; padding-left:5.4pt; vertical-align:top">
                    <p style="margin-top:0pt; margin-bottom:0pt; text-align:justify; font-size:10pt">
                        <span style="font-family:Cambria">Saya menyatakan telah menerima uang sebesar Rp </span>
                        <span style="font-family:Cambria"><?php echo rupiah($pin_pinjaman) ?> -
                            (<?php echo ' ',terbilang($pin_pinjaman),' Rupiah ' ?>) dari KSP Sido Mukti
                            Makmur.</span></p>
                </td>
            </tr>
            <tr>
                <td style="width:45.65pt; padding-right:5.4pt; padding-left:5.4pt; vertical-align:top">
                    <p style="margin-top:0pt; margin-bottom:0pt; text-align:justify; font-size:10pt">
                        <span style="font-family:Cambria">Pasal 3</span></p>
                </td>
                <td style="width:3.4pt; padding-right:5.4pt; padding-left:5.4pt; vertical-align:top">
                    <p style="margin-top:0pt; margin-bottom:0pt; text-align:justify; font-size:10pt">
                        <span style="font-family:Cambria">:</span></p>
                </td>
                <td colspan="6" style="width:458.05pt; padding-right:5.4pt; padding-left:5.4pt; vertical-align:top">
                    <p style="margin-top:0pt; margin-bottom:0pt; text-align:justify; font-size:10pt">
                        <span style="font-family:Cambria">Saya bersedia dan berjanji akan membayar lunas hutang saya
                            dengan rincian:</span></p>
                </td>
            </tr>
            <tr>
                <td style="width:45.65pt; padding-right:5.4pt; padding-left:5.4pt; vertical-align:top">
                    <p style="margin-top:0pt; margin-bottom:0pt; text-align:justify; font-size:10pt"><span
                            style="font-family:Cambria">&nbsp;</span></p>
                </td>
                <td style="width:3.4pt; padding-right:5.4pt; padding-left:5.4pt; vertical-align:top">
                    <p style="margin-top:0pt; margin-bottom:0pt; text-align:justify; font-size:10pt">
                        <span style="font-family:Cambria">&nbsp;</span></p>
                </td>
                <td style="width:116.75pt; padding-right:5.4pt; padding-left:5.4pt; vertical-align:top">
                    <p style="margin-top:0pt; margin-bottom:0pt; text-align:justify; font-size:10pt"><span
                            style="font-family:Cambria">Angsuran Pokok</span>
                        <span style="width:1.84pt; display:inline-block">&nbsp;</span></p>
                </td>
                <td style="width:3.4pt; padding-right:5.4pt; padding-left:5.4pt; vertical-align:top">
                    <p style="margin-top:0pt; margin-bottom:0pt; text-align:justify; font-size:10pt"><span
                            style="font-family:Cambria">: </span></p>
                </td>
                <td colspan="4" style="width:316.3pt; padding-right:5.4pt; padding-left:5.4pt; vertical-align:top">
                    <p style="margin-top:0pt; margin-bottom:0pt; text-align:justify; font-size:10pt">
                        <span style="font-family:Cambria"><?php echo rupiah($angsuranpokok) ?></span>
                        <span style="font-family:Cambria">,-&nbsp; (</span>
                        <span
                            style="font-family:Cambria; font-style:italic"><?php echo terbilang($angsuranpokok) ?></span>
                        <span style="font-family:Cambria; font-style:italic">)</span></p>
                </td>
            </tr>
            <tr>
                <td style="width:45.65pt; padding-right:5.4pt; padding-left:5.4pt; vertical-align:top">
                    <p style="margin-top:0pt; margin-bottom:0pt; text-align:justify; font-size:10pt"><span
                            style="font-family:Cambria">&nbsp;</span></p>
                </td>
                <td style="width:3.4pt; padding-right:5.4pt; padding-left:5.4pt; vertical-align:top">
                    <p style="margin-top:0pt; margin-bottom:0pt; text-align:justify; font-size:10pt">
                        <span style="font-family:Cambria">&nbsp;</span></p>
                </td>
                <td style="width:116.75pt; padding-right:5.4pt; padding-left:5.4pt; vertical-align:top">
                    <p style="margin-top:0pt; margin-bottom:0pt; text-align:justify; font-size:10pt">
                        <span style="font-family:Cambria">Bunga</span></p>
                </td>
                <td style="width:3.4pt; padding-right:5.4pt; padding-left:5.4pt; vertical-align:top">
                    <p style="margin-top:0pt; margin-bottom:0pt; text-align:justify; font-size:10pt">
                        <span style="font-family:Cambria">:</span></p>
                </td>
                <td colspan="4" style="width:316.3pt; padding-right:5.4pt; padding-left:5.4pt; vertical-align:top">
                    <p style="margin-top:0pt; margin-bottom:0pt; text-align:justify; font-size:10pt">
                        <span
                            style="font-family:Cambria"><?php echo rupiah($angsuranbunga) ?>,-&nbsp;(<?php echo ' ',terbilang($angsuranbunga),' ' ?>)</span>
                    </p>
                </td>
            </tr>
            <tr>
                <td style="width:45.65pt; padding-right:5.4pt; padding-left:5.4pt; vertical-align:top">
                    <p style="margin-top:0pt; margin-bottom:0pt; text-align:justify; font-size:10pt">
                        <span style="font-family:Cambria">&nbsp;</span></p>
                </td>
                <td style="width:3.4pt; padding-right:5.4pt; padding-left:5.4pt; vertical-align:top">
                    <p style="margin-top:0pt; margin-bottom:0pt; text-align:justify; font-size:10pt">
                        <span style="font-family:Cambria">&nbsp;</span></p>
                </td>
                <td style="width:116.75pt; padding-right:5.4pt; padding-left:5.4pt; vertical-align:top">
                    <p style="margin-top:0pt; margin-bottom:0pt; text-align:justify; font-size:10pt">
                        <span style="font-family:Cambria">Angsuran tiap Bulan</span></p>
                </td>
                <td style="width:3.4pt; padding-right:5.4pt; padding-left:5.4pt; vertical-align:top">
                    <p style="margin-top:0pt; margin-bottom:0pt; text-align:justify; font-size:10pt">
                        <span style="font-family:Cambria">:</span></p>
                </td>
                <td colspan="4" style="width:316.3pt; padding-right:5.4pt; padding-left:5.4pt; vertical-align:top">
                    <p style="margin-top:0pt; margin-bottom:0pt; text-align:justify; font-size:10pt">
                        <span style="font-family:Cambria"><?php echo rupiah($angsuran) ?>,-&nbsp;
                            (<?php echo ' ',terbilang($angsuran),' ' ?>)</span></p>
                </td>
            </tr>
            <tr>
                <td style="width:45.65pt; padding-right:5.4pt; padding-left:5.4pt; vertical-align:top">
                    <p style="margin-top:0pt; margin-bottom:0pt; text-align:justify; font-size:10pt">
                        <span style="font-family:Cambria">&nbsp;</span></p>
                </td>
                <td style="width:3.4pt; padding-right:5.4pt; padding-left:5.4pt; vertical-align:top">
                    <p style="margin-top:0pt; margin-bottom:0pt; text-align:justify; font-size:10pt">
                        <span style="font-family:Cambria">&nbsp;</span></p>
                </td>
                <td style="width:116.75pt; padding-right:5.4pt; padding-left:5.4pt; vertical-align:top">
                    <p style="margin-top:0pt; margin-bottom:0pt; text-align:justify; font-size:10pt">
                        <span style="font-family:Cambria">Tenor Angsuran</span>
                        <span style="width:2.10pt; display:inline-block">&nbsp;</span></p>
                </td>
                <td style="width:3.4pt; padding-right:5.4pt; padding-left:5.4pt; vertical-align:top">
                    <p style="margin-top:0pt; margin-bottom:0pt; text-align:justify; font-size:10pt">
                        <span style="font-family:Cambria">:</span></p>
                </td>
                <td colspan="4" style="width:316.3pt; padding-right:5.4pt; padding-left:5.4pt; vertical-align:top">
                    <p
                        style="margin-top:0pt; margin-left:70.9pt; margin-bottom:0pt; text-indent:-70.9pt; text-align:justify; font-size:10pt">
                        <span style="font-family:Cambria"><?php echo $sea_id ?></span>
                        <span style="font-family:Cambria"> </span>
                        <span style="font-family:Cambria; font-style:italic">(<?php echo ' ',terbilang($sea_id),' ' ?>)
                        </span>
                        <span style="font-family:Cambria">Bulan</span></p>
                </td>
            </tr>
            <tr>
                <td style="width:45.65pt; padding-right:5.4pt; padding-left:5.4pt; vertical-align:top">
                    <p style="margin-top:0pt; margin-bottom:0pt; text-align:justify; font-size:10pt">
                        <span style="font-family:Cambria">&nbsp;</span></p>
                </td>
                <td style="width:3.4pt; padding-right:5.4pt; padding-left:5.4pt; vertical-align:top">
                    <p style="margin-top:0pt; margin-bottom:0pt; text-align:justify; font-size:10pt">
                        <span style="font-family:Cambria">&nbsp;</span></p>
                </td>
                <td colspan="2" style="width:130.95pt; padding-right:5.4pt; padding-left:5.4pt; vertical-align:top">
                    <p style="margin-top:0pt; margin-bottom:0pt; text-align:justify; font-size:10pt">
                        <span style="font-family:Cambria">Jatuh Tempo Pembayaran</span></p>
                </td>
                <td style="width:3.35pt; padding-right:5.4pt; padding-left:5.4pt; vertical-align:top">
                    <p style="margin-top:0pt; margin-bottom:0pt; text-align:justify; font-size:10pt">
                        <span style="font-family:Cambria">:</span></p>
                </td>
                <td colspan="3" style="width:302.15pt; padding-right:5.4pt; padding-left:5.4pt; vertical-align:top">
                    <p style="margin-top:0pt; margin-bottom:0pt; text-align:justify; font-size:10pt">
                        <span style="font-family:Cambria">Tanggal <?php echo dateFormatTanggal($pin_tglpencairan) ?> Tiap Bulan</span></p>
                </td>
            </tr>
            <tr>
                <td style="width:45.65pt; padding-right:5.4pt; padding-left:5.4pt; vertical-align:top">
                    <p style="margin-top:0pt; margin-bottom:0pt; text-align:justify; font-size:10pt">
                        <span style="font-family:Cambria">&nbsp;</span></p>
                </td>
                <td style="width:3.4pt; padding-right:5.4pt; padding-left:5.4pt; vertical-align:top">
                    <p style="margin-top:0pt; margin-bottom:0pt; text-align:justify; font-size:10pt">
                        <span style="font-family:Cambria">&nbsp;</span></p>
                </td>
                <td colspan="2" style="width:130.95pt; padding-right:5.4pt; padding-left:5.4pt; vertical-align:top">
                    <p style="margin-top:0pt; margin-bottom:0pt; text-align:justify; font-size:10pt">
                        <span style="font-family:Cambria">Waktu Pelunasan Maksimal</span></p>
                </td>
                <td style="width:3.35pt; padding-right:5.4pt; padding-left:5.4pt; vertical-align:top">
                    <p style="margin-top:0pt; margin-bottom:0pt; text-align:justify; font-size:10pt">
                        <span style="font-family:Cambria">:</span></p>
                </td>
                <td colspan="3" style="width:302.15pt; padding-right:5.4pt; padding-left:5.4pt; vertical-align:top">
                    <p style="margin-top:0pt; margin-bottom:0pt; text-align:justify; font-size:10pt">
                        <span style="font-family:Cambria"><?php echo dateFormataja($tgl_pelunasan) ?></span></p>
                </td>
            </tr>
            <tr>
                <td style="width:45.65pt; padding-right:5.4pt; padding-left:5.4pt; vertical-align:top">
                    <p style="margin-top:0pt; margin-bottom:0pt; text-align:justify; font-size:10pt">
                        <span style="font-family:Cambria">&nbsp;</span></p>
                </td>
                <td style="width:3.4pt; padding-right:5.4pt; padding-left:5.4pt; vertical-align:top">
                    <p style="margin-top:0pt; margin-bottom:0pt; text-align:justify; font-size:10pt">
                        <span style="font-family:Cambria">:</span></p>
                </td>
                <td colspan="4" style="width:300.9pt; padding-right:5.4pt; padding-left:5.4pt; vertical-align:top">
                    <p style="margin-top:0pt; margin-bottom:0pt; text-align:justify; font-size:10pt">
                        <span style="font-family:Cambria">Atas hutang&nbsp; tersebut di atas, saya menjaminkan</span>
                    </p>
                </td>
                <td style="width:3.4pt; padding-right:5.4pt; padding-left:5.4pt; vertical-align:top">
                    <p style="margin-top:0pt; margin-bottom:0pt; text-align:justify; font-size:10pt">
                        <span style="font-family:Cambria">:</span></p>
                </td>
                <td style="width:224.15pt; padding-right:5.4pt; padding-left:5.4pt; vertical-align:top">
                    <p style="margin-top:0pt; margin-bottom:0pt; text-align:justify; font-size:10pt">
                        <span style="font-family:Cambria">&nbsp;</span></p>
                </td>
            </tr>
            <tr>
                <td style="width:45.65pt; padding-right:5.4pt; padding-left:5.4pt; vertical-align:top">
                    <p style="margin-top:0pt; margin-bottom:0pt; text-align:justify; font-size:10pt">
                        <span style="font-family:Cambria">&nbsp;</span></p>
                </td>
                <td style="width:3.4pt; padding-right:5.4pt; padding-left:5.4pt; vertical-align:top">
                    <p style="margin-top:0pt; margin-bottom:0pt; text-align:justify; font-size:10pt">
                        <span style="font-family:Cambria">&nbsp;</span></p>
                </td>
                <td style="width:116.75pt; padding-right:5.4pt; padding-left:5.4pt; vertical-align:top">
                    <p style="margin-top:0pt; margin-bottom:0pt; text-align:justify; font-size:10pt">
                        <span style="font-family:Cambria">Satu Unit </span></p>
                </td>
                <td style="width:3.4pt; padding-right:5.4pt; padding-left:5.4pt; vertical-align:top">
                    <p style="margin-top:0pt; margin-bottom:0pt; text-align:justify; font-size:10pt">
                        <span style="font-family:Cambria">:</span></p>
                </td>
                <td colspan="4" style="width:316.3pt; padding-right:5.4pt; padding-left:5.4pt; vertical-align:top">
                    <p style="margin-top:0pt; margin-bottom:0pt; text-align:justify; font-size:10pt">
                        <span
                            style="font-family:Cambria">&nbsp;<?php echo ' ',$jaminan_data->jam_unit ?> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        </span></p>
                </td>
            </tr>
            <tr>
                <td style="width:45.65pt; padding-right:5.4pt; padding-left:5.4pt; vertical-align:top">
                    <p style="margin-top:0pt; margin-bottom:0pt; text-align:justify; font-size:10pt">
                        <span style="font-family:Cambria">&nbsp;</span></p>
                </td>
                <td style="width:3.4pt; padding-right:5.4pt; padding-left:5.4pt; vertical-align:top">
                    <p style="margin-top:0pt; margin-bottom:0pt; text-align:justify; font-size:10pt">
                        <span style="font-family:Cambria">&nbsp;</span></p>
                </td>
                <td style="width:116.75pt; padding-right:5.4pt; padding-left:5.4pt; vertical-align:top">
                    <p style="margin-top:0pt; margin-bottom:0pt; text-align:justify; font-size:10pt">
                        <span style="font-family:Cambria">Nomor Registrasi</span></p>
                </td>
                <td style="width:3.4pt; padding-right:5.4pt; padding-left:5.4pt; vertical-align:top">
                    <p style="margin-top:0pt; margin-bottom:0pt; text-align:justify; font-size:10pt">
                        <span style="font-family:Cambria">:</span></p>
                </td>
                <td colspan="4" style="width:316.3pt; padding-right:5.4pt; padding-left:5.4pt; vertical-align:top">
                    <p style="margin-top:0pt; margin-bottom:0pt; text-align:justify; font-size:10pt">
                        <span style="font-family:Cambria">&nbsp;<?php echo $jaminan_data->jam_noregistrasi ?></span></p>
                </td>
            </tr>
            <tr>
                <td style="width:45.65pt; padding-right:5.4pt; padding-left:5.4pt; vertical-align:top">
                    <p style="margin-top:0pt; margin-bottom:0pt; text-align:justify; font-size:10pt">
                        <span style="font-family:Cambria">&nbsp;</span></p>
                </td>
                <td style="width:3.4pt; padding-right:5.4pt; padding-left:5.4pt; vertical-align:top">
                    <p style="margin-top:0pt; margin-bottom:0pt; text-align:justify; font-size:10pt">
                        <span style="font-family:Cambria">&nbsp;</span></p>
                </td>
                <td style="width:116.75pt; padding-right:5.4pt; padding-left:5.4pt; vertical-align:top">
                    <p style="margin-top:0pt; margin-bottom:0pt; text-align:justify; font-size:10pt">
                        <span style="font-family:Cambria">Nomor BPKB</span></p>
                </td>
                <td style="width:3.4pt; padding-right:5.4pt; padding-left:5.4pt; vertical-align:top">
                    <p style="margin-top:0pt; margin-bottom:0pt; text-align:justify; font-size:10pt">
                        <span style="font-family:Cambria">: </span></p>
                </td>
                <td colspan="4" style="width:316.3pt; padding-right:5.4pt; padding-left:5.4pt; vertical-align:top">
                    <p style="margin-top:0pt; margin-bottom:0pt; text-align:justify; font-size:10pt">
                        <span style="font-family:Cambria">&nbsp;<?php echo $jaminan_data->jam_nomor ?></span></p>
                </td>
            </tr>
            <tr>
                <td style="width:45.65pt; padding-right:5.4pt; padding-left:5.4pt; vertical-align:top">
                    <p style="margin-top:0pt; margin-bottom:0pt; text-align:justify; font-size:10pt">
                        <span style="font-family:Cambria">&nbsp;</span></p>
                </td>
                <td style="width:3.4pt; padding-right:5.4pt; padding-left:5.4pt; vertical-align:top">
                    <p style="margin-top:0pt; margin-bottom:0pt; text-align:justify; font-size:10pt">
                        <span style="font-family:Cambria">&nbsp;</span></p>
                </td>
                <td style="width:116.75pt; padding-right:5.4pt; padding-left:5.4pt; vertical-align:top">
                    <p style="margin-top:0pt; margin-bottom:0pt; text-align:justify; font-size:10pt">
                        <span style="font-family:Cambria">Tahun Pembuatan</span></p>
                </td>
                <td style="width:3.4pt; padding-right:5.4pt; padding-left:5.4pt; vertical-align:top">
                    <p style="margin-top:0pt; margin-bottom:0pt; text-align:justify; font-size:10pt">
                        <span style="font-family:Cambria">:</span></p>
                </td>
                <td colspan="4" style="width:316.3pt; padding-right:5.4pt; padding-left:5.4pt; vertical-align:top">
                    <p style="margin-top:0pt; margin-bottom:0pt; text-align:justify; font-size:10pt">
                        <span style="font-family:Cambria">&nbsp;<?php echo $jaminan_data->jam_tahunpembuatan ?></span></p>
                </td>
            </tr>
            <tr>
                <td style="width:45.65pt; padding-right:5.4pt; padding-left:5.4pt; vertical-align:top">
                    <p style="margin-top:0pt; margin-bottom:0pt; text-align:justify; font-size:10pt">
                        <span style="font-family:Cambria">&nbsp;</span></p>
                </td>
                <td style="width:3.4pt; padding-right:5.4pt; padding-left:5.4pt; vertical-align:top">
                    <p style="margin-top:0pt; margin-bottom:0pt; text-align:justify; font-size:10pt">
                        <span style="font-family:Cambria">&nbsp;</span></p>
                </td>
                <td style="width:116.75pt; padding-right:5.4pt; padding-left:5.4pt; vertical-align:top">
                    <p style="margin-top:0pt; margin-bottom:0pt; text-align:justify; font-size:10pt">
                        <span style="font-family:Cambria">Atas Nama</span></p>
                </td>
                <td style="width:3.4pt; padding-right:5.4pt; padding-left:5.4pt; vertical-align:top">
                    <p style="margin-top:0pt; margin-bottom:0pt; text-align:justify; font-size:10pt">
                        <span style="font-family:Cambria">:</span></p>
                </td>
                <td colspan="4" style="width:316.3pt; padding-right:5.4pt; padding-left:5.4pt; vertical-align:top">
                    <p style="margin-top:0pt; margin-bottom:0pt; text-align:justify; font-size:10pt">
                        <span style="font-family:Cambria">&nbsp;<?php echo $jaminan_data->jam_atasnama ?></span></p>
                </td>
            </tr>
            <tr>
                <td style="width:45.65pt; padding-right:5.4pt; padding-left:5.4pt; vertical-align:top">
                    <p style="margin-top:0pt; margin-bottom:0pt; text-align:justify; font-size:10pt">
                        <span style="font-family:Cambria">&nbsp;</span></p>
                </td>
                <td style="width:3.4pt; padding-right:5.4pt; padding-left:5.4pt; vertical-align:top">
                    <p style="margin-top:0pt; margin-bottom:0pt; text-align:justify; font-size:10pt">
                        <span style="font-family:Cambria">&nbsp;</span></p>
                </td>
                <td style="width:116.75pt; padding-right:5.4pt; padding-left:5.4pt; vertical-align:top">
                    <p style="margin-top:0pt; margin-bottom:0pt; text-align:justify; font-size:10pt">
                        <span style="font-family:Cambria">Alamat</span></p>
                </td>
                <td style="width:3.4pt; padding-right:5.4pt; padding-left:5.4pt; vertical-align:top">
                    <p style="margin-top:0pt; margin-bottom:0pt; text-align:justify; font-size:10pt">
                        <span style="font-family:Cambria">:</span></p>
                </td>
                <td colspan="4" style="width:316.3pt; padding-right:5.4pt; padding-left:5.4pt; vertical-align:top">
                    <p style="margin-top:0pt; margin-bottom:0pt; text-align:justify; font-size:10pt">
                        <span style="font-family:Cambria">&nbsp;<?php echo $jaminan_data->jam_alamat ?></span></p>
                </td>
            </tr>
            <tr>
                <td style="width:45.65pt; padding-right:5.4pt; padding-left:5.4pt; vertical-align:top">
                    <p style="margin-top:0pt; margin-bottom:0pt; text-align:justify; font-size:10pt">
                        <span style="font-family:Cambria">Pasal 4</span></p>
                </td>
                <td style="width:3.4pt; padding-right:5.4pt; padding-left:5.4pt; vertical-align:top">
                    <p style="margin-top:0pt; margin-bottom:0pt; text-align:justify; font-size:10pt">
                        <span style="font-family:Cambria">:</span></p>
                </td>
                <td colspan="6" style="width:458.05pt; padding-right:5.4pt; padding-left:5.4pt; vertical-align:top">
                    <p style="margin-top:0pt; margin-bottom:0pt; font-size:10pt">
                        <span style="font-family:Cambria">Segala bentuk pembayaran harus dengan kuitansi yang resmi dan
                            sah.</span></p>
                </td>
            </tr>
            <tr>
                <td style="width:45.65pt; padding-right:5.4pt; padding-left:5.4pt; vertical-align:top">
                    <p style="margin-top:0pt; margin-bottom:0pt; text-align:justify; font-size:10pt">
                        <span style="font-family:Cambria">Pasal 5</span></p>
                </td>
                <td style="width:3.4pt; padding-right:5.4pt; padding-left:5.4pt; vertical-align:top">
                    <p style="margin-top:0pt; margin-bottom:0pt; text-align:justify; font-size:10pt">
                        <span style="font-family:Cambria">:</span></p>
                </td>
                <td colspan="6" style="width:458.05pt; padding-right:5.4pt; padding-left:5.4pt; vertical-align:top">
                    <p style="margin-top:0pt; margin-bottom:0pt; text-align:justify; font-size:10pt">
                        <span style="font-family:Cambria">Hutang ini akan saya di lunasi selambat-lambatnya pada waktu
                            tanggal pelunasan maksimal.</span></p>
                </td>
            </tr>
            <tr>
                <td style="width:45.65pt; padding-right:5.4pt; padding-left:5.4pt; vertical-align:top">
                    <p style="margin-top:0pt; margin-bottom:0pt; text-align:justify; font-size:10pt">
                        <span style="font-family:Cambria">Pasal 6</span></p>
                </td>
                <td style="width:3.4pt; padding-right:5.4pt; padding-left:5.4pt; vertical-align:top">
                    <p style="margin-top:0pt; margin-bottom:0pt; text-align:justify; font-size:10pt">
                        <span style="font-family:Cambria">:</span></p>
                </td>
                <td colspan="6" style="width:458.05pt; padding-right:5.4pt; padding-left:5.4pt; vertical-align:top">
                    <p style="margin-top:0pt; margin-bottom:0pt; text-align:justify; font-size:10pt">
                        <span style="font-family:Cambria">Apabila
                            ada keterlambatan pembayaran, maka saya bersedia membayar denda 0,5%
                            dari sisa angsuran tertunggak setiap harinya (hari minggu tetap
                            dikenakan denda). Denda di hitung setelah keterlambatan 3 (tiga) hari
                            sejak jatuh tempo pembayaran.</span></p>
                </td>
            </tr>
            <tr>
                <td style="width:45.65pt; padding-right:5.4pt; padding-left:5.4pt; vertical-align:top">
                    <p style="margin-top:0pt; margin-bottom:0pt; text-align:justify; font-size:10pt">
                        <span style="font-family:Cambria">Pasal 7</span></p>
                </td>
                <td style="width:3.4pt; padding-right:5.4pt; padding-left:5.4pt; vertical-align:top">
                    <p style="margin-top:0pt; margin-bottom:0pt; text-align:justify; font-size:10pt">
                        <span style="font-family:Cambria">: </span></p>
                </td>
                <td colspan="6" style="width:458.05pt; padding-right:5.4pt;  text-align:justify; padding-left:5.4pt; vertical-align:top">
                    <p style="margin-top:0pt; margin-left:1.55pt; margin-bottom:0pt; text-align:justify; font-size:10pt">
                        <span style="font-family:Cambria">Apabila
                            Yang Berhutang melunasi hutangnya sebelum berakhirnya jangka waktu
                            pelunasan maksimal, (Pelunasan di percepat), maka atas pelunasan
                            tersebut yang wajib di bayarkan adalah sejumlah: Sisa Pokok Pinjaman di
                            tambah bunga 2 bulan dan denda (bila ada).</span></p>
                </td>
            </tr>
            <tr>
                <td style="width:45.65pt; padding-right:5.4pt; padding-left:5.4pt; vertical-align:top">
                    <p style="margin-top:0pt; margin-bottom:0pt; text-align:justify; font-size:10pt">
                        <span style="font-family:Cambria">Pasal 8</span><span
                            style="width:5.10pt; display:inline-block">&nbsp;</span>
                        <span style="font-family:Cambria">:</span></p>
                </td>
                <td style="width:3.4pt; padding-right:5.4pt; padding-left:5.4pt; vertical-align:top">
                    <p style="margin-top:0pt; margin-bottom:0pt; text-align:justify; font-size:10pt">
                        <span style="font-family:Cambria">:</span></p>
                </td>
                <td colspan="6" style="width:458.05pt; padding-right:5.4pt; padding-left:5.4pt; vertical-align:top">
                    <p style="margin-top:0pt; margin-left:1.55pt; margin-bottom:0pt; text-align:justify; font-size:10pt">
                        <span style="font-family:Cambria">Selama
                            masa kredit (hutang belum lunas), saya tidak akan merubah bentuk
                            kendaraan / memindah tangankan kandaraan yang saya jaminkan tersebut di
                            atas ke Pihak Manapun tanpa sepengetahuan pihak KSP Sido Mukti Makmur
                            (penggelapan). Apabila saya terbukti melakukan hal tersebut, saya
                            bersedia di tuntut secara hukum, dan pihak KSP Sido Mukti Makmur
                            berwenang untuk mengambil unit tersebut dimanapun berada.</span></p>
                </td>
            </tr>
            <tr>
                <td style="width:45.65pt; padding-right:5.4pt; padding-left:5.4pt; vertical-align:top">
                    <p style="margin-top:0pt; margin-bottom:0pt; text-align:justify; font-size:10pt">
                        <span style="font-family:Cambria">Pasal 9</span></p>
                </td>
                <td style="width:3.4pt; padding-right:5.4pt; padding-left:5.4pt; vertical-align:top">
                    <p style="margin-top:0pt; margin-bottom:0pt; text-align:justify; font-size:10pt">
                        <span style="font-family:Cambria">:</span></p>
                </td>
                <td colspan="6" style="width:458.05pt; padding-right:5.4pt; padding-left:5.4pt; vertical-align:top">
                    <p style="margin-top:0pt; margin-bottom:0pt; text-align:justify; font-size:10pt">
                        <span style="font-family:Cambria">Apabila
                            dalam 2 (dua) bulan berturut-turut&nbsp; saya tidak bisa memenuhi
                            kewajiban mengangsur/membayar angsuran , maka Satu Unit </span>
                        <span style="font-family:Cambria"><?php echo $jaminan_data->jam_unit ?></span>
                        <span style="font-family:Cambria">&nbsp; Beserta Surat Kelengapanya tersebut akan Saya
                            serahkan&nbsp; kepada KSP Sido Mukti Makmur untuk proses selanjutnya.</span></p>
                </td>
            </tr>
            <tr>
                <td colspan="8" style="width:528.7pt; padding-right:5.4pt; padding-left:5.4pt; vertical-align:top">
                    <p style="margin-top:0pt; margin-bottom:0pt; text-align:justify; font-size:10pt"><span
                            style="font-family:Cambria">Demikian
                            surat pernyataan ini saya buat dengan sebenarnya dan dalam keadaan
                            sehat jasmani dan rohani serta tidak ada unsur paksaan dari pihak
                            manapun dan dapat digunakan sesuai hukum yang berlaku.</span></p>
                </td>
            </tr>
            <tr style="height:0pt">
                <td style="width:56.45pt"></td>
                <td style="width:14.2pt"></td>
                <td style="width:127.55pt"></td>
                <td style="width:14.2pt"></td>
                <td style="width:14.15pt"></td>
                <td style="width:63.10pt"></td>
                <td style="width:14.2pt"></td>
                <td style="width:234.95pt"></td>
            </tr>
        </tbody>
    </table>
    <p style="margin-top:0pt; margin-bottom:0pt; font-size:10pt">
        <span style="width:36pt; display:inline-block">&nbsp;</span></p>
   
        <table id="06" style="border-collapse:collapse" cellspacing="0" cellpadding="0">
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
<table id="05" style="border-collapse:collapse" cellspacing="0" cellpadding="0">
            <tr style="height:74.5pt">
                <td style="width:153.7pt; padding-right:5.4pt; padding-left:5.4pt; vertical-align:top">
                    <p style="margin-top:0pt; margin-bottom:0pt; text-align:center; font-size:10pt"><span
                            style="font-family:Cambria">&nbsp;&nbsp;&nbsp;a.n </span><span style="font-family:Cambria">Direktur</span></p>
                    <p style="margin-top:0pt; margin-bottom:0pt; text-align:center; font-size:10pt"><span
                            style="font-family:Cambria">KSP Sido Mukti </span><span
                            style="font-family:Cambria">Makmur</span></p>
                    <p style="margin-top:0pt; margin-bottom:0pt; text-align:center; font-size:10pt"><span
                            style="font-family:Cambria">&nbsp;</span></p>
                    <p style="margin-top:0pt; margin-bottom:0pt; text-align:center; font-size:10pt"><span
                            style="font-family:Cambria">&nbsp;</span></p>
                    <p style="margin-top:0pt; margin-bottom:0pt; text-align:center; font-size:10pt"><span
                            style="font-family:Cambria">&nbsp;</span></p>
                    <p style="margin-top:0pt; margin-bottom:0pt; text-align:center; font-size:10pt"><span
                            style="font-family:Cambria">&nbsp;</span></p>
            
                    <p style="margin-top:0pt; margin-bottom:0pt; text-align:center; font-size:10pt"><span
                            style="font-family:Cambria">&nbsp;</span></p>
                    <p style="margin-top:0pt; margin-bottom:0pt; text-align:center; font-size:10pt"><span
                            style="font-family:Cambria; font-weight:bold">(</span><span
                            style="font-family:Cambria; font-weight:bold">Dina Andriyanti, S.Akun</span><span
                            style="font-family:Cambria; font-weight:bold">)</span></p>
                </td>
                <td style="width:153.7pt; padding-right:5.4pt; padding-left:5.4pt; vertical-align:top">
                    <p style="margin-top:0pt; margin-bottom:0pt; text-align:center; font-size:10pt"><span
                            style="font-family:Cambria; font-weight:bold">&nbsp;</span></p>
                    <p style="margin-top:0pt; margin-bottom:0pt; text-align:center; font-size:10pt"><span
                            style="font-family:Cambria">Kepala Bagian Pinjaman</span></p>
                    <p style="margin-top:0pt; margin-bottom:0pt; text-align:center; font-size:10pt"><span
                            style="font-family:Cambria; font-weight:bold">&nbsp;</span></p>
                    <p style="margin-top:0pt; margin-bottom:0pt; font-size:10pt"><span
                            style="font-family:Cambria; font-weight:bold">&nbsp;</span></p>
                    <p style="margin-top:0pt; margin-bottom:0pt; text-align:center; font-size:10pt"><span
                            style="font-family:Cambria">&nbsp;</span></p>

                    <p style="margin-top:0pt; margin-bottom:0pt; text-align:center; font-size:10pt"><span
                            style="font-family:Cambria; font-weight:bold">&nbsp;</span></p>
                    <p style="margin-top:0pt; margin-bottom:0pt; text-align:center; font-size:10pt"><span
                            style="font-family:Cambria; font-weight:bold">&nbsp;</span></p>
                    <p style="margin-top:0pt; margin-bottom:0pt; text-align:center; font-size:10pt"><span
                            style="font-family:Cambria; font-weight:bold">(Vika Amelia N, S.E)</span></p>
                </td>
                <td colspan="2" style="width:153.7pt; padding-right:5.4pt; padding-left:5.4pt; vertical-align:top">
                    <p style="margin-top:0pt; margin-bottom:0pt; text-align:center; font-size:10pt"><span
                            style="font-family:Cambria; font-weight:bold">&nbsp;</span></p>
                    <p style="margin-top:0pt; margin-bottom:0pt; text-align:center; font-size:10pt"><span
                            style="font-family:Cambria">Yang Menyatakan</span></p>
                    <p style="margin-top:0pt; margin-bottom:0pt; text-align:center; font-size:10pt"><span
                            style="font-family:Cambria">&nbsp;</span></p>
                    <p style="margin-top:0pt; margin-bottom:0pt; text-align:center; font-size:10pt"><span
                            style="font-family:Cambria">&nbsp;</span></p>
                    <p style="margin-top:0pt; margin-bottom:0pt; font-size:10pt">
                    <p style="margin-top:0pt; margin-bottom:0pt; text-align:center; font-size:10pt"><span
                            style="font-family:Cambria">&nbsp;</span></p>

                    <p style="margin-top:0pt; margin-bottom:0pt; text-align:center; font-size:10pt"><span
                            style="font-family:Cambria; font-weight:bold">&nbsp;</span></p>
                    <p style="margin-top:0pt; margin-bottom:0pt; text-align:center; font-size:10pt"><span
                            style="font-family:Cambria; font-weight:bold">&nbsp;</span></p>
                    <p style="margin-top:0pt; margin-bottom:0pt; text-align:center; font-size:10pt"><span
                            style="font-family:Cambria; font-weight:bold">( </span><span
                            style="font-family:Cambria; font-weight:bold"><?php echo $ang_nama ?></span><span
                            style="font-family:Cambria; font-weight:bold"> )</span></p>
                </td>
                <td style="vertical-align:top"></td>
            </tr>
            <tr style="height:70.65pt">
                <td style="width:153.7pt; padding-right:5.4pt; padding-left:5.4pt; vertical-align:top">
                    <p style="margin-top:0pt; margin-bottom:0pt; font-size:10pt"><span
                            style="font-family:Cambria">&nbsp;</span></p>
                            <p style="margin-top:0pt; margin-bottom:0pt; text-align:center; font-size:10pt"><span
                            style="font-family:Cambria">&nbsp;</span>
                    <p style="margin-top:0pt; margin-bottom:0pt; text-align:center; font-size:10pt"><span
                            style="font-family:Cambria">Kepala</span><span style="font-family:Cambria"> </span><span
                            style="font-family:Cambria">Desa</span></p>
                    <p style="margin-top:0pt; margin-bottom:0pt; text-align:center; font-size:10pt"><span
                            style="font-family:Cambria">&nbsp;</span></p>
                    <p style="margin-top:0pt; margin-bottom:0pt; text-align:center; font-size:10pt">
                    <p style="margin-top:0pt; margin-bottom:0pt; text-align:center; font-size:10pt"><span
                            style="font-family:Cambria">&nbsp;</span>
                    <p style="margin-top:0pt; margin-bottom:0pt; text-align:center; font-size:10pt"><span
                            style="font-family:Cambria">&nbsp;</span></p>
                    <p style="margin-top:0pt; margin-bottom:0pt; text-align:center; font-size:10pt"><span
                            style="font-family:Cambria">&nbsp;</span></p>
                    <p style="margin-top:0pt; margin-bottom:0pt; text-align:center; font-size:10pt"><span
                            style="font-family:Cambria">&nbsp;</span></p>
                    <p style="margin-top:0pt; margin-bottom:0pt; text-align:center; font-size:10pt"><span
                            style="font-family:Cambria; font-weight:bold">(……………………………………)</span></p>
                </td>
                <td style="width:153.7pt; padding-right:5.4pt; padding-left:5.4pt; vertical-align:top">
                    <p style="margin-top:0pt; margin-bottom:0pt; text-align:center; font-size:10pt">
                    <p style="margin-top:0pt; margin-bottom:0pt; text-align:center; font-size:10pt"><span
                            style="font-family:Cambria">&nbsp;</span>
                            <p style="margin-top:0pt; margin-bottom:0pt; text-align:center; font-size:10pt"><span
                            style="font-family:Cambria">&nbsp;</span>
                    <span style="font-family:Cambria">Mengetahui</span><span style="font-family:Cambria">,</span></p>
                </td>
                <td colspan="2" style="width:153.7pt; padding-right:5.4pt; padding-left:5.4pt; vertical-align:top">
                    <p style="margin-top:0pt; margin-bottom:0pt; font-size:10pt"><span
                            style="font-family:Cambria">&nbsp;</span></p>
                            <p style="margin-top:0pt; margin-bottom:0pt; text-align:center; font-size:10pt"><span
                            style="font-family:Cambria">&nbsp;</span>
                    <p style="margin-top:0pt; margin-bottom:0pt; text-align:center; font-size:10pt"><span
                            style="font-family:Cambria"><?php echo $penjamin_data->pen_hubungan ?></span></p>
                    <p style="margin-top:0pt; margin-bottom:0pt; text-align:center; font-size:10pt"><span
                            style="font-family:Cambria">&nbsp;</span></p>
                    <p style="margin-top:0pt; margin-bottom:0pt; text-align:center; font-size:10pt"><span
                            style="font-family:Cambria">&nbsp;</span></p>
                    <p style="margin-top:0pt; margin-bottom:0pt; font-size:10pt">
                    <p style="margin-top:0pt; margin-bottom:0pt; text-align:center; font-size:10pt"><span
                            style="font-family:Cambria">&nbsp;</span>
                    <p style="margin-top:0pt; margin-bottom:0pt; text-align:center; font-size:10pt"><span
                            style="font-family:Cambria">&nbsp;</span></p>
                    <p style="margin-top:0pt; margin-bottom:0pt; text-align:center; font-size:10pt"><span
                            style="font-family:Cambria">&nbsp;</span></p>
                    <p style="margin-top:0pt; margin-bottom:0pt; text-align:center; font-size:10pt"><span
                            style="font-family:Cambria; font-weight:bold">(</span><span
                            style="font-family:Cambria; font-weight:bold"><?php echo $penjamin_data->pen_nama ?></span><span
                            style="font-family:Cambria; font-weight:bold">)</span></p>
                </td>
                <td style="vertical-align:top"></td>
            </tr>
            <tr style="height:0pt">
                <td style="width:164.5pt"></td>
                <td style="width:164.5pt"></td>
                <td style="width:25.4pt"></td>
                <td style="width:139.1pt"></td>
                <td style="width:23.9pt"></td>
            </tr>
        </tbody>
    </table>
    </div>
</body>

</html>
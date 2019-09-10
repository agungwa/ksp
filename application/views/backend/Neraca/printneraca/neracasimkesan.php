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
        $pihutanga = ($totalRekeninga*3000000)-$saldoSimkesana;
        $pihutangb = ($totalRekeningb*5000000)-$saldoSimkesanb;
        $pihutangc = ($totalRekeningc*9000000)-$saldoSimkesanc;
        $kas=$saldosimkesan + $saldotitipan - $saldoambiltitipan + $shusimkesandata;
        $jal=$kas + $kasbankdata +$pihutanga + $pihutangb + $pihutangc;
        $jumlahpihutang= $pihutanga + $pihutangb + $pihutangc;

        $hutanga = ($saldoSimkesana/50000) * 17000;
        $hutangb = ($saldoSimkesanb/100000) * 34000;
        $hutangc = ($saldoSimkesanc/150000) * 50000;
        $jkl=$saldoSimkesana+$saldoSimkesanb+$saldoSimkesanc;

        $titipantotal = $saldotitipan - $saldoambiltitipan;
        
        $hutangjangka=$hutanga+$hutangb+$hutangc;
        $jkp=$hutangjangka;
        $pasiva = $jkp+$titipantotal+$shusimkesandata;
        $estimasi=$jal- $pasiva;
        $jumlahpasiva=$jkp+$estimasi+$titipantotal+$shusimkesandata;
        ?>
<body>
    <div>
        <table id="03" style="width:552.6pt; border-collapse:collapse" cellspacing="0" cellpadding="0">
            <tbody>
                <tr>
                    <td
                        style="width:251.2pt; padding-right:5.4pt; padding-left:5.4pt; vertical-align:top; background-color:#ffd965">
                        <p style="margin-top:0pt; margin-bottom:0pt; text-align:center; font-size:14pt"><span
                                style="font-family:Calibri; font-weight:bold">AKTIVA</span></p>
                    </td>
                    <td
                        style="width:279.8pt; padding-right:5.4pt; padding-left:5.4pt; vertical-align:top; background-color:#ffd965">
                        <p style="margin-top:0pt; margin-bottom:0pt; text-align:center; font-size:14pt"><span
                                style="font-family:Calibri; font-weight:bold">PASIVA</span></p>
                    </td>
                </tr>
            </tbody>
        </table>
        <p style="margin-top:0pt; margin-bottom:8pt; line-height:108%; font-size:11pt"><span
                style="font-family:Calibri">&nbsp;</span></p>
        <table style="width:552.6pt; border-collapse:collapse" cellspacing="0" cellpadding="0">
            <tbody>
                <tr>
                    <td colspan="2" style="width:251.2pt; padding-right:5.4pt; padding-left:5.4pt; vertical-align:top">
                        <p style="margin-top:0pt; margin-bottom:0pt; font-size:12pt"><span
                                style="font-family:Calibri">AKTIVA LANCAR</span></p>
                    </td>
                    <td colspan="2" style="width:279.8pt; padding-right:5.4pt; padding-left:5.4pt; vertical-align:top">
                        <p style="margin-top:0pt; margin-bottom:0pt; font-size:12pt"><span
                                style="font-family:Calibri">KEWAJIBAN LANCAR</span></p>
                    </td>
                </tr>
                <tr>
                    <td style="width:116.55pt; padding-right:5.4pt; padding-left:5.4pt; vertical-align:top">
                        <p style="margin-top:0pt; margin-bottom:0pt; font-size:12pt"><span
                                style="font-family:Calibri">Kas</span></p>
                    </td>
                    <td style="width:123.85pt; padding-right:5.4pt; padding-left:5.4pt; vertical-align:top">
                        <p style="margin-top:0pt; margin-bottom:0pt; font-size:12pt"><span
                                style="font-family:Calibri"><?= neraca($kas);?></span></p>
                    </td>
                    <td style="width:152.2pt; padding-right:5.4pt; padding-left:5.4pt; vertical-align:top">
                        <p style="margin-top:0pt; margin-bottom:0pt; font-size:12pt"><span
                                style="font-family:Calibri">Hutang</span><span style="font-family:Calibri"> </span><span
                                style="font-family:Calibri">Pokok</span></p>
                    </td>
                    <td style="width:116.8pt; padding-right:5.4pt; padding-left:5.4pt; vertical-align:top">
                        <p style="margin-top:0pt; margin-bottom:0pt; font-size:12pt"><span
                                style="font-family:Calibri">&nbsp;</span></p>
                    </td>
                </tr>
                <tr>
                    <td style="width:116.55pt; padding-right:5.4pt; padding-left:5.4pt; vertical-align:top">
                        <p style="margin-top:0pt; margin-bottom:0pt; font-size:12pt"><span
                                style="font-family:Calibri">Kas Di Bank</span></p>
                    </td>
                    <td style="width:123.85pt; padding-right:5.4pt; padding-left:5.4pt; vertical-align:top">
                        <p style="margin-top:0pt; margin-bottom:0pt; font-size:12pt"><span
                                style="font-family:Calibri"><?= neraca($kasbankdata);?></span></p>
                    </td>
                    <td style="width:152.2pt; padding-right:5.4pt; padding-left:5.4pt; vertical-align:top">
                        <p style="margin-top:0pt; margin-bottom:0pt; font-size:12pt"><span
                                style="font-family:Calibri">Plan A</span></p>
                    </td>
                    <td style="width:116.8pt; padding-right:5.4pt; padding-left:5.4pt; vertical-align:top">
                        <p style="margin-top:0pt; margin-bottom:0pt; font-size:12pt"><span
                                style="font-family:Calibri"><?= neraca($saldoSimkesana);?></span>
                        </p>
                    </td>
                </tr>
                <tr>
                    <td style="width:116.55pt; padding-right:5.4pt; padding-left:5.4pt; vertical-align:top">
                        <p style="margin-top:0pt; margin-bottom:0pt; font-size:12pt"><span
                                style="font-family:Calibri">PIUTANG</span></p>
                    </td>
                    <td style="width:123.85pt; padding-right:5.4pt; padding-left:5.4pt; vertical-align:top">
                        <p style="margin-top:0pt; margin-bottom:0pt; font-size:12pt"><span
                                style="font-family:Calibri">&nbsp;</span></p>
                    </td>
                    <td style="width:152.2pt; padding-right:5.4pt; padding-left:5.4pt; vertical-align:top">
                        <p style="margin-top:0pt; margin-bottom:0pt; font-size:12pt"><span
                                style="font-family:Calibri">Plan</span><span style="font-family:Calibri"> B</span></p>
                    </td>
                    <td style="width:116.8pt; padding-right:5.4pt; padding-left:5.4pt; vertical-align:top">
                        <p style="margin-top:0pt; margin-bottom:0pt; font-size:12pt"><span
                                style="font-family:Calibri"><?= neraca($saldoSimkesanb);?></span>
                        </p>
                    </td>
                </tr>
                <tr>
                    <td style="width:116.55pt; padding-right:5.4pt; padding-left:5.4pt; vertical-align:top">
                        <p style="margin-top:0pt; margin-bottom:0pt; font-size:12pt"><span
                                style="font-family:Calibri">Plan A</span></p>
                    </td>
                    <td style="width:123.85pt; padding-right:5.4pt; padding-left:5.4pt; vertical-align:top">
                        <p style="margin-top:0pt; margin-bottom:0pt; font-size:12pt"><span
                                style="font-family:Calibri"><?= rupiah($pihutanga);?></p>
                    </td>
                    <td style="width:152.2pt; padding-right:5.4pt; padding-left:5.4pt; vertical-align:top">
                        <p style="margin-top:0pt; margin-bottom:0pt; font-size:12pt"><span
                                style="font-family:Calibri">Plan C</span></p>
                    </td>
                    <td style="width:116.8pt; padding-right:5.4pt; padding-left:5.4pt; vertical-align:top">
                        <p style="margin-top:0pt; margin-bottom:0pt; font-size:12pt"><span
                                style="font-family:Calibri"><?= neraca($saldoSimkesanc);?></span>
                        </p>
                    </td>
                </tr>
                <tr>
                    <td style="width:116.55pt; padding-right:5.4pt; padding-left:5.4pt; vertical-align:top">
                        <p style="margin-top:0pt; margin-bottom:0pt; font-size:12pt"><span
                                style="font-family:Calibri">Plan B</span></p>
                    </td>
                    <td style="width:123.85pt; padding-right:5.4pt; padding-left:5.4pt; vertical-align:top">
                        <p style="margin-top:0pt; margin-bottom:0pt; font-size:12pt"><span
                                style="font-family:Calibri"><?= rupiah($pihutangb);?></span></p>
                    </td>
                    <td
                        style="width:152.2pt; padding-right:5.4pt; padding-left:5.4pt; vertical-align:top; background-color:#ffff00">
                        <p style="margin-top:0pt; margin-bottom:0pt; font-size:12pt"><span
                                style="font-family:Calibri">Jumlah</span><span style="font-family:Calibri"> </span><span
                                style="font-family:Calibri">Hutang</span><span style="font-family:Calibri"> </span><span
                                style="font-family:Calibri">Pokok</span></p>
                    </td>
                    <td
                        style="width:116.8pt; padding-right:5.4pt; padding-left:5.4pt; vertical-align:top; background-color:#ffff00">
                        <p style="margin-top:0pt; margin-bottom:0pt; font-size:12pt"><span
                                style="font-family:Calibri"><?= neraca($jkl);?></span></p>
                    </td>
                </tr>
                <tr>
                    <td style="width:116.55pt; padding-right:5.4pt; padding-left:5.4pt; vertical-align:top">
                        <p style="margin-top:0pt; margin-bottom:0pt; font-size:12pt"><span
                                style="font-family:Calibri">Plan C</span></p>
                    </td>
                    <td style="width:123.85pt; padding-right:5.4pt; padding-left:5.4pt; vertical-align:top">
                        <p style="margin-top:0pt; margin-bottom:0pt; font-size:12pt"><span
                                style="font-family:Calibri"><?= rupiah($pihutangc);?></span>
                        </p>
                    </td>
                    <td colspan="2" style="width:279.8pt; padding-right:5.4pt; padding-left:5.4pt; vertical-align:top">
                        <p style="margin-top:0pt; margin-bottom:0pt; font-size:12pt"><span
                                style="font-family:Calibri">KEWAJIBAN MASA DEPAN</span></p>
                    </td>
                </tr>
                <tr>
                    <td
                        style="width:116.55pt; padding-right:5.4pt; padding-left:5.4pt; vertical-align:top; background-color:#ffff00">
                        <p style="margin-top:0pt; margin-bottom:0pt; font-size:12pt"><span
                                style="font-family:Calibri">Jumlah</span><span style="font-family:Calibri"> </span><span
                                style="font-family:Calibri">Piutang</span></p>
                    </td>
                    <td
                        style="width:123.85pt; padding-right:5.4pt; padding-left:5.4pt; vertical-align:top; background-color:#ffff00">
                        <p style="margin-top:0pt; margin-bottom:0pt; font-size:12pt"><span
                                style="font-family:Calibri"><?= neraca($jumlahpihutang);?></span></p>
                    </td>
                    <td style="width:152.2pt; padding-right:5.4pt; padding-left:5.4pt; vertical-align:top">
                        <p style="margin-top:0pt; margin-bottom:0pt; font-size:12pt"><span
                                style="font-family:Calibri">Plan A</span></p>
                    </td>
                    <td style="width:116.8pt; padding-right:5.4pt; padding-left:5.4pt; vertical-align:top">
                        <p style="margin-top:0pt; margin-bottom:0pt; font-size:12pt"><span
                                style="font-family:Calibri"><?= neraca($saldoSimkesana);?></span>
                        </p>
                    </td>
                </tr>
                <tr>
                    <td style="width:116.55pt; padding-right:5.4pt; padding-left:5.4pt; vertical-align:top">
                        <p style="margin-top:0pt; margin-bottom:0pt; font-size:12pt"><span
                                style="font-family:Calibri">&nbsp;</span></p>
                    </td>
                    <td style="width:123.85pt; padding-right:5.4pt; padding-left:5.4pt; vertical-align:top">
                        <p style="margin-top:0pt; margin-bottom:0pt; font-size:12pt"><span
                                style="font-family:Calibri">&nbsp;</span></p>
                    </td>
                    <td style="width:152.2pt; padding-right:5.4pt; padding-left:5.4pt; vertical-align:top">
                        <p style="margin-top:0pt; margin-bottom:0pt; font-size:12pt"><span
                                style="font-family:Calibri">Plan B</span></p>
                    </td>
                    <td style="width:116.8pt; padding-right:5.4pt; padding-left:5.4pt; vertical-align:top">
                        <p style="margin-top:0pt; margin-bottom:0pt; font-size:12pt"><span
                                style="font-family:Calibri"><?= neraca($saldoSimkesanb);?></span>
                        </p>
                    </td>
                </tr>
                <tr>
                    <td style="width:116.55pt; padding-right:5.4pt; padding-left:5.4pt; vertical-align:top">
                        <p style="margin-top:0pt; margin-bottom:0pt; font-size:12pt"><span
                                style="font-family:Calibri">&nbsp;</span></p>
                    </td>
                    <td style="width:123.85pt; padding-right:5.4pt; padding-left:5.4pt; vertical-align:top">
                        <p style="margin-top:0pt; margin-bottom:0pt; font-size:12pt"><span
                                style="font-family:Calibri">&nbsp;</span></p>
                    </td>
                    <td style="width:152.2pt; padding-right:5.4pt; padding-left:5.4pt; vertical-align:top">
                        <p style="margin-top:0pt; margin-bottom:0pt; font-size:12pt"><span
                                style="font-family:Calibri">Plan C</span></p>
                    </td>
                    <td style="width:116.8pt; padding-right:5.4pt; padding-left:5.4pt; vertical-align:top">
                        <p style="margin-top:0pt; margin-bottom:0pt; font-size:12pt"><span
                                style="font-family:Calibri"><?= neraca($saldoSimkesanc);?></span>
                        </p>
                    </td>
                </tr>
                <tr>
                    <td style="width:116.55pt; padding-right:5.4pt; padding-left:5.4pt; vertical-align:top">
                        <p style="margin-top:0pt; margin-bottom:0pt; font-size:12pt"><span
                                style="font-family:Calibri">&nbsp;</span></p>
                    </td>
                    <td style="width:123.85pt; padding-right:5.4pt; padding-left:5.4pt; vertical-align:top">
                        <p style="margin-top:0pt; margin-bottom:0pt; font-size:12pt"><span
                                style="font-family:Calibri">&nbsp;</span></p>
                    </td>
                    <td
                        style="width:152.2pt; padding-right:5.4pt; padding-left:5.4pt; vertical-align:top; background-color:#ffff00">
                        <p style="margin-top:0pt; margin-bottom:0pt; font-size:12pt"><span
                                style="font-family:Calibri">Jumlah</span><span style="font-family:Calibri"> </span><span
                                style="font-family:Calibri">Kewajiban</span><span style="font-family:Calibri"> Masa
                            </span><span style="font-family:Calibri">Depan</span></p>
                    </td>
                    <td
                        style="width:116.8pt; padding-right:5.4pt; padding-left:5.4pt; vertical-align:top; background-color:#ffff00">
                        <p style="margin-top:0pt; margin-bottom:0pt; font-size:12pt"><span
                                style="font-family:Calibri"><?= neraca($jkp);?></span></p>
                    </td>
                </tr>
                <tr>
                    <td style="width:116.55pt; padding-right:5.4pt; padding-left:5.4pt; vertical-align:top">
                        <p style="margin-top:0pt; margin-bottom:0pt; font-size:12pt"><span
                                style="font-family:Calibri">&nbsp;</span></p>
                    </td>
                    <td style="width:123.85pt; padding-right:5.4pt; padding-left:5.4pt; vertical-align:top">
                        <p style="margin-top:0pt; margin-bottom:0pt; font-size:12pt"><span
                                style="font-family:Calibri">&nbsp;</span></p>
                    </td>
                    <td style="width:152.2pt; padding-right:5.4pt; padding-left:5.4pt; vertical-align:top">
                        <p style="margin-top:0pt; margin-bottom:0pt; font-size:12pt"><span
                                style="font-family:Calibri">Estimasi</span><span style="font-family:Calibri">
                            </span><span style="font-family:Calibri">Kewajiban</span><span style="font-family:Calibri">
                            </span><span style="font-family:Calibri">Klaim</span></p>
                    </td>
                    <td style="width:116.8pt; padding-right:5.4pt; padding-left:5.4pt; vertical-align:top">
                        <p style="margin-top:0pt; margin-bottom:0pt; font-size:12pt"><span
                                style="font-family:Calibri"><?= neraca($estimasi);?></span>
                        </p>
                    </td>
                </tr>
                <tr>
                    <td style="width:116.55pt; padding-right:5.4pt; padding-left:5.4pt; vertical-align:top">
                        <p style="margin-top:0pt; margin-bottom:0pt; font-size:12pt"><span
                                style="font-family:Calibri">&nbsp;</span></p>
                    </td>
                    <td style="width:123.85pt; padding-right:5.4pt; padding-left:5.4pt; vertical-align:top">
                        <p style="margin-top:0pt; margin-bottom:0pt; font-size:12pt"><span
                                style="font-family:Calibri">&nbsp;</span></p>
                    </td>
                    <td
                        style="width:152.2pt; padding-right:5.4pt; padding-left:5.4pt; vertical-align:top; background-color:#ffff00">
                        <p style="margin-top:0pt; margin-bottom:0pt; font-size:12pt"><span
                                style="font-family:Calibri">Jumlah</span><span style="font-family:Calibri"> </span><span
                                style="font-family:Calibri">Kewajiban</span><span style="font-family:Calibri">
                            </span><span style="font-family:Calibri">Lancar</span></p>
                    </td>
                    <td
                        style="width:116.8pt; padding-right:5.4pt; padding-left:5.4pt; vertical-align:top; background-color:#ffff00">
                        <p style="margin-top:0pt; margin-bottom:0pt; font-size:12pt"><span
                                style="font-family:Calibri"><?= neraca($estimasi+$jkp);?></span></p>
                    </td>
                </tr>
                <tr>
                    <td style="width:116.55pt; padding-right:5.4pt; padding-left:5.4pt; vertical-align:top">
                        <p style="margin-top:0pt; margin-bottom:0pt; font-size:12pt"><span
                                style="font-family:Calibri">&nbsp;</span></p>
                    </td>
                    <td style="width:123.85pt; padding-right:5.4pt; padding-left:5.4pt; vertical-align:top">
                        <p style="margin-top:0pt; margin-bottom:0pt; font-size:12pt"><span
                                style="font-family:Calibri">&nbsp;</span></p>
                    </td>
                    <td style="width:152.2pt; padding-right:5.4pt; padding-left:5.4pt; vertical-align:top">
                        <p style="margin-top:0pt; margin-bottom:0pt; font-size:12pt"><span
                                style="font-family:Calibri">Titipan</span></p>
                    </td>
                    <td style="width:116.8pt; padding-right:5.4pt; padding-left:5.4pt; vertical-align:top">
                        <p style="margin-top:0pt; margin-bottom:0pt; font-size:12pt"><span
                                style="font-family:Calibri"><?= neraca($titipantotal);?></span></p>
                    </td>
                </tr>
                <tr>
                    <td style="width:116.55pt; padding-right:5.4pt; padding-left:5.4pt; vertical-align:top">
                        <p style="margin-top:0pt; margin-bottom:0pt; font-size:12pt"><span
                                style="font-family:Calibri">&nbsp;</span></p>
                    </td>
                    <td style="width:123.85pt; padding-right:5.4pt; padding-left:5.4pt; vertical-align:top">
                        <p style="margin-top:0pt; margin-bottom:0pt; font-size:12pt"><span
                                style="font-family:Calibri">&nbsp;</span></p>
                    </td>
                    <td colspan="2" style="width:279.8pt; padding-right:5.4pt; padding-left:5.4pt; vertical-align:top">
                        <p style="margin-top:0pt; margin-bottom:0pt; font-size:12pt"><span
                                style="font-family:Calibri">EKUITAS</span></p>
                    </td>
                </tr>
                <tr>
                    <td style="width:116.55pt; padding-right:5.4pt; padding-left:5.4pt; vertical-align:top">
                        <p style="margin-top:0pt; margin-bottom:0pt; font-size:12pt"><span
                                style="font-family:Calibri">&nbsp;</span></p>
                    </td>
                    <td style="width:123.85pt; padding-right:5.4pt; padding-left:5.4pt; vertical-align:top">
                        <p style="margin-top:0pt; margin-bottom:0pt; font-size:12pt"><span
                                style="font-family:Calibri">&nbsp;</span></p>
                    </td>
                    <td style="width:152.2pt; padding-right:5.4pt; padding-left:5.4pt; vertical-align:top">
                        <p style="margin-top:0pt; margin-bottom:0pt; font-size:12pt"><span
                                style="font-family:Calibri">SHU</span></p>
                    </td>
                    <td style="width:116.8pt; padding-right:5.4pt; padding-left:5.4pt; vertical-align:top">
                        <p style="margin-top:0pt; margin-bottom:0pt; font-size:12pt"><span
                                style="font-family:Calibri"><?= neraca($shusimkesandata);?></span></p>
                    </td>
                </tr>
                <tr>
                    <td style="width:116.55pt; padding-right:5.4pt; padding-left:5.4pt; vertical-align:top">
                        <p style="margin-top:0pt; margin-bottom:0pt; font-size:12pt"><span
                                style="font-family:Calibri">&nbsp;</span></p>
                    </td>
                    <td style="width:123.85pt; padding-right:5.4pt; padding-left:5.4pt; vertical-align:top">
                        <p style="margin-top:0pt; margin-bottom:0pt; font-size:12pt"><span
                                style="font-family:Calibri">&nbsp;</span></p>
                    </td>
                    <td
                        style="width:152.2pt; padding-right:5.4pt; padding-left:5.4pt; vertical-align:top; background-color:#ffff00">
                        <p style="margin-top:0pt; margin-bottom:0pt; font-size:12pt"><span
                                style="font-family:Calibri">Jumlah</span><span style="font-family:Calibri"> </span><span
                                style="font-family:Calibri">Ekuitas</span></p>
                    </td>
                    <td
                        style="width:116.8pt; padding-right:5.4pt; padding-left:5.4pt; vertical-align:top; background-color:#ffff00">
                        <p style="margin-top:0pt; margin-bottom:0pt; font-size:12pt"><span
                                style="font-family:Calibri"><?= neraca($shusimkesandata);?></span></p>
                    </td>
                </tr>
                <tr style="height:4.75pt">
                    <td
                        style="width:116.55pt; padding-right:5.4pt; padding-left:5.4pt; vertical-align:top; background-color:#ff99cc">
                        <p style="margin-top:0pt; margin-bottom:0pt; font-size:12pt"><span
                                style="font-family:Calibri">Jumlah</span><span style="font-family:Calibri"> </span><span
                                style="font-family:Calibri">Aktiva</span></p>
                    </td>
                    <td
                        style="width:123.85pt; padding-right:5.4pt; padding-left:5.4pt; vertical-align:top; background-color:#ff99cc">
                        <p style="margin-top:0pt; margin-bottom:0pt; font-size:12pt"><span
                                style="font-family:Calibri"><?= rupiah($jal);?></span></p>
                    </td>
                    <td
                        style="width:152.2pt; padding-right:5.4pt; padding-left:5.4pt; vertical-align:top; background-color:#ff99cc">
                        <p style="margin-top:0pt; margin-bottom:0pt; font-size:12pt"><span
                                style="font-family:Calibri">Jumlah</span><span style="font-family:Calibri"> </span><span
                                style="font-family:Calibri">Pasiva</span></p>
                    </td>
                    <td
                        style="width:116.8pt; padding-right:5.4pt; padding-left:5.4pt; vertical-align:top; background-color:#ff99cc">
                        <p style="margin-top:0pt; margin-bottom:0pt; font-size:12pt"><span
                                style="font-family:Calibri"><?= neraca($jumlahpasiva);?></span></p>
                    </td>
                </tr>
            </tbody>
        </table>
        <p style="margin-top:0pt; margin-bottom:8pt; line-height:108%; font-size:12pt"><span
                style="font-family:Calibri">&nbsp;</span></p>
    </div>
</body>

<?php

function dateFormat($inputDate) {
    $date = date_create($inputDate);

    return date_format($date, "d-m-Y H:i:s");
}

function dateFormataja($inputDate) {
    $date = date_create($inputDate);

    return date_format($date, "d-m-Y");
}

function dateFormatTanggal($inputDate) {
    $date = date_create($inputDate);

    return date_format($date, "d");
}

if( !function_exists('ceiling') )
        {
            function ceiling($number, $significance = 1)
            {
                return ( is_numeric($number) && is_numeric($significance) ) ? (ceil($number/$significance)*$significance) : false;
            }
        }

function rupiah($angka){
	
    $hasil_rupiah = "Rp " . number_format(ceiling($angka,1000),0,',','.');
    return $hasil_rupiah;
         
        }

function rupiahsimpanan($angka){
	
    $hasil_rupiah = "Rp " . number_format(round($angka,-3),0,',','.');
    return $hasil_rupiah;
                 
        }

function neraca($angka){
	
    $hasil_rupiah = "Rp " . number_format($angka,0,',','.');
    return $hasil_rupiah;
                 
        }


function hari_ini(){
            $hari = date ("D");
         
            switch($hari){
                case 'Sun':
                    $hari_ini = "Minggu";
                break;
         
                case 'Mon':			
                    $hari_ini = "Senin";
                break;
         
                case 'Tue':
                    $hari_ini = "Selasa";
                break;
         
                case 'Wed':
                    $hari_ini = "Rabu";
                break;
         
                case 'Thu':
                    $hari_ini = "Kamis";
                break;
         
                case 'Fri':
                    $hari_ini = "Jumat";
                break;
         
                case 'Sat':
                    $hari_ini = "Sabtu";
                break;
                
                default:
                    $hari_ini = "Tidak di ketahui";		
                break;
            }
         
            return "<b>" . $hari_ini . "</b>";
         
        }


        function penyebut($nilai) {
            $nilai = abs($nilai);
            $huruf = array("", "Satu", "Dua", "Tiga", "Empat", "Lima", "Enam", "Tujuh", "Delapan", "Sembilan", "Sepuluh", "Sebelas");
            $temp = "";
            if ($nilai < 12) {
                $temp = " ". $huruf[$nilai];
            } else if ($nilai <20) {
                $temp = penyebut($nilai - 10). " Belas";
            } else if ($nilai < 100) {
                $temp = penyebut($nilai/10)." Puluh". penyebut($nilai % 10);
            } else if ($nilai < 200) {
                $temp = " seratus" . penyebut($nilai - 100);
            } else if ($nilai < 1000) {
                $temp = penyebut($nilai/100) . " Ratus" . penyebut($nilai % 100);
            } else if ($nilai < 2000) {
                $temp = " seribu" . penyebut($nilai - 1000);
            } else if ($nilai < 1000000) {
                $temp = penyebut($nilai/1000) . " Ribu" . penyebut($nilai % 1000);
            } else if ($nilai < 1000000000) {
                $temp = penyebut($nilai/1000000) . " Juta" . penyebut($nilai % 1000000);
            } else if ($nilai < 1000000000000) {
                $temp = penyebut($nilai/1000000000) . " Milyar" . penyebut(fmod($nilai,1000000000));
            } else if ($nilai < 1000000000000000) {
                $temp = penyebut($nilai/1000000000000) . " Trilyun" . penyebut(fmod($nilai,1000000000000));
            }     
            return $temp;
        }
     
        function terbilang($nilai) {
            if($nilai<0) {
                $hasil = "minus ". trim(penyebut($nilai));
            } else {
                $hasil = trim(penyebut($nilai));
            }     		
            return $hasil;
        }

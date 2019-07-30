<?php

function dateFormat($inputDate) {
    $date = date_create($inputDate);

    return date_format($date, "d-m-Y H:i:s");
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
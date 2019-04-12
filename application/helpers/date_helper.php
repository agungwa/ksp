<?php

function dateFormat($inputDate) {
    $date = date_create($inputDate);

    return date_format($date, "d-m-Y H:i:s");
}
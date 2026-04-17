<?php

function gerarSku() {
    return rand(100000000, 999999999);
}

function gerarEan13() {
    $base = "";
    for ($i = 0; $i < 12; $i++) {
        $base .= rand(0, 9);
    }

    $sum = 0;
    for ($i = 0; $i < 12; $i++) {
        $num = intval($base[$i]);
        $sum += ($i % 2 == 0) ? $num : $num * 3;
    }

    $dv = (10 - ($sum % 10)) % 10;
    return $base . $dv;
}
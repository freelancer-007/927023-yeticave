<?php

function include_template($name, $data) {
    $name = 'templates/' . $name;
    $result = '';

    if (!file_exists($name)) {
        return $result;
    }

    ob_start();
    extract($data);
    require $name;

    $result = ob_get_clean();

    return $result;
}


function format_price( float $price ): string {
    $price_rounded = ceil($price);

    if ( $price_rounded >= 1000 ){
        $price_string = (string) $price_rounded;
        $price_start  = substr($price_string, 0, strlen($price_string)-3);
        $price_end = substr($price_string, -3);
        $price_rounded = $price_start . ' ' . $price_end;
    }

    $price_full = $price_rounded . '<b class="rub">р</b>';

    return  $price_full;
}


function time_to_end() {
    $end_time = date_create('now');
    $current_time = date_create('tomorrow midnight');
    $diff = date_diff($current_time, $end_time) ;
    $time_to_end = date_interval_format( $diff, "%h:%i" );

    return $time_to_end;
}
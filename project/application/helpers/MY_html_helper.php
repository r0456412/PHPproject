<?php

function bepaalAchtergrond($afbeelding) {
    return "<body background=\"" . geefVolledigeNaam($afbeelding) . "\">\n";
}

function toonAfbeelding($afbeelding, $attributen = '') {
    return "<img src=\"" . geefVolledigeNaam($afbeelding) . "\"" .
            _stringify_attributes($attributen) . " />\n";
}

function geefVolledigeNaam($object) {
    $CI = & get_instance();
    $CI->load->helper('url');

    return base_url()
            . ltrim(str_replace('\\', '/', str_replace(trim(FCPATH, "/"), "", APPPATH)), "/")
            . $object;
}

function exporteerTabel($array) {
    $resultaat = "";

    $resultaat .= "<table border='linen'>";

    // velden
    $resultaat .= "<tr>";
    // haal de veldnamen op van het 1ste object
    $variabelen = get_object_vars($array[0]);

    foreach ($variabelen as $key => $value) {
        $resultaat .= "<th>$key</th>";
    }
    $resultaat .= "</tr>\n";

    // haal de waardes op van alle objecten
    foreach ($array as $element) {
        $resultaat .= "<tr>";
        $variabelen = get_object_vars($element);
        foreach ($variabelen as $value) {
            $resultaat .= "<td>$value</td>";
        }
        $resultaat .= "</tr>\n";
    }

    $resultaat .= "</table>";
    return $resultaat;
}

function pasStylesheetAan($css) {
    return "<link rel=\"stylesheet\" type=\"text/css\" href=\""
            . geefVolledigeNaam($css) . "\" />";
}
function haalJavascriptOp($js) {
    $CI = & get_instance();
    $CI->load->helper('url');

    return "<script src=\"" . base_url("assets/js/" . $js) . "\"></script>";
}
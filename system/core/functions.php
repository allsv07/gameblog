<?php

function pr($array){
    echo '<pre>' . print_r($array, 1) . '</pre>';
}

function clearStr($str) {
    return htmlspecialchars(strip_tags(trim($str)));
}


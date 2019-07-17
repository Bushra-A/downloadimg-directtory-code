<?php

function getDirectory() {
    $year = date("Y");
    $month = date("m");
    $day = date("d");
    $directory = "./uploads/$year/$month/$day/";
    if (!is_dir($directory)) {
        mkdir($directory, 755, true);
    }
    return $directory;
}

$url = "https://i1.wp.com/cockroachkillergel.ae/wp-content/uploads/2019/06/HVBJH.jpg";
echo saveImage($url); // use of function

function saveImage($url) {

    $mimeType = getimagesize($url);

    switch ($mimeType) {
        case 'image/gif':
            $extension = '.gif';
            break;

        case 'image/jpg':
            $extension = '.jpg';
            break;

        case 'image/jpeg':
            $extension = '.jpg';
            break;

        case 'image/png':
            $extension = '.png';
            break;

        case 'image/bmp':
            $extension = '.bmp';
            break;

        default;
            $extension = '.jpg';
    }
    $directory = getDirectory();
    $contents = file_get_contents($url);
    $save_path = $directory . time() . ".$extension";
    file_put_contents($save_path, $contents);
    return $save_path;
}

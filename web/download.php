<?php
$file = $_REQUEST['file'];
if (file_exists($file)) {
    header("Content-type: application/x-download");
    header("Content-Disposition: attachment; filename=$file");

    readfile($file);
} else {

    header("HTTP/1.1 404 Not Found");
    echo $file;
    echo '404 Not Found';

}
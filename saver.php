<?php
$file = $_GET['url'];
if(empty($file)){
    header('location:/');
}
header("Expires: 0");
// header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");
header("Cache-Control: no-store, no-cache, must-revalidate");
header("Cache-Control: post-check=0, pre-check=0", false);
header("Pragma: no-cache");
$ext = pathinfo($file, PATHINFO_EXTENSION);
$num = mt_rand(100000,1000000);
$basename = "y2img.xyz_$num.jpg"; //You can replace your domain name with y2img.xyz
header("Content-type: application/".$ext);
header("Content-Disposition: attachment; filename=\"$basename\"");
readfile($file);
$num = NULL;
exit;   




?>
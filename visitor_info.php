<?php

require('visitor_connect.php');

if(!$warnings){
    error_reporting(E_ERROR | E_WARNING | E_PARSE);
}
$ip = $_SERVER['REMOTE_ADDR'];
$details = json_decode(file_get_contents("http://ipinfo.io/$ip/json"));
$hostname =$details->org;
$a=$details->country;
$b=$details->city;
$cur_page = $_SERVER['REQUEST_URI'];
$pre_page = "";
if($_SERVER['HTTP_REFERER']){
    $pre_page = $_SERVER['HTTP_REFERER'];
}

$xff = $_SERVER['HTTP_X_FORWARDED_FOR'];
if($_SERVER['HTTP_X_FORWARDED_FOR']){
    $pre_page = $_SERVER['HTTP_X_FORWARDED_FOR'];
}
$xfflist = $xff.explode(",",$xff);
$xffjson = json_encode($xff);

$hostname = mysqli_real_escape_string($conn, $hostname);
$cur_page = mysqli_real_escape_string($conn, $cur_page);
$pre_page = mysqli_real_escape_string($conn, $pre_page);
$xffjson = mysqli_real_escape_string($conn, $xffjson);
$a = mysqli_real_escape_string($conn, $a);
$b = mysqli_real_escape_string($conn, $b);

if (!$conn->query("INSERT INTO ". $database.".".$tablename ." (ip_address, hostname, cur_url, pre_url, xff_headers , country , city) VALUES ( '".$ip."' , '".$hostname."' , '".$cur_page."' , '".$pre_page."' , '".$xffjson."','".$a."','".$b."')") === TRUE) {
    echo "Error:". $conn->error;
}
//$stmt = $conn->prepare("INSERT INTO ? (ip_address, hostname, cur_url, pre_url, xff_headers) VALUES (?,?,?,?,?)");
//$stmt->bind_param("ssssss", $tablename, $ip, $hostname, $cur_page, $pre_page, $xffjson);
//$stmt->execute();
//$stmt->close();

$conn->close();
?>
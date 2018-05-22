<?php 
session_start();
if(empty($_SESSION['userid']))
{
	header("Location: login.php");
}
function ping($url) {
	$ch = curl_init();
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	curl_setopt($ch, CURLOPT_VERBOSE, 0); 
	$ret = curl_setopt($ch, CURLOPT_URL, $url);
	$ret = curl_setopt($ch, CURLOPT_FRESH_CONNECT, true);   
	$ret = curl_setopt($ch, CURLOPT_HEADER, true);
	$ret = curl_setopt($ch, CURLOPT_NOBODY, true);
	$ret = curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
	$ret = curl_setopt($ch, CURLOPT_RETURNTRANSFER, false);
	$ret = curl_setopt($ch, CURLOPT_TIMEOUT, 30);
	$data=curl_getinfo($ch);
	ob_start();
	$some = curl_exec($ch);
	ob_clean();
	$info = curl_getinfo($ch);

	return $info;
}
?>
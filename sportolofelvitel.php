<?php

include_once("db_fuggvenyek.php");

$v_szigszam = $_POST['szigszam'];
$v_szulev = $_POST['szulev'];
$v_szulhonap = $_POST['szulhonap'];
$v_szulnap = $_POST['szulnap'];
$v_szuldatum = date('Y-m-d', mktime(0,0,0, $v_szulhonap, $v_szulnap, $v_szulev));
$v_nev = $_POST['nev'];
$v_poszt = $_POST['poszt'];
$v_golok = $_POST['golok'];
$v_csnev = $_POST['csnev'];

if ( isset($v_szigszam) && isset($v_szuldatum) && isset($v_nev) && isset($v_poszt) && isset($v_golok) && isset($v_csnev) ) {

	sportolot_beszur($v_szigszam, $v_szuldatum, $v_nev, $v_poszt, $v_golok, $v_csnev);
	
	header("Location: sportolo.php");

} else {
	error_log("Nincs beállítva valamely érték");
	
}




?>

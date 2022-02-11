<?php

include_once("db_fuggvenyek.php"); 

$v_meccsid = $_POST['meccsid'];
$v_helyszin = $_POST['helyszin'];
$v_datum = date('Y-m-d', mktime(0,0,0, $v_datumev, $v_datumhonap, $v_datumnap));
$v_mennyivelnyert = $_POST['mennyivelnyert'];
$v_csnev = $_POST['csnev'];


if ( isset($v_meccsid) && isset($v_helyszin)  && isset($v_datum)  && isset($v_mennyivelnyert)  && isset($v_csnev) ) {

	meccset_beszur($v_meccsid, $v_helyszin, $v_datum, $v_mennyivelnyert, $v_csnev);
	
	header("Location: meccs.php");

} else {
	error_log("Nincs beállítva valamely érték");
	
}




?>

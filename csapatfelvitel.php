<?php

include_once("db_fuggvenyek.php"); 


$v_csnev = $_POST['csnev'];
$v_cim = $_POST['cim'];
$v_telefon = $_POST['telefon'];
$v_alapitaseve = $_POST['alapitaseve'];
$v_liganev = $_POST['liganev'];

if ( isset($v_csnev) && isset($v_telefon) && 
     isset($v_telefon) && isset($v_alapitaseve) && isset($v_liganev) ) {

	csapat_beszur($v_csnev, $v_cim, $v_telefon, $v_alapitaseve, $v_liganev);
	
	header("Location: csapat.php");

} else {
	error_log("Nincs beállítva valamely érték");
	
}




?>

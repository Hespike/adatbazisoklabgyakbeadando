<?php

include_once("db_fuggvenyek.php"); 


$v_liganev = $_POST['liganev'];
$v_orszag = $_POST['orszag'];


if ( isset($v_liganev) && isset($v_orszag) ) {

	ligat_beszur($v_liganev, $v_orszag);
	
	header("Location: liga.php");

} else {
	error_log("Nincs beállítva valamely érték");
	
}




?>

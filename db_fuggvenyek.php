<?php

function csapatsportok_csatlakozas() {
	$conn = mysqli_connect("localhost", "root", "") or die("Csatlakozási hiba");
	if ( false == mysqli_select_db($conn, "CSAPATSPORTOK" )  ) {
		
		return null;
	}

	mysqli_query($conn, 'SET NAMES UTF-8');
	mysqli_query($conn, 'SET character_set_results=utf8');
	mysqli_set_charset($conn, 'utf8');
	
	return $conn;
	
}

function csapat_beszur($csnev, $cim, $telefon, $alapitaseve, $liganev) {
	
	if ( !($conn = csapatsportok_csatlakozas()) ) { 
		return false;
	}
	

	$stmt = mysqli_prepare( $conn,"INSERT INTO CSAPAT(csnev, cim, telefon, alapitaseve, liganev) VALUES (?, ?, ?, ?, ?)");

	mysqli_stmt_bind_param($stmt, "ssdds", $csnev, $cim, $telefon, $alapitaseve, $liganev );

	$sikeres = mysqli_stmt_execute($stmt); 

		
	mysqli_close($conn);
	return $sikeres;
	
}

function csapatlistatLeker() {
	
	if ( !($conn = csapatsportok_csatlakozas()) ) { 
		return false;
	}
	
	$result = mysqli_query( $conn,"SELECT csnev, cim, telefon, alapitaseve, liganev FROM CSAPAT");
	
	mysqli_close($conn);
	return $result;
	
}

function csapat_torlese($csnev) {
	if ( !($conn = csapatsportok_csatlakozas()) ) { 
		return false;
	}
	
	$stmt = mysqli_prepare( $conn,"DELETE FROM CSAPAT WHERE csnev = ?");
	
	mysqli_stmt_bind_param($stmt, "s", $csnev);

	$sikeres = mysqli_stmt_execute($stmt); 

		
	mysqli_close($conn);
	return $sikeres;
}

function csapatadat_leker($csnev){
	
		if ( !($conn = csapatsportok_csatlakozas()) ) { 
			return false;
		}
		
		$stmt = mysqli_prepare( $conn,"SELECT csnev, cim, telefon, alapitaseve, liganev FROM CSAPAT WHERE csnev = ?");
		
		mysqli_stmt_bind_param($stmt, "s", $csnev);

		$result = mysqli_stmt_execute($stmt);
		if ($result == false) {
			die(mysqli_error($conn));
		}
		mysqli_stmt_bind_result($stmt, $csnev, $cim, $telefon, $alapitaseve, $liganev);

		$csapatadat = array();
		mysqli_stmt_fetch($stmt);
		$csapatadat["csnev"]= $csnev;
		$csapatadat["cim"]= $cim;
		$csapatadat["telefon"]= $telefon;
		$csapatadat["alapitaseve"]= $alapitaseve;
		$csapatadat["liganev"]= $liganev;
mysqli_close($conn);

return $csapatadat;
		
}

function csapat_modosit($csnev, $cim, $telefon, $alapitaseve, $liganev) {
	if ( !($conn = csapatsportok_csatlakozas()) ) { 
		return false;
	}

	$stmt = mysqli_prepare( $conn,"UPDATE CSAPAT SET cim = ?, telefon = ?, alapitaseve = ?, liganev = ? WHERE csnev = ?");
	
	mysqli_stmt_bind_param($stmt, "sddss", $cim, $telefon, $alapitaseve, $liganev, $csnev);

	$sikeres = mysqli_stmt_execute($stmt); 

	
mysqli_close($conn);
return $sikeres;
}


function sportololistatLeker() {
	
	if ( !($conn = csapatsportok_csatlakozas()) ) {
		return false;
	}
	
	$result = mysqli_query( $conn,"SELECT szigszam, szuldatum, nev, poszt, golok, csnev FROM SPORTOLO");
	
	mysqli_close($conn);
	return $result;
}

function sportolot_beszur($szigszam, $szuldatum, $nev, $poszt, $golok, $csnev) {
	if ( !($conn = csapatsportok_csatlakozas()) ) { 
		return false;
	}
	

	$stmt = mysqli_prepare( $conn,"INSERT INTO SPORTOLO(szigszam, szuldatum, nev, poszt, golok, csnev) VALUES (?, ?, ?, ?, ?, ?)");
	
	mysqli_stmt_bind_param($stmt, "dsssds", $szigszam, $szuldatum, $nev, $poszt, $golok, $csnev);

	$sikeres = mysqli_stmt_execute($stmt); 

		
	mysqli_close($conn);
	return $sikeres;
	
}

function sportolo_torlese($szigszam) {
	if ( !($conn = csapatsportok_csatlakozas()) ) { 
		return false;
	}
	

	$stmt = mysqli_prepare( $conn,"DELETE FROM SPORTOLO WHERE szigszam = ?");

	mysqli_stmt_bind_param($stmt, "s", $szigszam);

	$sikeres = mysqli_stmt_execute($stmt); 

		
	mysqli_close($conn);
	return $sikeres;
}

function ligat_beszur($liganev, $orszag) {
	if ( !($conn = csapatsportok_csatlakozas()) ) { 
		return false;
	}
	
	
	$stmt = mysqli_prepare( $conn,"INSERT INTO LIGA(liganev, orszag) VALUES (?, ?)");
	
	mysqli_stmt_bind_param($stmt, "ss", $liganev, $orszag );
	
	// lefuttatjuk az SQL utasitast
	$sikeres = mysqli_stmt_execute($stmt); 
	
	mysqli_close($conn);
	return $sikeres;
	
}


function ligalistatLeker() {
	
	if ( !($conn = csapatsportok_csatlakozas()) ) { 
		return false;
	}

	$result = mysqli_query( $conn,"SELECT liganev, orszag FROM LIGA");
	
	mysqli_close($conn);
	return $result;
}



function liga_torlese($liganev) {
	if ( !($conn = csapatsportok_csatlakozas()) ) { 
		return false;
	}
	
	$stmt = mysqli_prepare( $conn,"DELETE FROM LIGA WHERE liganev = ?");
	
	
	mysqli_stmt_bind_param($stmt, "s", $liganev);

	$sikeres = mysqli_stmt_execute($stmt); 

		
	mysqli_close($conn);
	return $sikeres;
}

function meccslistatLeker() {
	
	if ( !($conn = csapatsportok_csatlakozas()) ) {
		return false;
	}
	
	$result = mysqli_query( $conn,"SELECT meccsid, helyszin, datum, mennyivelnyert, csnev FROM MECCS");
	
	mysqli_close($conn);
	return $result;
}

function meccset_beszur($meccsid, $helyszin, $datum, $mennyivelnyert, $csnev) {
	if ( !($conn = csapatsportok_csatlakozas()) ) { 
		return false;
	}
	
	$stmt = mysqli_prepare( $conn,"INSERT INTO MECCS( meccsid, helyszin, datum, mennyivelnyert, csnev) VALUES (?, ?, ?, ?, ?)");
	
	mysqli_stmt_bind_param($stmt, "dssds", $meccsid, $helyszin, $datum, $mennyivelnyert, $csnev);
	
	$sikeres = mysqli_stmt_execute($stmt); 

		
	mysqli_close($conn);
	return $sikeres;
	
}

function meccs_torlese($meccsid) {
	if ( !($conn = csapatsportok_csatlakozas()) ) { 
		return false;
	}
	
	$stmt = mysqli_prepare( $conn,"DELETE FROM MECCS WHERE meccsid = ?");
	
	

	mysqli_stmt_bind_param($stmt, "d", $meccsid);
	
	$sikeres = mysqli_stmt_execute($stmt); 
		
	mysqli_close($conn);
	return $sikeres;
}




function laliga_csapat_listaz() {
	
	if ( !($conn = csapatsportok_csatlakozas()) ) { 
		return false;
	}
	

	$result = mysqli_query( $conn,"SELECT csnev FROM CSAPAT WHERE liganev = 'LaLiga'");
	
	if ($result == false ) {
		die(mysqli_error($conn));
	}
	
	mysqli_close($conn);
	return $result;
}




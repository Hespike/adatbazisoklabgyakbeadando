<?php

include_once('db_fuggvenyek.php');

$toroltliga = $_POST["toroltliga"];

if ( isset($toroltliga) ) {
	
	$sikeres = liga_torlese($toroltliga);
	
	if ( $sikeres ) {
		header('Location: liga.php');
	} else {
		echo 'Hiba történt a liga törlése során';
	}
	
} else {
	echo 'Hiba történt a liga törlése során';
	
}

?>
<?php

include_once('db_fuggvenyek.php');

$toroltcsapat = $_POST["toroltcsapat"];

if ( isset($toroltcsapat) ) {
	
	$sikeres = csapat_torlese($toroltcsapat);
	
	if ( $sikeres ) {
		header('Location: csapat.php');
	} else {
		echo 'Hiba történt a csapat törlése során';
	}
	
} else {
	echo 'Hiba történt a csapat törlése során';
	
}

?>
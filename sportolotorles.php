<?php

include_once('db_fuggvenyek.php');

$toroltsportolo = $_POST["toroltsportolo"];

if ( isset($toroltsportolo) ) {
	
	$sikeres = sportolo_torlese($toroltsportolo);
	
	if ( $sikeres ) {
		header('Location: sportolo.php');
	} else {
		echo 'Hiba történt a sportoló törlése során';
	}
	
} else {
	echo 'Hiba történt a sportoló törlése során';
	
}

?>
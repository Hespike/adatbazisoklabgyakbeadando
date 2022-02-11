<?php

include_once('db_fuggvenyek.php');

$toroltmeccs = $_POST["toroltmeccs"];

if ( isset($toroltmeccs) ) {
	
	$sikeres = meccs_torlese($toroltmeccs);
	
	if ( $sikeres ) {
		header('Location: meccs.php');
	} else {
		echo 'Hiba történt a meccs törlése során';
	}
	
} else {
	echo 'Hiba történt a meccs törlése során';
	
}

?>
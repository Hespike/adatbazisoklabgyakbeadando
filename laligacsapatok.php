<?php
include_once('db_fuggvenyek.php');
include_once('menu.php');
?>
<!DOCTYPE HTML>
<HTML>
<HEAD>
	<meta http-equiv="content-type" content="text/html; charset=UTF8" >
	<link rel="stylesheet" href="style.css">
    <style>
    label {
        margin: 10px;
        padding: 10px;
        text-align: left;
        display: inline-block;
        min-width: 120px;
    }

    input {
        margin: 10px;
        padding: 10px;
        text-align: left;
        display: inline-flex;
        vertical-align: bottom;
    }
    </style>
</HEAD>
<BODY>
	
<hr/>
<?php echo menu();?>
<hr/>

<h1>LaLiga csapatok:</h1>

<table border="1">
<tr>
<th>Csapat név</th>
</tr>

<?php

	$laligacsapatok = laliga_csapat_listaz(); 

    while( $egySor = mysqli_fetch_assoc($laligacsapatok) ) { 
		echo '<tr>';
		echo '<td>'. $egySor["csnev"] .'</td>';
		echo '</tr>';
	} 
	mysqli_free_result($laligacsapatok); 

?>
</table>


</BODY>
</HTML>

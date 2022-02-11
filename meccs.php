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


<h1>Meccsek felvitele</h1>

<form method="POST" action="meccsfelvitel.php" accept-charset="utf-8">
<label>Meccs ID(maximum 20 számjegy): </label>
<input type="text" name="meccsid" required />
<br>
<label>Helyszín(maximum 30 karakter): </label>
<input type="text" name="helyszin" required/>
<br>
<label>Dátum: </label>
<select name="datumev" />
	<?php
		for ($i=1900; $i<2022; $i++) {
			echo '<option value="'.$i.'">'.$i.'</option>';
		}
	?>
	</select> év

	<select name="datumhonap" />
	<?php
		for ($i=1; $i<12; $i++) {
			echo '<option value="'.$i.'">'.$i.'</option>';
		}
	?>
	</select> hónap

	<select name="datumnap" />
	<?php
		for ($i=1; $i<31; $i++) {
			echo '<option value="'.$i.'">'.$i.'</option>';
		}
	?>
     </select> nap
<br>
<label>Hány góllal nyert(maximum 5 számjegy): </label>
<input type="text" name="mennyivelnyert" required/>
<br>
<label>Csapat neve(maximum 30 karakter): </label>
<input type="text" name="csnev" required/>
<br>
<input type="submit" value="Meccs felvitele" />
</form>


<hr/>
<h1>Jelenlegi meccsek:</h1>

<table border="1">
<tr>
<th>Meccs ID</th>
<th>Helyszín</th>
<th>Dátum</th>
<th>Hány góllal nyert</th>
<th>Csapat neve </th>
<th>Törlés</th>
</tr>

<?php

	$meccsek = meccslistatLeker(); 

    while( $egySor = mysqli_fetch_assoc($meccsek) ) { 
		echo '<tr>';
		echo '<td>'. $egySor["meccsid"] .'</td>';
		echo '<td>'. $egySor["helyszin"] .'</td>';
		echo '<td>'. $egySor["datum"] .'</td>';
		echo '<td>'. $egySor["mennyivelnyert"] .'</td>';
		echo '<td>'. $egySor["csnev"] .'</td>';
        echo '<td><form method="POST" action="meccstorles.php">
		<input type="hidden" name="toroltmeccs" value="'.$egySor["meccsid"].'" />
		<input type="submit" value="Meccs törlése" />
		</form></td>';
		echo '</tr>';
	} 
	mysqli_free_result($meccsek); 

?>
</table>


</BODY>
</HTML>

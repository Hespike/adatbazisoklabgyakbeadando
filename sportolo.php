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


<h1>Sportolók felvitele</h1>

<form method="POST" action="sportolofelvitel.php" accept-charset="utf-8">
<label>Személyi igazolvány szám(maximum 30 számjegy): </label>
<input type="text" name="szigszam" required />
<br>
<label>Születési dátum: </label>
	<select name="szulev" />
	<?php
		for ($i=1900; $i<2022; $i++) {
			echo '<option value="'.$i.'">'.$i.'</option>';
		}
	?>
	</select> év

	<select name="szulhonap" />
	<?php
		for ($i=1; $i<12; $i++) {
			echo '<option value="'.$i.'">'.$i.'</option>';
		}
	?>
	</select> hónap

	<select name="szulnap" />
	<?php
		for ($i=1; $i<31; $i++) {
			echo '<option value="'.$i.'">'.$i.'</option>';
		}
	?>
	</select> nap
	<br>
<label>Név(maximum 30 karakter): </label>
<input type="text" name="nev" required />
<br>
<label>Poszt(maximum 30 karakter): </label>
<input type="text" name="poszt" required/>
<br>

<label>Gólok száma(maximum 10 számjegy): </label>
<input type="text" name="golok" required/>
<br>
<label>Csapat(maximum 30 karakter): </label>
<input type="text" name="csnev" required/>
<br>
<input type="submit" value="Sportoló felvitele" required/>
</form>


<hr/>
<h1>Jelenlegi sportolók:</h1>

<table border="1">
<tr>
<th>Személyi igazolvány szám</th>
<th>Születési dátum</th>
<th>Név</th>
<th>Poszt</th>
<th>Gólok száma </th>
<th>Csapat</th>
<th>Törlés</th>
</tr>

<?php

	$sportolok = sportololistatLeker(); 
	
    while( $egySor = mysqli_fetch_assoc($sportolok) ) { 
		echo '<tr>';
		echo '<td>'. $egySor["szigszam"] .'</td>';
		echo '<td>'. date_format(date_create($egySor["szuldatum"]), 'Y. m. d.') .'</td>';
		echo '<td>'. $egySor["nev"] .'</td>';
		echo '<td>'. $egySor["poszt"] .'</td>';
		echo '<td>'. $egySor["golok"] .'</td>';
		echo '<td>'. $egySor["csnev"] .'</td>';
		echo '<td><form method="POST" action="sportolotorles.php">
		<input type="hidden" name="toroltsportolo" value="'.$egySor["szigszam"].'" />
		<input type="submit" value="Sportoló törlése" />
		</form></td>';
		echo '</tr>';
	} 
	mysqli_free_result($sportolok); 

?>
</table>


</BODY>
</HTML>

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

<h1>Csapat felvitele</h1>

<form method="POST" action="csapatfelvitel.php" accept-charset="utf-8">

   <label>Csapat neve(maximum 30 karakter): </label>
   <input type="text" name="csnev" required/>
   <br>
   <label> Címe(maximum 30 karakter): </label>
   <input type="text" name="cim"required />
   <br>
   <label>Telefonszám(maximum 10 számjegy): </label>
   <input type="text" name="telefon" required/>
   <br>
   <label>Alapítás éve(maximum 4 számjegy): </label>
   <input type="text" name="alapitaseve" required/>
   <br>
   <label>Liga neve, amelyben szerepel(maximum 30 karakter): </label>
   <input type="text" name="liganev" required />
   <br>
   <input type="submit" value="Csapat felvitele" />
</form>


<hr/>
<h1>Jelenlegi csapatok:</h1>

<table border="1">
<tr>
<th>Csapat név</th>
<th>Cím</th>
<th>Telefonszám</th>
<th>Alapítás éve</th>
<th>Liga neve</th>
<th>Szerkesztés</th>
<th>Törlés</th>
</tr>

<?php

	$csapatok = csapatlistatLeker(); 
	
    while( $egySor = mysqli_fetch_assoc($csapatok) ) { 
        echo '<td><form method="POST" action="csapatszerkesztes.php">';
		echo '<tr>';
		echo '<td>'. $egySor["csnev"] .'</td>';
		echo '<td>'. $egySor["cim"] .'</td>';
		echo '<td>'. $egySor["telefon"] .'</td>';
		echo '<td>'. $egySor["alapitaseve"] .'</td>';
		echo '<td>'. $egySor["liganev"] .'</td>';
        echo '<td><input type="submit" value="Szerkeszt"><td';
        echo'</tr>';
        echo '<input type="hidden" name="csnev" value="'.$egySor["csnev"].'">';
        echo '<td><form method="POST" action="csapattorles.php">
				  <input type="hidden" name="toroltcsapat" value="'.$egySor["csnev"].'" />
				  <input type="submit" value="Csapat törlése" />
		          </form></td>';
		echo '</tr>';
	} 
	mysqli_free_result($csapatok); 
    ?>
</table>


</BODY>
</HTML>

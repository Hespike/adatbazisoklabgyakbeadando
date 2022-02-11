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

<h1>Liga felvitele</h1>

<form method="POST" action="ligafelvitel.php" accept-charset="utf-8">

   <label>Liga neve(maximum 30 karakter): </label>
   <input type="text" name="liganev" required />
   <br>
   <label> Ország(maximum 30 karakter): </label>
   <input type="text" name="orszag" required />
   <br>
   <input type="submit" value="Liga felvitele" />
</form>
</form>


<hr/>
<h1>Jelenlegi ligák:</h1>

<table border="1">
<tr>
<th>Liga neve</th>
<th>Ország</th>
<th>Törlés</th>
</tr>

<?php

	$ligak = ligalistatLeker(); 

    while( $egySor = mysqli_fetch_assoc($ligak) ) { 
		echo '<tr>';
		echo '<td>'. $egySor["liganev"] .'</td>';
		echo '<td>'. $egySor["orszag"] .'</td>';
        echo '<td><form method="POST" action="ligatorles.php">
		<input type="hidden" name="toroltliga" value="'.$egySor["liganev"].'" />
		<input type="submit" value="Liga törlése" />
		</form></td>';
		echo '</tr>';
	} 
	mysqli_free_result($ligak); 

?>
</table>


</BODY>
</HTML>

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

<h1>Csapat szerkesztése</h1>

<?php
$v_csnev = $_POST["csnev"];
$v_csnev = htmlspecialchars($v_csnev);
$csapatadat = csapatadat_leker($v_csnev);
?>


<form method="POST" action="csapatmodositas.php" accept-charset="utf-8">
<label class="formlabel">Csapat név:</label>
<?php 
echo '<input class= "forminput" type="text" name="csnev" value "'.$v_csnev.'"  />';
?>
<br>
<label class="formlabel">Cím(székhely): </label>
<?php 
echo '<input class="forminput" type="text" name="cim" value  "'.$csapatadat["cim"].'"/>';
?>
<br>
<label class="formlabel">Telefonszám: </label>
<?php 
echo '<input class="forminput" type="text" name="telefon" value "'.$csapatadat["telefon"].'"/>';
?>
<br>
<label class="formlabel">Alapítás éve: </label>
<?php 
echo '<input class="forminput" type="text" name="alapitaseve" value "'.$csapatadat["alapitaseve"].'"/>';
?>
<br>
<label class="formlabel">Liga neve: </label>
<?php 
echo '<input class="forminput" type="text" name="liganev" value "'.$csapatadat["liganev"].'"/>';
?>
<input type="submit" value="Elküld" />
<?php

include_once("db_fuggvenyek.php");

$v_csnev = $_POST['csnev'];
$v_cim = $_POST['cim'];
$v_telefon = $_POST['telefon'];
$v_alapitaseve = $_POST['alapitaseve'];
$v_liganev = $_POST['liganev'];

if ( isset($v_csnev) &&  isset($v_cim)  && isset($v_telefon) && isset($v_alapitaseve) && isset($v_liganev) ) {

        $sikeres = csapat_modosit($v_csnev, $v_cim, $v_telefon, $v_alapitaseve, $v_liganev);
        if ($sikeres = false) {
            die("Nem sikerült módosítani.");
        } else {
            header("Location: csapat.php");
        }
    } else {
        error_log("Nincs beállítva valamely érték");
     }
     ?>
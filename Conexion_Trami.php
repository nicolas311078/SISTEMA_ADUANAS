<?php
$host= "localhost";
    $user= "root";
    $pass= "";

    $db= "db_sistema_aduanas";

    $concexion= mysqli_connect($host, $user, $pass, $db);
    if(!$concexion){
        echo "conexion fallida";
    }
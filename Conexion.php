<?php
    
    $host= "localhost";
    $user= "root";
    $pass= "";

    $db= "db_sistema_aduanas";


    $conexion = mysqli_connect($host, $User,$pass, $db);
    
    if(!$con){
    echo "Conexion fallida";
    }
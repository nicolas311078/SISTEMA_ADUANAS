<?php
session_start();    
    include('Conexion.php');
if (isset(  $_POST['Usuario'] ) && isset($_POST['Clave'])){
    function validate($data){
        $data= trim($data);
        $data= stripslashes($data);
        $data= htmlspecialchars( $data);
        return $data;
    }
    $Usuario = validate($_POST['Usuario']);
    $Clave = validate($_POST['Clave']);

    if(empty($Usuario)){
        header("Location: Index.php?error=El Usuario Es Requerido");
        exit();
    }elseif(empty($Clave)){
        //$Clave = md5($clave);
        $Sql = "SELECT * FROM usuarios WHERE Usuario = '$Usuario' and Clave ='$Clave'";
        $result = mysqli_query($conexion, $Sql);

        if(mysqli_num_rows($result)=== 1){
            $row = mysqli_fetch_assoc($result);
            if($row['Usuario'] === $Usuario && $row['Clave']===$Clave){
                $_SESSION['Usuario']=$row['Usuario'];
                $_SESSION['Nombre_completo']= $row['Nombre_Completo'];
                $_SESSION['Id']= $row['Id'];
                header("Location: Inicio.php");
                exit(); 
        }else{
            header("Location: Index.php?error=EL usuario o la clave son incorrectas");
            exit(); 
        }
    }
    }else{
            header("Location: Index.php");
            exit();
        }
}
<?php 

    require_once '../config.php';
    include_once 'functions.php';

    if (isset($_POST['trimite'])){
        $info = $_POST['info'];
        $parola = $_POST['parola'];

        if (LogInEmpty($info,$parola)){
            header('location:../login.php?error=LogInEmpty');
            exit();
        }
        
        Conectare($conn,$info,$parola);
    }
    else{
        header('location:../login.php');
    }

?>
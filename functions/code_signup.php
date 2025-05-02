<?php 

    require_once '../config.php';
    include 'functions.php';

    if (isset($_POST['trimite'])){
        $nume = $_POST['nume'];
        $prenume = $_POST['prenume'];
        $gen = $_POST['gen'];
        $email = $_POST['email'];
        $ziNastere = $_POST['data_nastere'];
        $username = $_POST['username'];
        $parola1 = $_POST['parola1'];
        $parola2 = $_POST['parola2'];


        if (SignUpEmpty($nume,$prenume,$gen,$ziNastere,$username,$email,$parola1,$parola2)){
            header('location:../signup.php?error=InputGol');  
            exit();  
        }

        if (ParoleEgale($parola1,$parola2)!== false){
            header('location:../signup.php?error=ParoleDiferite');
            exit();
        }

        if (VarstaMinima($ziNastere) !== false){
            header('location:../signup.php?error=Minor');
            exit();
        }

        if (LungimeParola($parola1) !== false){
            header('location:../signup.php?error=ParolaScurta');
            exit();
        }

        if(EmailInvalid($email) !== false){
            header('location:../signup.php?error=EmailInvalid');
            exit();
        }

        if(UsernameUtilizat($conn,$username,$email) !== false){
            header('location:../signup.php?error=UsernameUtilizat');
            exit();
        }

        if (ContinutNumere($parola1) !== false){
            header('location:../signup.php?error=FaraNumere');
            exit();
        }

        if(CaractereSpeciale($parola1)){
            header('location:../signup.php?error=FaraCaractereSpeciale');
            exit();
        }

        $sql = "INSERT INTO poze_utilizatori VALUES ();";

        CreareCont($conn,$nume,$prenume,$gen,$ziNastere,$email,$username,$parola1);
    }
    else{
        header('location:../signup.php');
    }
?>
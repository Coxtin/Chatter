<?php 

//-------------------sign up------------------------

    function SignUpEmpty($nume,$prenume,$gen,$ziNastere,$username,$email,$parola1,$parola2){
        if (empty($nume) || empty($prenume) || empty($gen) || empty($ziNastere) || empty($email) || empty($username) || empty($parola1) || empty($parola2)){
            $result = true;
        }
        else{
            $result = false;
        }
        return $result;
    }

    function ParoleEgale($parola1,$parola2){
        if ($parola1 !== $parola2)
            $result = true;
        else
            $result = false;
        return $result;
    }

    function LungimeParola($parola1){
        if (strlen($parola1) < 8)
            $result = true;
        else
            $result = false;
        return $result;
    }

    function VarstaMinima($ziNastere){
        $data_nastere = new DateTime($ziNastere);
        $prezent = new datetime();
        $varsta = $prezent->diff($data_nastere)->y;

        if ($varsta < 10)
            $result = true;
        else
            $result = false;
        return $result;
    }

    function EmailInvalid($email){
        if (!filter_var($email,FILTER_VALIDATE_EMAIL))
            $result = true;
        else   
            $result = false;
        return $result;
    }

    function CaractereiMari($parola1){
        if (!preg_match('/[A-Z]/',$parola1)){
            $result = true;
        }
        else{
            $result = false;
        }
        return $result;
    }

    function ContinutNumere($parola1){
        if (!preg_match('/\d/',$parola1)){
            $result = true;
        }
        else{
            $result = false;
        }
        return $result;
    }

    function CaractereSpeciale($parola1){
        if(!preg_match('/[\'^£$%&*()}{@#~?><>,|=_+¬-]/',$parola1)){
            $result = true;
        }
        else{
            $result =  false;
        }
        return $result;
    }

    function UsernameUtilizat($conn, $username,$email){
        $sql = "SELECT * FROM utilizatori WHERE username_utilizator = ? OR email_utilizator = ?;";
        $stmt = mysqli_stmt_init($conn);
        if (!mysqli_stmt_prepare($stmt,$sql)){
            header('location:../signup.php?error=stmt1Failed');
            exit();
        }
        mysqli_stmt_bind_param($stmt,"ss",$username,$email);
        mysqli_stmt_execute($stmt);

        $result = mysqli_stmt_get_result($stmt);
        if ($row = mysqli_fetch_assoc($result)){
            mysqli_stmt_close($stmt);
            return $row;
        }
        else{
            mysqli_stmt_close($stmt);
            $result = false;
            return $result;
        }
    }
    
    function CreareCont($conn,$nume,$prenume,$gen,$ziNastere,$email,$username,$parola1){
        $sql = "INSERT INTO utilizatori(nume_utilizator,prenume_utilizator,sex_utilizator,ziNastere_utilizator,username_utilizator,email_utilizator,parola_utilizator) VALUES (?,?,?,?,?,?,?);";
        $stmt = mysqli_stmt_init($conn);

        if (!mysqli_stmt_prepare($stmt,$sql)){
            header('location:../signup.php?error=stmt2Failed');
            exit();
        }

        $parola_criptata = password_hash($parola1,PASSWORD_DEFAULT);
        mysqli_stmt_bind_param($stmt,"sssssss",$nume,$prenume,$gen,$ziNastere,$username,$email,$parola_criptata);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);
        header('location:../signup.php?error=none');
    }

//-----------------log in-------------------------

    function LogInEmpty($info,$parola){
        if (empty($info) || empty($parola)){
            $result = true;
        }
        else{
            $result = false;
        }
        return $result;
    } 

    function Conectare($conn,$info,$parola){
        $exista_username = UsernameUtilizat($conn,$info,$info);

        if ($exista_username == false){
            header('location:../login.php?error=DateIncorecte');
            exit();
        }

        $pwd = $exista_username['parola_utilizator'];
        $verificare_parola = password_verify($parola,$pwd);

        if ($verificare_parola == false){
            header('location:../login.php?error=DateIncorecte');
            exit();
        }
        elseif($verificare_parola == true){
            session_start();
            $_SESSION['ID_utilizator'] = $exista_username['ID_utilizator'];
            $_SESSION['username_utilizator'] = $exista_username['username_utilizator'];
            header('location:../utilizator/pagina_principala.php');
            exit();
        }
    }
    
//---------------------functii utilizatori----------------------------


?>
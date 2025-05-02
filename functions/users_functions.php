<?php
    
    require_once '../config.php';
    global $conn;

    function UtilizatorConectat(){
        if (!isset($_SESSION['ID_utilizator'])){
           header('location:../index.php');
        }
    }

    function TotiUtilizatori($conn){
        $sql = "SELECT COUNT(*) AS numar_utilizatori FROM utilizatori";
        $result = mysqli_query($conn,$sql);

        if (!$result){
            echo "Eroare!";
            exit();
        }

       $row = mysqli_fetch_assoc($result);
       print $row['numar_utilizatori'];
    }

    function Informatii_utilizator($conn){
        global $conn;
        $sql = "SELECT * FROM utilizatori WHERE ID_utilizator != {$_SESSION['ID_utilizator']}";
        $result = mysqli_query($conn,$sql);
        $nume_utilizator = mysqli_fetch_all($result);
        return $nume_utilizator;
    }

    function Username_utilizator(){
        global $conn;
        $sql = "SELECT username_utilizator FROM utilizatori WHERE ID_utilizatori != {$_SESSION['ID_utilizator']}";
        $result = mysqli_query($conn,$sql);
        $username_utilizator = mysqli_fetch_all($result,MYSQLI_ASSOC);
        return $username_utilizator;
    }

    function ID_receptor(){
        if (isset($_GET['id'])){
            $ID = intval($_GET['id']);
        }    
        else{
            die("ID-ul destinatarului nu a fost specificat");
        }
        return $ID;
    }

    function Nume_dupa_ID($conn){
        $ID_receptor = ID_receptor();
        $sql = "SELECT nume_utilizator FROM utilizatori where ID_utilizator =$ID_receptor";
        $result = mysqli_query($conn,$sql);
        if (!$result){
            die("Eroare la interogare! " . mysqli_error($conn));
        }
        $nume = mysqli_fetch_assoc($result);

        return $nume['nume_utilizator'];
    }

    function Username_dupa_ID($conn){
        $ID_receptor = ID_receptor();
        $sql = "SELECT username_utilizator FROM utilizatori where ID_utilizator = $ID_receptor";
        $result = mysqli_query($conn,$sql);
        if (!$result){
            die("Eroare la interogare! " . mysqli_error($conn));
        }
        $username = mysqli_fetch_assoc($result);

        return $username['username_utilizator'];
    }

    function Mesaje_trimise($conn){
        $ID_receptor = ID_receptor();
        $sql = "SELECT mesaj FROM mesaj WHERE ID_emitator = {$_SESSION['ID_utilizator']} AND ID_receptor = $ID_receptor ORDER BY data_trimitere ASC";
        $result = mysqli_query($conn,$sql);

        if (!$result){
            die("Eroare la interogare! ".mysqli_error($conn));
        }

        return mysqli_fetch_all($result,MYSQLI_ASSOC);
    }

    function Mesaje_primite($conn){
        $ID_receptor = ID_receptor();
        $sql = "SELECT mesaj FROM mesaj WHERE ID_emitator = $ID_receptor AND ID_receptor = {$_SESSION['ID_utilizator']} ORDER BY data_trimitere ASC";
        $result = mysqli_query($conn,$sql);
        
        if(!$result){
            die("Eroare la interogare! ".mysqli_error($conn));
        }

        return mysqli_fetch_all($result,MYSQLI_ASSOC);
    }
    function Toate_mesajele($conn) {
        $ID_utilizator = $_SESSION['ID_utilizator'];
        $ID_receptor = ID_receptor();
    
        $sql = "SELECT mesaj, data_trimitere, 'trimis' AS tip 
                FROM mesaj 
                WHERE ID_emitator = $ID_utilizator AND ID_receptor = $ID_receptor
                UNION 
                SELECT mesaj, data_trimitere, 'primit' AS tip 
                FROM mesaj 
                WHERE ID_emitator = $ID_receptor AND ID_receptor = $ID_utilizator
                ORDER BY data_trimitere ASC"; 
    
        $result = mysqli_query($conn, $sql);
    
        if (!$result) {
            die("Eroare la interogare: " . mysqli_error($conn));
        }
    
        return mysqli_fetch_all($result, MYSQLI_ASSOC);
    }
    
?>
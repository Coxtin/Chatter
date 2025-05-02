<?php 

    require '../config.php' ;

    if (isset($_POST['trimite-mesaj'])){
        $mesaj = trim($_POST['mesaj']);
        $mesaj = mysqli_real_escape_string($conn,$mesaj);
        $ID_receptor = $_POST['id_receptor'];
        $sql = "INSERT INTO mesaj(ID_emitator,ID_receptor,tip_mesaj,mesaj,status_mesaj,data_trimitere) VALUES({$_SESSION['ID_utilizator']},$ID_receptor,'text','$mesaj','trimis',NOW())";
        $result = mysqli_query($conn,$sql);
        if (!$result){
            die("Eroare!". mysqli_error($conn));
        }
        header("location:../utilizator/conversatie.php?id={$ID_receptor}");
    }
        
?>
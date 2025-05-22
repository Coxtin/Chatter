<?php require "config.php" ?>
<?php include "includes/header.php" ?>
<link rel="stylesheet" href="static/css/main.css">
<link rel="stylesheet" href="static/css/body.css">


<?php 

    if (session_status() == PHP_SESSION_ACTIVE && isset($_SESSION['ID_utilizator'])){
        header('location:utilizator/pagina_principala.php');
        exit();
    }

?>

<div class="container">

    <span class="titlu">Chatter</span>
    <p class="descriere">Conectează-te și comunică cu prietenii tăi</p><br>

    <div class="butoane">
        <a href="signup.php">Înregistrează-te</a>
        <br><br>
        <a href="login.php">Conectează-te</a>
        <br><br>
    </div>
</div>
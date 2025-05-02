<?php require_once 'config.php' ?>
<?php require 'functions/functions.php' ?>
<?php include 'includes/header.php' ?>

<link rel="stylesheet" href="static/css/body.css">
<link rel="stylesheet" href="static/css/formular.css">

<?php
    if (session_status() == PHP_SESSION_ACTIVE && isset($_SESSION['ID_utilizator'])){
        header('location:utilizator/pagina_principala.php');
        exit();
    }
?>

<div class="formular">
    <p class="titlu">Conectare</p>
    <form action="functions/code_login.php" method="POST">

    <label for="info">Email/Username: </label>
    <input type="text" name="info" id="info" placeholder="Email/Username"><br>
    <label for="parola">Parola: </label>
    <input type="password" name="parola" id="parola" placeholder="Parola"><br>
    <input type="submit" name="trimite" class="trimite" value="Conecteaza-te">

    </form>

    <?php 
    
        if (isset($_GET['error'])){

            if($_GET['error'] == "LogInEmpty"){
                echo "<p id='eroare'>Introduceti date in toate casutele</p>";
            }

            elseif ($_GET['error'] == "DateIncorecte"){
                echo "<p id='eroare'>Datele sunt incorecte!</p>";
            }
        }

    ?>

</div>



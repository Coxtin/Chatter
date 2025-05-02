<?php require 'config.php'?>
<?php include 'includes/header.php' ?>
<?php include 'functions/functions.php'?>
<?php include 'includes/footer.php' ?>
<link rel="stylesheet" href="static/css/formular.css">
<link rel="stylesheet" href="static/css/body.css">

<div class="formular">
    <p class="titlu">Înregistrare</p>
    <form action="functions/code_signup.php" method="POST">
        <label for="nume">Nume: </label>
        <input type="text" name="nume" id="nume" placeholder="Nume"><br>
        <label for="prenume">Prenume: </label>
        <input type="text" name="prenume" id="prenume" placeholder="Prenume">
            <p>Care este genul dumneavoastra? </p>
            <label for="gen">Masculin</label>
            <input type="radio" name="gen" id="masc" value="Masculin">
            <label for="gen">Feminin</label>
            <input type="radio" name="gen" id="fem" value="Feminin">
            <br><br>
        <label for="data_nastere">Care este data nasterii?</label><br>
        <input type="date" name="data_nastere" id="data_nastere"><br><br>
        <label for="username">Introduceti un nume de utilizator: </label>
        <input type="text" name="username" id="username" placeholder="Nume de utilizator"><br>
        <label for="email">Email: </label>
        <input type="email" name="email" id="email" placeholder="Email"><br>
        <label for="password">Introduceti o parola: </label>
        <input type="password" name="parola1" id="parola1" placeholder="Parola"><br>
        <label for="password">Introduceti parola din nou: </label>
        <input type="password" name="parola2" id="parola2" placeholder="Repetati parola"><br><br>
        <input type="submit" value="Inregistreaza-te" name="trimite" class="trimite">
    </form>

    <?php 
    
        if (isset($_GET['error'])){

            if ($_GET['error'] == "InputGol"){
                echo "<p id='eroare'>Introduceti informatii in toate casetele!</p>";
            }

            elseif ($_GET['error'] == "ParoleDiferite"){
                echo "<p id='eroare'>Parolele nu coincid!   </p>";
            }

            elseif($_GET['error'] == "Minor"){
                echo "<p id='eroare'>Varsta minima necesara: 10 ani!</p>";
            }

            elseif($_GET['error'] == "ParolaScurta"){
                echo "<p id='eroare'>Parola trebuie sa contina minim 8 caractere</p>";
            }

            elseif($_GET['error'] == "EmailInvalid"){
                echo "<p id='eroare'>Email-ul introdus este invalid!</p>";
            }

            elseif($_GET['error'] == "FaraNumere"){
                echo "<p id='eroare'>Parola trebuie sa contina minim un numar!</p>";
            }

            elseif($_GET['error'] == "FaraCaractereSpeciale"){
                echo "<p id='eroare'>Parola trebuie sa contina minim un caracter special</p>";
            }

            elseif($_GET['error'] == "UsernameUtilizat"){
                echo "<p id='eroare'>Acest username/email este deja utilizat</p>";
            }

            elseif($_GET['error'] == "stmt1Failed"){
                echo "<p id='eroare'>Eroare statement1! Incercati din nou!</p>";
            }

            elseif($_GET['error'] == "stmt2Failed"){
                echo "<p id='eroare'>Eroare statement2! Incercati din nou!</p>";
            }

            elseif($_GET['error'] == "none"){
                header('location:confirmare_signup.php');
            }
        }
    ?>

</div>
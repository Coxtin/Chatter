<?php require_once '../config.php' ?>
<?php require_once '../functions/functions.php' ?>
<?php require_once '../functions/users_functions.php' ?>
<?php include_once '../includes/navbar.php' ?>
<?php UtilizatorConectat() ?>
<?php $informatii_utilizator = Informatii_utilizator($conn) ?>


<link rel="stylesheet" href="../static/css/body.css">
<link rel="stylesheet" href="../static/css/continut_wall.css">

<div class="card-container">
   <?php foreach($informatii_utilizator as $info): ?>
      <div class="card" onclick="window.location.href='conversatie.php?id=<?php echo $info[0]?>'">
         <div class="poza">
            <img src="../static/images/img6.png" alt="Imagine profil">
         </div>
         <div class="mesaj">
            <h2>Nume: <?php echo $info[1] ?></h2>
            <p>Username: <?php echo $info[5]?></p>
         </div>
      </div>
   
      <?php endforeach ?>
</div>
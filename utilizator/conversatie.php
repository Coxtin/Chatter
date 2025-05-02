<?php include_once '../includes/navbar.php'; ?>
<?php include_once '../functions/users_functions.php'; ?>

<link rel="stylesheet" href="../static/css/body.css">
<link rel="stylesheet" href="../static/css/conversatie.css">


<?php 
    $ID = ID_receptor(); 
    $mesaje_trimise = Mesaje_trimise($conn); 
    $mesaje_primite = Mesaje_primite($conn); 
    $toate_mesajele = Toate_mesajele($conn);
    $nume = Nume_dupa_ID($conn);
    $username = Username_dupa_ID($conn);
?>

<div class="conversatie">
    <div class="fundal-mesaj">
        <?php if (!empty($toate_mesajele)): ?>
            <div class="mesaje-afisate">
                <?php foreach ($toate_mesajele as $mesaj): ?>
                    <div class="mesaj <?php echo $mesaj['tip'] === 'trimis' ? 'mesaj-utilizator' : ''; ?>">
                        
                        <span class="ora-mesaj"><?php echo date("H:i", strtotime($mesaj['data_trimitere'])); ?></span>
                        <?php echo htmlspecialchars($mesaj['mesaj']); ?>
                    </div>
                <?php endforeach; ?>
            </div>
        <?php else: ?>
            <p class="avertizare">Nu există mesaje de afișat.</p>
        <?php endif; ?>
        <div class="bara-mesaj">
            <form action="../functions/code_mesaj.php" method="POST" class="form-mesaj">
                <input type="hidden" name="id_receptor" value="<?php echo $ID; ?>">
                <input type="text" name="mesaj" id="mesaj" placeholder="Scrie un mesaj..." required>
                <button type="submit" name="trimite-mesaj">Trimite</button>
            </form>
        </div>
    </div>
</div>


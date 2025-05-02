<link rel="stylesheet" href="static/css/body.css">
<link rel="stylesheet" href="static/css/confirmare_signup.css">
    <div class="container">
        <p class="text">Felicitari! Ti-ai creat un cont!</p>
        <p class="text">Vei fi redistribuit catre pagina de login pentru a intra in cont!</p>
    </div>
    <div class="forma">
        <div class="progres">
        <?php
            $redirect_url = 'login.php';
            $countdown_time = 5;
            echo '<script>setTimeout(function(){ window.location.href = "' . $redirect_url . '"; }, ' . ($countdown_time * 1000) . ');</script>';
	    ?>
        </div>
    </div>
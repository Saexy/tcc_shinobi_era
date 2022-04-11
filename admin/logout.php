<?php

    session_start();
    $_SESSION = array();
    session_destroy();

    setcookie('navega', "", time() - 3600);
    echo '<script>

            alert("Sessão encerrada com sucesso!");

          </script>';

    header('Refresh: 3; url=login.php');
    
?>
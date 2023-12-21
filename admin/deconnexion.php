<?php
session_start();

if(isset($_SESSION['wkdj']) OR $_SESSION['utilisateurActuel']){
    $_SESSION['wkdj'] = array();
    $_SESSION['utilisateurActuel'] = array();

    session_destroy();

    header("Location: ../acceuil.php");
}else{
    header("Location: ../login.php");
}

?>
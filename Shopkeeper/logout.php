<?php session_start(); ?>
<?php

 unset ($_SESSION["cart"]);
    session_unset();
    session_destroy();

  header('Location: index.php');
?>

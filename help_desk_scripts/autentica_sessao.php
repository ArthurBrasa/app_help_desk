<?php 
  session_start();
  if(!$_SESSION['autenticado'] || !isset($_SESSION['autenticado'])){
    header('Location: index.php?session-erro=0');
  }
?>
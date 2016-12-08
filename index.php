<?php
// phpinfo()
if (session_status() == PHP_SESSION_NONE)
{
    session_start();
}
// quand met l'url http://localhost/Labo2/index.php?name=x
if (!empty($_GET["name"]))
{
  echo 'controller_'.$_GET["name"].'.php';
    include 'controller_'.$_GET["name"].'.php';
}
else
{
  include 'controller.php';
}
?>

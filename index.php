<?php
// phpinfo()
if (session_status() == PHP_SESSION_NONE)
{
    session_start();
}
// quand met l'url http://localhost/Labo2/index.php?name=x
if (!empty($_GET["name"]))
{
    include 'controllers/controller_'.$_GET["name"].'.php';
}
else
{
  $a = $_SERVER['PHP_SELF'];
  echo $a." test1";
  include 'controllers/controller.php';
}
?>

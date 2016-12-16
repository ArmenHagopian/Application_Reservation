<?php
if (session_status() == PHP_SESSION_NONE)
{
    session_start();
}
if (!empty($_GET["name"]))
{
    include 'controllers/controller_'.$_GET["name"].'.php';
}
else
{
  include 'controllers/controller.php';
}
?>

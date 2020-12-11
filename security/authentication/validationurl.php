<?php
$url ="http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";

if( !strpos($url, "main")){
  header("Location: ../../index.php");
}
?>

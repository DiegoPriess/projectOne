<?php

session_start();
if(!isset($_SESSION['idsessao'])||($_SESSION['idsessao']!= session_id())){
  header($locationTxt);
  exit;
}

?>

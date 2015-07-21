<?php
	include '../model/clases/nino.php';
	@session_start(); 
	$pag=$_GET['pag'];
	$_SESSION['pagina']=$pag;
	include_once ('../view/menu.php');

?>
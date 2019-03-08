<?php 
session_start();
if (isset($_SESSION['NomUtil'])) {
	$_POST['NomUtil'] = $_SESSION['NomUtil'];
}
else {
	$_SESSION['NomUtil'] = $_POST['NomUtil1']; 
}
	session_destroy();
	$link = 'adminlog.php';
	header('Location:' .$link);
 ?>
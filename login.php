<?php
	try {
	 	$bdd = new PDO('mysql:host=localhost;dbname=ensateabsence;charset=utf8', 'root', '');
	 }
	 catch (Exception $e) {
	 	die('Erreur : '.$e->getMessage());
	 }
?>
<?php
session_start();
if (isset($_SESSION['NomUtil'])) {
	$_POST['NomUtil'] = $_SESSION['NomUtil'];
}
else {
	$_SESSION['NomUtil'] = $_POST['NomUtil1'];
	$_POST['NomUtil'] = $_SESSION['NomUtil'];
}
?>
<?php
if (isset($_POST['NomUtil1'])) {
	$reponse = $bdd->query('SELECT Pass FROM admin WHERE Login=\'' . $_SESSION['NomUtil'] . '\'');
	 	while ($donnees = $reponse->fetch()){
	 		$pass = $donnees['Pass'];
	 		}
	 	if ($pass != $_POST['Pass']) {
	 		$link = 'logfail.php';
	 		header('Location:' .$link);
	 	}
	 	else {
	 		$link = 'home.php';
	 		header('Location:' .$link);
	 	}
}
?>

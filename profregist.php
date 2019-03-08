<?php
session_start();
if (isset($_SESSION['SOM'])) {
	$_POST['SOM'] = $_SESSION['SOM'];
}
else {
	$_SESSION['SOM'] = $_POST['SOM1'];
}
	session_destroy(); ?>
<?php
	try {
	 	$bdd = new PDO('mysql:host=localhost;dbname=ensateabsence;charset=utf8', 'root', '');
	 }
	 catch (Exception $e) {
	 	die('Erreur : '.$e->getMessage());
	 }
?>
<?php
	$link = 'welcome.php';

	$reponse1 = $bdd->query('SELECT SOM FROM prof WHERE SOM=\'' . $_POST['SOM'] . '\'');
	while ($donnees = $reponse1->fetch()){
		if ($donnees) {
			$link = 'proffail.php';
			}
	}
	$reponse2 = $bdd->query('INSERT INTO prof (Nom, Prénom, SOM, Pass, Sexe, Email, Telephone ) VALUES (\'' . $_POST['Nom'] . '\', \'' . $_POST['Prénom'] . '\', \'' . $_POST['SOM'] . '\', \'' . $_POST['Pass'] . '\', \'' . $_POST['Gender'] . '\', \'' . $_POST['Email'] . '\', \'' . $_POST['Telephone'] . '\')');
	header('Location:' .$link);


$reponse->closeCursor();
?>

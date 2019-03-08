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
	try {
	 	$bdd = new PDO('mysql:host=localhost;dbname=ensateabsence;charset=utf8', 'root', '');
	 }
	 catch (Exception $e) {
	 	die('Erreur : '.$e->getMessage());
	 }
?>
<?php
	$link = 'modproffail.php';


	$reponse1 = $bdd->query('SELECT SOM FROM prof WHERE SOM=\'' . $_POST['SOM'] . '\'');
	while ($donnees = $reponse1->fetch()){
		if ($donnees) {
			$reponse2 = $bdd->query('UPDATE prof SET Nom="' . $_POST['Nom'] . '", Prénom="' . $_POST['Prénom'] . '", Sexe="' . $_POST['Gender'] . '", Email="' . $_POST['Email'] . '", Telephone="' . $_POST['Telephone'] . '" WHERE SOM=\'' . $_POST['SOM'] . '\'');
			$link = 'gestion.php';
			}
	}

	header('Location:' .$link);


$reponse->closeCursor();
?>

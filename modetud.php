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
	$link = 'modetudfail.php';


	$reponse1 = $bdd->query('SELECT CNE FROM étudiant WHERE CNE=\'' . $_POST['CNE'] . '\'');
	while ($donnees = $reponse1->fetch()){
		if ($donnees) {
			$reponse2 = $bdd->query('UPDATE étudiant SET Nom="' . $_POST['Nom'] . '", Prénom="' . $_POST['Prénom'] . '", CIN="' . $_POST['CIN'] . '", Date="' . $_POST['Date'] . '", Lieu="' . $_POST['Lieu'] . '", Sexe="' . $_POST['Sexe'] . '", Adresse="' . $_POST['Adresse'] . '", Email="' . $_POST['Email'] . '", Téléphone="' . $_POST['Telephone'] . '" WHERE CNE=\'' . $_POST['CNE'] . '\'');
			$link = 'gestion.php';
			}
	}

	header('Location:' .$link);


$reponse->closeCursor();
?>

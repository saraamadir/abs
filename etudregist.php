<?php
session_start();
if (isset($_SESSION['CNE'])) {
	$_POST['CNE'] = $_SESSION['CNE'];
}
else {
	$_SESSION['CNE'] = $_POST['CNE'];
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

	$reponse1 = $bdd->query('SELECT CNE FROM étudiant WHERE CNE=\'' . $_POST['CNE'] . '\'');
	while ($donnees = $reponse1->fetch()){
		if ($donnees) {
			$link = 'etudfail.php';
			}
	}
	$reponse2 = $bdd->query('INSERT INTO étudiant (Prénom, Nom, CNE, CIN, Pass, Date, Lieu, Sexe, Adresse, Email, Téléphone ) VALUES (\'' . $_POST['Prénom'] . '\', \'' . $_POST['Nom'] . '\', \'' . $_POST['CNE'] . '\', \'' . $_POST['CIN'] . '\', \'' . $_POST['Pass'] . '\', \'' . $_POST['Date'] . '\', \'' . $_POST['Lieu'] . '\', \'' . $_POST['Sexe'] . '\', \'' . $_POST['Adresse'] . '\', \'' . $_POST['Email'] . '\', \'' . $_POST['Telephone'] . '\')');
	header('Location:' .$link);


$reponse->closeCursor();
?>

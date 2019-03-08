<?php
	try {
	 	$bdd = new PDO('mysql:host=localhost;dbname=ensateabsence;charset=utf8', 'root', '');
	 }
	 catch (Exception $e) {
	 	die('Erreur : '.$e->getMessage());
	 }
?>
<?php
	$link = 'home.php';
	$reponse4 = $bdd->query('SELECT AbsGJ FROM étudiant WHERE CNE=\'' . $_POST['CNE'] . '\'');
	 			while ($donnees = $reponse4->fetch()){
	 			$absgj = $donnees['AbsGJ'];
	 			}
	 			$absgj++;
	 		$reponse5 = $bdd->query('SELECT AbsGNJ FROM étudiant WHERE CNE=\'' . $_POST['CNE'] . '\'');
	 			while ($donnees = $reponse5->fetch()){
	 			$absgnj = $donnees['AbsGNJ'];
	 			}
	 			$absgnj--;
	 		$reponse6 = $bdd->query('UPDATE étudiant SET AbsGJ="'.$absgj.'" WHERE CNE="'.$_POST['CNE'].'"');
	 		$reponse7 = $bdd->query('UPDATE étudiant SET AbsGNJ="'.$absgnj.'" WHERE CNE="'.$_POST['CNE'].'"');
	 		$reponse8 = $bdd->query('UPDATE absence SET TypeA="J" WHERE CNE="'.$_POST['CNE'].'" AND SOM="'.$_POST['SOM'].'" AND Crenau="'.$_POST['crenau'].'" AND Date="'.$_POST['date'].'"');

header('Location:' .$link);

$reponse2->closeCursor();
?>

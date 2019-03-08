<?php
	try {
	 	$bdd = new PDO('mysql:host=localhost;dbname=ensateabsence;charset=utf8', 'root', '');
	 }
	 catch (Exception $e) {
	 	die('Erreur : '.$e->getMessage());
	 }
?>
<?php
	$link = 'gestion.php';
	$reponsex = $bdd->query('SELECT COUNT(*) FROM étudiant');
	 								while ($donnees = $reponsex->fetch()){
	 									$num = $donnees['COUNT(*)'];
									}
								for ($i=1; $i < $num+1 ; $i++) {
									$reponse6 = $bdd->query('UPDATE étudiant SET AbsGJ="0" WHERE Num=\''.$i.'\' ');
	 								$reponse7 = $bdd->query('UPDATE étudiant SET AbsGNJ="0" WHERE Num=\''.$i.'\' ');
	 								$reponse8 = $bdd->query('UPDATE étudiant SET AbsG="0" WHERE Num=\''.$i.'\' ');
	 							}
	 							$nom = "absence_S";
	 							$nom .= $_POST['S'];
	 		$reponse1 = $bdd->query('CREATE TABLE '. $nom .' LIKE absence');
	 		$reponse2 = $bdd->query('INSERT INTO '. $nom .' SELECT * FROM absence');
	 		$reponse2 = $bdd->query('TRUNCATE absence');
header('Location:' .$link);

$reponse2->closeCursor();
?>

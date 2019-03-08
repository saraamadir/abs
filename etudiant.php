<?php
	try {
	 	$bdd = new PDO('mysql:host=localhost;dbname=ensateabsence;charset=utf8', 'root', '');
	 }
	 catch (Exception $e) {
	 	die('Erreur : '.$e->getMessage());
	 }
?>
<?php
	$reponse = $bdd->query('SELECT Pass FROM étudiant WHERE CNE=\'' . $_POST['CNE'] . '\'');
	 	while ($donnees = $reponse->fetch()){
	 		$pass = $donnees['Pass'];
	 		}
	 	if ($pass == $_POST['Pass']) {
	 		$reponse2 = $bdd->query('SELECT Nom FROM étudiant WHERE CNE=\'' . $_POST['CNE'] . '\'');
	 			while ($donnees = $reponse2->fetch()){
	 			$nom = $donnees['Nom'];
	 			}
	 		$reponse3 = $bdd->query('SELECT Prénom FROM étudiant WHERE CNE=\'' . $_POST['CNE'] . '\'');
	 			while ($donnees = $reponse3->fetch()){
	 			$prénom = $donnees['Prénom'];
	 			}
	 		$reponse4 = $bdd->query('SELECT AbsG FROM étudiant WHERE CNE=\'' . $_POST['CNE'] . '\'');
	 			while ($donnees = $reponse4->fetch()){
	 			$absg = $donnees['AbsG'];
	 			}
	 		$reponse5 = $bdd->query('SELECT AbsGNJ FROM étudiant WHERE CNE=\'' . $_POST['CNE'] . '\'');
	 			while ($donnees = $reponse5->fetch()){
	 			$absgnj = $donnees['AbsGNJ'];
	 			}
	 			$alert = '';
	 			if ($absgnj == 4) {
	 				$alert = 'Attention la prochaine absence non justifié vous serez convoqué a un conseil de discipline';
	 			}
	 			elseif ($absgnj > 4) {
	 				$alert = 'Vous etes convoqué a un conseil de discipline';
	 			}
	 	}
	 	else {
	 		$link = 'etudfail3.php';
	 		header('Location:' .$link);
	 	}
?>
<!DOCTYPE html>
<html>
	<head>
		<title>ENSATé Absence : Espace Etudiant</title>
		<meta charset="utf-8">
		<link rel="stylesheet" type="text/css" href="index.css" media="screen">
		<link rel="stylesheet" type="text/css" href="print.css" media="print">

	</head>
	<body>
		<header>
			<table width="80%" align="center" class="hboard" cellpadding="5" cellspacing="5">
				<tr>
					<td width="90%" align="left">
						<a href="../index.html"><img src="../logo%20gi.png" width="30%"></a>
					</td>
					<td width="10%" align="right">
							<a href="etudlog.html"><img src="../quitter.png" width="50%" class="img"></a>
					</td>
				</tr>
			</table>
			<br><br><br>
		</header>
		<section>
			<table width="80%" align="center" cellpadding="10" cellspacing="10">
				<tr>
					<td width="25%" valign="top">
						<table width="100%" class="dboard" cellpadding="5" cellspacing="5">
							<tr>
								<td class="t1" align="center">
									Vos informations
								</td>
							</tr>
							<tr>
								<td >
								<br>
								</td>
							</tr>
							<tr>
								<td>
									Nom : <?php echo $nom ; ?>
								</td>
							</tr>
							<tr>
								<td>
									Prénom : <?php echo $prénom ; ?>
								</td>
							</tr>
							<tr>
								<td>
									CNE : <?php echo $_POST['CNE'] ; ?>
								</td>
							</tr>
							<tr>
								<td>
									Nb d'absence totale : <?php echo $absg; ?>
								</td>
							</tr>
							<tr>
								<td >
								<br>
								</td>
							</tr>
							<tr>
								<td class="fail" align="center">
									<?php echo $alert ; ?>
								</td>
							</tr>
						</table>
					</td>
					<td width="75%" valign="top">
						<table width="100%" cellpadding="5" cellspacing="5" class="fboard">
							<tr>
								<td colspan="5" align="center">
									<span class="t1">Le compte rendu de votre absence</span>
								</td>
							</tr>
							<tr>
								<td align="center">
									Professeur
								</td>
								<td align="center">
									Module
								</td>
								<td align="center">
									Date d'Absence
								</td>
								<td align="center">
									Crénau d'Absence
								</td>
								<td align="center">
									Type d'Absence
								</td>
							</tr>
								<?php
								$reponsex = $bdd->query('SELECT COUNT(*) FROM absence');
	 								while ($donnees = @$reponsex->fetch()){
	 									$num = $donnees['COUNT(*)'];
									}
								for ($i=1; $i < $num+1 ; $i++) {
									$reponse6 = $bdd->query('SELECT SOM FROM absence WHERE Num=\''.$i.'\' ');
	 								while ($donnees = $reponse6->fetch()){
	 									$som = $donnees['SOM'];
									}
									$reponse61 = $bdd->query('SELECT Nom FROM prof WHERE SOM=\''.$som.'\' ');
	 								while ($donnees = $reponse61->fetch()){
	 									$profn = $donnees['Nom'];
									}
									$reponse62 = $bdd->query('SELECT Prénom FROM prof WHERE SOM=\''.$som.'\' ');
	 								while ($donnees = $reponse62->fetch()){
	 									$profp = $donnees['Prénom'];
									}
									$reponse7 = $bdd->query('SELECT Module FROM absence WHERE Num=\''.$i.'\' ');
	 										while ($donnees = $reponse7->fetch()){
	 											$module = $donnees['Module'];
	 										}
									$reponse8 = $bdd->query('SELECT Date FROM absence WHERE Num=\''.$i.'\' ');
	 										while ($donnees = $reponse8->fetch()){
	 											$date= $donnees['Date'];
	 										}
									$reponse9 = $bdd->query('SELECT Crenau FROM absence WHERE Num=\''.$i.'\' ');
	 										while ($donnees = $reponse9->fetch()){
	 											$crenau = $donnees['Crenau'];
	 										}
									$reponse10 = $bdd->query('SELECT TypeA FROM absence WHERE Num=\''.$i.'\' ');
	 										while ($donnees = $reponse10->fetch()){
	 											$typea = $donnees['TypeA'];
	 										}
	 								$reponse11 = $bdd->query('SELECT CNE FROM absence WHERE Num=\''.$i.'\' ');
	 										while ($donnees = $reponse11->fetch()){
	 											$CNE = $donnees['CNE'];
	 										}
	 								if ($CNE == $_POST['CNE']) {
	 								echo "<tr align='center'><td>";
	 								echo $profn . " " . $profp ;
	 								echo "</td><td>";
	 								echo $module ;
	 								echo "</td><td>";
	 								echo $date ;
	 								echo "</td><td>";
	 								echo $crenau ;
	 								echo "</td><td>";
	 								echo $typea ;
	 								echo "</td></tr>";
	 								}
								};
	 							?>
	 						<tr>
	 							<td colspan="6" align="right">
	 								<a href="#" onclick="window.print(); return false;"><img src="../impr.png" width="10%" class="img"></a>
	 							</td>
	 						</tr>
						</table>
					</td>
				</tr>
			</table>
		</section>
	</body>
</html>

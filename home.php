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
$reponse21 = $bdd->query('SELECT Nom FROM admin WHERE Login=\'' . $_SESSION['NomUtil'] . '\'');
	 			while ($donnees = $reponse21->fetch()){
	 			$nom = $donnees['Nom'];
	 			}
	 		$reponse31 = $bdd->query('SELECT Prénom FROM admin WHERE Login=\'' . $_SESSION['NomUtil'] . '\'');
	 			while ($donnees = $reponse31->fetch()){
	 			$prénom = $donnees['Prénom'];
	 			}
 ?>
<!DOCTYPE html>
<html>
	<head>
		<title>ENSATé Absence : Espace Administrateur</title>
		<meta charset="utf-8">
		<link rel="stylesheet" type="text/css" href="index.css">
	</head>
	<body>
		<header>
			<table width="80%" align="center" class="hboard" cellpadding="5" cellspacing="5">
				<tr>
					<td width="90%" align="left">
						<a href="../index.html"><img src="../logo%20gi.png" width="30%"></a>
					</td>
					<td width="10%" align="right">
						<form action="quitter.php" method="POST">
							<input type="hidden" name="by" value="yes">
							<input type="image" name="go" value="submit" src="../quitter.png" width="50%">
						</form>
					</td>
				</tr>
			</table>
			<br><br><br>
		</header>
		<nav>
      <table width="80%" align="center" class="fboard" cellpadding="5" cellspacing="5">
        <tr align="center">
          <td width="33%" style="background-color: #FFFFFF;">
            <span class="t2"><a href="home.php"> Gestion d'absence</a></span>
          </td>
          <td width="33%" style="background-color: #FFFFFF;">
            <span class="t1"><a href="consulter.php">Consulter les comptes rendus des absences</span>
          </td>
          <td width="33%" style="background-color: #FFFFFF;">
            <span class="t1"><a href="gestion.php">Gestion des bases de données</span>
          </td>
        </tr>
      </table>
    </nav>
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
									Login : <?php echo $_POST['NomUtil'] ; ?>
								</td>
							</tr>
						</table>
					</td>
					<td width="75%" rowspan="2" valign="top">
						<table width="100%" class="fboard" cellpadding="5" cellspacing="5">
							<tr>
								<td width="50%" valign="top">
									<table width="100%" cellpadding="5" cellspacing="5">
									<tr>
										<td align="center" colspan="2">
											<span class="t1">Liste des etudiants</span>
										</td>
									</tr>
									<tr>
								<td align="center">
									Etudiant
								</td>
								<td align="center">
									CNE
								</td>
									</tr>
								<?php
								$reponsex = $bdd->query('SELECT COUNT(*) FROM étudiant');
	 								while ($donnees2 = $reponsex->fetch()){
	 									$num = $donnees2['COUNT(*)'];
									}
								for ($i=1; $i < $num+1 ; $i++) {
									$reponse8 = $bdd->query('SELECT Nom FROM étudiant WHERE Num=\''.$i.'\' ');
	 										while ($donnees2 = $reponse8->fetch()){
	 											$nom2= $donnees2['Nom'];
	 										}
									$reponse9 = $bdd->query('SELECT Prénom FROM étudiant WHERE Num=\''.$i.'\' ');
	 										while ($donnees2 = $reponse9->fetch()){
	 											$prénom2 = $donnees2['Prénom'];
	 										}
									$reponse10 = $bdd->query('SELECT CNE FROM étudiant WHERE Num=\''.$i.'\' ');
	 										while ($donnees2 = $reponse10->fetch()){
	 											$CNE2 = $donnees2['CNE'];
	 										}
	 								echo "<tr align='center'><td>";
	 								echo $nom2 ."<br>". $prénom2;
	 								echo "</td><td>";
	 								echo $CNE2 ;
	 								echo "</td></tr>";
	 								};
	 							?>
	 							</table>
								</td>
								<td width="50%" valign="top">
									<table width="100%" cellspacing="5" cellpadding="5">
									<tr>
										<td align="center" colspan="2">
											<span class="t1">Liste des professeurs</span>
										</td>
									</tr>
									<tr>
									<td align="center">
									Professeur
									</td>
									<td align="center">
									SOM
									</td>
									</tr>
									<?php
									$reponsey = $bdd->query('SELECT COUNT(*) FROM prof');
	 								while ($donnees3 = $reponsey->fetch()){
	 									$num2 = $donnees3['COUNT(*)'];
									}
								for ($i=1; $i < $num2+1 ; $i++) {
									$reponse8 = $bdd->query('SELECT Nom FROM prof WHERE Num=\''.$i.'\' ');
	 										while ($donnees3 = $reponse8->fetch()){
	 											$nom3= $donnees3['Nom'];
	 										}
									$reponse9 = $bdd->query('SELECT Prénom FROM prof WHERE Num=\''.$i.'\' ');
	 										while ($donnees3 = $reponse9->fetch()){
	 											$prénom3 = $donnees3['Prénom'];
	 										}
									$reponse10 = $bdd->query('SELECT SOM FROM prof WHERE Num=\''.$i.'\' ');
	 										while ($donnees3 = $reponse10->fetch()){
	 											$SOM3 = $donnees3['SOM'];
	 										}
	 										echo "<tr align='center'><td>";
	 								echo $nom3 ."<br>". $prénom3;
	 								echo "</td><td>";
	 								echo $SOM3 ;
	 								echo "</td></tr>";
	 								}
									 ?>
									 </table>
								</td>
							</tr>
						</table>
						<br>
						<table width="100%" class="dboard" cellpadding="5" cellspacing="5">
							<tr>
								<td width="100%" align="center">
									<span class="fail">Etudiants a seuil critique d'absence</span><br><br>
									<table width="100%">
									<tr>
									<td align="center" width="30%">
									Etudiant
									</td>
									<td align="center" width="25%">
									Abs non justifié
									</td>
									<td align="center" width="45%">
									Email
									</td>
									</tr>
									<?php
									$reponsex = $bdd->query('SELECT COUNT(*) FROM étudiant');
	 								while ($donnees2 = $reponsex->fetch()){
	 									$num = $donnees2['COUNT(*)'];
									}
									for ($i=1; $i < $num+1 ; $i++) {
										$reponse51 = $bdd->query('SELECT AbsGNJ FROM étudiant WHERE Num=\''.$i.'\'');
	 										while ($donnees = $reponse51->fetch()){
	 											$absgnj = $donnees['AbsGNJ'];
	 										}
										if ($absgnj > 3) {
											$reponse82 = $bdd->query('SELECT Nom FROM étudiant WHERE Num=\''.$i.'\' ');
	 										while ($donnees2 = $reponse82->fetch()){
	 											$nom2= $donnees2['Nom'];
	 										}
											$reponse92 = $bdd->query('SELECT Prénom FROM étudiant WHERE Num=\''.$i.'\' ');
	 										while ($donnees2 = $reponse92->fetch()){
	 											$prénom2 = $donnees2['Prénom'];
	 										}
											$reponse102 = $bdd->query('SELECT Email FROM étudiant WHERE Num=\''.$i.'\' ');
	 										while ($donnees2 = $reponse102->fetch()){
	 											$Email = $donnees2['Email'];
	 										}
	 										echo "<tr align='center'><td>";
	 										echo $nom2 ."<br>". $prénom2;
	 										echo "</td><td>";
	 										echo $absgnj ;
	 										echo "</td><td>";
	 										echo $Email ;
	 										echo "</td></tr>";
											}
	 								};
	 							?>
	 							</table>
								</td>
							</tr>
						</table>
					</td>
				</tr>
				<tr>
					<td width="25%" valign="top" align="center">
        				  <form method="POST" action="absence.php">
							<table width="100%" class="dboard" cellpadding="5" cellspacing="5" align="center">
							<tr>
								<td class="t1" align="center">
									Justifier l'absence
								</td>
							</tr>
							<tr>
								<td align="center">
									CNE <br> <input type="texte" name="CNE" placeholder="CNE" required class="write" size="36%">  <input type="hidden" name="typea" value="J">
								</td>
							</tr>
							<tr>
								<td align="center">
									SOM <br> <input type="texte" name="SOM" placeholder="SOM" required class="write" size="36%">						 </td>
							</tr>
							<tr>
								<td align="center">
									Date <br> <input type="date" class="write" name="date" size="36%" value="<?php echo date('Y-m-d'); ?>">
								</td>
							</tr>
							<tr>
								<td align="center">
									Crénau <br>
									<select name="crenau" class="write">
										<option value="8h-10h">8h-10h</option>
										<option value="10h-12h">10h-12h</option>
										<option value="13h-15h">13h-15h</option>
										<option value="15h-17h">15h-17h</option>
										<option value="17h-19h">17h-19h&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</option>
									</select>
								</td>
							</tr>
							<tr>
								<td align="right">
									<input type="image" name="sup" value="submit" src="abs.png" width="20%">
								</td>
							</tr>
						</table>
            			</form>
					</td>
				</tr>
			</table>
		</section>
	</body>
</html>

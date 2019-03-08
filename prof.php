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
if (isset($_SESSION['SOM'])) {
	$_POST['SOM'] = $_SESSION['SOM'];
}
else {
	$_SESSION['SOM'] = $_POST['SOM1'];
	$_POST['SOM'] = $_SESSION['SOM'];
}
?>
<?php
if (isset($_POST['SOM1'])) {
	$reponse = $bdd->query('SELECT Pass FROM prof WHERE SOM=\'' . $_SESSION['SOM'] . '\'');
	 	while ($donnees = $reponse->fetch()){
	 		$pass = $donnees['Pass'];
	 		}
	 	if ($pass != $_POST['Pass']) {
	 		$link = 'proffail2.php';
	 		header('Location:' .$link);
	 	}
}
?>
<?php
$reponse2 = $bdd->query('SELECT Nom FROM prof WHERE SOM=\'' . $_SESSION['SOM'] . '\'');
	 			while ($donnees = $reponse2->fetch()){
	 			$nom = $donnees['Nom'];
	 			}
	 		$reponse3 = $bdd->query('SELECT Prénom FROM prof WHERE SOM=\'' . $_SESSION['SOM'] . '\'');
	 			while ($donnees = $reponse3->fetch()){
	 			$prénom = $donnees['Prénom'];
	 			}
 ?>
<!DOCTYPE html>
<html>
	<head>
		<title>ENSATé Absence : Espace Professeur</title>
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
          <td width="50%" style="background-color: #FFFFFF;">
            <span class="t2"><a href="prof.php"> Marquer l'absence</a></span>
          </td>
          <td width="50%" style="background-color: #FFFFFF;">
            <span class="t1"><a href="consulter.php">Consulter les comptes rendus des absences</span>
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
									SOM : <?php echo $_POST['SOM'] ; ?>
								</td>
							</tr>
						</table>
					</td>
					<td width="75%" class="fboard" rowspan="2" valign="top">
						<table width="100%" cellpadding="5" cellspacing="5">
							<tr>
								<td align="center" colspan="3">
									<span class="t1">Liste des etudiants</span>
								</td>
							</tr>
							<tr>
								<td align="center">
									Nom
								</td>
								<td align="center">
									Prénom
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
	 								echo $nom2 ;
	 								echo "</td><td>";
	 								echo $prénom2 ;
	 								echo "</td><td>";
	 								echo $CNE2 ;
	 								echo "</td></tr>";
								};
	 							?>
						</table>
					</td>
				</tr>
				<tr>
					<td width="25%" valign="top" align="center">
          <form method="POST" action="absence.php">
						<table width="100%" class="dboard" cellpadding="5" cellspacing="5" align="center">
							<tr>
								<td class="t1" align="center">
									Marquer l'absence
								</td>
							</tr>
							<tr>
								<td align="center">
									CNE <br> <input type="texte" name="CNE" placeholder="CNE" required class="write" size="36%"> <input type="hidden" name="SOM" value="<?php echo "".$_POST['SOM']."" ?>"> <input type="hidden" name="typea" value="NJ">
								</td>
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
							<tr>
								<td align="center">
									Type d'enseignement <br>
									<select name="typec" class="write">
										<option value="TP">TP</option>
										<option value="TD">TD</option>
										<option value="Exposé">Exposé</option>
										<option value="Cours">Cours Magistral&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</option>
									</select>
								</td>
							</tr>
								<td align="center">
									Module <br>
									<select id="liste" name="module" class="write">
                    <?php
                    $reponsey = $bdd->query('SELECT COUNT(*) FROM module');
                      while ($donnees3 = $reponsey->fetch()){
                        $num2 = $donnees3['COUNT(*)'];
                      }

                    for ($i=1; $i < $num2+1 ; $i++) {
                      $reponse10 = $bdd->query('SELECT Module FROM module WHERE Num=\''.$i.'\' ');
                        while ($donnees3 = $reponse10->fetch()){
                          $module= $donnees3['Module'];
                        }
                    echo "<option value='";
                    echo $module;
                    echo "'>";
                    echo $module;
                    echo "</option>";
                    }
                  ?>
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

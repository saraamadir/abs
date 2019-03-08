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
            <span class="t1"><a href="home.php"> Gestion d'absence</a></span>
          </td>
          <td width="33%" style="background-color: #FFFFFF;">
            <span class="t1"><a href="consulter.php">Consulter les comptes rendus des absences</span>
          </td>
          <td width="33%" style="background-color: #FFFFFF;">
            <span class="t2"><a href="gestion.php">Gestion des bases de données</span>
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
					<td width="75%" align="center">
						<table width="100%" class="dboard" cellpadding="5" cellspacing="5" align="center">
							<tr>
								<form method="POST" action="reset.php">
								<td class="t1" align="center" width="75%">
									<br><br>
									Remettre le compteur d'absence à zero du semestre :<input type="texte" name="S" class="write" placeholder="Num" required>
									<br><br><br>
								</td>
								<td width="25%">

												 <input type="image" name="zero" src="reset.png" value="submit" width="20%"><input type="hidden" name="zero" value="zero">

								</td>
								</form>
							</tr>
						</table>
				</tr>
			</table>
						<table width="80%" align="center" cellpadding="10" cellspacing="10">
							<tr>
								<td width="50%" valign="top">
															<form method="Post" action="modprof.php">
							<table width="100%" class="dboard" cellpadding="5" cellspacing="5" align="center">
									<tr>
										<td align="center" colspan="2"><span class="t1">Modifier les informations d'un professeur :</span></td>
									</tr>
									<tr>
										<td align="center" colspan="2">Prénom :<input type="texte" size="36%" name="Prénom" placeholder="Prénom"  class="write" required></td>
									</tr>
									<tr>
										<td align="center" colspan="2">Nom :<input type="texte" name="Nom" size="39%" class="write" placeholder="Nom" required></td>
									</tr>
									<tr>
										<td colspan="2" align="center">SOM :<input type="texte" name="SOM" placeholder="SOM" size="39%" class="write" required></td>
									</tr>
									<tr>
										<td width="50%" align="center">Sexe :&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="radio" name="Gender" value="M">Homme</td><td width="50%">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="radio" name="Gender" value="F">Femme</td>
									</tr>
									<tr>
										<td colspan="2" align="center">Email :<input type="texte" name="Email" size="39%" class="write" placeholder="Email" required></td>
									</tr>
									<tr>
										<td colspan="2" align="center">N° Téléphone :<input type="texte" name="Telephone" size="31%" class="write" placeholder="N° Téléphone" required></td>
									</tr>
									<tr align="right">
										<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
										<td width="100%"><input type="image" name="sup" value="submit" src="../go.png" width="30%"></td>
									</tr>
							</table>
						</form>
								</td>
								<td width="50%">
									<form method="Post" action="modetud.php">
							<table cellspacing="5" cellpadding="5" class="dboard">
									<tr>
										<td align="center" colspan="2"><span class="t1">Modifier les informations d'un élève :</span></td>
									</tr>
									<tr>
										<td align="center" colspan="2">Prénom :<input type="texte" size="36%" name="Prénom" placeholder="Prénom"  class="write" required></td>
									</tr>
									<tr>
										<td align="center" colspan="2">Nom :<input type="texte" name="Nom" size="39%" class="write" placeholder="Nom" required></td>
									</tr>
									<tr>
										<td colspan="2" align="center">CNE :<input type="texte" name="CNE" placeholder="CNE" size="39%" class="write" required></td>
									</tr>
									<tr>
										<td colspan="2" align="center">CIN :<input type="texte" name="CIN" placeholder="CIN" size="40%" class="write" required></td>
									</tr>
									<tr>
										<td colspan="2" align="center">Date de naissance :<input type="date" name="Date"  class="write" placeholder="aaaa-mm-jj" size="26%" required></td>
									</tr>
									<tr>
										<td colspan="2" align="center">Lieu de naissance :<input type="texte" name="Lieu"  class="write" placeholder="Lieu de naissance" size="26%" required></td>
									</tr>
									<tr>
										<td width="50%" align="center">Sexe :&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="radio" name="Sexe" value="M">Homme</td><td width="50%">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="radio" name="Sexe" value="F">Femme</td>
									</tr>
									<tr>
										<td colspan="2" align="center">Adresse :<input type="texte" name="Adresse" size="36%" class="write" placeholder="Adresse" required></td>
									</tr>
									<tr>
										<td colspan="2" align="center">Email :<input type="texte" name="Email" size="39%" class="write" placeholder="Email" required></td>
									</tr>
									<tr>
										<td colspan="2" align="center">N° Téléphone :<input type="texte" name="Telephone" size="31%" class="write" placeholder="N° Téléphone" required></td>
									</tr>
									<tr align="right">
										<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
										<td width="100%"><input type="image" name="sup" value="submit" src="../go.png" width="30%"></td>
									</tr>
							</table>
						</form>
								</td>
							</tr>
						</table>
		</section>
	</body>
</html>

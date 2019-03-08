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
						<form action="quitter.php" method="POST">
							<input type="hidden" name="by" value="yes">
							<input type="image" name="go" value="submit" src="../quitter.png" width="50%" class="img">
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
            <span class="t2"><a href="consulter.php">Consulter les comptes rendus des absences</span>
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
					<td width="25%" valign="top" class="ddboard">
						<table width="100%" class="dboard"  cellpadding="5" cellspacing="5">
							<tr>
								<td class="t3" align="center">
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
                        <hr/>
					</td>
					<td width="75%" rowspan="2" valign="top" class="dboard">
						<table width="100%" class="ddboard">
							<tr>
								<td  valign="top">
									<table class="gboard">
										<tr>
											<form method="POST" action="consulter.php">
											<td valign="top">
												<input type="texte" name="CNE" class="write" size="45%" placeholder="Entrez le CNE de l'étudiant que vous voulez"><input type="hidden" name="affich" value="one">
											</td>
											<td width="7%">
												<input type="image" name="sub" src="rech.png" value="submit" width="100%" class="img">
											</td>
											</form>
											<td width="15%" align="right">
												<span class="t1">Tous</span>
											</td>
											<td width="7%">
												<form method="POST" action="consulter.php">
												 <input type="image" name="all" src="all.png" value="submit" width="100%" class="img"><input type="hidden" name="affich" value="all">
												</form>
											</td>
										</tr>
									</table>
                            <hr/>
								</td>
							</tr>
							<tr>
								<td width="100%" valign="top">
									<?php
									echo "<table width='100%'>
												<tr>
													<td colspan='5' align='center'>
														<span class='t3'>Le Compte rendu des absences</span>
													</td>
												</tr>
												<tr>
													<td align='center'>
														Etudiant
													</td>
													<td align='center'>
														Module
													</td>
													<td align='center'>
														Date d'Absence
													</td>
													<td align='center'>
														Crénau d'Absence
													</td>
													<td align='center'>
														Type d'Absence
													</td>
												</tr>";
                                    if (isset($_POST['affich'] )){
										if ($_POST['affich'] == "all") {
											$reponsex = $bdd->query('SELECT COUNT(*) FROM absence');
	 								while ($donnees = $reponsex->fetch()){
	 									$num = $donnees['COUNT(*)'];
									}
								for ($i=1; $i < $num+1 ; $i++) {
									$reponse6 = $bdd->query('SELECT CNE FROM absence WHERE Num=\''.$i.'\' ');
	 								while ($donnees = $reponse6->fetch()){
	 									$cne = $donnees['CNE'];
									}
									$reponse61 = $bdd->query('SELECT Nom FROM étudiant WHERE CNE=\''.$cne.'\' ');
	 								while ($donnees = $reponse61->fetch()){
	 									$profn = $donnees['Nom'];
									}
									$reponse62 = $bdd->query('SELECT Prénom FROM étudiant WHERE CNE=\''.$cne.'\' ');
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
								};
										}
										elseif ($_POST['affich'] == "one") {
											$reponsex = $bdd->query('SELECT COUNT(*) FROM absence');
	 								while ($donnees = $reponsex->fetch()){
	 									$num = $donnees['COUNT(*)'];
									}
								for ($i=1; $i < $num+1 ; $i++) {
									$reponse6 = $bdd->query('SELECT CNE FROM absence WHERE Num=\''.$i.'\' ');
	 								while ($donnees = $reponse6->fetch()){
	 									$cne = $donnees['CNE'];
									}
									$reponse61 = $bdd->query('SELECT Nom FROM étudiant WHERE CNE=\''.$cne.'\' ');
	 								while ($donnees = $reponse61->fetch()){
	 									$profn = $donnees['Nom'];
									}
									$reponse62 = $bdd->query('SELECT Prénom FROM étudiant WHERE CNE=\''.$cne.'\' ');
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
	 								if ($cne == $_POST['CNE']){
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
										}
                                    }
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
									<span class="t4">CNE</span> <br> <input type="texte" name="CNE" placeholder="CNE" required class="write" size="36%">  <input type="hidden" name="typea" value="J">
								</td>
							</tr>
							<tr>
								<td align="center">
									<span class="t4">SOM</span> <br> <input type="texte" name="SOM" placeholder="SOM" required class="write" size="36%">						 </td>
							</tr>
							<tr>
								<td align="center">
									<span class="t4">Date</span>  <br> <input type="date" class="write" name="date" size="36%" value="<?php echo date('Y-m-d'); ?>">
								</td>
							</tr>
							<tr>
								<td align="center">
									<span class="t4">Crénau</span> <br>
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
									<input type="image" name="sup" value="submit" src="abs.png" width="20%" class="img">
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

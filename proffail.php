<?php 
session_start();
if (isset($_SESSION['SOM'])) {
	$_POST['SOM'] = $_SESSION['SOM'];
	$link = 'prof.php';
	 		header('Location:' .$link);
}
?>
<!DOCTYPE html>
<html>
	<head>
		<title>ENSATé Absence : Espace Professeure</title>
		<meta charset="utf-8">
		<link rel="stylesheet" type="text/css" href="index.css">
	</head>
	<body>
		<header>
			<table width="80%" align="center" class="hboard" cellpadding="5" cellspacing="5">
				<tr>
					<td>
						<a href="../index.html"><img src="../logo%20gi.png" width="30%"></a>
					</td>
                    <td  align="right">
						<a href="index.html"><img src="ensa2.png" width="30%"></a> 
					</td>
				</tr>
			</table>
			<br><br><br>
		</header>
		<section>
			<center>
			<div class="loginorsignup">
		
				<div class="login">
				
						<div class="text"><b>Se connecter</b></div>
					<form method="POST" action="prof.php">
						<table>
							<tr>
								<td colspan="2" align="center"><input type="texte" name="SOM1" placeholder="SOM" size="31%" class="write" required>
								</td>
							</tr>
							<tr>
								<td colspan="2" align="center">
									<input type="password" name="Pass"  class="write" placeholder="Mot de passe" size="31%" required><br>
								</td>
							</tr>
							<tr align="center">
								<td width="100%"><button name="sup" class="subm">Entrer</button></td>
							</tr>
						</table>
					</form>
				</div>
				
				
				<div class="signup">
						
					<div class="text"><b>S'enregistrer</b></div>
					<span class="fail">Le SOM que vous avez entrez est deja utilisé</span>
						<form method="Post" action="profregist.php" name="form">
							<table cellspacing="5" cellpadding="5">
									<tr>
										<td align="center" colspan="2"><input type="texte" size="36%" name="Prénom" placeholder="Prénom"  class="write" required onchange="Bonjour()"></td>
									</tr>
									<tr>
										<td align="center" colspan="2"><input type="texte" name="Nom" size="39%" class="write" placeholder="Nom" required onchange="Bonjour2()"></td>
									</tr>
									<tr>
										<td colspan="2" align="center"><input type="texte" name="SOM" placeholder="SOM" size="39%" class="write" required onchange="Bonjour31()"></td>
									</tr>
									<tr>
										<td colspan="2" align="center">
											<input type="password" name="Pass"  class="write" placeholder="Mot de passe" size="31%" required onchange="Bonjour4()"><br>
										</td>
									</tr>
									<tr>
										<td width="50%" align="center">
											  <select id="Sexe" name="Gender" style="padding:0px;">
												<option value="">Sexe</option>
												<option value="M">Masculin</option>
												<option value="F">Feminin</option>
											  </select>
										</td>
									</tr>
									<tr>
										<td colspan="2" align="center"><input type="texte" name="Email" size="39%" class="write" placeholder="Email" required onchange="Bonjour5()"></td>
									</tr>
									<tr>
										<td colspan="2" align="center"><input type="texte" name="Telephone" size="31%" class="write" placeholder="N° Téléphone" required onchange="Bonjour7()"></td>
									</tr>
									<tr>
									<td colspan="2" align="center"><input type="checkbox" name="confirm" style="width:10px;height:auto;" required><span>Je confirme que je suis un professeur de GI1 à ENSA Tétouan.</span></td>
									</tr>				
									
									<tr align="right">
										<td width="100%"><button name="sup" class="subm">Enregistrer</button></td>
									</tr>
							</table>
						</form>	
				</div>
				
					
			</div>	
			</center>	
		</section>
		<script src="../index.js"></script>
	</body>
</html>
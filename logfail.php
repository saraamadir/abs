<?php 
session_start();
if (isset($_SESSION['NomUtil'])) {
	$_POST['NomUtil'] = $_SESSION['NomUtil'];
	$link = 'home.php';
	 		header('Location:' .$link);
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
					<td>
						<a href="../index.html"><img src="../logo%20gi.png" width="30%"></a>
					</td>
                    <td  align="right">
						<a href="index.html"><img src="ensa2.png" width="30%"></a> 
					</td>
				</tr>
			</table>
			<br><br><br><br><br>
		</header>
		<section>
		<center>
			<div class="login">
				<div class="logintext">
                    <span class="fail">Le mot de passe ou le nom d'utilisateure est incorrecte</span>
					<b>Se connecter</b>
				</div>
					<form method="Post" action="login.php">
						<table width="100%">
							<tr>
								<td colspan="2" align="center"><input type="texte" name="NomUtil1" placeholder="Nom d'utilisateur" class="write" required>
								</td>
							</tr>
							<tr>
								<td colspan="2" align="center">
									<input type="password" name="Pass"  class="write" placeholder="Mot de passe" required><br>
								</td>
							</tr>
							<tr align="center">
								<td width="100%"><button name="sup" class="subm">Entrer</button></td>
							</tr>
						</table>
					</form>

			</div>
		</center>
					
		</section>
	</body>
</html>
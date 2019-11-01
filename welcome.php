<?php
	session_start();
	if(!isset($_SESSION['registered']))
	{
		header('Location: index.php');
		exit();
	}
	else
	{
		unset($_SESSION['registered']);
	}

	if(isset($_SESSION['fr_login'])) unset($_SESSION['fr_login']);
	if(isset($_SESSION['fr_email'])) unset($_SESSION['fr_email']);
	if(isset($_SESSION['fr_password1'])) unset($_SESSION['fr_password1']);
	if(isset($_SESSION['fr_password2'])) unset($_SESSION['fr_password2']);
	if(isset($_SESSION['fr_regulations'])) unset($_SESSION['fr_regulations']);

	if(isset($_SESSION['e_login'])) unset($_SESSION['e_login']);
	if(isset($_SESSION['e_email'])) unset($_SESSION['e_email']);
	if(isset($_SESSION['e_password'])) unset($_SESSION['e_password']);
	if(isset($_SESSION['e_regulations'])) unset($_SESSION['e_regulations']);
	if(isset($_SESSION['e_bot'])) unset($_SESSION['e_bot']);
?>

<!DOCTYPE html>
<html lang="pl">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Armand Pajor</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
	<script src="https://use.fontawesome.com/releases/v5.0.8/js/all.js"></script>
	<link href="css/style.css" rel="stylesheet">
</head>
<body>
<header class="jumbotron" style="margin-bottom: 0px;">
	<div class="row">
		<div class="col-md-10">
			<h1>Wiersze, cytaty i zagadki</h1>
			<h3>Blog poświęcony twórczości poetyckiej</h3>
		</div>
		<div class="col-md-2">
		<a href="register.php">Załóż nowe konto!</a>
			<?php
				if($_SESSION['isLogged'] == FALSE)
				{
					echo '<form action="login.php" method="post">';
					echo 'Login: <br><input type="text" name="login"><br>';
					echo 'Hasło: <br><input type="password" name="password"><br><br>';
					echo '<input type="submit" value="Zaloguj się"></form>';
					if(isset($_SESSION['blad']))
						echo $_SESSION['blad'];
				} else {
					echo '<p>Witaj '.$_SESSION['login'].'!<br>[<a href="logout.php">Wyloguj się!</a>]</p>';
				}
			?>
		</div>
	</div>
</header>
<nav class="navbar navbar-expand-md navbar-dark bg-dark sticky-top">

	<button class="navbar-toggler" data-toggle="collapse" data-target="#collapse_target">
		<span class="navbar-toggler-icon"></span>
	</button>

	<div class="collapse navbar-collapse" id="collapse_target">
		<a class="navbar-brand"><img src="img/feather-ink-pen-512.png" width="50px" height="50px"></a>
		<ul class="navbar-nav">
			<li class="nav-link" href="#">
				<a class="nav-link" href="#">O mnie</a>
			</li>
			<li class="nav-link" href="#">
				<a class="nav-link" href="#">Zbiór wierszy</a>
			</li>
			<li class="nav-link" href="#">
				<a class="nav-link dropdown-toggle" data-toggle="dropdown" data-target="dropdown_target" href="#">
					Inne
					<span class="caret"></span>
				</a>
				<div class="dropdown-menu" aria-labelledby="dropdown_target">
					<ul class="navbar-nav">
						<a class="dropdown-item" href="#">Cytaty</a>
						<a class="dropdown-item" href="#">Zagadki</a>
					</ul>
				</div>
			</li>	
		</ul>
	</div>
</nav>
<br>
<h2>Dziękujemy za rejestrację!</h2><br>
<h3>Możesz już zalogować się na swoje konto!</h3><br>
<a href="index.php">Zaloguj się na swoje konto!</a>

<footer>
		<div class="container-fluid padding">
			<div class="row text-center">
				<div class="col-md-12">
					<hr class="light">
					<h5>Kontakt</h5>
					<hr class="light">
					<p>e-mail: pajorarmand@gmail.com</p>
				</div>
				<div class="col-12">
					<hr class="light-100">
					<h5>&copy; Armand Pajor</h5>
				</div>
			</div>
		</div>
	</footer>
</body>
</html>



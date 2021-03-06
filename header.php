<!DOCTYPE html>
<html lang="pl">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" conent="Wiersze, cytaty i zagadki. Blog poświęcony twórczości poetyckiej.">
	<meta name="keywords" content="blog, wiersze, cytaty, zagadki, refleksje, poezja, przemyślenia, pasja, twórczość">
	<meta name="robots" content="index, follow">
	<title>Armand Pajor</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<link href="css/style.css" rel="stylesheet">
	<link href="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.12/summernote-bs4.css" rel="stylesheet">
</head>
<body>
	<header class="jumbotron" style="margin-bottom: 0px;">
		<div class="row">
			<div class="col-lg-9">
				<h1>Wiersze, cytaty i zagadki</h1>
				<h3>Blog poświęcony twórczości poetyckiej</h3>
				<?php
					if(!$_SESSION['isLogged'])
					{
						echo '<p>Nie masz jeszcze konta? <a href="register.php">Zarejestruj się</a> już dziś!</p>';
					}
				?>
			</div>
			<div class="col-lg-3">
			<?php
					if(!$_SESSION['isLogged'])
					{
						echo '<form action="login.php" method="post">';
						echo '<input class="form-control" placeholder="Login" type="text" name="login">';
						echo '<br><input class="form-control" placeholder="Hasło" type="password" name="password"><br>';
						echo '<input class="btn btn-secondary btn-block" type="submit" value="Zaloguj się"></form>';
						
						if(isset($_SESSION['blad']))
						{
							echo $_SESSION['blad'];
						}
					} 
					else 
					{
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
					<a class="nav-link" href="index.php">O mnie</a>
				</li>
				<li class="nav-link" href="#">
					<a class="nav-link" href="wiersze.php">Wiersze</a>
				</li>
				<li class="nav-link" href="#">
					<a class="nav-link" href="cytaty.php">Cytaty</a>
				</li>
				<li class="nav-link" href="#">
					<a class="nav-link" href="zagadki.php">Zagadki</a>
				</li>
			</ul>
		</div>
	</nav>
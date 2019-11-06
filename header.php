<!DOCTYPE html>
<html lang="pl">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
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
			</div>
			<div class="col-lg-3">
			<?php
					if($_SESSION['isLogged'] == FALSE)
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
					<a class="nav-link" href="wiersze.php">Zbiór wierszy</a>
				</li>
				<li class="nav-link" href="#">
					<a class="nav-link dropdown-toggle" data-toggle="dropdown" data-target="dropdown_target" href="#">
						Inne
						<span class="caret"></span>
					</a>
					<div class="dropdown-menu" aria-labelledby="dropdown_target">
						<ul class="navbar-nav">
							<a class="dropdown-item" href="cytaty.php">Cytaty</a>
							<a class="dropdown-item" href="zagadki.php">Zagadki</a>
						</ul>
					</div>
				</li>	
			</ul>
		</div>
	</nav>
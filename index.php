<?php
	session_start();
	include_once("db.php");
?>

<!DOCTYPE html>
<html lang="en">
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
	<h1>Wiersze, cytaty i zagadki</h1>
	<h3>Blog poświęcony twórczości poetyckiej</h3>
</header>
<!-- Navigation -->
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

<div class="row">
	<div class="col-md-12" style="padding: 1%;">
		<?php
			require_once("nbbc/nbbc.php");

			$bbcode = new BBCode;

			$sql = "SELECT * FROM posts ORDER BY id DESC";

			$result = mysqli_query($db, $sql) or die(mysqli_error());

			$posts = "";

			if(mysqli_num_rows($result) > 0) {
				while($row = mysqli_fetch_assoc($result)) {
					$id = $row['id'];
					$title = $row['title'];
					$content = $row['content'];
					$date = $row['date'];

					$admin = "<div><a href='del_post.php?pid=$id'>Delete</a>$nbsp;<a href='edit_post.php?pid=$id'>Edit</a></div>";

					$output = $bbcode->Parse($content);

					$posts .= "<div><h2><a href='view_post.php?pid=$id'>$title</a></h2><h3>$date</h3><p>$output</p>$admin<hr></div>";
				}
				echo $posts;
			} else {
				echo "There are no posts to display<br><a href='post.php'>Click</a>";
			}
		?>
	</div>
</div>

<footer>
		<div class="container-fluid padding">
			<div class="row text-center">
				<div class="col-md-12">
					<hr class="light">
					<h5>Contact</h5>
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


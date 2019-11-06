<?php
	session_start();
	if(!isset($_SESSION['isLogged']))
		$_SESSION['isLogged'] = FALSE;
	include_once("connect.php");
?>

<!DOCTYPE html>
<html lang="pl">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Armand Pajor</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
		integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
	<script src="https://use.fontawesome.com/releases/v5.0.8/js/all.js"></script>
	<link href="css/style.css" rel="stylesheet">
	<link href="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.12/summernote-bs4.css" rel="stylesheet">
	<script src="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.12/summernote-bs4.js"></script>
	<script src="scripts/summernote-pl-PL.js"></script>
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
					<a class="nav-link" href="index.php">Główna</a>
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
		<div class="col-md-6" style="padding: 5%;">
			<?php
				try
				{
					$connection = @mysqli_connect($db_host, $db_login, $db_password, $db_name);

					if (!$connection) 
					{
						throw new Exception(mysqli_connect_errno());
					} 
					else 
					{
						$pid = $_GET['pid'];
						$_SESSION['pid'] = $pid;
						$sql = "SELECT * FROM posts WHERE post_id=$pid";
						$result = mysqli_query($connection, $sql) or die(mysqli_error());
						$posts = "";
						$comment_table = "";

						if(mysqli_num_rows($result) > 0) 
						{
							while($row = mysqli_fetch_assoc($result)) 
							{
								$id = $row['post_id'];
								$title = $row['title'];
								$login = $row['login'];
								$content = $row['content'];
								$date = $row['post_date'];
								$admin = '<div class="p-2">'."<a href='del_post.php?pid=$id'>Usuń</a></div>".'<div class="p-2">'."<a href='index.php?pid=$id'>Edytuj</a></div>";
								$posts .= '<div class="alert alert-dark" role="alert">';
								$posts .= '<h3 class="alert-heading text-center"><a href="">'.$title.'</a></h3>';
								$posts .= '<div class="d-flex justify-content-between">'."<h5>$login</h5><h5>$date</h5></div><hr>";
								$posts .= '<div class="text-justify">'.$content.'</div>';
								$posts .= '<div class="d-flex">';
								
								if($_SESSION['isLogged'])
								{
									if((isset($_SESSION['privilege'])) && ($_SESSION['privilege'] == 1))
									{
										$posts .= "$admin";
									}
								}
							}

							echo "$posts</div></div><br>";
							$result->free_result();

							$sql = "SELECT * FROM comments WHERE post_id=$pid";
							$result = mysqli_query($connection, $sql) or die(mysqli_error());

							while($row = mysqli_fetch_assoc($result)) 
							{
								$comment_id = $row['comment_id'];
								$comment_login = $row['comment_login'];
								$comment_text = $row['comment_text'];
								$comment_date = $row['comment_date'];
								$comment_table .= '<ul class="media-list"><li class="media"><div class="media-body"><strong class="text-success">'.$comment_login.'</strong><p>'.$comment_text.'</p></div></li></ul>';
							}

							$comment_panel = '<div class="col-md-6 col-sm-12">';
							$comment_panel .= '<h3>Sekcja komentarzy</h3>';
							$comment_panel .= '<form action="add_comment.php" method="post">';
							$comment_panel .= '<textarea class="form-control" name="text" placeholder="napisz komentarz..." rows="3"></textarea><br>';
							if(isset($_SESSION['e_comment']))
							{
									$comment_panel .= '<div class="alert alert-danger">'.$_SESSION['e_comment'].'</div>';
									unset($_SESSION['e_comment']);	
							}
							$comment_panel .= '<input class="btn btn-info btn-block" name="submit" type="submit" value="Zatwierdź"></form><hr>';
							$comment_panel .= $comment_table;
							$comment_panel .= '</div>';

							echo $comment_panel;
						}
						$result->free_result();
					}
					$connection->close();
				} 
				catch (Exception $e) 
				{
					echo '<span style="color:red;">Błąd serwera! Przepraszamy za niedogoności i prosimy o rejestrację w innym terminie!</span>';
					echo '<br>Informacja developerska: '.$e;
				}
			?>
		</div>
	</div>

	<footer id="sticky-footer" class="py-4 bg-dark text-white-50">
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
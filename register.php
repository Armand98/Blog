<?php
	session_start();

    if(isset($_POST['email']))
    {
        $accept = true;
        $login = $_POST['login'];

        if((strlen($login)<3) || (strlen($login)>20))
        {
            $accept = false;
            $_SESSION['e_login'] = "Login musi posiadać od 3 do 20 znaków!";
        }

        if(ctype_alnum($login)==false)
        {
            $accept = false;
            $_SESSION['e_login']="Login może składać się tylko z liter i cyfr (bez polskich znaków)";
        }

        $email = $_POST['email'];
        $emailB = filter_var($email, FILTER_SANITIZE_EMAIL);
        if((filter_var($emailB, FILTER_VALIDATE_EMAIL)==false) || ($emailB != $email))
        {
            $accept = false;
            $_SESSION['e_email']="Podaj poprawny adres e-mail";
        }

        $password1 = $_POST['password1'];
        $password2 = $_POST['password2'];

        if((strlen($password1)<8) || (strlen($password1)>20)) 
        {
            $accept = false;
            $_SESSION['e_password']="Hasło musi posiadać od 8 do 20 znaków!";
        }

        if($password1 != $password2) 
        {
            $accept = false;
            $_SESSION['e_password']="Podane hasła muszą być takie same!";
        }

        $password_hash = password_hash($password1, PASSWORD_DEFAULT);

        if(!isset($_POST['regulations'])) 
        {
            $accept = false;
            $_SESSION['e_regulations']="Zaakceptuj regulamin!";
        }

        $secret_key = "6LdzeMAUAAAAADSFtvQbChlweCOJkopZYxVBSTXv";
        $check = file_get_contents('https://www.google.com/recaptcha/api/siteverify?secret='.$secret_key.'&response='.$_POST['g-recaptcha-response']);
        $answer = json_decode($check);

        if(!$answer->success) 
        {
            $accept = false;
            $_SESSION['e_bot']="Potwierdź, że nie jesteś botem!";
        }

        $_SESSION['fr_login'] = $login;
        $_SESSION['fr_email'] = $email;
        $_SESSION['fr_password1'] = $password1;
        $_SESSION['fr_password2'] = $password2;
        if(isset($_POST['regulations'])) $_SESSION['fr_regulations'] = true;

        require_once("connect.php");
        mysqli_report(MYSQLI_REPORT_STRICT);

        try {
            $connection = @mysqli_connect($db_host, $db_login, $db_password, $db_name);
            if (!$connection) 
            {
                throw new Exception(mysqli_connect_errno());
            } 
            else 
            {
                $sql = "SELECT user_id FROM users WHERE email='$email'";
                $result = mysqli_query($connection, $sql);

                if(!$result) throw new Exception($connection->error);
                
                $emails_quantity = $result->num_rows;
                if($emails_quantity>0)
                {
                    $accept = false;
                    $_SESSION['e_email']="Ten email jest już wykorzystany!";
                }

                $sql = "SELECT user_id FROM users WHERE login='$login'";
                $result = mysqli_query($connection, $sql);

                if(!$result) throw new Exception($connection->error);
                
                $logins_quantity = $result->num_rows;

                if($logins_quantity>0)
                {
                    $accept = false;
                    $_SESSION['e_login']="Ten login jest już wykorzystany!";
                }

                if($accept)
                {
                    $date = date('Y-m-d H:i:s');
                    $sql = "INSERT INTO users VALUES (NULL, '$login', '$password_hash', '$email', '$date', 0)";

                    if($connection->query($sql))
                    {
                        $_SESSION['registered'] = true;
                        header('Location: welcome.php');
                    }
                    
                }
                $connection->close();
            }

        } catch (Exception $e) {
            echo '<span style="color:red;">Błąd serwera! Przepraszamy za niedogoności i prosimy o rejestrację w innym terminie!</span>';
            echo '<br>Informacja developerska: '.$e;
        }
    }
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
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
	<link href="css/style.css" rel="stylesheet">
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
        <div class="col-md-12 d-flex justify-content-center m-4">
            <form method="post">
                <input class="form-control" type="text" placeholder="Login" value='<?php 
                    if(isset($_SESSION['fr_login']))
                    {
                        echo $_SESSION['fr_login'];
                        unset($_SESSION['fr_login']);
                    }
                ?>' name="login"><br>

                <?php
                    if(isset($_SESSION['e_login']))
                    {
                        echo '<div class="alert alert-danger">'.$_SESSION['e_login'].'</div>';
                        unset($_SESSION['e_login']);
                    }
                ?>

                <input class="form-control" type="text" placeholder="Adres e-mail" value='<?php 
                    if(isset($_SESSION['fr_email']))
                    {
                        echo $_SESSION['fr_email'];
                        unset($_SESSION['fr_email']);
                    }
                ?>' name="email"><br>

                <?php
                    if(isset($_SESSION['e_email']))
                    {
                        echo '<div class="alert alert-danger">'.$_SESSION['e_email'].'</div>';
                        unset($_SESSION['e_email']);
                    }
                ?>

                <input class="form-control" type="password" placeholder="Hasło" value='<?php 
                    if(isset($_SESSION['fr_password1']))
                    {
                        echo $_SESSION['fr_password1'];
                        unset($_SESSION['fr_password1']);
                    }
                ?>' name="password1"><br>

                <?php
                    if(isset($_SESSION['e_password']))
                    {
                        echo '<div class="alert alert-danger">'.$_SESSION['e_password'].'</div>';
                        unset($_SESSION['e_password']);
                    }
                ?>

                <input class="form-control" type="password" placeholder="Potwierdź hasło" value='<?php 
                    if(isset($_SESSION['fr_password2']))
                    {
                        echo $_SESSION['fr_password2'];
                        unset($_SESSION['fr_password2']);
                    }
                ?>' name="password2"><br>

                <div class="form-group form-check">
                    <input class="form-check-input" type="checkbox" <?php 
                    if(isset($_SESSION['fr_regulations']))
                    {
                        echo "checked";
                        unset($_SESSION['fr_regulations']);
                    }
                    ?> name="regulations">
                    <label class="form-check-label" for="exampleCheck1">Akceptuję <a href="">regulamin</a></label>
                </div>
                

                <?php
                    if(isset($_SESSION['e_regulations']))
                    {
                        echo '<div class="alert alert-danger">'.$_SESSION['e_regulations'].'</div>';
                        unset($_SESSION['e_regulations']);
                    }
                ?>

                <div class="g-recaptcha" data-sitekey="6LdzeMAUAAAAABdy4Qoitsvj5cW7wWavnug5MgWc"></div><br>

                <?php
                    if(isset($_SESSION['e_bot']))
                    {
                        echo '<div class="alert alert-danger">'.$_SESSION['e_bot'].'</div>';
                        unset($_SESSION['e_bot']);
                    }
                ?>

                <input class="btn btn-primary btn-block" type="submit" value="Załóż konto">
            </form>
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



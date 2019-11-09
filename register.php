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

        $secret_key = "6LdU58AUAAAAAGo7ADUCm8b00wKZtbj_R82VD7Kr";
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

        try {
            include("connect.php");
            mysqli_report(MYSQLI_REPORT_STRICT);
            if (!$connection) 
            {
                throw new Exception(mysqli_connect_errno());
            } 
            else 
            {
                $sql = "SELECT user_id FROM user WHERE email='$email'";
                $result = mysqli_query($connection, $sql);

                if(!$result) throw new Exception($connection->error);
                
                $emails_quantity = $result->num_rows;
                if($emails_quantity>0)
                {
                    $accept = false;
                    $_SESSION['e_email']="Ten email jest już wykorzystany!";
                }

                $sql = "SELECT user_id FROM user WHERE login='$login'";
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
                    $sql = "INSERT INTO user VALUES (NULL, '$login', '$password_hash', '$email', '$date', 0)";

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

    include("header.php");
?>
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

            <div class="g-recaptcha" data-sitekey="6LdU58AUAAAAAFLJadJRNQSwTLLfE-0d_cS6vMas"></div><br>

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

<?php include("footer.php") ?>



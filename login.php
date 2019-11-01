<?php
    session_start();

    if((!isset($_POST['login'])) || (!isset($_POST['password'])))
    {
        header("Location: index.php");
        exit();
    }

    require_once("connect.php");

    $connection = @mysqli_connect($db_host, $db_login, $db_password, $db_name);

    if (!$connection) {
        die("Nie udało się połączyć z bazą danych.");
    } else {
        $login = $_POST['login'];
        $password = $_POST['password'];
    
        $sql = sprintf("SELECT * FROM users WHERE login='%s'",
                        mysqli_real_escape_string($connection, $login));
    
        if($result = @mysqli_query($connection, $sql))
        {
            $usersQuantity = mysqli_num_rows($result);
            if($usersQuantity > 0)
            {
                $row = $result->fetch_assoc();

                if(password_verify($password, $row['password']))
                {
                    $_SESSION['isLogged'] = TRUE;
                    $_SESSION['login'] = $row['login'];
                    unset($_SESSION['blad']);
                    $result->free_result();
                } else {
                    $_SESSION['blad'] = '<span style="color:red">Nieprawidłowy login lub hasło!</span>';
                }
            } else {
                $_SESSION['blad'] = '<span style="color:red">Nieprawidłowy login lub hasło!</span>';
            }
        }
        header("Location: index.php");
        $connection->close();
    }
?>
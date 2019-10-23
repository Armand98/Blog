<?php
    session_start();

    if((!isset($_POST['login'])) || (!isset($_POST['password'])))
    {
        header("Location: index.php");
        exit();
    }

    require_once("connect.php");

    $connection = @mysqli_connect($host, $login, $password, $name);

    if (!$connection) {
        die("Nie udało się połączyć z bazą danych.");
    } else {
        $login = $_POST['login'];
        $password = $_POST['password'];

        $login = htmlentities($login, ENT_QUOTES, "UTF-8");
        $password = htmlentities($password, ENT_QUOTES, "UTF-8");
    
        $sql = sprintf("SELECT * FROM users WHERE login='%s' AND password='%s'",
                        mysqli_real_escape_string($connection, $login),
                        mysqli_real_escape_string($connection, $password));
    
        if($result = @mysqli_query($connection, $sql))
        {
            $usersQuantity = mysqli_num_rows($result);
            if($usersQuantity > 0)
            {
                $row = $result->fetch_assoc();
                $_SESSION['login'] = $row['login'];
                
                
                unset($_SESSION['blad']);
                $_SESSION['isLogged'] = TRUE;
                $result->free_result();
            } else {
                $_SESSION['blad'] = '<span style="color:red">Nieprawidłowy login lub hasło!</span>';
            }
        }
        header("Location: index.php");
        $connection->close();
    }
?>
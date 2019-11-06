<?php
    session_start();

    if((!isset($_POST['login'])) || (!isset($_POST['password'])))
    {
        header("Location: index.php");
        exit();
    }

    try 
    {
        include("connect.php");
        if (!$connection) 
        {
            throw new Exception(mysqli_connect_errno());
        }
        else
        {
            $login = $_POST['login'];
            $password = $_POST['password'];
            $sql = sprintf("SELECT * FROM user WHERE login='%s'", mysqli_real_escape_string($connection, $login));
        
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
                        $_SESSION['privilege'] = $row['privilege'];
                        unset($_SESSION['blad']);
                        $result->free_result();
                    } else {
                        $_SESSION['blad'] = '<div class="alert alert-danger">Nieprawidłowe dane!</div>';
                    }
                } else {
                    $_SESSION['blad'] = '<div class="alert alert-danger">Nieprawidłowe dane!</div>';
                }
            }
            header("Location: index.php");
            $connection->close();
        }
    }
    catch (Exception $e) 
    {
        echo '<span style="color:red;">Błąd serwera! Przepraszamy za niedogoności i prosimy o rejestrację w innym terminie!</span>';
        echo '<br>Informacja developerska: '.$e;
    }
?>
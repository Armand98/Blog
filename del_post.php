<?php
    session_start();
    include_once("connect.php");

    if(!isset($_GET['pid']))
    {
        header("Location: index.php");
    }
    else
    {
        try
        {
            $connection = @mysqli_connect($db_host, $db_login, $db_password, $db_name);
            $pid = $_GET['pid'];
            $sql = "DELETE FROM posts WHERE post_id=$pid";
            mysqli_query($connection, $sql);
            header("Location: index.php");
            $connection->close();
        }
        catch (Exception $e) {
            echo '<span style="color:red;">Błąd serwera! Przepraszamy za niedogoności i prosimy o rejestrację w innym terminie!</span>';
            echo '<br>Informacja developerska: '.$e;
        }
    }
?>
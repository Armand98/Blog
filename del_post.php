<?php
    session_start();

    if(!isset($_GET['pid']))
    {
        header("Location: index.php");
    }
    else
    {
        try
        {
            include_once("connect.php");
            $pid = $_GET['pid'];
            $sql = "DELETE FROM post WHERE post_id=$pid";
            mysqli_query($connection, $sql);
            header("Location: wiersze.php");
            $connection->close();
        }
        catch (Exception $e) {
            echo '<span style="color:red;">Błąd serwera! Przepraszamy za niedogoności i prosimy o rejestrację w innym terminie!</span>';
            echo '<br>Informacja developerska: '.$e;
        }
    }
?>
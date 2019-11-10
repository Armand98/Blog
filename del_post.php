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
            $type = $_GET['type'];
            $table = "post";
            $header = "wiersze";
			if ($type == 2)
			{
                $table = "quote";
                $header = "cytaty";
			}
			else if ($type == 3)
			{
                $table = "puzzle";
                $header = "zagadki";
			}
            $sql = "DELETE FROM $table WHERE id=$pid";
            mysqli_query($connection, $sql);
            header("Location: $header.php");
            $connection->close();
        }
        catch (Exception $e) {
            echo '<span style="color:red;">Błąd serwera! Przepraszamy za niedogoności i prosimy o rejestrację w innym terminie!</span>';
            echo '<br>Informacja developerska: '.$e;
        }
    }
?>
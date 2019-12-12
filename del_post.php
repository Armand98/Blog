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

            if($type == 1) {
				$table = "post";
			} else if ($type == 2) {
				$table = "quote";
			} else if ($type == 3) {
				$table = "puzzle";
			} else {
				echo '<script>alert("Nie kombinuj ;)")</script>';
				echo '<script>window.location.replace("http://localhost/blog/index.php")</script>';
            }
            
            $sql = "DELETE FROM $table WHERE id=$pid";
            mysqli_query($connection, $sql);

            if($table == 'post')
                header("Location: wiersze.php");
            else if($table == 'quote')
                header("Location: cytaty.php");
            else if($table == 'puzzle')
                header("Location: zagadki.php");
            else
                header("Location: index.php");
                
            $connection->close();
        }
        catch (Exception $e) {
            echo '<span style="color:red;">Błąd serwera! Przepraszamy za niedogoności i prosimy o rejestrację w innym terminie!</span>';
            echo '<br>Informacja developerska: '.$e;
        }
    }
?>
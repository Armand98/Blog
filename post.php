<?php
    session_start();
    include_once("connect.php");
    try 
    {
        if (!$connection) 
        {
            throw new Exception(mysqli_connect_errno());
        }
        else
        {
            if(isset($_POST['post'])) 
            {
                $title = strip_tags($_POST['title']);
                $content = $_POST['content'];
                $title = mysqli_real_escape_string($connection, $title);
                $content = mysqli_real_escape_string($connection, $content);
                $date = date('Y-m-d H:i:s');
                $login = $_SESSION['login'];
                $sql = "INSERT INTO posts (login, title ,content, post_date) VALUES ('$login', '$title', '$content', '$date')";

                if($title == "" || $content == "") {
                    $_SESSION['e_post'] = '<div class="alert alert-danger text-center">Uzupełnij swój wpis!</div>';
                    header("Location: index.php");
                }
                else
                {
                    mysqli_query($connection, $sql);
                    header("Location: index.php");
                }
            }
            $connection->close();
        }
    } catch (Exception $e) {
        echo '<span style="color:red;">Błąd serwera! Przepraszamy za niedogoności i prosimy o rejestrację w innym terminie!</span>';
        echo '<br>Informacja developerska: '.$e;
    }
?>
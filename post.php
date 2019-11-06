<?php
    session_start();
    try 
    {
        include_once("connect.php");
        if (!$connection) 
        {
            throw new Exception(mysqli_connect_errno());
        }
        else
        {
            if(isset($_POST['post'])) 
            {
                $table = $_POST['table'];
                $title = strip_tags($_POST['title']);
                $content = $_POST['content'];
                $title = mysqli_real_escape_string($connection, $title);
                $content = mysqli_real_escape_string($connection, $content);
                $date = date('Y-m-d H:i:s');
                $login = $_SESSION['login'];
                $sql = "INSERT INTO $table (login, title ,content, date) VALUES ('$login', '$title', '$content', '$date')";

                if($title == "" || $content == "") {
                    $_SESSION['e_post'] = '<div class="alert alert-danger text-center">Uzupełnij swój wpis!</div>';
                }
                else
                {
                    mysqli_query($connection, $sql);
                    if($table == 'post')
                        header("Location: wiersze.php");
                    else if($table == 'quote')
                        header("Location: cytaty.php");
                    else if($table == 'puzzle')
                        header("Location: zagadki.php");
                }
            }
            $connection->close();
        }
    } catch (Exception $e) {
        echo '<span style="color:red;">Błąd serwera! Przepraszamy za niedogoności i prosimy o rejestrację w innym terminie!</span>';
        echo '<br>Informacja developerska: '.$e;
    }
?>

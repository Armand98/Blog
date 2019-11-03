<?php
    session_start();
    include_once("connect.php");

    try 
    {
        $connection = @mysqli_connect($db_host, $db_login, $db_password, $db_name);
        if (!$connection) 
        {
            throw new Exception(mysqli_connect_errno());
        }
        else
        {
            if(isset($_POST['post'])) 
            {
                require_once("Bbcode/BbCode.php");
                $bbcode = new BbCode();
                $title = strip_tags($_POST['title']);
                $content = strip_tags($_POST['content']);
                $title = mysqli_real_escape_string($connection, $title);
                $content = mysqli_real_escape_string($connection, $content);
                $date = date('Y-m-d H:i:s');
                $login = $_SESSION['login'];
                $sql = "UPDATE posts SET title='$title',content='$content', post_date='$date'";
                echo "$title<br>$content<br>$date<br>$login<br>$sql";

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
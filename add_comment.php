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
            if(isset($_POST['submit'])) 
            {
                $pid = $_SESSION['pid'];
                $comment_text = $_POST['text'];
                $comment_text = mysqli_real_escape_string($connection, $comment_text);
                $date = date('Y-m-d H:i:s');
                if(isset($_POST['login']))
                {
                    $login = $_POST['login'];
                } else {
                    $login = "Anonymous";
                }
                $sql = "INSERT INTO comments (comment_login, post_id, comment_date, comment_text) VALUES ('$login', '$pid', '$date', '$comment_text')";

                if($comment_text == "") {
                    $_SESSION['e_comment'] = '<div class="alert alert-danger text-center">Uzupełnij swój wpis!</div>';
                    header("Location: comment_post.php?pid=".$pid);
                }
                else
                {
                    mysqli_query($connection, $sql);
                    header("Location: comment_post.php?pid=".$pid);
                }
            }
            $connection->close();
        }
    } catch (Exception $e) {
        echo '<span style="color:red;">Błąd serwera! Przepraszamy za niedogoności i prosimy o rejestrację w innym terminie!</span>';
        echo '<br>Informacja developerska: '.$e;
    }
?>
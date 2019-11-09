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
            if(isset($_POST['submit'])) 
            {
                $pid = $_GET['pid'];
                $type = $_GET['type']; 
                $comment_text = $_POST['text'];
                $comment_text = mysqli_real_escape_string($connection, $comment_text);
                $date = date('Y-m-d H:i:s');
                if(isset($_SESSION['login']))
                {
                    $login = $_SESSION['login'];
                } else {
                    $login = "Anonymous";
                }
                $sql = "INSERT INTO comment (login, post_id, date, text, type) VALUES ('$login', '$pid', '$date', '$comment_text', '$type')";

                if($comment_text == "") {
                    $_SESSION['e_comment'] = '<div class="alert alert-danger text-center">Uzupełnij swój wpis!</div>';
                    header("Location: comment_post.php?pid=$pid&type=$type");
                }
                else
                {
                    mysqli_query($connection, $sql);
                    header("Location: comment_post.php?pid=$pid&type=$type");
                }
            }
            $connection->close();
        }
    } catch (Exception $e) {
        echo '<span style="color:red;">Błąd serwera! Przepraszamy za niedogoności i prosimy o rejestrację w innym terminie!</span>';
        echo '<br>Informacja developerska: '.$e;
    }
?>  
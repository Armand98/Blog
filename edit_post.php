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

                $title = strip_tags($_POST['title']);
                $content = strip_tags($_POST['content']);
                $title = mysqli_real_escape_string($connection, $title);
                $content = mysqli_real_escape_string($connection, $content);
                $date = date('Y-m-d H:i:s');
                $sql = "UPDATE $table SET title='$title',content='$content', date='$date' WHERE id='$pid'";

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
                    else
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

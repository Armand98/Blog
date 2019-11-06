<?php
    function displayContent($sql, $rowId, $rowDate)
    {
        try
        {
            include("connect.php");
            if (!$connection) 
            {
                throw new Exception(mysqli_connect_errno());
            } 
            else 
            {
                $result = mysqli_query($connection, $sql) or die(mysqli_error());
                $posts = "";

                if(mysqli_num_rows($result) > 0) 
                {
                    while($row = mysqli_fetch_assoc($result)) 
                    {
                        $id = $row[$rowId];
                        $title = $row['title'];
                        $login = $row['login'];
                        $content = $row['content'];
                        $date = $row[$rowDate];
                        $admin = '<div class="p-2">'."<a href='del_post.php?pid=$id'>Usuń</a></div>".'<div class="p-2">'."<a href='index.php?pid=$id'>Edytuj</a></div>";
                        $comment = '<div class="ml-auto p-2">'."<a href='comment_post.php?pid=$id'>Dodaj komentarz</a></div>";
                        $posts .= '<div class="alert alert-dark" role="alert">';
                        $posts .= '<h3 class="alert-heading text-center"><a href="">'.$title.'</a></h3>';
                        $posts .= '<div class="d-flex justify-content-between">';
                        $posts .= "<h5>$login</h5><h5>$date</h5></div>";
                        $posts .= '<hr><div class="text-justify">'.$content.'</div><hr>';
                        $posts .= '<div class="d-flex">';
                        
                        if($_SESSION['isLogged'])
                        {
                            if((isset($_SESSION['privilege'])) && ($_SESSION['privilege'] == 1))
                            {
                                $posts .= $admin;
                            }
                        }

                        $posts .= $comment;
                        $posts .= "</div></div>";
                    }
                    echo $posts;
                } else {
                    echo '<h4 class="alert-heading text-center" style="text-align: center;">Brak postów</h4><hr>';
                }
                $result->free_result();
            }
            $connection->close();
        } 
        catch (Exception $e) 
        {
            echo '<span style="color:red;">Błąd serwera! Przepraszamy za niedogoności i prosimy o rejestrację w innym terminie!</span>';
            echo '<br>Informacja developerska: '.$e;
        }
    }
?>
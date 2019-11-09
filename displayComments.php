<?php
    function displayComments($sql, $type)
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
                $comment_table = "";
                while($row = mysqli_fetch_assoc($result)) 
                {
                    $comment_id = $row['id'];
                    $comment_login = $row['login'];
                    $comment_text = $row['text'];
                    $comment_date = $row['date'];
                    $comment_table .= '<ul class="media-list"><li class="media"><div class="media-body"><strong class="text-success">'.$comment_login.'</strong><p>'.$comment_text.'</p></div></li></ul>';
                }
                $pid = $_GET['pid'];
                $comment_panel = '<div class="col-md-6 col-sm-12">';
                $comment_panel .= '<h3>Sekcja komentarzy</h3>';
                $comment_panel .= "<form action='add_comment.php?type=$type&pid=$pid' method='post'>";
                $comment_panel .= '<textarea class="form-control" name="text" placeholder="napisz komentarz..." rows="3"></textarea><br>';
            
                if(isset($_SESSION['e_comment']))
                {
                       $comment_panel .= '<div class="alert alert-danger">'.$_SESSION['e_comment'].'</div>';
                    unset($_SESSION['e_comment']);	
                }
            
                $comment_panel .= '<input class="btn btn-info btn-block" name="submit" type="submit" value="Zatwierdź"></form><hr>';
                $comment_panel .= $comment_table;
                $comment_panel .= '</div>';
                echo $comment_panel;
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
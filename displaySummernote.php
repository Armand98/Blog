<?php
    if($_SESSION['isLogged'])
    {
        echo '<input class="form-control summernoteTitle" placeholder="Tytuł" name="title" type="text" autofocus size="48"><br>';
        echo '<textarea id="summernote" name="content"></textarea><br>';
        if(isset($_SESSION['e_post']))
        {
            echo $_SESSION['e_post'];
            unset($_SESSION['e_post']);
        }
        echo '<input class="btn btn-secondary btn-block" name="post" type="submit" value="Wyślij">';
    }
    else
    {
        echo '<div class="col-md-6" style="padding: 5%;"><p>Zaloguj się lub <a href="register.php">załóż konto</a> by dodać swoje posty!</p></div>';
    }
?>
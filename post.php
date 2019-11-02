<?php
    session_start();
    include_once("connect.php");
    $connection = @mysqli_connect($db_host, $db_login, $db_password, $db_name);

    if (!$connection) 
    {
        die("Nie udało się połączyć z bazą danych.");
    } 
    else 
    {
        if(isset($_POST['post'])) 
        {
            $title = strip_tags($_POST['title']);
            $content = strip_tags($_POST['content']);
            $title = mysqli_real_escape_string($connection, $title);
            $content = mysqli_real_escape_string($connection, $content);
            $date = date('Y-m-d H:i:s');
            $login = $_SESSION['login'];
            $sql = "INSERT INTO posts (login, title ,content, post_date) VALUES ('$login', '$title', '$content', '$date')";
            echo "$title<br>$content<br>$date<br>$login<br>$sql";

            if($title == "" || $content == "") {
                echo "Please complete your post!";
                return;
            }
    
            if($connection->query($sql) === TRUE) 
            {
                echo "New record created successfully";
            } 
            else 
            {
                "Error: " . $sql . "<br>" . $connection->error;
            }
            header("Location: index.php");
            
        }
    }
?>
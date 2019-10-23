<?php
    session_start();
    include_once("connect.php");
    $connection = @mysqli_connect($host, $login, $password, $name);

    if (!$connection) {
        die("Nie udało się połączyć z bazą danych.");
    } else {
        if(isset($_POST['post'])) {
            $title = strip_tags($_POST['title']);
            $content = strip_tags($_POST['content']);
    
            $title = mysqli_real_escape_string($connection, $title);
            $content = mysqli_real_escape_string($connection, $content);
    
            $date = date('l jS \of F Y h:i:s A');
    
            $sql = "INSERT INTO posts (title, content, date) VALUES ('$title', '$content', '$date')";
    
            if($title == "" || $content == "") {
                echo "Please complete your post!";
                return;
            }
    
            if($connection->query($sql) === TRUE) {
                echo "New record created successfully";
            } else {
                "Error: " . $sql . "<br>" . $connection->error;
            }
            header("Location: index.php");
            die();
        }
    }
?>
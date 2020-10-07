<?php
    include 'connection/db.php';


    $name     = "karan";
    $email    = "karan@mail.com";
    $password = "Karan123";
    $password = password_hash($password, PASSWORD_DEFAULT);
    // $Query    = $db->prepare("INSERT INTO users (name, email, password) VALUES (?,?,?)");
    // $Query->execute([$name, $email, $password]);

    try {
        $Query    = $db->prepare("INSERT INTO users (name, email, password) VALUES (?,?,?)");
        $Query->execute([$name, $email, $password]);
        // var_dump($Query->execute([$name, $email, $password]));
        if (!$Query->execute([$name, $email, $password])) {
            $error = $Query->errorInfo();
            var_dump($error);
        }

    } catch (PDOException $e) {
        // echo "Error: " . $e->getMessage();
        var_dump($e);
    }
 ?>

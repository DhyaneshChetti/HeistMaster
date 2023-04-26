<?php
include'conn.php';
    $email = $_POST['email'];
    $password = $_POST['password'];
    $password = md5($password);
    $sql = "SELECT * FROM user_data WHERE email = ? AND password = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ss", $email, $password);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        echo '<script> alert("Logged in successfully")</script>';
        echo '<script>window.location.replace("start.html");</script>';
    } else {
    echo '<script> alert("Password did not match")</script>';
    echo '<script>window.location.replace("index.html");</script>';
    }
?>   
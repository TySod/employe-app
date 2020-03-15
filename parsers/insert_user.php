<?php
    require_once('config.php');

    $uname = '';
    $password = '';
    $email = '';

    if (isset($_POST['submit_btn'])) {
        $sql = "INSERT INTO users(username, email, pasword) VALUES(?, ?, ?)";
        
        $stmt = $conn->prepare($sql);
        $stmt->bind_param('sss', $un, $em, $ps);
        
        $un = $_POST['uname'];
        $em = $_POST['email'];
        $ps = md5($_POST['password']);
        $stmt->execute();
        $newUserId = mysqli_insert_id($conn);
        
        if ($stmt) {
            $_SESSION['message'] = 'Your user registration was successful!';

            setUserSession($_POST['uname']);

            header('Location: ../views/users/profile.php?user_id='.$newUserId);
            return;
        }
    }
?>


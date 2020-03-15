<?php
    require_once('config.php');

    $user_id = $_GET['user_id'];
    $fname = '';
    $lname = '';
    $salary = '';
    $dob = '';
    $qual = '';
    $date_joined = '';

    if (isset($_POST['submit_btn'])) {
        $sql = "INSERT INTO employee(firstname, lastname, salary, dob, datejoined, qual_id) VALUES (?, ?, ?, ?, ?, ?)";
        
        $stmt = $conn->prepare($sql);
        $stmt->bind_param('sssssi', $fn, $ln, $sa, $db, $djoined, $qid);
        
        $fn = $_POST['fname'];
        $ln = $_POST['lname'];
        $sa = $_POST['salary'];
        $db = $_POST['dob'];
        $djoined = time();
        // $uid = $_POST['user_id'];
        $qid = $_POST['qual_id'];
        $stmt->execute();
        
        if ($stmt) {
            $_SESSION['message'] = 'Employee record update was successful!';
            header('Location: ../views/users/profile.php?user_id='. $user_id);
            return;
        }
    }
?>


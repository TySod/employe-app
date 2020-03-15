<?php
    session_start();

    // To make PHP and MySQL connections
    $host = 'localhost';
    $username = 'root';
    $password = '';
    $dbname = 'employees';

    $conn = new mysqli($host, $username, $password, $dbname);

    if ($conn->connect_error) {
        die('Connection failed! ' . $conn->connect_error);
    }

    // echo 'Connection successful!';

    function logged_in() {
        return isset($_SESSION['username']);
    }
  
    function confirm_logged_in() {
        if (!logged_in()) {
            $_SESSION['message'] = 'You must be log in to be able to access restricted sections!';
            header('Location: http://localhost/employee_app/');
        }

        return;
    }

    function setUserSession($username) {
        global $conn;

        $sql  = "SELECT u.user_id AS userId, u.username, u.email, e.firstname, e.lastname, e.salary, e.dob, e.datejoined, q.title As emq_title";
            $sql .= " FROM users As u";
            $sql .= " LEFT JOIN employee AS e ON u.user_id = e.id";
            $sql .= " LEFT JOIN qualification AS q ON q.id = e.qual_id";
            $sql .= " WHERE u.username = '$username'";
            $stmt = $conn->query($sql);

            if($stmt->num_rows > 0) {
              $row = $stmt->fetch_assoc();

              $_SESSION['user_id'] = $row['userId'];
              $_SESSION['username'] = $row['username'];
              $_SESSION['email'] = $row['email'];
              $_SESSION['firstname'] = $row['firstname'];
              $_SESSION['lastname'] = $row['lastname'];
              $_SESSION['salary'] = $row['salary'];
              $_SESSION['dob'] = $row['dob'];
              $_SESSION['datejoined'] = $row['datejoined'];
              $_SESSION['emq_title'] = $row['emq_title'];
                
              // echo "<pre>";
              // print_r($_SESSION);
              // echo "</pre>";
              // die();
            }
            
            log_user_in();
    }

    function executeSql(array $row) {
        if ($row['pasword'] === $password) {
            // Get Retrieve User Details
            $username = $row['username'];
            setUserSession($username);
        }

        return;
    }

    function log_user_in() {
        global $conn;

        if (isset($_POST['btn_login'])) {
            if (!empty($_POST['email']) && !empty($_POST['password'])) {
              // Get Retrieve User Details
              $email = $_POST['email'];
              $password = md5($_POST['password']);

              $sql  = "SELECT * FROM users WHERE email = '$email'";
              $stmt = $conn->query($sql);

              if($stmt->num_rows > 0) {
                $row = $stmt->fetch_assoc();

                executeSql($row);
              }
            
              $_SESSION['message'] = 'You have logged in successfully';
              header( "Location: profile.php" );
            }
        }
    }

    function log_user_out() {
        if (logged_in()) {

            // 1. Get all the session variables
            $_SESSION = array();

            // 2. Destroy the session cookie
            if(isset($_COOKIE[session_name()])) {
                setcookie(session_name(), '', time()-42000, '/');
            }

            // 3. Destroy the session
            session_destroy();

            // 4. redirect to Welcome/Home page.
            header('Location: ../index.php');
        }
    }
?>
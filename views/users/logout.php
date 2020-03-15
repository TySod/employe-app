<?php
    require_once('../../parsers/config.php');

  // Check if user is a guest.
  confirm_logged_in();

    if (isset($_POST['btn_logout']) && isset($_SESSION['username'])) {
      // print_r($_SESSION['user']);
      // die('logged out!');
      log_user_out();
      $_SESSION['message'] = 'Logged out successfully!';
      header('Location: ../../index.php');
      return;
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Log Out</title>
</head>
<body>
    <p>Are you sure you want to log out right now?</p>
    <form action="<?= $_SERVER['PHP_SELF'] ?>" method="post">
        <button type="submit" name="btn_logout" class="btn btn-sm btn-danger">Logout</button>
        <button type="button" class="btn btn-sm btn-warning" onclick="location.href='profile.php'; return;">Cancel</button>
    </form>
</body>
</html>
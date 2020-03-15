<?php
  require_once('../../parsers/config.php');
  require_once("../../parsers/validations.php");

  // check if corresponding records exist.
  if (logged_in()) {
      header( "Location: profile.php" );
  } else {
    log_user_in();
  }

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Login</title>
  <link rel="stylesheet" href="../../assets/css/bootstrap.css">
  <link rel="stylesheet" href="../../assets/css/signin.css">
  <link rel="stylesheet" href="../../assets/css/dashboard.css">
</head>
<body>
  <?php include_once('../../inc/nav.php'); ?>

  <form action="<?= $_SERVER['PHP_SELF'] ?>" method="post" class="form-signin">
    <h1 class="h3 mb-3 font-weight-normal">Sign In</h1>

    <label for="email" class="sr-only">Email address</label>
    <input name="email" type="email" id="email" class="form-control" placeholder="Email address" required="" autofocus="">

    <label for="password" class="sr-only">Password</label>
    <input name="password" type="password" id="password" class="form-control" placeholder="Password" required="">

    <button class="btn btn-lg btn-primary btn-block" name="btn_login" type="submit">Sign in</button>
  </form>

  <?php include_once('../../inc/footer.php'); ?>
</body>
</html>
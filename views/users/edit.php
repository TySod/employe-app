<?php
  require_once('../../parsers/config.php');
  
  confirm_logged_in();
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Edit User Profile</title>
  <link rel="stylesheet" href="../../assets/css/bootstrap.css">
  <link rel="stylesheet" href="../../assets/css/signin.css">
  <link rel="stylesheet" href="../../assets/css/cover.css">
</head>
<body>
  <?php include_once('../../inc/nav.php'); ?>

  <form class="form-signin">
    <h1 class="h3 mb-3 font-weight-normal">Edit User</h1>

    <label for="firstname" class="sr-only">First Name</label>
    <input type="text" id="firstname" class="form-control" placeholder="Firstname" required="" autofocus="">

    <label for="lastname" class="sr-only">Last Name</label>
    <input type="text" id="lastname" class="form-control" placeholder="Lastname" required="">
    
    <label for="email" class="sr-only">Email address</label>
    <input type="email" id="email" class="form-control mb-2" placeholder="Email address" required="">

    <label for="bio" class="sr-only">Bio</label>
    <textarea id="bio" class="form-control mb-2" placeholder="Bio" required="" style="max-height: 200px;"></textarea>

    <button class="btn btn-lg btn-primary btn-block" type="submit">Sign Up</button>

    <p class="mt-5 mb-3 text-muted">© 2019</p>
  </form>

  <?php include_once('../../inc/footer.php'); ?>
</body>
</html>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Home</title>

  <link rel="stylesheet" href="./assets/css/bootstrap.css">
  <link rel="stylesheet" href="./assets/css/cover.css">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

</head>
<body class="text-center">
<div class="cover-container d-flex w-100 h-100 p-3 mx-auto flex-column">
  <header class="masthead mb-auto">
    <div class="inner">
      <h3 class="masthead-brand">
        <a class="nav-link active" href="index.php">Home</a>
      </h3>

      <nav class="nav nav-masthead justify-content-center">
        <a class="nav-link" href="dashboard.php">Dashboard</a>
      </nav>
    </div>
  </header>

  <main role="main" class="inner cover"> 

    <h1 class="cover-heading">Employee</h1>
    <h2 class="lead text-center font-weight-bold"> Second Project:</h2>
     <p class="lead text-center font-weight-normal"> Employee Records Management System <br></p>

      <!-- .
    Cover is a one-page template for building simple and beautiful home pages. Download, edit the text, and add your own fullscreen background photo to make it your own. --></p>
    <p class="lead">
      <ul class="list-inline">
        <li class="list-inline-item"><a href="./views/users/login.php" class="btn btn-lg btn-warning">Login</a></li>
        <li class="list-inline-item"><a href="./views/users/register.php" class="btn btn-lg btn-danger">Register</a></li>
        
      </ul>
    </p>

    <?php 
      if (isset($_SESSION['message'])){

        echo '<div class="container"><div class="alert alert-info p-1 text-center">';
        echo $_SESSION['message'];
        echo '</div></div>';

        unset($_SESSION['message']);
      }
    ?> 
  </main>

  <footer class="mastfoot mt-auto">
    <div class="inner">
      <p>&copy; Rochi 2019</p>
    </div>
  </footer>
</div>

<?php include_once('./inc/footer.php'); ?>
</body>
</html>

  <nav class="navbar navbar-dark fixed-top bg-dark flex-md-nowrap p-0 shadow">
    <a class="navbar-brand col-sm-3 col-md-2 mr-0 text-center font-weight-bold" href="index.php">Home</a> 

    <div class="navbar-nav px-3">
      <ul class="list-inline p-0 m-0">
        <?php if (!logged_in()) { ?>

          <li class="nav-item list-inline-item">
            <a class="nav-link" href="views/users/login.php">Login</a>
          </li>
          <li class="nav-item list-inline-item">
            <a class="nav-link" href="views/users/register.php">Register</a>
          </li>

        <?php 
          } else {
        ?>
        
        <li class="nav-item list-inline-item">
          <a class="nav-link" href="dashboard.php">Dashboard</a>
        </li>
        <li class="nav-item list-inline-item">
          <a class="nav-link" href="views/users/profile.php">Username</a>
        </li>
        <li class="nav-item list-inline-item">
          <a href="./views/users/logout.php">
            <small class="btn btn-sm btn-danger">Sign out</small>
          </a>
        </li>
        <?php 
          } 
        ?>
      </ul>
    </div>
  </nav> 


  <div class="d-block my-5">&nbsp;</div>

  <?php 
    if (isset($_SESSION['message'])){

      echo '<div class="container"><div class="alert alert-info p-1 text-center">';
      echo $_SESSION['message'];
      echo '</div></div>';

      unset($_SESSION['message']);
    }
  ?>  
<?php

  require_once('parsers/config.php');

  // Check if user is a guest.
  confirm_logged_in();

  // Get Retrieve User Details
  $user_id = $_SESSION['user_id'];

  $sql = "SELECT * FROM employee LEFT JOIN qualification
  ON employee.qual_id = qualification.id";
  $stmt = $conn->query($sql);
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">

  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Admin Dashboard</title>
  <link rel="stylesheet" href="./assets/css/bootstrap.css">
  <link rel="stylesheet" href="./assets/css/dashboard.css">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

</head>
<body>
  <?php include_once('./inc/nav_2.php'); ?>

  <div class="container-fluid">
    <div class="row">
      <nav class="col-md-2 d-none d-md-block bg-light sidebar">
        <div class="sidebar-sticky">
          <ul class="nav flex-column">
            <li class="nav-item">
              <a class="nav-link active" href="#">
                <span data-feather="menu"></span>
                Dashboard <span class="sr-only">(current)</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">
                <span data-feather="users"></span>
                Users
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">
                <span data-feather="bar-chart-2"></span>
                Stats
              </a>
            </li>
          </ul>

          <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">
            <span>Admin Area</span>
            <a class="d-flex align-items-center text-muted" href="#" aria-label="Add a new report">
              <span data-feather="plus-circle"></span>
            </a>
          </h6>
          <ul class="nav flex-column mb-2">
            <li class="nav-item">
              <a class="nav-link" href="#">
                <span data-feather="file-text"></span>
                Settings
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">
                <span data-feather="file"></span>
              Others
              </a>
            </li>
          </ul>
        </div>
      </nav>

      <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
          <h1 class="h2">Employee Dashboard</h1>
        </div>

        <div class="container">
          <div class="row">
            <canvas class="my-4 col-md-6" id="myChart"></canvas>
            <canvas class="my-4 col-md-6" id="pieChart"></canvas>
          </div>
        </div>
        <!-- <canvas class="my-4 w-100" id="myChart" width="900" height="380"></canvas> -->

        <h2>All Employee Records</h2>
        <div class="container text-right py-3">
        <a href="../employees/create.php?user_id= $user_id" class="btn btn-primary">Add New Employee</a>
        </div>
         
    
        <div class="table-responsive">
          <table class="table table-striped table-sm">
            <thead>
            <tr>
        <th>First Name</th>
        <th>Last Name</th>
        <th>Salary</th>
        <th>DOB</th>
        <th>Date Joined</th>
        <th>Qualification</th>
        <th colspan="2">Action</th>
    </tr>
            </thead>
            <?php
if($stmt->num_rows  > 0){
    while($row = $stmt->fetch_assoc()){
    
        ?>
        <tbody>
        <tr>
        <td><?= $row['firstname']?></td>
        <td><?= $row['lastname']?></td>
        <td><?= $row['salary']?></td>
        <td><?= $row['dob']?></td>
        <td><?= $row['datejoined']?></td>
        <td><?= $row['title']?></td>
        <td><a href="update.php?id=<?= $row['id']?>">Update<i class="fa fa-add-user"></i></a></td>
        <td><a href="delete.php?id=<?= $row['id']?>">Delete<i class="fa fa-bin"></i></a></td>
        
        </tr>
        
        <?php
    }
}
?>
</tbody>
          </table>
        </div>
      </main>
    </div>
  </div>


<?php include_once('./inc/footer.php'); ?>
<script src="./assets/js/feather-icons.js"></script>
<script src="./assets/js/chart.js"></script>
<script src="./assets/js/dashboard.js"></script>
</body>
</html>
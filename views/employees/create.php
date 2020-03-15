<?php

  require_once('../../parsers/config.php');

  // Check if user is a guest.
  confirm_logged_in();

  // Get Retrieve User Details
  $user_id = $_SESSION['user_id'] = $_GET['user_id'];

  $sql  = "SELECT u.username, u.email, e.firstname, e.lastname, e.salary, e.dob, e.datejoined, q.title As emq_title";
  $sql .= " FROM users As u";
  $sql .= " LEFT JOIN employee AS e ON u.user_id = e.id";
  $sql .= " LEFT JOIN qualification AS q ON q.id = e.qual_id";
  $sql .= " WHERE u.user_id = '$user_id'";
  $stmt = $conn->query($sql);

  if($stmt->num_rows > 0) {
    $_SESSION['user'] = $user = $stmt->fetch_assoc();
  }

  // Get Retrieve Qualifications
  $sql = "SELECT * FROM qualification";
  $stmt2 = $conn->query($sql);

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Update Employee Detail</title>

  <link rel="stylesheet" href="../../assets/css/bootstrap.css">
  <link rel="stylesheet" href="../../assets/css/signin.css">
  <link rel="stylesheet" href="../../assets/css/dashboard.css">
</head>
<body>
  <?php include_once('../../inc/nav.php'); ?>

  <div class="d-block my-5">&nbsp;</div>

  <div class="container">

    <div class="row">
      <div class="col-md-4 mb-3">
        <div class="card">
          <img src="..." class="card-img-top" alt="...">
          <div class="card-body">
            <h5 class="card-title"><?= $user['username'] ?></h5>
            <p class="card-text"><?= $user['firstname'] ." ". $user['lastname'] ?>
          </div>
          <ul class="list-group list-group-flush">
            <li class="list-group-item"><?= $user['email'] ?></li>
            <!-- <li class="list-group-item"><?= $user['firstname'] ?></li>
            <li class="list-group-item"><?= $user['lastname'] ?></li> -->
            <li class="list-group-item"><?= $user['salary'] ?></li>
            <li class="list-group-item"><?= $user['dob'] ?></li>
            <li class="list-group-item"><?= $user['datejoined'] ?></li>
            <li class="list-group-item"><?= $user['emq_title'] ?></li>
          </ul>
        </div>
      </div>

      <div class="col-md-8 mb-3">
        <div class="border bg-white rounded">
          <form action="../../parsers/insert_employee.php" method="POST" class="form-signin">
            <h1 class="h3 mb-3 font-weight-normal">Add Employee Info</h1>

            <label for="firstname" class="sr-only">Firstname</label>
            <input name="fname" type="text" id="firstname" class="form-control" placeholder="Firstname" required="" autofocus="">
            <br>

            <label for="lastname" class="sr-only">Lastname</label>
            <input name="lname" type="text" id="lastname" class="form-control" placeholder="Lastname" required="">
            <br>

            <label for="salary" class="sr-only">salary</label>
            <input name="salary" type="text" id="salary" class="form-control" placeholder="Salary" required="">
            <br>
            
            <label for="dob" class="sr-only">Date of Birth</label>
            <input name="dob" type="date" id="dob" class="form-control" placeholder="Date of Birth" required="">
            <br>

            <label for="qual_id" class="sr-only">Qualifications</label>
            <select name="qual_id" id="qual_id" class="form-control">
              <option value="">Select Qualification</option>
              <?php            
                if($stmt2->num_rows > 0) {
                  while($row = $stmt2->fetch_assoc()) {
                ?>
                  <option value="<?= $row['id'] ?>"><?= $row['title'] ?></option>
                <?php
                  }
                }
              ?>
            </select>
            <br>
            <input name="user_id" type="hidden" id="user_id">

            <button name="submit_btn" class="btn btn-lg btn-primary btn-block" type="submit">Save Data</button>
          </form>
        </div>
      </div>
    </div>

    <p class="mt-5 mb-3 text-muted">© 2019</p>
  </div>

  <?php include_once('../../inc/footer.php'); ?>
</body>
</html>
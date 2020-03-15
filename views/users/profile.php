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
  <link rel="stylesheet" href="../../assets/css/dashboard.css">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  <!-- <link rel="stylesheet" href="../../assets/css/signin.css"> -->
  <!-- <link rel="stylesheet" href="../../assets/css/cover.css"> -->
  <style>
    .info_tab {
      display: inline-block;
      width: 100px;
      font-weight: bold;
    }
  </style>
</head>
<body>
  <?php include_once('../../inc/nav.php'); ?>

  <div class="d-block my-5">&nbsp;</div>

  <div class="container">
    <div class="row">
      <div class="col-md-3">
        <div class="card">
          <img src="https://res.cloudinary.com/qodes/image/upload/v1556507169/personal/my_passport_mblk54.jpg" class="card-img-top" alt="User Image">
          <div class="card-body">
            <h5 class="card-title"><?= $_SESSION['username'] ?></h5>
            <p class="card-text"><?= $_SESSION['firstname'] ." ". $_SESSION['lastname'] ?>
          </div>
          <ul class="list-group list-group-flush">
            <li class="list-group-item"><span class="info_tab">Email:</span> <?= $_SESSION['email'] ?></li>
            <li class="list-group-item"><span class="info_tab">Salary:</span> <?= $_SESSION['salary'] ?></li>
            <li class="list-group-item"><span class="info_tab">Birth Date:</span> <?= $_SESSION['dob'] ?></li>
            <li class="list-group-item"><span class="info_tab">Joined Date:</span> <?= $_SESSION['datejoined'] ?></li>
            <li class="list-group-item"><span class="info_tab">Qualification:</span> <?= $_SESSION['emq_title'] ?></li>
          </ul>
        </div>
      </div>

      <div class="col-md-7">
        <div class="card text-center">
          <div class="card-header">
            <ul class="nav nav-tabs card-header-tabs" id="myTab" role="tablist">
              <li class="nav-item">
                <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Home</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Profile</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" id="contact-tab" data-toggle="tab" href="#contact" role="tab" aria-controls="contact" aria-selected="false">Contact</a>
              </li>
            </ul>
          </div>
          <div class="tab-content" id="myTabContent">
            <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
              <div class="card-body">
                <h5 class="card-title">Add Employee Info</h5>
                <a href="../employees/create.php?user_id=13" class="btn btn-primary">Go To Page</a>
              </div>
            </div>
            <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">            
              <div class="card-body">
                <h5 class="card-title">Special title treatment</h5>
                <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                <a href="#" class="btn btn-primary">Go somewhere</a>
              </div>
            </div>
            <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">            
              <div class="card-body">
                <h5 class="card-title">Special title treatment</h5>
                <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                <a href="#" class="btn btn-primary">Go somewhere</a>
              </div>
            </div>
          </div>
        </div>
      </div>
      
      <div class="col-md-2">
        <div class="border p-2">
            <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
              <a class="nav-link active" id="v-pills-home-tab" data-toggle="pill" href="#v-pills-home" role="tab" aria-controls="v-pills-home" aria-selected="true">Home</a>
              <a class="nav-link" id="v-pills-profile-tab" data-toggle="pill" href="#v-pills-profile" role="tab" aria-controls="v-pills-profile" aria-selected="false">Profile</a>
              <a class="nav-link" id="v-pills-messages-tab" data-toggle="pill" href="#v-pills-messages" role="tab" aria-controls="v-pills-messages" aria-selected="false">Messages</a>
              <a class="nav-link" id="v-pills-settings-tab" data-toggle="pill" href="#v-pills-settings" role="tab" aria-controls="v-pills-settings" aria-selected="false">Settings</a>
            </div>
        </div>
      </div>
    </div>
  </div>

  <?php include_once('../../inc/footer.php'); ?>
</body>
</html>
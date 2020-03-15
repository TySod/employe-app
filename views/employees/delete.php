<?php
    require_once('../../parsers/config.php');

  // Check if user is a guest.
  confirm_logged_in();

    $user_id = $_GET['user_id'] ?? '';

    if (isset($_POST['btn_delete']) && isset($_POST['user_id'])) {
        $sql = "DELETE FROM employee WHERE user_id=?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param('i', $id);
        $id = $_POST['user_id'];
        $stmt->execute();

        if ($stmt) {
            $_SESSION['message'] = 'Employee Record deleted successfully!';
            header('Location: ../../dashboard.php');
            return;
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Delete</title>
</head>
<body>
    <p>Are you sure you want to delete the user with the id <?= $user_id; ?></p>
    <form action="delete.php" method="post">
        <input type="hidden" name="user_id" value="<?= $user_id; ?>">
        <button type="submit" name="btn_delete">Delete</button>
        <button type="button" onclick="location.href='../../dashboard.php'; return;">Cancel</button>
    </form>
</body>
</html>
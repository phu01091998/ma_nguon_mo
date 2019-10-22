<?php include_once('model/user.php') ?>
<?php
session_start();
$information = "";
if (isset($_SESSION["user"])) {
  header("location:index.php");
}
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $useName = $_REQUEST['email'];
  $password = $_REQUEST['password'];
  $user = User::authentication($useName, $password);
  if ($user != null) {
    $_SESSION["user"] = serialize($user);
    // $information = "Đăng nhập thành công. Chào bạn " . $user->fullName;
    header("location:index.php");
  } else {
    $information = "Đăng nhập thất bại. Vui lòng nhập lại thông tin";
  }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <title></title>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="css/style.css" rel="stylesheet">
  <!-- Custom fonts for this template-->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

  <!-- Page level plugin CSS-->
  <link href="vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="css/sb-admin.css" rel="stylesheet">
</head>

<body class="bg-dark">
  <div class="bg-dark h-100">


    <div class="container mt-5">
      <div class="row justify-content-md-center">
        <div class="col-md-4 bg-light p-3 px-4 rounded">
          <form action="" method="POST">
            <div class="form-group">
              <h1 class="text-info">Login</h1>
              <label for="email">Email address:</label>
              <input name="email" type="email" class="form-control" id="email" value="">
            </div>
            <div class="form-group">
              <label for="pwd">Password:</label>
              <input name="password" type="password" class="form-control" id="pwd">
            </div>
            <div class="form-group form-check">
              <label class="form-check-label">
                <input class="form-check-input" type="checkbox"> Remember me
              </label>
            </div>
            <button type="submit justify-content-center" class="btn btn-primary">Submit</button>
            <?php if (strlen($information) != 0) { ?>
              <div class="alert alert-danger mt-2" roler="alert">
                <?php echo $information; ?>
              </div>
            <?php } ?>

          </form>
        </div>

      </div>
    </div>

  </div>
  <?php include_once('footer.php') ?>
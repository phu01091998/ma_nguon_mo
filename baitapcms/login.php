<?php include_once('model/user.php') ?>
<?php
session_start();
$information = "";
if (isset($_SESSION["user"])) {
  header("location:admin/index.php");
}
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $useName = $_REQUEST['email'];
  $password = $_REQUEST['password'];
  $user = User::authentication2($useName, $password);
  if ($user != null) {
    $_SESSION["user"] = serialize($user);
    // $information = "Đăng nhập thành công. Chào bạn " . $user->fullName;
    header("location:admin/index.php");
  } else {
    $information = "Đăng nhập thất bại. Vui lòng nhập lại thông tin";
  }
}
?>



<?php include_once('header.php') ?>
  <div class=" h-100">


    <div class="container mt-5">
      <div class="row justify-content-md-center">
        <div class="col-md-4 bg-light p-3 px-4 rounded">
          <form action="" method="POST">
            <div class="form-group">
              <h1 class="text-info">Login</h1>
              <label for="email">Email address:</label>
              <input name="email" type="text" class="form-control" id="email" value="">
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
<?php
session_start();
include('./COMMON/CommonHeader.php')
?>
<section class="ftco-section contact-section"><br><br>
  <center>
    <H1>Login</H1>
  </center><br><br>
  <div class="container">
    <div class="row d-flex mb-5 contact-info">
      <div class="col-md-8 block-9 mb-md-5" style="margin-left: 18%;">
        <form method="post" class="bg-light p-5 contact-form">
          <div class="form-group">
            <input type="email" class="form-control" placeholder="Your Email" name="email" required>
          </div>
          <div class="form-group">
            <input type="password" class="form-control" placeholder="Password" name="password" required>
          </div><br>
          <center>
            <div class="form-group">
              <input type="submit" value="Login" name="login" class="btn btn-primary py-3 px-5">
            </div>
          </center>
        </form>
      </div>
    </div>
  </div>
  <div>
    <p class="text-center text-muted mt-5 mb-0"> Don't Have an account? <a href="UserReg.php" class="fw-bold text-body"><u>Sign up</u></a></p>
</section>
<?php
include('./COMMON/CommonFooter.php')
?>
<!-- ================ Code section Start ================= -->
<?php
include './CONNECTION/DbConnection.php';

if (isset($_REQUEST['login'])) {
  $Email = $_REQUEST['email'];
  $Password = $_REQUEST['password'];
  $qry = "SELECT * FROM `login` WHERE `email` = '$Email' AND `password` = '$Password' AND `status`='approved'";
  $result = mysqli_query($conn, $qry);
  if ($result->num_rows > 0) {
    $data = $result->fetch_assoc();
    $uid = $data['reg_id'];
    $type = $data['usertype'];

    $_SESSION['uid'] = $uid;
    $_SESSION['type'] = $type;

    if ($type == 'ADMIN') {
      echo "<script>alert('Welcome to AdminHome'); window.location='SELLER/SellerHome.php'</script>";
    } else if ($type == 'USER') {
      echo "<script>alert('Welcome to UserHome'); window.location='USER/UserHome.php'</script>";
    } else {
      echo "<script>alert('Login Failed')</script>";
    }
  } else {
    echo "<script>alert('Invalid Email / Password'); window.location='Login.php'</script>";
  }
}
?>

<!-- ================ Code section end ================= -->
<?php
session_start();
include('./COMMON/CommonHeader.php')
?>

<section class="ftco-section contact-section"><br><br>
  <center>
    <H1>User Registration</H1>
  </center><br><br>
  <div class="container">
    <div class="row d-flex mb-5 contact-info">
      <div class="col-md-8 block-9 mb-md-5" style="margin-left: 18%;">

        <form method="post" class="bg-light p-5 contact-form">

          <div class="form-group">
            <input type="text" class="form-control" placeholder="Your Name" name="uname" required>
          </div>

          <div class="form-group">
            <input type="email" class="form-control" placeholder="Your Email" name="uemail" required>
          </div>

          <div class="form-group">
            <input type="password" class="form-control" placeholder="Password" name="upassword" required>
          </div>

          <div class="form-group">
            <input type="text" class="form-control" maxlength="10" pattern=[789][0-9]{9} placeholder="Phone Number" name="uphone" required>
          </div>

          <div class="form-group">
            <textarea id="" cols="30" rows="7" class="form-control" placeholder="Address" name="uaddress" required></textarea>
          </div><br>
          <center>
            <div class="form-group">
              <input type="submit" value="Submit" name="register" class="btn btn-primary py-3 px-5">
            </div>
          </center>
        </form>
      </div>
    </div>
  </div>
  <p class="text-center text-muted mt-5 mb-0">Have already an account? <br><a href="login.php" class="fw-bold text-body"><u>Login here</u></a></p>
</section>

<?php
include('./COMMON/CommonFooter.php')
?>

<!-- ================ Code section Start ================= -->

<?php
include './CONNECTION/DbConnection.php';

if (isset($_REQUEST['register'])) {

  $Name = $_REQUEST['uname'];
  $Email = $_REQUEST['uemail'];
  $Phone = $_REQUEST['uphone'];
  $Password = $_REQUEST['upassword'];
  $Address = $_REQUEST['uaddress'];

  $qryCheck = "SELECT COUNT(*) AS cnt FROM `user` WHERE `uemail` = '$Email' OR `uphone` = '$Phone'";

  $qryOut = mysqli_query($conn, $qryCheck);

  $fetchData = mysqli_fetch_array($qryOut);

  if ($fetchData['cnt'] > 0) {
    echo "<script>alert('Already exist an Account with same Email / Phone Number');window.location = 'UserReg.php';</script>";
  } else {

    $qryReg = "INSERT INTO `user`(`uname`,`uemail`,`uaddress`,`uphone`)VALUES('$Name','$Email','$Address','$Phone')";
    $qryLog = "INSERT INTO `login`(`reg_id`, `email`, `password`, `usertype`) VALUES((select max(uid) from user), '$Email', '$Password', 'USER')";

    // echo $qryReg . "&& " . $qryLog;

    if ($conn->query($qryReg) == TRUE && $conn->query($qryLog) == TRUE) {
      echo "<script>alert('Registration Success');window.location = 'Login.php';</script>";
    } else {
      echo "<script>alert('Registration Failed');window.location = 'UserReg.php';</script>";
    }
  }
}

?>

<!-- ================ Code section end ================= -->
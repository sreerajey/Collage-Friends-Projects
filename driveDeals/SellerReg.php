<?php
session_start();
include('./COMMON/CommonHeader.php')
?>

<section class="ftco-section contact-section"><br><br>
  <center>
    <H1>Seller Registration</H1>
  </center><br><br>
  <div class="container">
    <div class="row d-flex mb-5 contact-info">
      <div class="col-md-8 block-9 mb-md-5" style="margin-left: 18%;">

        <form method="post" class="bg-light p-5 contact-form">

          <div class="form-group">
            <input type="text" class="form-control" placeholder="Your Name" name="sname" required>
          </div>

          <div class="form-group">
            <input type="email" class="form-control" placeholder="Your Email" name="semail" required>
          </div>

          <div class="form-group">
            <input type="password" class="form-control" placeholder="Password" name="spassword" required>
          </div>

          <div class="form-group">
            <input type="text" class="form-control" maxlength="10" pattern=[789][0-9]{9} placeholder="Phone Number" name="sphone" required>
          </div>

          <div class="form-group">
            <input type="text" class="form-control" maxlength="8" placeholder="Licences Number" name="slicences" required>
          </div>

          <div class="form-group">
            <select class="form-control" name="sdistrict">
              <option selected="true" disabled="disabled">--- Select District ---</option>
              <option value="Thiruvananthapuram">Thiruvananthapuram</option>
              <option value="Kollam">Kollam</option>
              <option value="Pathanamthitta">Pathanamthitta</option>
              <option value="Alappuzha">Alappuzha</option>
              <option value="Kottayam">Kottayam</option>
              <option value="Idukki">Idukki</option>
              <option value="Ernakulam">Ernakulam</option>
              <option value="Thrissur">Thrissur</option>
              <option value="Palakkad">Palakkad</option>
              <option value="Malappuram">Malappuram</option>
              <option value="Kozhikode">Kozhikode</option>
              <option value="Wayanad">Wayanad</option>
              <option value="Kannur">Kannur</option>
              <option value="Kasaragod">Kasaragod</option>
            </select>
          </div>

          <div class="form-group">
            <textarea id="" cols="30" rows="7" class="form-control" placeholder="Address" name="saddress" required></textarea>
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

  $Name = $_REQUEST['sname'];
  $Email = $_REQUEST['semail'];
  $Phone = $_REQUEST['sphone'];
  $Password = $_REQUEST['spassword'];
  $Address = $_REQUEST['saddress'];
  $Licences = $_REQUEST['slicences'];
  $District = $_REQUEST['sdistrict'];

  $qryCheck = "SELECT COUNT(*) AS cnt FROM `seller` WHERE `semail` = '$Email' OR `sphone` = '$Phone'";

  $qryOut = mysqli_query($conn, $qryCheck);

  $fetchData = mysqli_fetch_array($qryOut);

  if ($fetchData['cnt'] > 0) {
    echo "<script>alert('Already exist an Account with same Email / Phone Number');window.location = 'SellerReg.php';</script>";
  } else {

    $qryReg = "INSERT INTO `seller`(`sname`,`semail`,`saddress`,`sphone`,`slicences`,`sdistrict`)VALUES('$Name','$Email','$Address','$Phone','$Licences','$District')";
    $qryLog = "INSERT INTO `login`(`reg_id`, `email`, `password`, `usertype`) VALUES((select max(sid) from seller), '$Email', '$Password', 'SELLER')";

    // echo $qryReg . "&& " . $qryLog;

    if ($conn->query($qryReg) == TRUE && $conn->query($qryLog) == TRUE) {
      echo "<script>alert('Registration Success');window.location = 'Login.php';</script>";
    } else {
      echo "<script>alert('Registration Failed');window.location = 'SellerReg.php';</script>";
    }
  }
}

?>

<!-- ================ Code section end ================= -->
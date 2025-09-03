<?php
session_start();
$uid = $_SESSION['uid'];
include '../CONNECTION/DbConnection.php';
include('UserHeader.php')
?>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://www.w3schools.com/lib/w3-colors-win8.css">

<section class="ftco-section ftco-no-pt bg-light">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12 mt-3 heading-section text-center ftco-animate mb-5">
                <span class="subheading">View</span>
                <h2 class="mb-2">Cars</h2>
            </div>
        </div>
        <div class="search-box">
            <center>

                <!-- Create a form group with a search input and search icon -->
                <div class="input-group" style="width: 30%;">
                    <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fa fa-search"></i></span>
                    </div>
                    <input type="text" class="form-control" id="searchInput">
                </div>

            </center>
        </div><br><br>
        <div class="row">
            <?php
            $res = mysqli_query($conn, "SELECT `car`.* FROM `car` WHERE `car`.`cstatus` != 'sold' ");
            while ($rs = mysqli_fetch_array($res)) {
                $cid = $rs['cid'];
            ?>
                <div class="col-md-4">
                    <div class="car-wrap rounded ftco-animate">
                        <div class="img rounded d-flex align-items-end" style="background-image: url(../assets/image/<?php echo $rs['cphoto'] ?>);">
                        </div>
                        <div class="text">
                            <h2 class="mb-0"><a href="#"><?php echo $rs['cname'] ?></a></h2>
                            <div class="d-flex mb-3">
                                <span class="cat"><?php echo $rs['cmodel'] ?></span>
                                <p class="price ml-auto">&#8377; <?php echo $rs['cprice'] ?></p>
                            </div>
                            <p>
                                Desc: <span style="color: black; font-weight: bolder;"><?php echo $rs['cdesc'] ?></span>
                            </p>
                            <center>
                                <p class="d-flex mb-0 d-block">
                                    <a href="BookCar.php?id=<?php echo $rs['cid'] ?>" class="btn btn-primary py-2 mr-1">Book now</a>
                                    <a class="btn btn-secondary py-2 ml-1" onclick="document.getElementById('id').style.display='block'">Test Drive</a>
                                </p>
                            </center>
                        </div>
                    </div>
                </div>
                <div class="w3-container">
                    <div id="id" class="w3-modal">
                        <div class="w3-modal-content w3-animate-top w3-card-4">
                            <header class="w3-container w3-teal">
                                <span onclick="document.getElementById('id').style.display='none'" class="w3-button w3-display-topright">&times;</span>
                                <h2 style="color: white;text-align: center;">BOOK TEST DRIVE</h2>
                            </header>
                            <div class="w3-container">
                                <form method="post" class="bg-light p-5 contact-form">
                                    <div class="form-group">
                                        <input required="" type="text" placeholder="Select Date" min="<?php echo date('Y-m-d') ?>" onfocus="(this.type='date')" onblur="(this.type='text')" name="date" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <input required="" type="text" placeholder="Select Time" onfocus="(this.type='time')" onblur="(this.type='text')" name="time" class="form-control">
                                        <input type="hidden" name="cid" value="<?php echo $rs['cid'] ?>">
                                    </div>
                                    <div class="form-group">
                                        <input type="submit" name="booknow" value="Book Now" class="btn-lg btn-block btn btn-primary py-3 px-5">
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            <?php
            }
            ?>
        </div>
</section>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>
    $(document).ready(function() {
        $('#searchInput').on('input', function() {
            var searchQuery = $(this).val().toLowerCase();
            filterProducts(searchQuery);
        });
    });

    function filterProducts(query) {
        $('.car-wrap').each(function() {
            var productText = $(this).text().toLowerCase();
            if (productText.includes(query)) {
                $(this).show();
            } else {
                $("#noMatchingData").show();
                $(this).hide();
            }
        });
    }
</script>

<?php
if (isset($_REQUEST['booknow'])) {
    $Date = $_REQUEST['date'];
    $Time = $_REQUEST['time'];
    $cid = $_REQUEST['cid'];
    $qry = "SELECT * FROM `test_drive` WHERE `uid` = '$uid' AND `cid` = '$cid' AND `status`='Requested'";
    $result = mysqli_query($conn, $qry);
    if ($result->num_rows > 0) {
        echo "<script>alert('Test Drive Already Booked'); window.location='ViewCars.php'</script>";
    } else {
        $qry1 = "INSERT INTO `test_drive`(`uid`,`cid`,`date`,`time`)VALUES('$uid','$cid','$Date','$Time')";
        $result = mysqli_query($conn, $qry1);
        if ($result) {
            echo "<script>alert('Test Drive Booked'); window.location='ViewCars.php'</script>";
        } else {
            echo "<script>alert('Test Drive Booked'); window.location='ViewCars.php'</script>";
        }
    }
}
?>
<?php
include('../COMMON/CommonFooter.php')
?>
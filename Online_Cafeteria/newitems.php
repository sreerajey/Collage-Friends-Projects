<?php
session_start();

include("Header_Seller.php");
include("dbConnection.php");
?>


<!-- inner banner -->
<section class="inner-banner py-5">
        <div class="w3l-breadcrumb py-lg-5">
            <div class="container pt-4 pb-sm-4">
                <h4 class="inner-text-title pt-5">Admin - Add New Items</h4>
                <ul class="breadcrumbs-custom-path">
                    <li><a>Home</a></li>
                    <li class="active"><i class="fas fa-angle-right"></i></li>
                    <img src="d.jpg" alt=""  style="border-radius: 100%;height: 300px;width: 300px;margin-right: 60px;">
                    <img src="e.jpg" alt=""  style="border-radius: 100%;height: 300px;width: 300px;margin-right: 60px;">
                    <img src="k.jpg" alt=""  style="border-radius: 100%;height: 300px;width: 300px;">
                </ul>
            </div>
        </div>
    </section>
    <!-- contact block -->
    <section class="w3l-contact py-5" id="contact">
        <div class="container py-md-5 py-4">
            <div class="title-main text-center mx-auto mb-md-5 mb-4" style="max-width:500px;">
                <p class="text-uppercase"></p>
                <h3 class="title-style">New Menu Details</h3>
            </div>
            <div class="row contact-block">
                <div class="col-md-7 contact-right">
                    <form action="" class="signin-form"  enctype="multipart/form-data" method="POST">
                    <div class="input-grids">
                            <div class="row">
                                <div class="col-sm-6">
                                    <input type="text" name="pname" id="w3lName" placeholder="Item Name"
                                        class="contact-input" required="" />
                                </div>
                                <div class="col-sm-6">
                                    <input type="text" name="pfeatures" id="w3lSender" placeholder="Sub category"
                                        class="contact-input" required="" />
                                </div>
                            </div>
                            <input type="text" name="pprice" id="w3lSubect" placeholder="Price"
                                class="contact-input" required="" />
                          
                        </div>
                        <div class="form-input">
                        <input type="text" name="pwarranty" id="w3lSubect" placeholder="Item Type"
                                class="contact-input" required="" />
                          
                        </div>
                        <input type="datetime-local"name="pbrand" id="w3lWebsite" placeholder="" 
                                class="contact-input" required="" />
                       <input type="text" name="pcategory" id="w3lWebsite" placeholder="About Item"
                                class="contact-input" required="" />
                                <input type="file" name="img">

                        <div class="text-start">
                            <button class="btn btn-style btn-style-3" type="submit" name="addbtn">Added</button>
                        </div>
                        
                    </form>
                    <?php
            include('dbConnection.php');
                        if (isset($_REQUEST['addbtn'])) {
                            $pname = $_REQUEST['pname'];
                            $Category = $_REQUEST['pcategory'];
                            $Company = $_REQUEST['pbrand'];
                            $price = $_REQUEST['pprice'];
                            $warranty = $_REQUEST['pwarranty'];
                            $Features = $_REQUEST['pfeatures'];
                 
                            $centerid = $_SESSION['userregid'];
                        
                            $upfold = "images/";
                    $mimage = $upfold . basename($_FILES['img']['name']);
                    move_uploaded_file($_FILES['img']['tmp_name'],$mimage);
                            $qryReg="insert into `tb_product` (`productname`,`category`,`brand`,`price`,`warranty`,`features`,`image`,`centerid`) VALUES ('$pname','$Category','$Company','$price','$warranty','$Features','$mimage','$centerid')";
                            if ($conn->query($qryReg) == TRUE){
                                echo "<script>alert('Category added');window.location='newitems.php'</script>";
                            }else{
                                echo "<script>alert('added has error! Try Again');</script>";
                            }
                        }
                        ?>
         
                </div>
                <div class="col-md-5 ps-lg-5 mt-md-0 mt-5">
                    <div class="contact-left">
                    <img src="gl.jpg" alt="" class="img-fluid radius-image">

                    </div>
                </div>
            </div>
        </div>
    </section> 
    
    
    <!-- courses section -->
    <div class="w3l-grids-block-5 home-course-bg py-5" id="courses">
        <div class="container py-md-5 py-4">
            <div class="title-main text-center mx-auto mb-md-5 mb-4" style="max-width:500px;">
                <p class="text-uppercase">My Items</p>
            </div>
            <div class="row justify-content-center">

            <?php
                                        $centerid = $_SESSION['userregid'];

$qry = "SELECT *from tb_product where centerid='$centerid'";
$result = mysqli_query($conn, $qry);
      if ($result->num_rows > 0) {
            while ($row = mysqli_fetch_array($result)) {
                ?>

                <div class="col-lg-4 col-md-6">
                    <div class="coursecard-single">
                        <div class="grids5-info position-relative">

                        <?php
                          echo "<img src='./". $row['image']. "' height=300px' />";
                            ?>
                        <div class="meta-list">
                            </div>
                        </div>
                        <div class="content-main-top">
                            <div class="content-top mb-4 mt-3">
                                <ul class="list-unstyled d-flex align-items-center justify-content-between">
                                    <li> <i class="fas fa-book-open"></i> <?php echo  $row['warranty'] ?> </li>
                                    <li> <i class="fas fa-book-open"></i><?php echo  $row['brand'] ?> </li>

                                </ul>
                                <hr>
                            </div>
                            <h4><a href="courses.html"><?php echo  $row['productname'] ?> </a></h4>
                            <p>Category : <?php echo  $row['category'] ?> </p>
                            <div class="top-content-border d-flex align-items-center justify-content-between mt-4 pt-4">
                                <h6><?php echo  $row['price'] ?> </h6>
                                <hr>
                                <h6><?php echo  $row['features'] ?> </h6>

                            </div>
                        </div>
                    </div>
                </div>
                <?php
                }
} else {
    echo "  <center> <h2 style='color: red;'>.... No Data Found ...</h2></center> ";
}
?>

             


            </div>
          
        </div>
    </div>
    <!-- //courses section -->

<?php
include("footer.php");
?>
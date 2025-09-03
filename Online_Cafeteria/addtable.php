<?php
session_start();

include("Header_Admin.php");
include("dbConnection.php");
?>


<!-- inner banner -->
<section class="inner-banner py-5">
        <div class="w3l-breadcrumb py-lg-5">
            <div class="container pt-4 pb-sm-4">
                <h4 class="inner-text-title pt-5">Admin Home</h4>
                <ul class="breadcrumbs-custom-path">
                    <li><a>Add tables</a></li>
                 
                </ul>
            </div>
        </div>
    </section>
    <!-- contact block -->
    <section class="w3l-contact py-5" id="contact">
        <div class="container py-md-5 py-4">
            <div class="title-main text-center mx-auto mb-md-5 mb-4" style="max-width:500px;">
                <p class="text-uppercase"></p>
                <h3 class="title-style">Add New Table Set </h3>
            </div>
            <div class="row contact-block">
            <?php              
               echo "
               <a href='viewalltablerequest.php'>  
               <button type='submit'  class='btn btn-success btn-lg'  style='padding-left: 2.5rem; radius:240px; padding-right: 2.5rem;background-color: #14b38b;float:right' name='login'>
            Customer Request</button ></a>";
              ?>
                <div class="col-md-7 contact-right">
                    <form action="" class="signin-form"  enctype="multipart/form-data" method="POST">
                    <div class="input-grids">
                            <div class="row">
                                <div class="col-sm-6">
                                    <input type="text" name="pname" id="w3lName" placeholder="Type Of Table Set"
                                        class="contact-input" required="" />
                                </div>
                                <div class="col-sm-6">
                                    <input type="text" name="pfeatures" id="w3lSender" placeholder="Number of Sheet in A Table"
                                        class="contact-input" required="" />
                                </div>
                            </div>
                            <input type="text" name="pprice" id="w3lSubect" placeholder="Amount / Per Sheet"
                                class="contact-input" required="" />
                          
                        </div>
                        <div class="form-input">
                      
                          
                        </div>
                        <input type="datetime-local"name="pbrand" id="w3lWebsite" placeholder="" 
                                class="contact-input" required="" />
                       <input type="text" name="pcategory" id="w3lWebsite" placeholder="Service Providing ? YES or NO"
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
                            $Features = $_REQUEST['pfeatures'];
                        
                        
                            $upfold = "images/";
                    $mimage = $upfold . basename($_FILES['img']['name']);
                    move_uploaded_file($_FILES['img']['tmp_name'],$mimage);
                            $qryReg="insert into `tablesSet` (`settable`,`numsheet`,`amount`,`datess`,`service`,`image`) VALUES ('$pname','$Category','$Company','$price','$Features','$mimage')";
                            if ($conn->query($qryReg) == TRUE){
                                echo "<script>alert('Tables added');window.location='addtable.php'</script>";
                            }else{
                                echo "<script>alert('added has error! Try Again');</script>";
                            }
                        }
                        ?>
         
                </div>
                <div class="col-md-5 ps-lg-5 mt-md-0 mt-5">
                    <div class="contact-left">
                    <img src="r.jpg" alt="" class="img-fluid radius-image">

                    </div>
                     <img src="rr.jpg" alt="" class="img-fluid radius-image">
                     </div>    
            </div>

        </div>
    </section> 
    
<?php
include("footer.php");
?>
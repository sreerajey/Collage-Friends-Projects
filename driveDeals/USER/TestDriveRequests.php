<?php
session_start();
$uid = $_SESSION['uid'];
include '../CONNECTION/DbConnection.php';
include('UserHeader.php')
?>

<style>
    table {
        font-family: arial, sans-serif;
        border-collapse: collapse;
        width: 95%;
        margin: 10px;
    }

    td,
    th {
        border: 1px solid #dddddd;
        text-align: center;
        padding: 8px;
        color: black;
    }

    tr:nth-child(even) {
        background-color: #dddddd;
    }

    #para:hover {
        cursor: default;
    }
</style>


<?php
$a = "SELECT `test_drive`.*,`user`.`uname`,`car`.`cname`,`car`.`cmodel` FROM `test_drive`,`user`,`car` WHERE `car`.`cid`=`test_drive`.`cid` AND `user`.`uid`=`test_drive`.`uid` AND `test_drive`.`uid`='$uid'";
$qry = mysqli_query($conn, $a);
if (mysqli_num_rows($qry) < 1) {
?>
    <center>
        <h1>No Request Pending</h1>
    </center>
<?php

} else {
?>

    <center>
        <h1 class="m-5 bread">Test Drive Requests</h1>
        <input type="text" class="form-control mb-3" id="searchInput" style="width: 95%;" placeholder="Search...">
        <table id="table" border="1" style="width: 95%;" class="mb-5">
            <thead>
                <tr style="text-align: center;">
                    <th style="border: 1px;color: black;">Name</th>
                    <th>Car</th>
                    <th>Model</th>
                    <th>Date</th>
                    <th>Time</th>
                    <th style="text-align: center;">Action</th>
                </tr>
            </thead>
            <tbody id="tableBody">
                <?php
                while ($row = mysqli_fetch_array($qry)) {
                ?>
                    <tr id="row{{ forloop.counter }}" style="text-align: center;">
                        <td>
                            <?php echo $row['uname'] ?>
                        </td>
                        <td>
                            <?php echo $row['cname'] ?>
                        </td>
                        <td>
                            <?php echo $row['cmodel'] ?>
                        </td>
                        <td>
                            <?php echo $row['date'] ?>
                        </td>
                        <td>
                            <?php echo $row['time'] ?>
                        </td>
                        <td>
                            <p class="btn btn-success" id="para"><?php echo $row['status'] ?></p>
                        </td>
                    </tr>
                <?php
                }
                ?>
            </tbody>
        </table>
        <div id="noMatchingData" style="display: none;">
            <h1 class="m-5">No Results Found</h1>
        </div>
    </center>

<?php
}
?>

<!-- Include Bootstrap JS and jQuery -->
<script src="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0/js/bootstrap.bundle.min.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
        // Handle search input
        $("#searchInput").on("keyup", function() {
            var value = $(this).val().toLowerCase();
            var rows = $("#tableBody tr");
            var matchingRows = rows.filter(function() {
                var rowText = $(this).text().toLowerCase();
                return rowText.indexOf(value) > -1;
            });
            rows.hide(); // Hide all rows initially
            matchingRows.show(); // Show matching rows
            if (matchingRows.length === 0) {
                $("#noMatchingData").show(); // Show message if no matching rows
                $("#table").hide();
            } else {
                $("#noMatchingData").hide(); // Hide message if there are matching rows
                $("#table").show();
            }
        });
    });
</script>



<?php
include('../COMMON/CommonFooter.php')
?>
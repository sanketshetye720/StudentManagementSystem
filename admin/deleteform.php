<?php
include('../dbcon.php');
$id = $_REQUEST['sid'];



    move_uploaded_file($tempimg,"../dataimg/$imagename");

    $query = "DELETE FROM `student` WHERE `id`='$id'";

    $runquery = mysqli_query($con,$query);

    if($runquery == true)
    {
        ?>
        <script>

            alert('Data Deleted Successfully');
            window.open('deletestudent.php','_self');
        </script>
        <?php
    }



?>
<?php
include('../dbcon.php');
$id = $_POST['sid'];
$rollno = $_POST['rollno'];
    $name = $_POST['fullname'];
    $city = $_POST['city'];
    $pcon = $_POST['pcon'];
    $std = $_POST['std'];
    $imagename = $_FILES['img']['name'];
    $tempimg = $_FILES['img']['tmp_name'];


    move_uploaded_file($tempimg,"../dataimg/$imagename");

    $query = "UPDATE `student` SET `rollno`='$rollno',
    `name`='$name',`city`='$city',`pcont`='$pcon',
    `standerd`='$std',`image`= '$imagename' WHERE `id` = '$id'";

    $runquery = mysqli_query($con,$query);

    if($runquery == true)
    {
        ?>
        <script>
            alert('Data Updated Successfully');
            window.open('updateform.php?sid=<?php echo $id; ?>','_self');
        </script>
        <?php
    }



?>
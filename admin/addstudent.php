<?php
session_start();

if(isset($_SESSION['uid']))
{
    echo "";

}
else
{
    header('location:login.php');
}
?>
<?php
include('header.php');
include('titlehead.php');
?>

<form method="POST" method="addstudent.php" enctype="multipart/form-data">
    <table class="form-group" align="center" style="background-color:wheat">
        <tr>
            <th>Roll No :</th>
            <td><input type="text" name="rollno" class="form-control" placeholder="Enter Roll no" required></td>
        </tr>
        <tr>
            <th>Full Name :</th>
            <td><input type="text" name="fullname" class="form-control" placeholder="Enter Full name" required></td>
        </tr>
        <tr>
                <th>City :</th>
                <td><input type="text" name="city" class="form-control" placeholder="Enter City" required></td>
            </tr>
            <tr>
                    <th>Parents Contact No :</th>
                    <td><input type="text" name="pcon" class="form-control" placeholder="Enter parents contact no" required></td>
                </tr>
                <tr>
                        <th>Standerd :</th>
                        <td><input type="number" name="std" class="form-control" placeholder="Enter Standerd" required></td>
                    </tr>
                    <tr>
                            <th>Image :</th>
                            <td><input type="file" class="form-control" name="img"required></td>
                        </tr>
                        <tr>
                            <td><input type="submit"  class="btn btn-success" value="Submit" name="submit" style="margin-left: 120px;width: 120px"></td>
                        </tr>
    </table>
</form>
</body>
</html>

<?php
if(isset($_POST['submit']))
{
    include('../dbcon.php');

    $rollno = $_POST['rollno'];
    $name = $_POST['fullname'];
    $city = $_POST['city'];
    $pcon = $_POST['pcon'];
    $std = $_POST['std'];
    $imagename = $_FILES['img']['name'];
    $tempimg = $_FILES['img']['tmp_name'];

    move_uploaded_file($tempimg,"../dataimg/$imagename");

    $query = "INSERT INTO `student`(`id`, `rollno`, `name`, `city`, `pcont`, `standerd`, `image`) VALUES (NULL,'$rollno','$name','$city','$pcon','$std','$imagename')";

    $runquery = mysqli_query($con,$query);

    if($runquery == true)
    {
        ?>
        <script>
            alert('Data Inserted Successfully');
        </script>
        <?php
    }
}
?>

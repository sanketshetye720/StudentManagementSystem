<?php
session_start();

if(isset($_SESSION['uid']))
{
    echo ""; 
}
else
{
    header('location:../login.php');
}
?>

<?php
include('header.php');
include('titlehead.php');
include('../dbcon.php');
$id = $_GET['sid'];

$query = "select * from student where id = '$id'";
$runquery = mysqli_query($con,$query);

$data = mysqli_fetch_assoc($runquery);
?>

<form method="POST"  action="updatedata.php"   enctype="multipart/form-data" >
    <table align="center" class="form-group" style="background-color: wheat;max-width: 800px;">
        <tr>
            <th>Roll No :</th> 
            <td><input type="text" name="rollno" class="form-control" value="<?php echo $data['rollno']; ?>" required></td>
        </tr>
        <tr>
            <th>Full Name :</th>
            <td><input type="text" name="fullname" class="form-control" value="<?php echo $data['name']; ?>" required></td>
        </tr>
        <tr>
                <th>City :</th>
                <td><input type="text" name="city" class="form-control" value="<?php echo $data['city']; ?>" required></td>
            </tr>
            <tr>
                    <th>Parents Contact No :</th>
                    <td><input type="text" name="pcon" class="form-control" value="<?php echo $data['pcont']; ?>" required></td>
                </tr>
                <tr>
                        <th>Standerd :</th>
                        <td><input type="number" name="std" class="form-control" value="<?php echo $data['standerd']; ?>" required></td>
                    </tr>
                    <tr>
                            <th>Image :</th>
                            <td><input type="file" name="img" class="form-control" required></td>
                        </tr>
                        <tr>
                            
                            <td>
                            <input type="hidden" name="sid" value="<?php echo $data['id']; ?>" >    
                            <input type="submit" value="Submit" name="submit" class="btn btn-success" style="margin-left: 120px;width: 120px"></td>
                        </tr>
    </table>
</form>
</body>
</html>


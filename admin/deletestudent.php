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
?>


    <table align=center style="margin-top: 100px">
        <form method="POST" action="deletestudent.php" class="form-inline">
        <tr>
            <th><h5>Enter Student standerd :</h5></th>
            <td>
                <input type="number" name="standerd" class="form-control" placeholder="Enter Student Standerd" required>
            </td>
        
                <th><h5 style="margin-left: 20px">Enter Student Name :</h5></th>
                <td>
                    <input type="text" name="sname" class="form-control" placeholder="Enter Student name" required>
                </td>
            
                    
                    <td>
                        <input type="submit" name="submit" value="Search" style="margin-left: 20px" class="btn btn-success">
                    </td>
                </tr>
        </form>
    </table>
    <table align=center width="80%" border="1" class="table-dark" style="margin-top: 100px">
        <tr align="center">
        <th>No</th>
        <th>Image</th>
        <th>Name</th>
        <th>Rollno</th>
        <th>Delete</th>
        </tr>

  


<?php
if(isset($_POST['submit']))
{
    include('../dbcon.php');
    $std  = $_POST['standerd'];
    $name = $_POST['sname'];

    $query = "SELECT * FROM `student` WHERE `standerd`='$std' AND `name` LIKE '%$name%'";
    $runquery = mysqli_query($con,$query);
     if($runquery == false)
     {
         echo "connection not ok";
     }
    if(mysqli_num_rows($runquery)<1)
    {
        echo "<tr><td colspan='5'>no records found</td></tr>";
    }
    else
    {
        $count = 0;
        while($data=mysqli_fetch_assoc($runquery))
        {
            $count++;
            ?>

            <tr align="center">
                <td><?php echo $count; ?></td>
                <td><img src="../dataimg/<?php echo $data['image']; ?>" style="max-width:100px;" /></td>
                <td><?php echo $data['name']; ?></td>
                <td><?php echo $data['rollno']; ?></td>
                <td><a href="deleteform.php?sid=<?php echo $data['id']; ?>">Delete</a></td>
        </tr>

            <?php


        }
    }
}
?>
</table>
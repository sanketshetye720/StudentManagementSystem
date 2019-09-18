<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Student Management System</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</head>
<body>
    <div class="jumbotron">
            <h5 style="text-align: right"><a href="login.php">Admin Login</a> </h5>
            <h1 style="text-align: center">Welcome to Student Management System</h1>
    </div>
    
    <table align="center">
        <form action="index.php" method="post" class="form-inline">
        <tr>
            <td><h5>Enter Student Standerd :</h5></td>
            <td>
                    <input type="number" name="std" class="form-control" required >
            </td>
        
        
            <td><h5 style="margin-left: 20px">Enter Roll no :</h5></td>
            <td><input type="text" name="rollno" class="form-control" required></td>
            <td></td>
            <td><input type="submit" name="submit" value="Show Info" class="btn btn-success" style="margin-left: 20px"></td>
        </tr>
</form>
    </table>
    <table align=center width="80%" border="1" style="margin-top: 20px" class="table-dark">
            <tr align="center">
            <th>No</th>
            <th>Image</th>
            <th>Name</th>
            <th>Rollno</th>
            
            </tr>

            <?php
            if(isset($_POST['submit']))
            {
                include('dbcon.php');
                $std  = $_POST['std'];
                $rollno = $_POST['rollno'];
            
                $query = "SELECT * FROM `student` WHERE `standerd`='$std' AND `rollno`='$rollno'";
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
                            <td><img src="dataimg/<?php echo $data['image']; ?>" style="max-width:100px;" /></td>
                            <td><?php echo $data['name']; ?></td>
                            <td><?php echo $data['rollno']; ?></td>
    
                    </tr>
            
                        <?php
            
            
                    }
                }
            }
            ?>
            </table>
</body>
</html>
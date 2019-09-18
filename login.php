
<?php
session_start();
if(isset($_SESSION['uid']))
{
    header('location:admin/admindash.php');
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

    <title>Admin Login</title>
</head>
<body>
    <div class="jumbotron">
    <h4 style="margin-top: -30px"><a href="index.php" style="color: orangered">Back to Home</a></h3>    
    <h1 align="center">Admin Login</h1>
    </div>
    <form method="POST" action="login.php" class="form-group" style="margin-top: 70px; background-color: lightblue; max-width:500px; margin-left: 600px; margin-top: 100px; margin-bottom: 100px;">
        <table align="center" style="width: 400px; height:400px ;">
           
            <tr>
                <td> <h5>Username :</h5></td>
                <td><input type="text" name="uname" required class="form-control"></td>
            </tr>
            <tr>
                <td><h5>Password :</h5> </td>
                <td><input  type="password" name="password" required class="form-control"></td>
            </tr>
            <tr>
                <td colspan="2" align="center" >
                    <input type="submit" style="margin-top: 30px; width: 100px" name="login" value="login" class="form-control; btn btn-success">
                </td>
            </tr>
        
        </table>

    </form>
</body>
</html>

<?php

include('dbcon.php');

if(isset($_POST['login']))
{
    $username = $_POST['uname'];
    $password = $_POST['password'];

    $query = "select * from admin where username='$username' and password='$password'";

    $runquery = mysqli_query($con,$query);

    $rows = mysqli_num_rows($runquery);

    if($rows<1)
    {
?>
        <script>
          alert('Username or Password is incorrect');
          window.open('login.php','_self');
        </script>
        
<?php
    }
      else
      {
          $data = mysqli_fetch_assoc($runquery);
          $id = $data['id'];

          

          $_SESSION['uid'] = $id;

          header('location:admin/admindash.php');
      }  

    
}
?>
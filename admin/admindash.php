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
   
?>

<div class="jumbotron">
        
        <h4><a href="logout.php" style="float: right;margin-top: -30px; margin-right:30px; color: orangered">Logout</a></h4>
        
        <h1 align="center">Welcome to Admin Dashboard</h1>
        </div>

<div class="dashboard">
    <table class="table" align="center" style="max-width:300px ">
        <tr>
            <td>1.</td><td><a href="addstudent.php">Insert Student Details</a></td>
        </tr>
        <tr>
                <td>2.</td><td><a href="updatestudent.php">Update Student Details</a></td>
            </tr>
            <tr>
                    <td>3.</td><td><a href="deletestudent.php">Delete Student Details</a></td>
                </tr>
    </table>
</div>

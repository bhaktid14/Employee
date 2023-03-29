<?php
 include 'config.php';
 if(isset($_POST['submit']))
 {
    $fname=$_POST['fname'];
    $lname=$_POST['lname'];
    $isAdmin=$_POST['isAdmin'];
    $email=$_POST['email'];
    $password=$_POST['password'];
    $duplicate=mysqli_query($conn,"select * from employee where email='$email'");
    if(mysqli_num_rows($duplicate)>0){
        echo
        "<script>
        alert('email hase already exist');
        </script>";
    }
    else{
        $query="insert into employee(fname, lname,isAdmin,email,password) values('$fname','$lname','$isAdmin','$email','$password')";
        mysqli_query($conn,$query);
        echo
        "<script>
        alert('Registration successfully');
        </script>";
       
    }
    header("Location:create.php");

 }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration</title>
</head>
<body>
    <h2>Registration</h2>
    <form class="" action="signup.php"  method="post" autocomplete="off">
        <label for="fname">First name:</label>
        <input type="text" name="fname" id="fname" required value=""><br><br>

        <label for="lname">Last name:</label>
        <input type="text" name="lname" id="lname" required value=""><br><br>

        <label for="isAdmin">isAdmin:</label>
        <input type="checkbox" name="isAdmin" id="isAdmin"><br><br>

        <label for="email">Email:</label>
        <input type="email" name="email" id="email" required value=""><br><br>

        <label for="password">Password:</label>
        <input type="password" name="password" id="password" required value=""><br><br>

        <button type="submit" name="submit">Register</button>
    </form>
    <a href="login.php">Login</a>
</body>

</html>










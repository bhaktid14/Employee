<?php include 'config.php';
if(isset($_POST['submit']))
{
   $email=$_POST['email'];
   $password=$_POST['password'];
   $result=mysqli_query($conn,"select * from employee where email='$email'");
   $row=mysqli_fetch_assoc($result);
   if(mysqli_num_rows($result)>0){
    if($password===$row["password"]){
        $_SESSION["login"]=true;
        $_SESSION["id"]=$row["id"];
        header("Location:create.php");

    }
    else{
        echo
        "<script> alert('wrong password..')</script>";
    }
   }
   else{
    echo
    "<script> alert('user not Regestered..')</script>";
}




}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>
    <h2>Login</h2>
    <form class="" action="login.php"  method="post" autocomplete="off">
        <label for="email">Email:</label>
        <input type="email" name="email" id="email" required value=""><br><br>

        <label for="password">Password:</label>
        <input type="password" name="password" id="password" required value=""><br><br>

        <button type="submit" name="submit">Login</button>

    </form>
    <br>

    <label>you don't have an account..?</label><a href="signup.php">Registration</a>
</body>
</html>
<?php 
include 'config.php';
$Tid="";
$Tname="";

if($_SERVER['REQUEST_METHOD']=='GET'){
   // echo "!isset($_GET["Tid"])";
 if(!isset($_GET["Tid"])){
     echo mysqli_error($conn);
     header("location:showdata.php");
     exit;
    }
  
$Tid=$_GET["Tid"];
$sql="SELECT * from task where Tid=$Tid";
$result=$conn->query($sql);
$row=$result->fetch_assoc();

if(!$row){
    header("location:showdata.php");
    exit;
}
$Tid=$row["Tid"];
$Tname=$row["Tname"];

}
else{
    $Tid=$_POST["Tid"];
    $Tname=$_POST["Tname"];


    do{
        if(empty($Tname)){
            $errorMessage="All fields are required";
            break;
        }
        $sql="UPDATE task". "SET Tname=$Tname"."where Tid=$Tid";

        $result=$conn->query($sql);

        if(!$result){
            $errorMessage="Invalid query: ".$conn->error;
            break;
        }
        header("location:showdata.php");
        exit;
    }while(false);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/js/bootstrap.bundle.min.js"></script>
 
</head>
<body>
    <h2>Edit Task</h2>
    
    <form method="post" action="edit.php">
        <input type="hidden"name="Tid" value="<?php echo $Tid; ?>">
        <div class="row-md-3">
            <label>Task name</label>
           <div class="col-sm-3">
            <input type="text" class="form-control" name="Tname" value="<?php echo $Tname;?>" required="" ><br><br>
           </div>
        </div>

        <div class="row mb-3">
            <div class="col-sm-1 d-grid">
                <button type="submit" class=" btn btn-primary">Update</button>
            </div>
            <div class="col-sm-1 d-grid">
                <a class="btn btn-outline-primary" href="showdata.php" role="button">Cancel</a>
            </div>
        </div>
    </form>

</body>
</html>
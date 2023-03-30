<?php 
 include 'config.php';
$Tname="";
$errorMessage="";
$successMessage="";

if($_SERVER['REQUEST_METHOD']==='POST'){
    $Tname=$_POST['Tname'];
    $id=$_SESSION["id"];

    do{
        if(empty($Tname)){
            $errorMessage="All fields are required";
            break;
        }
        if(isset($_SESSION['id'])){
    
        $sql="INSERT INTO task(Tname,id) values('$Tname','$id')";
        $result=$conn->query($sql);
        echo mysqli_error($conn);
        if(!$result){
            $errorMessage="Invalid query".$conn->error;
            break;
        }
        $Tname="";
        $successMessage="Task added successfully";
        header("location:showdata.php");
        exit;
        }
    }while(false);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/js/bootstrap.bundle.min.js"></script>
 
</head>
<body>
    <h2>New Task</h2>
    
    <form method="post" action="create.php">
        <div class="row-md-3">
            <label>Task name</label>
           <div class="col-sm-3">
            <input type="text" class="form-control" name="Tname" value="<?php echo $Tname;?>" required="" ><br><br>
           </div>
        </div>

        <div class="row mb-3">
            <div class="col-sm-1 d-grid">
                <button type="submit" class=" btn btn-primary">Create</button>
            </div>
            <div class="col-sm-1 d-grid">
                <a class="btn btn-outline-primary" href="showdata.php" role="button">Cancel</a>
            </div>
        </div>
    </form>

</body>
</html>
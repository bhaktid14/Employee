<?php
 include 'config.php';
 ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TaskList</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/js/bootstrap.bundle.min.js"></script>
  </head>
<body>
  <div>
    <h2>Task list</h2>
    <a class="btn btn-primary" href="create.php" role="button">New Task</a>
    <table class="table">
        <thead>
            <tr>
                <th>Task id</th>
                <th>Task name</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
        <?php 
            $id=$_SESSION["id"];
            $sql="select * from task where id=$id";
            $result=$conn->query($sql);
            if(!$result)
            {
                die("Invalid query".$conn->error);
            }
            while($row=$result->fetch_assoc())
            {
            echo
            "
            <tr>
                <td>$row[Tid]</td>
                <td>$row[Tname]</td>
                <td>
                  <button>Edit</button>
                  <button type=submit>Delete</button>
                </td>

            </tr>
            ";
            }
            ?>
            
            
        </tbody>
    </table>
  </div>
</body>
</html>
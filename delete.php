<?php
include 'config.php';

if(isset($_GET["Tid"])){
    $Tid=$_GET["Tid"];
}
$sql="DELETE FROM task where Tid=$Tid";
$conn->query($sql);
header("location:showdata.php");
exit;

?>
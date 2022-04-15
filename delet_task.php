
<?php
include("db.php");

    if(isset($_GET['id']))
    echo "hola id";
    $id=$_GET['id'];
    
    $query="DELETE FROM task WHERE id= $id";
    $result=mysqli_query($conn, $query);
    if(!$result){
        die("error");
    
    }
    $_SESSION['message']='Eliminado';
    $_SESSION['message_type']='danger';
    header("Location:index.php");  

?>
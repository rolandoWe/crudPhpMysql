
<?php

include("db.php");

if(isset($_GET['id'])){
    $id=$_GET['id'];
    $query="SELECT * FROM task WHERE id = $id";
    $result=mysqli_query($conn,$query);
    if(mysqli_num_rows($result)==1){
        $row=mysqli_fetch_array($result);
        $title=$row['title'];
        $title2=$row['description'];
        // echo $title ." " .$title2;
    }
}

if(isset($_POST['update'])){
    // echo "actualizando";
    $id=$_GET['id'];
    $title=$_POST['title'];
    $description=$_POST['description'];

    echo $id ." ";
    echo $title ." ";
    echo $description;

    $query="UPDATE task set title='$title',description='$description' WHERE id= $id ";
    $_SESSION['message']='actualizado';
    $_SESSION['message_type']="danger";
    mysqli_query($conn,$query);
    header("Location: index.php");
}

?>

<?php include("includes/header.php")?>

<div class="container">
    <div class="row">
        <div class="col-md-4 mx-auto">
            <div class="card card-body">
              <form action="edit.php?id=<?php echo $_GET['id'];?>" method="POST">
                  <div class="form-group">
                      <input type="text" name="title"value="<?php echo $title?>" placeholder="title" class="form-control">
                  </div>
                  <div class="form-group">
                      <textarea name="description" rows="2" class="form-control" placeholder="editar description"><?php echo $title2?></textarea>
                  </div>
                  <button type="submit" name="update" class="btn btn-success">update</button>
              </form>
            </div>
        </div>
    </div>
</div>

<?php include("includes/footer.php")?>
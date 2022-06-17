<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Index</title>
</head>

<body>

    <?php
    session_start();
         include "connect.php";
    ?>
    <div class="container my-5">
        <div class="card">
            <div class="card-header ">
                <div class="card-title">Post-Title</div>
                <button type="button" class="btn btn-primary float-end"><a href="create.php" class="link-light">+Add
                        create new</a></button>
            </div>
        </div>

        <div class="card">
            <div class="card-body">
                <?php
                  if(isset($_SESSION['status'])){
                    
                ?>

                    <div class="alert alert-info" role="alert">
                            <strong> Data input successfully! </strong><?php echo $_SESSION['status']; ?>
                    </div>
                    <?php
                   unset($_SESSION['status']);
                 
                  }
                  ?>
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">id</th>
                            <th scope="col">Title</th>
                            <th scope="col">Description</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                         $query="SELECT * FROM mytable order by id desc";

                         $post=mysqli_query($conn,$query);
                         foreach($post as $key=>$row){
                    ?>

                        <tr>
                            <td>
                                <?php echo ++$key?>
                            </td>
                            <td>
                                <?php echo $row['title']?>
                            </td>
                            <td>
                                <?php echo $row['description']?>
                            </td>

                            <td>
                                <a href="edit.php?postId=<?php echo $row ['id']?>">Edit</a>
                                <a href="index.php?postId=<?php echo $row ['id']?>">Delete</a>
                            </td>
                        </tr>
                        <?php
    }
  ?>

                    </tbody>
                    
            </div>

            <?php
            if(isset($_GET['postId'])){
                    
               $post_id_to_delete=$_GET['postId'];

               $query = "DELETE FROM mytable WHERE id = $post_id_to_delete";
               mysqli_query($conn,$query);
               $_SESSION['status']="data delete successfully";
               header("location:index.php");
            }
            ?>

</body>

</html>
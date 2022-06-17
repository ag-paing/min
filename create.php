<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Create</title>
</head>
<body>

<?php 

session_start();
include "connect.php";
$titleError="";
$decsError="";
$title="";
$decs="";
?>
    <?php
       if(isset($_POST['submit'])){
        $title=$_POST['title'];
        $decs=$_POST['description'];
       
        if(empty($title)){
        $titleError="The title files is required";
         }
        if(empty($decs)){
        $decsError="The description files is required";
         }
        if(!empty($title) && !empty($decs)){
        $query="INSERT INTO mytable(title,description) value('$title','$decs')";
        mysqli_query($conn,$query);

        $_SESSION['status']="Data input successfully";
        header('location:index.php');

        }
      
       }


    ?>
   <div class="container my-5">
    <div class="card ">
        <div class="card-header">
            <div class="card-title">Post-Title</div>
            <button type="button" class="btn btn-primary float-end"><a href="index.php" class="link-light">back</a></button>
        </div>
       
    </div>

    <div class="card">
        <div class="card-body">
        <form action="create.php" method="POST">
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Title</label>
                <input type="text" name="title" class="form-control <?php if($titleError!=''): ?>is-invalid <?php endif?>" id="exampleFormControlInput1" placeholder="Enter title">
                <span class="text-danger"><?php echo $titleError ?></span>
            </div>
            <div class="mb-3">
                <label for="exampleFormControlTextarea1" class="form-label">Description</label>
                <textarea class="form-control <?php if($decsError!=''): ?>is-invalid <?php endif?> " name="description" id="exampleFormControlTextarea1" rows="3"></textarea>
                <span class="text-danger"><?php echo $decsError ?></span>
            </div>
            <button type="submit" name="submit" class="btn btn-primary float-end">Confirm</button>
        </form>
        </div>
    </div>
        
   </div> 
       



<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

</body>
</html>
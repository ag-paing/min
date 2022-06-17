<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Edit</title>
</head>
<body>

<?php 

session_start();
include "connect.php";
$titleError="";
$decsError="";
$title="";
$decs="";

if(isset($_GET['postId'])){
$post_Id_updated=$_GET['postId'];

$post=mysqli_query($conn,"select * from mytable where id=$post_Id_updated");

if(mysqli_num_rows($post)==1){
    foreach($post as $posts){
       $titleId=$posts['id'];
      $title=$posts['title'];
       $decs=$posts['description'];

    }
}
}

if(isset($_POST['update_post_button'])){
        $postId=$_POST['postId'];
        $title=$_POST['title'];
        $decs=$_POST['description'];

            if(empty($title)){
                $titleError="the title file is required";
            }
            if(empty($decs)){
            $decsError="the description file is required";
        }
            if(!empty($title) && !empty($decs)){
            $query="update mytable set title='$title', description='$decs' where id=$postId";

            mysqli_query($conn,$query);
            $_SESSION['status']="Data updated successfully";
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
        <form action="" method="POST">
            <input type="hidden" name="postId" value="<?php echo $titleId?>">
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Title</label>
                <input type="text" name="title" class="form-control <?php if($titleError!=''): ?>is-invalid <?php endif?>" id="exampleFormControlInput1" placeholder="enter title "  value="<?php echo $title ?>">
                <span class="text-danger"><?php echo $titleError ?></span>
            </div>
            <div class="mb-3">
                <label for="exampleFormControlTextarea1" class="form-label">Description</label>
                <textarea class="form-control <?php if($decsError!=''): ?>is-invalid <?php endif?> " name="description" id="exampleFormControlTextarea1" rows="3"><?php echo $decs ?> </textarea>
                <span class="text-danger"><?php echo $decsError ?></span>
            </div>
            <button type="submit" name="update_post_button" class="btn btn-primary float-end">Updated</button>
        </form>
        </div>
    </div>
        
   </div> 
       



<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

</body>
</html>



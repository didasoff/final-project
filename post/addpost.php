<?php 
include "../app/autoload.php";

if(!isset($_SESSION['user_id'])){
    header("Location:../admin/login.php");
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Post Add</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/4.6.1/css/bootstrap.min.css"/>
</head>
<body>
    <div class="container">
     <a href="../index.php" class="btn btn-success">Home</a>
        <br>
        

        <div class="card">
           <div class="card-body">
           <h1>Add Post</h1>
           <form action="addstore.php" method="post" enctype="multipart/form-data">
               <div class="mb-3">
                   Image :
                   <input type="file" name="image" class="form-control">
               </div>
               <div class="mb-3">
                   Product Name :
                   <input type="text" name="name" class="form-control" placeholder="Product Name">
               </div>
               
               <div class="mb-3">
                   Shop Name :
                   <input type="text" name="sname" class="form-control" placeholder="Shop Name">
               </div>
               <div class="mb-3">
                   Price :
                   <input type="text" name="price" class="form-control" placeholder="Product Price">
               </div>
               <div class="mb-3">
                 
                   <input type="submit" name="postBtn" class="form-control btn btn-success" value="Submit">
               </div>

           </form>
           </div>
        </div>
    </div>
</body>
</html>

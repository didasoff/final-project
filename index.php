<?php 

include "./app/autoload.php";

$sql = "SELECT * FROM addpost ORDER BY id DESC";
    $showData = mysqli_query($conn, $sql);

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Snaffad</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.0/jquery.min.js" integrity="sha512-k2WPPrSgRFI6cTaHHhJdc8kAXaRM4JBFEDo1pPGGlYiOyv4vnA0Pp0G5XMYYxgAPmtmv/IIaQA6n5fLAyJaFMA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
</head>

<body>

    <section class="ads-sec">
    </section> 
<a href="post/addpost.php" style="color:#E74C3C;text-decoration: none;font-weight: bold;">+ Add Post</a> |
    <?php if(isset($_SESSION['user_id'])){ ?>
    <a href="admin/logout.php" style="color:red;text-decoration: none;font-weight: bold;">Logout</a> |
    <?php }else{?>
    <a href="admin/login.php" style="color:green;text-decoration: none;font-weight: bold;">Login</a>
    <?php }?>
<?php
   if(isset( $_SESSION['name']))
     echo  $_SESSION['name'];
     ?>
    <section class="full-sec">
        <div class="container">

          <?php 
                 if(mysqli_num_rows($showData) > 0) {

                    while($row = mysqli_fetch_assoc($showData)) {

                        $name = $row["name"];
                        $sname = $row["shop"];
                        $price = $row["price"];
                
                ?>


                <div>
                <img src="post/upload/<?php echo $row['image']; ?>" class="card-img-top" alt="image">
                    <p class="pr-name"><?php echo $name; ?></p>
                    <h1 class="price">৳ <?php echo $price; ?></h1>
                    <p class="store-name"><?php echo $sname; ?></p>
                    <a href="viewpost.php">
                        <button class="buy-btn">View</button>
                    </a>
               
                </div>
                <?php } } ?>
          </div>
           
        
    </section>

    <section class="brand-sec">

    </section>

</body>

</html>
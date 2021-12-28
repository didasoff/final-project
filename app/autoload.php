<?php 
session_start();
session_regenerate_id(true);
include "config.php";
include "db.php";
include "functions.php";


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    

<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <?php 
 if(isset($_SESSION['msg']) && $_SESSION['msg_code'] !=""){?>
     <script>
     swal({
         title: "<?php echo $_SESSION['msg'];  ?>",
         // text: "You clicked the button!",
         icon: "<?php echo $_SESSION['msg_code'];  ?>",
         button: "OK Done",
     });
     </script>
 <?php } ?>
</body>
</html>
<?php 
     unset($_SESSION['msg']);
     unset($_SESSION['msg_code']);
 ?>
</body>
</html>
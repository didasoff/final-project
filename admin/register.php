<?php 
include "../app/autoload.php";

if ((isset($_POST['regBtn']))) {

    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $cpassword = $_POST['cpassword'];
    $phone = $_POST['phone'];

    if(!empty($name) && !empty($email) && !empty($password) && !empty($phone)){

        if($password == $cpassword){

            $sql1 = "SELECT * FROM users WHERE email='$email' AND password='$password'";
            $result1 = mysqli_query($conn,$sql1);
            if(mysqli_num_rows($result1) == 1){
               
                $_SESSION['msg'] = "Email Already Exists";
                $_SESSION['msg_code'] = "error";
                
            }else{
                $user_id = get_random_string(60);

                $sql = "INSERT INTO users(user_id,name,email,password,phone) VALUES('$user_id','$name','$email','$password','$phone')";

                $result = mysqli_query($conn,$sql);
                
                if($result){
                    $_SESSION['msg'] = "Congrats! Registered Successfully";
                    $_SESSION['msg_code'] = "success";
                   // header("Location:login.php");
                }else{
                    $_SESSION['msg'] = "Something is Wrong";
                    $_SESSION['msg_code'] = "warning";
                }
            }

        }else{
            $_SESSION['msg'] = "Password Not Match";
            $_SESSION['msg_code'] = "error";
            
        }

    }else{
        $_SESSION['msg'] = "Empty Field";
        $_SESSION['msg_code'] = "error";
    } 

}


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="stylesheet" href="<?php echo URLROOT; ?>/public/bootstrap/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <br><br>
        <div class="card">
            <h1>Register</h1>
            <form action="" method="post">
                <div class="mb-3">
                    <input type="text" name="name" class="form-control" placeholder="Full Name" value="<?php if(isset($name)) echo $name; ?>">
                </div>
                <div class="mb-3">
                    <input type="text" name="email" class="form-control" placeholder="Email" value="<?php if(isset($email)) echo $email; ?>">
                </div>
                <div class="mb-3">
                    <input type="text" name="password" class="form-control" placeholder="Password">
                </div>
                <div class="mb-3">
                    <input type="text" name="cpassword" class="form-control" placeholder="Confirm Password">
                </div>
                <div class="mb-3">
                    <input type="text" name="phone" class="form-control" placeholder="Mobile" value="<?php if(isset($phone)) echo $phone; ?>">
                </div>
                <div class="mb-3">
                    <input type="submit" name="regBtn" class="btn btn-success fw-bold" value="Register">
                </div>
            </form>
        </div>
    </div>
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
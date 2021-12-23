<?php 
include "../app/autoload.php";

if(isset($_POST['loginBtn'])){

    if(isset($_SESSION['token']) && $_SESSION['token'] == $_POST['token']){

    $email = $_POST['email'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM users WHERE email='$email' AND password='$password'";
    $result = mysqli_query($conn,$sql);
    $rowcount = mysqli_num_rows($result);
    $row = mysqli_fetch_assoc($result);

    $id = $row['id'];
    $name = $row['name'];
    $user_id = $row['user_id'];

    if(!empty($email) && !empty($password)){
       
        if($rowcount == 1 && $row['email'] = $email &&  $row['password'] = $password){

            $_SESSION['user_id'] = $user_id;
            $_SESSION['name'] = $name;
            $_SESSION['userId'] = $id;
            
            if($row['role'] == 1){

                $_SESSION['admin'] = "admin";                 
                header('Location:index.php');

            }else if(($row['role'] == 2)){
               
                $_SESSION['client'] = "client";
                header('Location:client.php');
            
            }else if(($row['role'] == 0)){
               
                $_SESSION['user'] = "user";
                header('Location:../index.php');
            }
        }else{

            $_SESSION['msg'] = "No Data";
            $_SESSION['msg_code'] = "error";
            
        }

    }else{
        $_SESSION['msg'] = "Empty Field";
        $_SESSION['msg_code'] = "error";
    }
  }

}

$_SESSION['token'] = get_random_string(60);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login | Snaffad</title>
    <link rel="stylesheet" href="css/style.css">
</head>

<body>

    <section>
        <div class="columns">
            <div class="column">
                <h2 class="res-title">আপনি যদি রেজিস্ট্রেশন না করে থাকেন তাহলে নিচের বোতামটিতে ক্লিক করে রেজিস্ট্রেশন করার পদ্ধতিটি দেখে আসুন।</h2>
                <a href="info.html" class="res-btn"><button>Registration</button></a>
            </div>
            <div class="column">
                <form class="full-form" action="" method="POST">
                    <p class="login-title">লগইন করুন</p>
                   
                    <input type="text" class="username" name="email" placeholder="আপনার নাম">
                    
                    <input type="text" class="pass" name="password" placeholder="আপনার পাসওয়ার্ড">
                    <input type="hidden" class="form-control" name="token" value="<?php echo $_SESSION['token'];?>">
                    <input type="submit" class="login-btn" name="loginBtn" value="লগইন">
                </form>
                <p class="for-mobile">আপনি যদি রেজিস্ট্রেশন না করে থাকেন তাহলে লিংকে ক্লিক করে রেজিস্ট্রেশন করার পদ্ধতিটি দেখে আসুন। <a href="#">Click hear</a></p>
            </div>
        </div>
    </section>

</body>

</html>




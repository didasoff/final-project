<?php 
include "../app/autoload.php";


if(isset($_POST["postBtn"])) {

    $name = $_POST["name"];
    $sname = $_POST["sname"];
    $price = $_POST["price"];

    $imageRandom = rand(1,99999999).'-'.time().$_FILES['image']['name'];
    $imageName = $imageRandom;
    $extention = pathinfo($_FILES['image']['name'],PATHINFO_EXTENSION);
    $size = $_FILES['image']['size'];


    $tmp = $_FILES['image']['tmp_name'];
    $target_Folder = 'upload/';
    //$uploade_image = move_uploaded_file($tmp,$trg);



    if(!empty($name) && !empty($sname) && !empty($price)){

        if($extention = "jpg" || $extention = "png" || $extention = "svg" || $extention = "jpeg"){

            $imageRandom = rand(1,99999999).'-'.time().$_FILES['image']['name'];

            if(!file_exists($imageName)){
                if($size <= 500000){ // 5kb

                    $sql = "INSERT INTO addpost(image,name,shop,price) VALUES('$imageName','$name','$sname','$price')";
                    $result = mysqli_query($conn,$sql);
                
                    if($result){
                        $uploade_image = move_uploaded_file($tmp,'upload/' .$imageName);                      
                        $_SESSION['msg'] = "Congrats! Post Successfully Uploaded";
                        $_SESSION['msg_code'] = "success";
                        header("Location:addpost.php");
                        
                    }else{
                       
                        $_SESSION['msg'] = "Error ! Error!";
                        $_SESSION['msg_code'] = "error";
                    header("Location:addpost.php");
                    }

                }else{
                   
                    $_SESSION['msg'] = "Image size is too large";
                    $_SESSION['msg_code'] = "error";
                    header("Location:addpost.php");
                }

            }else{
               
                $_SESSION['msg'] = "Image already exists";
                $_SESSION['msg_code'] = "error";
        header("Location:addpost.php");
            }

        }else{
            
            $_SESSION['msg'] = "Only png jpg jpeg svg";
            $_SESSION['msg_code'] = "error";
         header("Location:addpost.php");
        }    

    }else{
        $_SESSION['msg'] = "Field Empty";
        $_SESSION['msg_code'] = "error";
        header("Location:addpost.php");
    }







}



?>
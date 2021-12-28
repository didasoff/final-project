<?php 
include "../app/autoload.php";
if(!isset($_SESSION['admin'])){
    header("Location:login.php");
}
?>
<?php 
include 'includes/links.php';
?>

<body class="admin_body">
    <?php include 'includes/header.php';?>
    <div class="row">
        <div class="col-md-2">
            <div class="sidebar_admin">
                <?php include 'includes/sidebar.php';?>
            </div>
        </div>
        <div class="col-md-10">
            <main>
                <?php
                    if(isset($views)){
                        if($views=="dashboard"){
                            include("views/view-dashboard.php");
                        }
                    }
                                                
                ?>
            </main>
        </div>


    </div>


    <?php 
include 'includes/footer.php';
include 'includes/scripts.php';
?>
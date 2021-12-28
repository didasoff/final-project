<?php 

include "../app/autoload.php";
session_destroy();

header("Location:".URLROOT."/index.php");


?>
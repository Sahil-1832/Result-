<?php
    session_start();
    if(isset($_SESSION)){
        $rollno= $_SESSION['rollno'];
        $name= $_SESSION['name'];
    }
    else
        header("location:project.php");
?>
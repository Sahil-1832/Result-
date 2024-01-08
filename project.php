<?php
    $hostname="127.0.0.1";
    $username="root";
    $password="";
    $db="university";

    $regisError="";
    $passError="";

    if(isset($_POST['submit']))
    {
        $rollno=$_POST['rollno'];
        $pass=$_POST['password'];

        $connection=mysqli_connect($hostname,$username,$password,$db);
        if($connection)
        {
            $query="SELECT * FROM info2 WHERE  Rollno='$rollno'";
            $query_execute=mysqli_query($connection,$query);
            $rows=mysqli_num_rows($query_execute);
            if($rows==1)
            {
                if(strlen($pass)!=8){
                    $passError="Wrong Password";}
                else
                {
                    $query2="SELECT * FROM info2 WHERE `Password`='$pass'";
                    $query2_execute=mysqli_query($connection,$query2);
                    $rows2=mysqli_num_rows($query2_execute);
                    if($rows2==1)
                    {
                        $res=mysqli_fetch_assoc($query2_execute);
                        session_start();
                        $_SESSION['rollno']=$rollno;
                        $_SESSION['name']=$res['Name'];
                        header("location: welcome.html");
                    }
                    else
                    {
                        $passError="Wrong Password";
                    }  
                }
            }
            else
            {
                $regisError="Registration Number not found";
            }
        }
        else
            echo "Database connection failed";
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="project.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
    <nav class="navbar">
        <div class="navbar-logo">
          <img src="cuhp.jpg">
          <p>Central University Himachal Pradesh </p>
        </div>
        <ul class="navbar-links">
          <li><a href="#">Home</a></li>
          <li><a href="#">About</a></li>
          <li><a href="#">Services</a></li>
          <li><a href="#">Contact</a></li>
        </ul>
    </nav>
    <div class="form">
    <div class="wrapper">
        <div class="form-box login">
            <h2>Student Portal</h2>
            <form method="post">
                <div class="input-box">
                    <span class="icon"><i class="fa-solid fa-graduation-cap"></i></span>
                    <input type="text" name="rollno" required>
                    <label>Registration Number</label>
                    <br><span class="error"><?php echo $regisError!=""? $regisError : "";?></span><br>
                </div>
                <div class="input-box">
                    <span class="icon"><i class="fa-solid fa-lock"></i></span>
                    <input type="password" name="password" required>
                    <label>Password</label>
                    <br><span class="error2"><?php echo $passError; ?></span><br>
                </div>
                <button type="submit" name="submit" class="btn">Login</button>  
            </form>
        </div>
    </div>
    </div>
    <script src="project.js"></script>
</body>
</html> 
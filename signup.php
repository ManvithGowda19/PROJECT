<?php
    session_start();

    include("db.php");

    if(isset($_POST['submit'])){
        $firstname = $_POST['name'];
        $num = $_POST['number'];
        $gmail = $_POST['mail'];
        $password = $_POST['pass'];

        if(!empty($gmail) && !empty($password) && !is_numeric($gmail)){

            $sql = "insert into form(fname, cnum, email, pass) values('$firstname', '$num', '$gmail', '$password')";
            mysqli_query($conn, $sql);

            echo "<script type='text/javascript'> alert('Successfully Register')</script>";
            
        } else {

            
            echo "<script type='text/javascript'> alert('Please Enter some valid information')</script>";
        }

        header("Location: index.php");
    }
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>login page</title>
    <style>
        /*----------------login----------------------*/
.login{
    border: 1px;
    width: 400px;
    height: 600px;
    background: url('images/login.jpg');
    color: white;
    border-radius: 20px;
    box-shadow: 0px 0px 20px rgba(0, 0, 0, 0.75);
    background-size: cover;
    background-position: center;
    overflow: hidden;
}
.login form{
    display: block;
    box-sizing: border-box;
    padding: 40px;
    width: 100%;
    height: 100%;
    backdrop-filter: brightness(40%);
    flex-direction: column;
    display: flex;
    gap:5px;
}
.login h1{
    font-weight: normal;
    font-size: 24px;
    text-shadow: 0px 0px 2px rgba(0, 0, 0, 0.5);
    margin-bottom: 60px;
}
.login label{
    color: rgba(225, 225, 22, 0.8);
    text-transform: uppercase;
    font-size: 10px;
    padding-left:10px ;
}
.login input{
    background: rgba(225, 225, 225, 0.3);
    height:40px;
    line-height:40px;
    border-radius: 20px;
    padding:0px 20px;
    border: none;
    margin-bottom: 20px;
    color:white;
}
.login button{
    background: rgb(45, 126, 231);
    height: 40px;
    line-height: 40px;
    border-radius: 40px;
    border:none;
    margin: 10px 0px;
    box-shadow: 0px 0px 5px rgba(0, 0, 0, 0.3);
    color: white;
    font-size: 12px;
    text-transform: uppercase;
}
.login  a {
    color: rgba(225, 225, 22, 0.8);
}
body{
    background-color: rgb(222, 144, 251);
}
    </style>
</head>
<body>
    <center>
    <div class="login">
        <form  method="post">
            <h1>Sign Up</h1>
            <label>Name</label>
            <input type="text" name="name">
            <label>Phone Number</label>
            <input type="tel" name="number">
            <label>E-mail</label>
            <input type="email" name="mail">
            <label >Password</label>
            <input type="password" name="pass">
            <input type="submit" name="submit" value="submit"> 
            <p>Already have an account? <a href="loginpage.php">Login here</a></p>
        </form>
    </div>
</center>
</body>
</html>
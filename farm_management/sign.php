<?php
$error = "";
  
  require_once("db.php");
// print_r($_POST);

// Temp
    echo @$_SESSION['farmerId'];
  if(isset($_POST['sign']))
  {
    $name = $_POST['name'];
    $username = $_POST['username'];
    $password = $_POST['password'];

    if(preg_match("/[A-Za-z0-9]{3,}[@][A-Za-z]{3,}[.]{1,}[a-zA-Z]{3,}/",$username))
    {

      if(preg_match("/[A-Z]{1,}[a-z0-9]{1,10}@[0-9]{3,}/",$password))
      {
        // Start code for database 
        $connectiodb;

        // create the query for insert
        $sql = "INSERT INTO signup(name,username,password)
        VALUES(:nameF,:usernameF,:passwordF)";

        // prepare query
        $stmt = $connectiodb->prepare($sql);

        // bind the values For injection free
        $stmt->bindValue(':nameF',$name);
        $stmt->bindValue(':usernameF',$username);
        $stmt->bindValue(':passwordF',$password);
        
        $Execute = $stmt->execute();

        if($Execute){
          echo '<script>window.open("login.php?id=Registered Successfuly..","_self")</script>';
        }

      } else {
        echo "<h1 class='red'>Password Should 1-A-Z,letters,0-9</h1>";
      }
    } else {
      echo "<h1 class='red'>Invalid password and Username..</h1>";
    }
  }

  
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Farming Management System Login</title>
    <style>
      .red{
        color: white;
        text-align: center;
        position: absolute;
        top: 30px;
        background: red;
        border-radius: 15px;
        font-size: 20px;
        padding: 10px;
        opacity: 0.5;
      }
        body {
            background-image: url('farm.jpg'); /* Replace with the actual path to your agricultural background image */
            background-size: cover;
            font-family: Arial, sans-serif;
            margin: 0;
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
        }

        .login-container {
            background-color: rgba(255, 255, 255, 0.8);
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.3);
            text-align: center;
            max-width: 400px;
            width: 100%;
        }

        .login-container h2 {
            color: #333;
        }

        .login-form {
            margin-top: 20px;
        }

        .login-form input {
            width: 100%;
            padding: 10px;
            margin-bottom: 10px;
            box-sizing: border-box;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        .login-form button {
            background-color: #4CAF50;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        /* // pop up; */



    </style>
</head>
<body>
<div class="login-container">
    <h2>Farming Management System SignUp</h2>
    <form action="sign.php" method="POST" class="login-form">
        <input type="text" name="name" placeholder="name">
        <input type="text" name="username" placeholder="Username">
        <input type="password" name="password" placeholder="Password">
        <button type="submit" name="sign" class="sign">New Farmer Account</button>
    </form>
</div>
</body>
</html>

<?php
  // print_r($_POST);
  require_once("db.php");
  $message = @$_GET['id'];
  if(isset($_POST['login']))
  {
    $username = $_POST['username'];
    $password = $_POST['password'];

    if(preg_match("/[A-Za-z0-9]{3,}[@][A-Za-z]{3,}[.]{1,}[a-zA-Z]{3,}/",$username) && preg_match("/[A-Z]{1,}[a-z0-9]{1,10}@[0-9]{3,}/",$password))
    {

      // echo "<h1 class='red'>Successfuly Login..</h1>";
        $connectiodb;
        $sql = "SELECT * FROM signup WHERE username='$username'";
        $stmt = $connectiodb->prepare($sql);
        $stmt->execute();

        $flag = 0;
        while($dataRow=$stmt->fetch()) // to fetch the row using the stmt to store the row in $dataRow variable
        {
          if($dataRow["password"] == $password){
            echo '<script>window.open("sign.php?id=login Successfuly..","_self")</script>';
            $flag = 1;

            // To store the user data also to shown on ome page or profile
            $_SESSION['farmerId'] = $dataRow['id'];
            $_SESSION['name'] = $dataRow['username'];
          }

        }

        if($flag == 0){
          echo "Not login";
        }

    } else {
      echo "<h1 class='red'>Invalid password and Username..</h1>";
    }
  } 

  if(isset($_POST['sign']))
  {
    header("Location: sign.php");
    exit;
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
            background-image: url('farm.jpg'); 
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
    <h2>Farming Management System Login</h2>
    <form action="login.php" method="POST" class="login-form">
        <input type="text" name="username" placeholder="Username">
        <input type="password" name="password" placeholder="Password">
        <button type="submit" name="login">Login</button>
        <button type="submit" name="sign">Sign-in</button>
    </form>
</div>
</body>
</html>


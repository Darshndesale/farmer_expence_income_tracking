<?php
session_start();
if (!isset($_SESSION['username'])) {
  
  echo "<script>";
          
          echo 'window.location.href="index.php";';
          echo "</script>";
  exit;
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css"
    integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous" />
  <link href="https://unpkg.com/css.gg@2.0.0/icons/css/airplane.css" rel="stylesheet" />
  <link rel="stylesheet" href="index.css"> <!-- CSS  file  -->
  <title>Hello, world!</title>
  <style>
    * {
      margin: 0;
      padding: 0;
    }

    body {
      background: linear-gradient(120deg, #2980b9, #8e44ad);
      font-family: Arial, Helvetica, sans-serif;
      margin: 0;
      padding: 0;
      height: 100vh;

    }

    .minform {
      display: flex;
      flex-direction: column;
      /* gap: 0px; */
      position: absolute;
      top: 50%;
      left: 51%;
      transform: translate(-50%, -50%);
      width: 50vw;
      background: white;
      border-radius: 10px;
      height: 95vh;
      margin-top: 100px;
    }


    /* h1 */
    .heading {
      text-align: center;
      padding: 10px 10px;
      border-bottom: 1px solid silver;
      color: #2691d9;
      background: transparent;
      margin: 0 20px;
    }

    /* lable for email  */

    /* lable for Password  */
    form .text {
      /* text-align: center; */
      position: relative;
      padding: 10px 10px;
      /* border-bottom: 2px solid #adadad; */
    }

    /* email ka input box */
    .input {
      width: 96%;
      padding: 0 5px;
      height: 35px;
      font-size: 16px;
      background: none;
      outline: none;
      /* border-radius: 5px; */
      border: 1px solid black;
    }



    .forgot a {
      text-align: left;
      padding: 5px 10px;
      /* border-bottom: 1px solid silver; */
      font-size: 15px;
      color: #2691d9;
      text-decoration: none;
    }

    .forgot a:hover {
      text-decoration: underline;
    }

    /* button */
    .button #Login {
      text-align: center;
      padding: 5px 10px;
      size: 20%;
      background: linear-gradient(120deg, #2980b9, #8e44ad);
      width: 94%;
      font-size: 20px;
      border: 1px solid white;
      /* border-radius: 10px; */
      height: 40px;
      cursor: pointer;
      margin: 15px 10px;
      text-align: center;
    }

    .button {
      height: 50px;
      width: 50%;
      margin: auto;
    }

    .FormFooter {
      text-align: center;
      padding: 15px 0;
    }

    .FormFooter a {
      color: #2691d9;
      text-decoration: none;
    }

    .FormFooter a:hover {
      text-decoration: underline;
    }
  </style>

</head>

<body>
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <a class="navbar-brand" href="#"><img class="logo" src="shutterstock_22.jpg" />
    </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
      aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav mr-auto">
        <li class="nav-item active">
          <a class="nav-link" href="indexa.php">Home <span class="sr-only">(current)</span></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="view.php">view Ticket</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="Aboutus.php">About Us</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Contact Us</a>
        </li>
      </ul>
      <!-- Newly Added buttons with margin 2px -->
      <div class="mx-2">
        <button class="btn btn-danger" data-toggle="modal" data-target="#loginModal">
          Log out
        </button>
       
      </div>
    </div>
  </nav>


  <!-- book_flight.php -->
  <?php
 $conn = mysqli_connect("localhost","root","","airline");


// Check if the flight_id is provided in the URL parameter
if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['flight_id'])) {
    $flight_id = $_GET['flight_id'];

    // Fetch the flight details from the database for the selected flight
    $flight_query = "SELECT * FROM flight WHERE flight_id = '$flight_id'";
    $flight_result = mysqli_query($conn, $flight_query);

    if (mysqli_num_rows($flight_result) == 1) {
        $items = mysqli_fetch_assoc($flight_result);
    } 
//     else {
//         // Flight not found in the database, redirect back to search_flights.php or show an error message
//         header("Location: search_flights.php");
//         exit;
//     }
// } else {
//     // Redirect the user back to the search page if flight_id is not provided
//     header("Location: search_flights.php");
//     exit;

?>
  <h2>Flight Details</h2>
  <p>departure:
    <?= $items['DEPARTURE']; ?>
  </p>
  <p>arrive:
    <?= $items['ARRIVE']; ?>
  </p>
  <p>date:
    <?= $items['DT']; ?>
  </p>
  <p>price:
    <?= $items['PRICE']; ?>
  </p>
  <?php
}
?>
  <form method="post" action="home.php?flight_id=<?php echo $flight_id; ?>">
    <!-- Display the flight details for confirmation -->


    <div class="minform">
      <h1 class="heading">Booking Form</h1>

      <div class="text">
        <label for="id"> Name</label>
        <input type="text" class="input" name="c_name" placeholder="Enter your id" required="" />
      </div>

      <div class="text">
        <label for="age">Age</label>
        <input type="text" class="input" name="age" placeholder="Enter your age" required="" />
      </div>

      <div class="text">
        <label for="Address">Address</label>
        <input type="text" class="input" name="c_address" placeholder="Enter your address" required="" />
      </div>

      <div class="text">
        <label for="phone">Phone</label>
        <input type="number" class="input" name="phone" placeholder="Enter your Phone.No" required="" />
      </div>

      <div class="text">
        <label for="email">Email</label>
        <input type="email" class="input" name="email" placeholder="Enter your email id" required="" />
      </div>
      <!-- <div class="text">
        <label for="seats">No of seats</label>
        <input type="number" class="input" name="count"  placeholder="Enter No.of seats"  />
      </div> -->

      <div class="button">
        <input type="submit" id="Login" value="Book Now" />
      </div>


    </div>

  </form>
 
  <?php
  
  $conn = mysqli_connect("localhost","root","","airline");
  $id= $_SESSION['id'];

  ?>





  <?php
   $conn = mysqli_connect("localhost","root","","airline");
   $flight= $_SESSION['id'] ;
if (isset($_POST['c_name'])) {
  extract($_POST);
    // Retrieve the booking details from the form data
    // $name = $_POST['name'];
    // $age = $_POST['age'];
    // $address = $_POST['address'];
    // $phone = $_POST['phone'];
    // $email = $_POST['email'];
    // $booking_date = date("Y-m-d"); // Current date
    
    
    // Insert the booking details into the database
    $booking_query = mysqli_query($conn,"INSERT INTO customer ( c_name, flight_id, age, c_address, phone, email, count, id)
                      values ( '$c_name', '$flight', '$age', '$c_address', '$phone', '$email', '$count', '$id' )") or die (mysqli_error($conn));
    
   



    if ($booking_query) {
      echo "<script>;";
      echo 'window.alert("Data insert Succesfully");';
          echo 'window.location.href="view.php";';
      echo "</script>";
    } else {
      echo "<script>; ";
      echo "window.alert('Data error....!');";
      echo "</script>";
    }
}
   ?>

  <!-- Create a form for flight booking -->
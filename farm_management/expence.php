<?php
$id = @$_GET['id'];
$_SESSION['id'] = $id;
if(isset($_POST['submit']))
{
    echo $_SESSION['id']."<br>";
    echo $_POST['sub_expence']."<br>";
    echo $_POST['date']."<br>";
    echo $_POST['description']."<br>";
    echo $_POST['amount']."<br>";
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Farm Management Form</title>
    <style>
   body {
    font-family: 'Arial', sans-serif;
    background-color: #f4f4f4;
    margin: 20px;
}

h2 {
    color: #333;
    margin-bottom: 20px;
}

form {
    width: 50vw;
    margin: auto;
    background-color: #fff;
    padding: 20px;
    border-radius: 8px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
}

label {
    display: block;
    margin-bottom: 10px;
}

input, select {
    width: 50vw;
    padding: 8px;
    margin-top: 5px;
    margin-bottom: 10px;
    box-sizing: border-box;
}

img {
    max-width: 100%;
    max-height: 100px;
    margin-bottom: 10px;
}

input[type="submit"] {
    background-color: #4caf50;
    color: white;
    padding: 10px;
    border: none;
    border-radius: 4px;
    cursor: pointer;
}

input[type="submit"]:hover {
    background-color: #45a049;
}


.methods{
    display: flex;
    justify-content: space-evenly;
    flex-wrap: wrap;
}

a{
    color: black;
    font-style: none;
    text-decoration: none;
    text-align: center;
}

.lg{
    display: flex;
    flex-direction: column;
    align-items: center;
}
    </style>
    
</head>
<body>

<h2>Farmer Life Cycle Inputs</h2>
<form action="expence.php?id=<?php echo $id ?>" method="post">
    <!-- this is for the farming life cycle methods -->
    <div class="methods">
        <div class="lg">
            <img src="soil.webp" alt="">
            <label for="fertilizer"><a href="expence.php?id=land preparation">Land Preparation</a></label>
        </div>
        <div class="lg">
            <img src="spraying.jpg" alt="">
            <label for="fertilizer"><a href="expence.php?id=spraying">spraying</a></label>
        </div>
        <div class="lg">
            <img src="fertilizer.jpg" alt="">
            <label for="fertilizer"><a href="expence.php?id=fertilizer">fertilizer</a></label>
        </div>
        <div class="lg">
            <img src="sowing.jpg" alt="">
            <label for="fertilizer"><a href="expence.php?id=sowing">sowing</a></label>
        </div>
        <div class="lg">
            <img src="harvesting.png" alt="">
            <label for="fertilizer"><a href="expence.php?id=harvesting">harvesting</a></label>
        </div>
        <div class="lg">
            <img src="watering.png" alt="">
            <label for="fertilizer"><a href="expence.php?id=watering">watering</a></label>
        </div>
        <div class="lg">
            <img src="pestiside.jpg" alt="">
            <label for="fertilizer"><a href="expence.php?id=pestiside">pestiside</a></label>
        </div>
        
    </div>

    <h2>Expense Categories</h2>
    <select name="sub_expence" >
        <option>--Select One--</option>
        <option value="tractor">tractor</option>
        <option value="labour">labour</option>
        <option value="equipment">equipment</option>
      </select>

    <h2>Add Manual Expense</h2>
    <label for="date">
        Date: <input type="date" name="date" id="date">
    </label><br>

    <label for="description">
        Description: <input type="text" name="description" id="description">
    </label><br>

    <label for="amount">
        Amount: <input type="text" name="amount" id="amount">
    </label><br>

    <input type="submit" name="submit" value="submit">
</form>

</body>
</html>
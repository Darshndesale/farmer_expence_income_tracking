<?php
    require_once("db.php");
    if(isset($_POST['submit']))
    {
        echo "<h1> hi </h1>";
        $farm_name = $_POST['farm_name'];
        $crop_to_grow = $_POST['crop_to_grow'];
        $area = $_POST['area'];
        $date = $_POST['date'];

        $connectiodb;
        // create the query for insert
        $sql = "INSERT INTO farms(f_name,crop_name,area,date)
        VALUES(:f_nameF,:crop_nameF,:areaF,:dateF)";

        // prepare query
        $stmt = $connectiodb->prepare($sql);

        // bind the values For injection free
        $stmt->bindValue(':f_nameF',$farm_name);
        $stmt->bindValue(':crop_nameF',$crop_to_grow);
        $stmt->bindValue(':areaF',$area);
        $stmt->bindValue(':dateF',$date);
        
        $Execute = $stmt->execute();

        if($Execute){
          echo '<script>window.open("hi.php?id=add farm Successfuly..","_self")</script>';
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Farm</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }

        form {
            max-width: 400px;
            margin: auto;
        }

        label {
            display: block;
            margin-bottom: 8px;
        }

        input,select {
            width: 100%;
            padding: 8px;
            margin-bottom: 16px;
            box-sizing: border-box;
        }

        button {
            background-color: #4CAF50;
            color: white;
            padding: 10px 15px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        button:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>
    <!-- Create form for add the farm to give its info -->
    <h2>Add Farm</h2>

    <form id="farmForm" action="temp.php" method="POST">
        <label for="farm_name">Farm Name:</label>
        <input type="text" id="farm_name" name="farm_name">

        <label for="crop_to_grow">Crop to Grow:</label>
        <select id="crop_to_grow" name="crop_to_grow">
            <option value="" disabled selected>Select a crop</option>
            <option value="Rice">Rice</option>
            <option value="Wheat">Wheat</option>
            <option value="Maize">Maize</option>
            <option value="Barley">Barley</option>
            <option value="Pulses">Pulses</option>
        </select>

        <label for="area">Area (in begha):</label>
        <input type="number" id="area" name="area">

        <label for="date">Date:</label>
        <input type="date" id="date" name="date">

        <button type="submit" name="submit">Add Farm</button>
    </form>
</body>
</html>
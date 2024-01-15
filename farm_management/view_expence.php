<?php
    require_once("db.php");
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
<form action="view_expence.php" method="post">
    <!-- this is for the farming life cycle methods -->
    <div class="methods">
    <h2>Select Farm Name</h2>
    <select name="farm_name" >
        <!-- Take the farm names from farms table; -->
        <!-- To find the farm id we go to the farm database and see the is of selected farm -->
        <option>--Select One--</option>
        <option value="farm1">aji</option>
        <option value="farm2">Farm 2</option>
        <option value="farm3">Farm 3</option>
      </select>

        <label for="date">
            To: <input type="date" name="to_date" id="date">
        </label><br>
        <label for="date">
            From: <input type="date" name="from_date" id="date">
        </label><br>
    </div>

    <input type="submit" name="submit" value="View Expence">
</form>

<!-- Table for showing the expence -->
<table width="1000" border="5" align="center">
    <caption>View Expence Record</caption>
    <tr>
      <th>SR No</th>
      <th>Method</th>
      <th>Sub Expence</th>
      <th>Amount</th>
      <th>Date</th>
      <th>Description</th>
    </tr>
    <?php
    if(isset($_POST['submit']))
    {
        $connectiodb;
        $farm_name = $_POST['farm_name'];
        $to_date = $_POST['to_date'];
        $from_date = $_POST['from_date'];

        // To find the farm id 
        // $sql = "SELECT farm_id FROM farms WHERE f_name = '$farm_name'";
        // $stmt1 = $connectiodb->prepare($sql);
        // $stmt1->execute();
        

        // if($result=$stmt1->fetch())
        // {
        //     echo $result['farm_id'];
        // } try to build later


        // $sql = "SELECT * FROM emp_record WHERE ename=:input OR ssn=:input";
    


                $sql2 = "SELECT * FROM expence";
                $stmt = $connectiodb->prepare($sql2);
                $stmt->execute();
        // To show the expences 
        $sr = 1;
        while($dataRow=$stmt->fetch()) // to fetch the row using the stmt to store the row in $dataRow variable
                {
                    // to store exact the variables like name,SSN etc
                    $method = $dataRow["method"];
                    $expence = $dataRow["expence_name"];
                    $desc = $dataRow["description"];
                    $amount = $dataRow["amount"];
                    $date = $dataRow["expence_date"];  
                    
            ?>
    <tr>
      <td>
        <?php echo $sr; $sr++;?>
      </td>
      
      <td>
        <?php echo $method; ?>
      </td>
      <td>
        <?php echo $expence; ?>
      </td>
      <td>
        <?php echo $amount; ?>
      </td>
      <td>
        <?php echo $date; ?>
      </td>
      <td>
        <?php echo $desc; ?>
      </td>
      <!-- // to add 2 anchor tag here for delete and update -->
    </tr>
    <?php } ?>
  </table>
    <?php } ?>
</body>
</html>
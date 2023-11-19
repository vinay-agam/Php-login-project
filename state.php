<?php



if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $servername = "localhost";
    $username = "root";
    $password = "admin";
    $dbname = "vinayagam";

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $state = $_POST['state'];
$country=$_POST['country'];

    // Check for duplicate record
    $checkDuplicate = "SELECT * FROM `state` WHERE STATE ='$state'";
    $result = $conn->query($checkDuplicate);

    if ($result->num_rows > 0) {
        $errorMessage = "Error: Duplicate record found!";
        echo '<script>';
        echo 'alert("' . $errorMessage . '");';
        
    echo 'window.location.href="reg.php";';
        
        echo '</script>';
        exit();
    }

    $sql = "INSERT INTO `state`(`country_id`, `STATE`) VALUES ('$country','$state') ";

    if ($conn->query($sql) === TRUE) {
        echo "<script>";
        echo 'alert("State Added!");';
echo 'window.location.href="reg.php";';
        echo "</script>";
         

        exit();
        
    } else {
        echo "<script>";
        echo 'alert("Sorry Error :(");';
        echo 'window.location.href="reg.php";';
        echo "</script>";
    }

    // Close the database connection
    $conn->close();
}
?>



<div class="statepopup">

<div class="align">
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Country</title>
    <style>
        body {
            display: flex;
            flex-direction: row;
            align-items: center;
            justify-content: center;
        }
        form {
            display: flex;
            flex-direction: column;
            align-items: center;
        }
        input {
            margin: 10px;
            padding: 5px;
           width: 90%;
        }select {
        margin: 10px 2px;
    padding: 8px;
    width: 91%;
}input[type="submit"] {
    background: #ff3b00;
    color: white;
    border: none;
    width: 60%;
    border-radius: 2px;
}
        .add {
            border: 1px solid black;
            margin: 1px;
            padding: 10px;
            text-decoration: none;
            color: #ff2300;
        }
        .add:hover {
            background: crimson;
            color: white;
            border: none;
            border-bottom: 3px solid black;
            border-left: 3px solid black;
        }
    </style>
</head>
<body>
    <form method="post">
        
        <h1>Add State</h1>

<label for="state">Choose Your Country</label>
    <select name="country" id="country" >
        <option value="">----select----</option> 
*------------------state value from db----------------*/
     <?php
$servername = "localhost";
$username = "root";
$password = "admin";
$dbname = "vinayagam";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$cousql="select ID,COUNTRY from country"; 
       $couresult=$conn->query($cousql) ;
   
      if($couresult->num_rows>0){
$countrys= $couresult->fetch_all(MYSQLI_ASSOC);
}else{
$countrys=array();
}

        foreach ($countrys as $country) {
            echo "<option value='" . $country['ID'] . "'>" . $country['COUNTRY'] . "</option>";
        }
        ?>
</select>
        <input type="text" name="state" placeholder="State Name">
        <input type="submit" value="Add">
          <a href="reg.php" style="color: -webkit-link;
            cursor: pointer;
            text-decoration: underline;
            border: none;
            padding: 0;">Cancel</a>


<?php
$servername = "localhost";
    $username = "root";
    $password = "admin";
    $dbname = "vinayagam";

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

   
         $showquery = "SELECT * FROM `state`";
        $adddataresult = $conn->query($showquery);

        if ($adddataresult->num_rows > 0) {
            echo "<h2>ADDED STATE: </h2>";
            echo"<input type='text' class='search' name='search' placeholder='Search'>";
            echo "<table class='mytable' border='1'width='100%' rules='all'>";
            echo "<th>S.no</th><th>STATE Name</th><th>Action</th>";
            

            while ($row = $adddataresult->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $row['ID'] . "</td>";
                echo "<td>" . $row['STATE'] . "</td>";
                echo "<td><a href='deleteS.php?id=" . $row['ID'] . "?table=". $row['STATE'] ."'>Delete</a> | <a href='modifyC.php?id=" . $row['ID'] . "?table=". $row['STATE'] ."'>Modify</a></td>";
                echo "</tr>";
            }
            echo "</table>";
        }
?>


    </form>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="ajax-script.js" type="text/javascript"></script>

</body>
</html>


</div>
</div>
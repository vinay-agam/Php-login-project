
<div class="coupopup">
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
        }
        .add {
            border: 1px solid black;
            margin: 1px;
            padding: 10px;
            text-decoration: none;
            color: #ff2300;
        }input[type="submit"] {
    background: #ff3b00;
    color: white;
    border: none;
    width: 60%;
    border-radius: 2px;
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
         <h1>Add Country</h1>
       <input type="text" name="country" placeholder="Country Name">
        <input type="submit" value="Add">
        <a href="reg.php" style="color: -webkit-link;
            cursor: pointer;
            text-decoration: underline;
            border: none;
            padding: 0;">Cancel</a>

<?php
include 'conn.php';
         $showquery = "SELECT * FROM `country`";
        $adddataresult = $conn->query($showquery);

        if ($adddataresult->num_rows > 0) {
            echo "<h2>ADDED COUNTRY: </h2>";
            echo"<input type='text' class='search' name='search' placeholder='Search'>";
            echo "<table class='mytable' border='1'width='100%' rules='all'>";
            echo "<th>S.no</th><th>Country Name</th><th>Action</th>";

            while ($row = $adddataresult->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $row['ID'] . "</td>";
                echo "<td>" . $row['COUNTRY'] . "</td>";
                echo "<td><a href='delete.php?id=" . $row['ID'] . "?table=". $row['COUNTRY'] ."'>Delete</a> | <a href='modify.php?id=" . $row['ID'] . "?table=". $row['COUNTRY'] ."'>Modify</a></td>";
                echo "</tr>";
            }
            echo "</table>";
        }

    $country = $_POST['country'];

    // Check for duplicate record
    $checkDuplicate = "SELECT * FROM `country` WHERE COUNTRY ='$country'";
    $result = $conn->query($checkDuplicate);

    if ($result->num_rows > 0) {
        $errorMessage = "Error: Duplicate record found!";
        echo '<script>';
        echo 'alert("' . $errorMessage . '");';
        
    echo 'window.location.href="index.php";';
        
        echo '</script>';
        exit();
    }

    $sql = "INSERT INTO `country`(`COUNTRY`) VALUES ('$country') ";

    if ($conn->query($sql) === TRUE) {
        echo "<script>";
        echo 'alert("Country Added!");';
         echo 'window.location.href="index.php";';
        echo "</script>";
       
        exit();
        
    } else {
        echo "<script>";
        echo 'alert("Sorry Error :(");';
        echo 'window.location.href="index.php";';
        echo "</script>";
    }

    // Close the database connection
    $conn->close();
}
?>





    </form>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="ajax-script.js" type="text/javascript"></script>


</body>
</html>

</div></div>
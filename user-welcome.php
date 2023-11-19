<style>
.popup {
    position: absolute;
    top: 0;
    left:0;
    
    display: none;
    width:100vw;
  height:100vh;
background: #a2a2a275;
}.popup img{
display: block;
    margin-left: auto;
    margin-top: 10vh;
    margin-right: auto;
    
}
.popup img.popbtn {
    position: absolute;
    top: 0px;
    right: 5vw;
}a {
    width: 200px;
    border: 1px solid black;
    padding: 5px 10px;
    text-decoration: none;
    color: #b39056;
}body {
    display: flex;
    flex-direction: column;
    align-items: center;
}td {
    padding: 10px;
    font-size: 25px;
}th {
    padding: 10px;
    font-size: 25px;
    background: #563d0e38;
}
</style>

<?php
session_start();

// Assuming you have a session started after successful registration
include 'conn.php';

// Check if the user is logged in
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php"); // Redirect to the login page if not logged in
    exit();
}

$user_id = $_SESSION['user_id'];

// Fetch user information with address, course details, and document details using INNER JOIN
$sql = "SELECT newreg.*, address.country, address.state, address.district, coursedetail.course, coursedetail.designation, document.photo, document.doc
        FROM newreg
        INNER JOIN address ON newreg.id = address.id
        INNER JOIN coursedetail ON newreg.id = coursedetail.id
        INNER JOIN document ON newreg.id = document.id
        WHERE newreg.id = $user_id";

$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
echo"<div class='popup' ><img src=" . $row['photo'] . " width='600' ><img class='popbtn' src='close.png' width='40' height='40'></div>";
    // Display user information
    echo "<h1>Welcome, " . $row['name'] . " " . $row['lastname'] . " (User)!</h1>";
    echo"<img src='" . $row['photo'] . "' width='100' class='popbtn' style='border-radius:50%;' >";

echo "<p>Your registration details:</p>";
    echo "<table border='1' rules='all' width='800'>";
    echo "<tr><td>Email:</td><td> " . $row['email'] . "</td></tr>";
    echo "<tr><td>Phone:</td><td> " . $row['phone'] . "</td></tr>";
    echo "<tr><td>Date of Birth: </td><td>" . $row['dob'] . "</td></tr>";
    echo "</table>";

    // Display address information
    echo "<p>Your address details:</p>";
    echo "<table border='1' rules='all' width='800'>";
    echo "<tr><td>Country:</td><td> " . $row['country'] . "</td></tr>";
    echo "<tr><td>State: </td><td>" . $row['state'] . "</td></tr>";
    echo "<tr><td>District: </td><td>" . $row['district'] . "</td></tr>";
    echo "</table>";

    // Display course details
    echo "<p>Your course details:</p>";
    echo "<table border='1' rules='all' width='800'>";
    echo "<tr><td>Department:</td><td> " . $row['course'] . "</td></tr>";
    echo "<tr><td>Designation: </td><td>" . $row['designation'] . "</td></tr>";
    echo "</table>";

    // Display document details
    echo "<p>Your document details:</p>";
    echo "<table  width='800'>";
    echo "<tr><td>Document:</td><td> <a href='" . $row['doc'] . " 'target='_blank'>Open Document</a></td></tr>";
    echo "</table>";
} else {
    echo "User not found.";
}

// Add a logout link or button to end the session
echo "<p><a href='logout.php'>Logout</a></p>";
?><script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

<script type="text/javascript">
$(document).ready(function(){
  $(".popbtn").click(function(){
    $(".popup").toggle();
  });
});
</script>

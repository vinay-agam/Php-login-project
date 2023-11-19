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

    // Display user information
     echo"<div class='popup' ><img src=" . $row['photo'] . " width='600' ><img class='popbtn' src='close.png' width='40' height='40'></div>";
    echo "<h1>Welcome, " . $row['name'] . " " . $row['lastname'] . " (Admin)!</h1>";
echo"<img src='" . $row['photo'] . "' width='100' class='popbtn' style='border-radius:50%;' >";
    echo "<p>Your registration details:</p>";
    echo "<ul>";
    echo "<li>Email: " . $row['email'] . "</li>";
    echo "<li>Phone: " . $row['phone'] . "</li>";
    echo "<li>Date of Birth: " . $row['dob'] . "</li>";
    echo "</ul>";

    // Display address information
    echo "<p>Your address details:</p>";
    echo "<ul>";
    echo "<li>Country: " . $row['country'] . "</li>";
    echo "<li>State: " . $row['state'] . "</li>";
    echo "<li>District: " . $row['district'] . "</li>";
    echo "</ul>";

    // Display course details
    echo "<p>Your course details:</p>";
    echo "<ul>";
    echo "<li>Department: " . $row['course'] . "</li>";
    echo "<li>Designation: " . $row['designation'] . "</li>";
    echo "</ul>";

    // Display document details
    echo "<p>Your document details:</p>";
    echo "<ul>";
    echo "<li>Photo: " . $row['photo'] . "</li>";
    echo "<li>Document:<a href=' " . $row['doc'] . "' target='_blank'>Open Document</a></li>";
    echo "</ul>";
} else {
    echo "User not found.";
}

// Add a logout link or button to end the session
echo "<p><a href='logout.php'>Logout</a></p>";
?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

<script type="text/javascript">
$(document).ready(function(){
  $(".popbtn").click(function(){
    $(".popup").toggle();
  });
});
</script>

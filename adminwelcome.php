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
        ";
       

$result = $conn->query($sql);

if (mysqli_num_rows($result) > 0) {
    
echo"<table border='1' rules='all'>";
echo"<tr>";
echo"<th>S.No</th><th>Name</th><th>Email</th>";
echo"</tr>";

while ($row = mysqli_fetch_assoc($result)) {

echo"<tr>";
echo"<td>". $row['id'] ."</td><td>". $row['name'] ."</td><td>". $row['email'] ."</td>";
echo"</tr>";


echo"<table>";
       
    }
} else {
    echo "0 results";
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

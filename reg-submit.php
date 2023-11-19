<?php 


include 'conn.php';


//variable declatration


$name=$_POST['fname'];
$lastname=$_POST['lname'];

$phone=$_POST['phone'];

$mail=$_POST['email'];

$dob=$_POST['dob'];

$gender=$_POST['gender'];

$role = $_POST['role'];

$country=$_POST['country'];
$state=$_POST['state'];
$district=$_POST['dis'];
$department=$_POST['department'];
$designation=$_POST['designation'];



$dublicate="select * from `newreg` where email='$mail'";
$duplicateresult=$conn->query($dublicate);

if($duplicateresult->num_rows > 0){
echo "<script>alert('Duplicate Value.');</script>";

}
else{
//querry for adding table data
$sql="INSERT INTO `newreg`(`name`, `lastname`, `phone`, `email`, `dob`, `gender`, `role`) VALUES ('$name','$lastname','$phone','$mail','$dob','$gender','$role')";
$sql2="INSERT INTO `address`(`country`, `state`, `district`) VALUES ('$country','$state','$district')";
$sql3="INSERT INTO `coursedetail`( `course`, `designation`) VALUES ('$department','$designation')";
$target_dir = "image/";
$photo = $target_dir . basename($_FILES['photo']['name']);
move_uploaded_file($_FILES['photo']['tmp_name'], $photo);

$target_dir = "document/";
$doc = $target_dir . basename($_FILES['doc']['name']);
move_uploaded_file($_FILES['doc']['tmp_name'], $doc);



$sql4="INSERT INTO `document`( `photo`, `doc`) VALUES ('$photo','$doc')";

if($conn->query($sql) === TRUE && $conn->query($sql2) === TRUE && $conn->query($sql3) === TRUE && $conn->query($sql4) === TRUE){
header("Location: login.php");
exit;

} else {
    echo "Error: " . $conn->error;
}

}
?>



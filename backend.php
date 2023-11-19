<?php
$servername = "localhost";
$username = "root";
$password = "admin";
$dbname = "vinayagam";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$country_id=!empty($_POST['country_id'])?$_POST['country_id']:'';
if(!empty($country_id)){
$query="SELECT * FROM `state` WHERE country_id=?";
$countryData = $conn->prepare($query);
$countryData->bind_param('s',$country_id);
$countryData->execute();

$result=$countryData->get_result();
if($result->num_rows>0){
echo"<option value=''>select State</option>";
while($arr=$result->fetch_assoc()){
echo"<option value='".$arr['ID']."'>".$arr['STATE']."</option><br>";
}
}

}

//fetch city

$state_id=!empty($_POST['state_id'])?$_POST['state_id']:'';
if(!empty($state_id)){
$query="SELECT * FROM `district` WHERE state_id=?";
$districtData = $conn->prepare($query);
  $districtData->bind_param('i',$state_id); 
  $districtData->execute();
  $result=$districtData->get_result();

if($result->num_rows>0){
echo"<option value=''>select district</option>";
while($arr=$result->fetch_assoc()){
echo"<option value='".$arr['ID']."'>".$arr['DISTRICT']."</option><br>";
}
}

}

?>

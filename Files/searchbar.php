<?php

include('config.php'); 

$searchTerm = $_GET['term'];
$sql = "SELECT * FROM review_table WHERE moviename LIKE '%".$searchTerm."%'"; 
$result = $conn->query($sql); 
if ($result->num_rows > 0) {
  $tutorialData = array(); 
  while($row = $result->fetch_assoc()) {

  $daa[] =$row['moviename'];
} 
}
 echo json_encode($daa);
?>
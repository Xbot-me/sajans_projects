<?php


require 'db_config.php';


$post = $_POST;

    
$sql = "INSERT INTO university (university,year,owned_land,total_faculties,total_depts,admited_students,total_students,graduated_students,total_teachers,total_professors,total_earns,total_expens) VALUES ('".$post['university']."','".$post['year']."','".$post['owned_land']."','".$post['total_faculties']."','".$post['total_depts']."','".$post['admited_students']."','".$post['total_students']."','".$post['graduated_students']."','".$post['total_teachers']."','".$post['total_professors']."','".$post['total_earns']."','".$post['total_expens']."')";


//$result = $mysqli->query($sql);
if (!mysqli_query($mysqli,$sql))
  {
  $data = mysqli_error($mysqli);
  }else{
    $data = "Data inserted";
  }





  
echo json_encode($data);
  
?>
  
  
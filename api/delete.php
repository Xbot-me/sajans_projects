<?php


 require 'db_config.php';


 $id  = $_POST["uni_id"];


 $sql = "DELETE FROM university WHERE uni_id = '".$id."'";


 $result = $mysqli->query($sql);


 echo json_encode([$id]);


?>
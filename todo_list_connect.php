<?php 
// Create connection to the database
$conn = mysqli_connect("localhost", "chuma", "chuma@1234", "todo_db");

// check connection
if(!$conn){
    die("Connection failed: ".mysqli_connect_error());
}


?>
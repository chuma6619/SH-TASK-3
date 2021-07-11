<?php
include("todo_list_connect.php");

if(isset($_POST["delete"])){
  // create sql to delete the last entry in the data base.
   $delete = "DELETE FROM todo_list_table ORDER BY Id DESC LIMIT 1";

   // check query
   if(mysqli_query($conn,$delete)){
      echo "Query Successfully Deleted";
   }else{
      echo "query error: ".mysqli_error($conn);
   }
}


?>







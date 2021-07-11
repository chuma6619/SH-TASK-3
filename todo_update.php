<?php
// include the database connection
include("todo_list_connect.php");

if(isset($_POST["update2"])){
$task = mysqli_real_escape_string($conn, $_POST["task"]);
  // create sql to update the last entry in the data base.
$update = "UPDATE todo_list_table SET Task='$task' ORDER BY Id DESC LIMIT 1";

   // check query
   if(mysqli_query($conn,$update)){
    header("location: todo_list_output.php");
   }else{
      echo "query error: ".mysqli_error($conn);
   }
}


?>


<!DOCTYPE html>
<html>
<body>
<h3>Enter another Task for update</h3>
<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
<label for="task">Task: </label><br>
<input type="text" id="task" name="task" placeholder="enter a task for the day" required> <br><br>
<input type="submit" id="update" name="update2" value="Update">
</form>
</body>
</html>
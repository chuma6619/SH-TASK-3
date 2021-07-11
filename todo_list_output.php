

<?php 
// include my database connection and to my todo_delete page
include("todo_list_connect.php");
include("todo_delete.php");

// write query for all todo list
$sql = "SELECT FirstName, LastName, email, Task FROM todo_list_table";

// make query and get result
$result = mysqli_query($conn,$sql);

// get the rows as an array
$todo_list = mysqli_fetch_all(mysqli_query($conn,$sql),MYSQLI_ASSOC);

// free result from memory
mysqli_free_result($result);

// close the connection
mysqli_close($conn);

?>

<?php 
 if(isset($_POST["update"])){
   header("location:todo_update.php");
 }

?>


<!DOCTYPE html>
<html>
   <head>
      <title>MY TODO LIST</title>
   </head>
   <body>
   <div>
     <h1> MY TODO LIST</h1>
     <h3>TASKS:</h3>
     <div>
       <ol>
       <?php
       
        // to output the array
        foreach($todo_list as $list){?>
          <li><?php echo $list["Task"]; ?> </li>
      
      <?php  } ?>
      
       </ol>
     </div>
   </div>
   <div>
   </div>

   <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
   <input type="submit" id="delete" name="delete" value="Delete">
   <input type="submit" id="update" name="update" value="Update">
   </form>
   </body>
</html>
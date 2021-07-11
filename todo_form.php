<?php 
// TASK 3: Write a TODO LIST program that uses MySQL to store user's data.

// to include my database connection
include("todo_list_connect.php");

if(isset($_POST["submit"])){
    // to get the data and to prevent the injection of malicious characters
    $FirstName = mysqli_real_escape_string($conn, $_POST["fname"]);
    $LastName = mysqli_real_escape_string($conn, $_POST["lname"]);
    $email = mysqli_real_escape_string($conn, $_POST["email"]);;
    $Task = mysqli_real_escape_string($conn, $_POST["task"]);

    if($FirstName !="" && $LastName !="" && $email !="" && $Task){
        // to insert vaues into the database
       //create sql
       $sql = "INSERT INTO todo_list_table(FirstName, LastName, email, Task) VALUES('$FirstName',' $LastName', '$email', '$Task')";
    }
    // to save to the database and check
if(mysqli_query($conn,$sql)){
    header("location: todo_list_output.php");

}else{
    echo "query error: ".mysqli_error($conn);
}
}

?>






<!DOCTYPE html>
<html>
   <head>
      <title> MY TODO LIST FORM</title>
   </head>
   <body>
   <div>
      <h1> MY TODO LISTS FORM </h1>
      <div>
         <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
         <div>
            <label for="fname">First Name: </label><br>
            <input type="text" id="fname" name="fname" placeholder="enter your first name" required><br><br>
            <label for="lname">Last Name: </label><br>
            <input type="text" id="lname" name="lname" placeholder="enter your last name" required><br><br>
            <label for="email">Email: </label><br>
            <input type="email" id="email" name="email" placeholder="todo@example.com" required><br><br>
            <label for="task">Task: </label><br>
            <input type="text" id="task" name="task" placeholder="enter a task for the day" required><br><br>
            <input type="submit" id="submit" name="submit" value="Submit">
         </div>
         </form>
      </div>
   </div>
    
   </body>

</html>
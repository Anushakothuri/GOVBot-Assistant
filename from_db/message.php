<?php
// connecting to database
$conn = mysqli_connect("localhost", "root", "", "bot") or die("Database Error");

// getting user message through ajax
$getMesg = mysqli_real_escape_string($conn, $_POST['text']);

//checking user query to database query
$check_data = "SELECT * FROM chatbot WHERE empid LIKE '%$getMesg%'";
$run_query = mysqli_query($conn, $check_data) or die("Error");

// if user query matched to database query we'll show the reply otherwise it go to else statement
 if(mysqli_num_rows($run_query) > 0){
    //fetching replay from the database according to the user query
    $fetch_data = mysqli_fetch_assoc($run_query);
    //storing replay to a varible which we'll send to ajax
    $name = $fetch_data['name'];
    $dpt = $fetch_data['dpt'];
    $joiningyear = $fetch_data['joiningyear'];
    $location = $fetch_data['location'];
    $salary = $fetch_data['salary'];
    echo  " name :$name";
    echo "<br/>";
    echo  " dpt:  $dpt";
    echo "<br/>";
    echo  " dpt:  $joiningyear";
    echo "<br/>";
    echo  " dpt:  $location ";
    echo "<br/>";
    echo  " dpt:  $salary";
   
}else{
    echo "Sorry can't be able to understand you!";
}
   
?>
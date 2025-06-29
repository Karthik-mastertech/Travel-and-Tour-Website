<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbanme = "login";
$conn = new mysqli($servername,$username,$password,$dbanme);

if($conn->connect_error){
    die("Connection Failed:" .$conn->connect_error);

}
//Handle form submission
if($_SERVER["REQUEST_METHOD"] == "POST"){
    $name = $_POST["name"];
    $email = $_POST["email"];
    $destination = $_POST["destination"];
    $departure_date = $_POST["departure-date"];
    $return_date = $_POST["return-date"];

    //prepare and execute the database insertion
    $sql = "INSERT INTO `booking`(`name`, `email`, `destination`, `departure_date`, `return_date`)
     VALUES ('$name','$email','$destination','$departure_date','$return_date')";

    //  if($conn->query($sql) == TRUE){
    //     echo "Booking Successfully";
    //  }else{
    //     echo "Error: " .$sql . "<br>" .$conn->error; 
    //  }
    if ($conn->query($sql) === TRUE) {
        // Display popup and redirect
        echo "<script>
                alert('Booking Successful!');
                window.location.href = 'index.html';
              </script>";
    } else {
        echo "<script>
                alert('Error: " . $conn->error . "');
                window.history.back();
              </script>";
    }
}

$conn->close();
?>
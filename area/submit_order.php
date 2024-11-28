<?php
$servername = "localhost";
$username = "root"; 
$password = ""; 
$dbname = "ecommerce"; 


$conn = new mysqli($servername, $username, $password, $dbname);


if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


$full_name = $_POST['firstname'];
$email = $_POST['email'];
$address = $_POST['address'];
$city = $_POST['city'];
$state = $_POST['state'];
$zip = $_POST['zip'];
$card_name = $_POST['cardname'];
$card_number = $_POST['cardnumber'];
$exp_month = $_POST['expmonth'];
$exp_year = $_POST['expyear'];
$cvv = $_POST['cvv'];


session_start(); 
$cartTotal = isset($_SESSION['cart_total']) ? $_SESSION['cart_total'] : 0; 


$sql = "INSERT INTO orders (full_name, email, address, city, state, zip, card_name, card_number, exp_month, exp_year, cvv, total_amount)
VALUES ('$full_name', '$email', '$address', '$city', '$state', '$zip', '$card_name', '$card_number', '$exp_month', '$exp_year', '$cvv', '$cartTotal')";

if ($conn->query($sql) === TRUE) {
    echo "Order placed successfully!";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>

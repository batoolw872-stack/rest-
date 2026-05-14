<?php
session_start();
require '../../admin/backend/config/config.php'; // Ensure this file connects to your DB

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $phone = mysqli_real_escape_string($conn, $_POST['phone']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $persons = (int)$_POST['persons'];
    $booking_date = $_POST['booking_date'];

    if (empty($name) || empty($phone) || empty($email) || empty($persons) || empty($booking_date)) {
        echo "<h3>❌ Please fill in all fields.</h3>";
        exit;
    }

    $sql = "INSERT INTO table_bookings (name, phone, email, persons, booking_date)
            VALUES ('$name', '$phone', '$email', '$persons', '$booking_date')";

    if (mysqli_query($conn, $sql)) {
        echo "<div style='padding: 50px; text-align: center; font-family: sans-serif'>
                <h2>✅ Booking successful!</h2>
                <p>Thank you, <strong>$name</strong>. Your table for <strong>$persons</strong> people is booked for <strong>$booking_date</strong>.</p>
                <a href='book.php' style='padding: 10px 20px; background: black; color: white; text-decoration: none;'>⏪ Go Back</a>
              </div>";
    } else {
        echo "<h3>❌ Error: " . mysqli_error($conn) . "</h3>";
    }
} 
?>

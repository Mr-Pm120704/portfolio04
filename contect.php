<?php
include "connection.php"; // Ensure this file contains correct connection logic

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST["name"];
    $mail = $_POST["email"];
    $mob = $_POST["num"];
    $subject = $_POST["sub"];
    $message = $_POST["message"];

    // Input validation
    if (strpos($mail, "@") === false) {
        echo "<script>alert('The E-Mail Is Invalid Or Empty.');</script>";
        include "contect.html";
    } elseif (strlen($mob) != 10) {
        echo "<script>alert('The Mobile Number Is Invalid Or Empty.');</script>";
        include "contect.html";
    } else {
        // Database connection details
        $MYSQL_ADDON_HOST = "bxz3ducvbt8zlq5eftua-mysql.services.clever-cloud.com";
        $MYSQL_ADDON_DB = "bxz3ducvbt8zlq5eftua";
        $MYSQL_ADDON_USER = "uckfjannptteicuc";
        $MYSQL_ADDON_PORT = "3306";
        $MYSQL_ADDON_PASSWORD = "Cj4sJBsBzhuHLv5D0LeH";

        // Establishing a database connection
        $conn = mysqli_connect($MYSQL_ADDON_HOST, $MYSQL_ADDON_USER, $MYSQL_ADDON_PASSWORD, $MYSQL_ADDON_DB, $MYSQL_ADDON_PORT);

        // Check connection
        if (!$conn) {
            echo "<script>alert('Error connecting to the database: " . mysqli_connect_error() . "');</script>";
        } else {
            // Insert query
            $query1 = 'INSERT INTO customer (Name, Email, Mobile, Subject, Message) VALUES (?, ?, ?, ?, ?)';

            // Prepare and bind
            $stmt = $conn->prepare($query1);
            $stmt->bind_param("ssiss", $name, $mail, $mob, $subject, $message);

            // Execute the query
            if ($stmt->execute()) {
                echo "<script>alert('Message was sent successfully.');</script>";
                include "upload.html";
            } else {
                echo "<script>alert('Error sending message: " . $stmt->error . "');</script>";
            }

            // Close the statement and connection
            $stmt->close();
            $conn->close();
        }
    }
}
?>

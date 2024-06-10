<?php

// Database connection details
$MYSQL_ADDON_HOST = "bxz3ducvbt8zlq5eftua-mysql.services.clever-cloud.com";
$MYSQL_ADDON_DB = "bxz3ducvbt8zlq5eftua";
$MYSQL_ADDON_USER = "uckfjannptteicuc";
$MYSQL_ADDON_PORT = "3306";
$MYSQL_ADDON_PASSWORD = "Cj;4sJBsBzhuHLv5D0LeH";

// Attempt to establish a connection to the database
$conn = mysqli_connect($MYSQL_ADDON_HOST, $MYSQL_ADDON_USER, $MYSQL_ADDON_PASSWORD, $MYSQL_ADDON_DB, $MYSQL_ADDON_PORT);

// Check connection
if (mysqli_connect_errno()) {
    echo "Failed to connect to the database: " . mysqli_connect_error();
} else {
    echo "<form action='contect.php' method='POST'>";
    // Your form fields go here
    echo "</form>";
}
?>

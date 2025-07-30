<?php
// Connect to the database
$conn = new mysqli("localhost", "root", "", "dbsolar");

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// Get sensor data from URL or POST
$site = $_GET['site'] ?? $_POST['site'] ?? '';
$moisture = $_GET['moisture'] ?? $_POST['moisture'] ?? '';
$soil_temp = $_GET['soil_temp'] ?? $_POST['soil_temp'] ?? '';
$humidity = $_GET['humidity'] ?? $_POST['humidity'] ?? '';
$air_temp = $_GET['air_temp'] ?? $_POST['air_temp'] ?? '';
$date = date("Y-m-d");
$time = date("H:i:s");

// Basic validation
if ($site && is_numeric($moisture) && is_numeric($soil_temp) && is_numeric($humidity) && is_numeric($air_temp)) {
  // Prepare and bind
  $stmt = $conn->prepare("INSERT INTO readings (site, moisture, soil_temp, humidity, air_temp, date, time) VALUES (?, ?, ?, ?, ?, ?, ?)");
  $stmt->bind_param("sdddsss", $site, $moisture, $soil_temp, $humidity, $air_temp, $date, $time);

  if ($stmt->execute()) {
    echo "Data inserted successfully";
  } else {
    echo "Error inserting data: " . $stmt->error;
  }
  $stmt->close();
} else {
  echo "Invalid or missing parameters.";
}

$conn->close();
?>

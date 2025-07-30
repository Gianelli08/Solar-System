<?php
// Connect to database
$conn = new mysqli("localhost", "root", "", "dbsolar");

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// Get parameters from URL
$site = $_GET['site'];
$date = $_GET['date'];

$sql = "SELECT * FROM sensor_data WHERE site = ? AND date = ?";

$data = [
  'moisture' => [],
  'soil_temp' => [],
  'humidity' => [],
  'air_temp' => [],
  'time' => []
];

// Query the database
$sql = "SELECT * FROM sensor_data WHERE site = ? AND date = ? ORDER BY time ASC";
$stmt = $conn->prepare($sql);
$stmt->bind_param("ss", $site, $date);
$stmt->execute();
$result = $stmt->get_result();

while ($row = $result->fetch_assoc()) {
  $data['moisture'][] = floatval($row['moisture']);
  $data['soil_temp'][] = floatval($row['soil_temp']);
  $data['humidity'][] = floatval($row['humidity']);
  $data['air_temp'][] = floatval($row['air_temp']);
  $data['time'][] = $row['time'];
}

echo json_encode($data);
?>


<?php
header("Content-Type: application/json");

$servername = "localhost";
$username = "username";
$password = "password";
$dbname = "database_name";

// Connect to database
$conn = new mysqli($servername, $username, $password, $dbname);

if ($_SERVER["REQUEST_METHOD"] === "GET") {
  // Code to handle GET request
  $sql = "SELECT * FROM products";
  $result = $conn->query($sql);

  $data = [];
  if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
      $data[] = $row;
    }
  }

  echo json_encode($data);
} else {
  // Return an error for other request methods
  header("HTTP/1.1 405 Method Not Allowed");
}

$conn->close();

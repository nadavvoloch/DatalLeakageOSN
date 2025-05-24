<?php
$servername = "sql304.byethost18.com";
$username = "b18_35863495";
$password = "nadav12";
$dbname = "b18_35863495_arielustore";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Function to get the current ID from a file
function getCurrentID() {
    $filename = 'current_id.txt';
    if (file_exists($filename)) {
        $id = (int)file_get_contents($filename);
    } else {
        $id = 1;
    }
    return $id;
}

// Function to update the current ID in the file
function updateCurrentID($id) {
    $filename = 'current_id.txt';
    file_put_contents($filename, $id);
}

$id = getCurrentID();

$sell_item = $_POST['sell_item'];
$personalItem = $_POST['personalItem'];
$socialPlatform = $_POST['socialPlatform'];
$b_lower = $_POST['b_lower'];
$b_upper = $_POST['b_upper'];
$avg = $_POST['avg'];

$sql = "INSERT INTO data_after (id, selling_item, personalData, socialPlatform, b_lower, b_upper, avg) 
        VALUES ('$id', '$sell_item', '$personalItem', '$socialPlatform', '$b_lower', '$b_upper', '$avg')";

if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
    
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
	$id++;
    updateCurrentID($id); // Update the ID for the next request
$conn->close();
?>

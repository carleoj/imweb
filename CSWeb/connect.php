<?php
// Database connection parameters
$servername = "localhost"; // Change this if your MySQL server is hosted elsewhere
$username = "root"; // Change this to your MySQL username
$password = ""; // Change this to your MySQL password
$dbname = "carldb"; // Change this to your database name

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check if both username and password are provided
    if (!empty($_POST['username']) && !empty($_POST['password'])) {
        // Sanitize user input to prevent SQL injection
        $username = htmlspecialchars($_POST['username']);
        $password = htmlspecialchars($_POST['password']);

        $password1 = md5($password);
        $type = htmlspecialchars($_POST['user-type']); 
        
        // Prepare and bind SQL statement
        $stmt = $conn->prepare("INSERT INTO accounts (username, password, type) VALUES (?, ?, ?)");
        $stmt->bind_param("sss", $username, $password1, $type);

        $sql = "SELECT * FROM accounts WHERE username='$username'";
        $result = $conn->query($sql);

        if($result->num_rows > 0){
            echo "Username is already taken";
        }
        // Execute the statement
        else if ($stmt->execute() === TRUE) {
            echo "New record created successfully";
        } else {
            echo "Error: " . $stmt->error;
        }
        
        // Close statement
        $stmt->close();
    } else {
        echo "Both username and password are required.";
    }
} else {
    // If the form is not submitted via POST method, redirect back to the form page
    header("Location: index.html");
    exit;
}

// Close connection
$conn->close();
?>

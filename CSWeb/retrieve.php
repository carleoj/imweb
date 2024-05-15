<?php
// Establish database connection
$servername = "localhost"; // Assuming your database is on the same server
$username = "root"; // Replace with your MySQL username
$password = ""; // Replace with your MySQL password
$database = "carldb"; // Replace with your database name

// Create connection
$conn = new mysqli($servername, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Retrieve username and password from form submission
$username = $_POST['username'];
$password = $_POST['password'];

$password1 = md5($password);

// Prepare SQL statement to retrieve data from the database
$sql = "SELECT * FROM accounts WHERE username='$username' AND password='$password1'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // User found, fetch the user type
    $row = $result->fetch_assoc();
    $userType = $row['type'];
    
    session_start();
    $_SESSION['username'] = $username;
    
    // Redirect to respective landing page based on user type
    if ($userType == 'student') {
        header("Location: student_landing_page.php"); // Replace with your student landing page URL
    } elseif ($userType == 'teacher') {
        header("Location: teacher_landing_page.php"); // Replace with your teacher landing page URL
    } else {
        // In case of an unknown user type, redirect to a generic success page or handle the error
        header("Location: login_success.php"); // Replace with your success page URL
    }
} else {
    // User not found or credentials incorrect, redirect to a failure page
    header("Location: login_failure.html"); // Replace with your failure page URL
}

// Close database connection
$conn->close();
?>

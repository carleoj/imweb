<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Library Management System</title>
    <link rel="stylesheet" href="acc_style.css">
    <link rel="icon" type="image/x-icon" href="images/spaclogo.png">
    <script src="logout_confirmation.js"></script>
</head>
<body>
    <?php
    session_start();
    if(!isset($_SESSION['username'])) {
        header("Location: login.html");
        exit;
    }
    $username = $_SESSION['username'];
    ?>
    <div class="wrapper">
        <nav class="sidebar">
            <h2>SPAC Library System</h2>
            <ul>
                <li><a href="#home">Home</a></li>
                <li><a href="#books">Books</a></li>
                <li><a href="#members">Members</a></li>
                <li><a href="#issued">Issued Books</a></li>
                <li><a href="#return">Return Books</a></li>
                <li><a href="#" onclick="confirmLogout()">Logout</a></li>
            </ul>
        </nav>
        <div class="main-content">
            <header>
                <h1>Welcome, <?php echo $username; ?>!</h1>
            </header>
            <header>
                <header2>
                    <section id="home">
                        <h3>Home</h3>
                        <p1>Welcome to the Library Management System.</p1>
                    </section>
                    <section id="books">
                        <h3>Books</h3>
                        <p1>Manage your books here.</p1>
                    </section>
                    <section id="members">
                        <h3>Members</h3>
                        <p1>Manage your members here.</p1>
                    </section>
                    <section id="issued">
                        <h3>Issued Books</h3>
                        <p1>View issued books here.</p1>
                    </section>
                    <section id="return">
                        <h3>Return Books</h3>
                        <p1>Manage returned books here.</p1>
                    </section>
                </header2>
            </header>
        </div>
    </div>
</body>
</html>

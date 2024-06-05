<?php
include 'db_connect.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nama = $_POST['nama'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $privilege = $_POST['privilege'];

    $query = "INSERT INTO akunuser (Nama, Username, Password, Privilege) VALUES ('$nama', '$username', '$password', '$privilege')";
    mysqli_query($db, $query);

    header("Location: dashboard.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add User</title>
    <link rel="stylesheet" href="styles.css"> <!-- Link to the CSS file -->
</head>
<body>
    <div class="container">
        <h1>Add New User</h1>
        <form action="add.php" method="post">
            <label for="nama">Nama:</label>
            <input type="text" id="nama" name="nama" required><br>
            <label for="username">Username:</label>
            <input type="text" id="username" name="username" required><br>
            <label for="password">Password:</label>
            <input type="text" id="password" name="password" required><br>
            <label for="privilege">Privilege:</label>
            <select id="privilege" name="privilege" required>
                <option value="admin">Admin</option>
                <option value="user">User</option>
            </select><br>
            <button type="submit">Add</button>
        </form>
        <a class="back-link" href="dashboard.php">Back to Dashboard</a>
    </div>
</body>
</html>

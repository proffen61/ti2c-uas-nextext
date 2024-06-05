<?php
include 'db_connect.php';

$id = $_GET['id'];
$query = "SELECT * FROM akunuser WHERE ID = $id";
$result = mysqli_query($db, $query);
$user = mysqli_fetch_assoc($result);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nama = $_POST['nama'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $privilege = $_POST['privilege'];

    $query = "UPDATE akunuser SET Nama = '$nama', Username = '$username', Password = '$password', Privilege = '$privilege' WHERE ID = $id";
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
    <title>Edit User</title>
    <link rel="stylesheet" href="styles.css"> <!-- Link to the CSS file -->
</head>
<body>
    <div class="container">
        <h1>Edit User</h1>
        <form action="edit.php?id=<?php echo $id; ?>" method="post">
            <label for="nama">Nama:</label>
            <input type="text" id="nama" name="nama" value="<?php echo $user['Nama']; ?>" required><br>
            <label for="username">Username:</label>
            <input type="text" id="username" name="username" value="<?php echo $user['Username']; ?>" required><br>
            <label for="password">Password:</label>
            <input type="text" id="password" name="password" value="<?php echo $user['Password']; ?>" required><br>
            <label for="privilege">Privilege:</label>
            <select id="privilege" name="privilege" required>
                <option value="admin" <?php if ($user['Privilege'] == 'admin') echo 'selected'; ?>>Admin</option>
                <option value="user" <?php if ($user['Privilege'] == 'user') echo 'selected'; ?>>User</option>
            </select><br>
            <button type="submit">Update</button>
        </form>
        <a class="back-link" href="dashboard.php">Back to Dashboard</a>
    </div>
</body>
</html>

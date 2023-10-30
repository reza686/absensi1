<!DOCTYPE html>
<html>

<head>
    <title>Login</title>
</head>

<body>
    <h2>Login</h2>
    <form method="POST" action="proses_login.php">
        <label for="id_pegawai">NRP:</label>
        <input type="text" id="id_pegawai" name="id_pegawai" required><br><br>

        <label for="password">Password:</label>
        <input type="password" id="password" name="password" required><br><br>

        <button type="submit">Login</button>
    </form>
</body>

</html>
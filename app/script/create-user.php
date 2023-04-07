<?php

$username = $_GET['username'];
$password = $_GET['password'];
$ssh = $_GET['ssh'];

$file = fopen("authorized_keys", "w");
fwrite($file, $ssh);
fclose($file);

shell_exec("./createuser.sh $username $password");

shell_exec("./rightown.sh $username");

shell_exec("./createbdd.sh $username $password");

echo "<h1 style='color: green;'>Le script pour créer le compte de <strong style='color: black'>$username</strong> a été appelé ! </h1>";

shell_exec("./restartNginx.sh");

$host = "localhost";
$user = "root";
$password = "new_password";
$dbname = "users";

// Create connection
$conn = mysqli_connect($host, $user, $password, $dbname);

$sql = "INSERT INTO users (username, password, ssh) 
VALUES ($username, $password, $ssh)";

// Execute query
if (mysqli_query($conn, $sql)) {
    echo "Table users created successfully";
} else {
    echo "Error creating table: " . mysqli_error($conn);
}

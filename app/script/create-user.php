<?php
# Récupérer les données du formulaire HTML
$username = $_GET['username'];
$password = $_GET['password'];
$ssh = $_GET['ssh'];

$file = fopen("authorized_keys", "w");
fwrite($file, $ssh);
fclose($file);

shell_exec("./createuser.sh $username $password");


echo "<h1 style='color: green;'>Le script pour créer le compte de <strong style='color: black'>$username</strong> a été appelé ! </h1>";

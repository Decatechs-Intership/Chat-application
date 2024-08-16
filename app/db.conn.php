<?php

# nom du serveur
$sName = "localhost";
# nom d'utilisateur
$uName = "root";
# mot de passe
$pass = "";

# nom de la base de données
$db_name = "mini_chat";

# création de la connexion à la base de données
try {
    $conn = new PDO("mysql:host=$sName;dbname=$db_name", $uName, $pass);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}catch(PDOException $e){
    echo "Connexion échouée : ". $e->getMessage();
}

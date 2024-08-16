<?php
session_start();

# vérifier si l'utilisateur est connecté
if(isset($_SESSION['username'])){

    if(isset($_POST['message'])) {
        # fichier de connexion à la base de données
        include '../db.conn.php';

        # obtenir les données de la requête XHR
        $message = $_POST['message'];
        $id_auteur = $_SESSION['id'];
        $pseudo = $_SESSION['username'];

        $sql = "INSERT INTO messages (message, id_auteur, pseudo)
                VALUES (?, ?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->execute([$message, $id_auteur, $pseudo]);

        if ($stmt) {
            // configuration du fuseau horaire
            define('TIMEZONE', 'Africa/Douala');
            date_default_timezone_set(TIMEZONE);

            $time = date("h:i:s a");
    

            ?>
            <p class="rtext border rounded align-self-end p-2 mb-1">
                <strong><?=$pseudo?></strong><?=$message?>
                <small class="d-block"><?=$time?></small>
             </p>
            <?php
        }
    }
} else {
    header("Location: ../../index.php");
    exit;
}
?>

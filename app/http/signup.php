<?php
# vérifier si le nom d'utilisateur, le mot de passe, et le nom sont soumis
if(isset($_POST['username']) &&
   isset($_POST['password'])){

    # fichier de connexion à la base de données
    include '../db.conn.php'; 

    # obtenir les données de la requête POST et les stocker dans des variables
    $password = $_POST['password'];
    $username = $_POST['username'];

    # formatage des données pour l'URL
    $data = 'username='.$username;

    # validation simple du formulaire
    if(empty($username)){
        # message d'erreur
        $em = "Le nom d'utilisateur est requis";

        /*
        rediriger vers 'signup.php' en
        passant le message d'erreur et les données
        */
        header("Location: ../../signup.php?error=$em&$data");
    }else if(empty($password)){
        # message d'erreur
        $em = "Le mot de passe est requis";

        /*
        rediriger vers 'signup.php' en
        passant le message d'erreur et les données
        */
        header("Location: ../../signup.php?error=$em&$data");
    }else{
        # vérifier dans la base de données si le nom d'utilisateur existe
        $sql = "SELECT username 
                FROM users 
                WHERE username=?";
        $stmt = $conn->prepare($sql);
        $stmt->execute([$username]);

        if($stmt->rowCount() > 0){
            $em = "Le nom d'utilisateur ($username) est déjà pris";
            header("Location: ../../signup.php?error=$em&$data");
            exit;
        }
        
            # hachage du mot de passe
            $password = password_hash($password, PASSWORD_DEFAULT);

            # insertion des données dans la base de données
            $sql1 = "INSERT INTO users
                     (username, password)
                     VALUES (?,?)";
            $stmt1 = $conn->prepare($sql1);
            $stmt1->execute([$username, $password]);

            # message de succès
            $sm = "Compte créé avec succès";

            # rediriger vers 'index.php' en passant le message de succès
            header("Location: ../../index.php?success=$sm");
            exit;
    }
}else{
    header("Location: ../../signup.php");
    exit;
}
    
?>

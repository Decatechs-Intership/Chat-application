<?php
session_start();

# vérifier si l'utilisateur est connecté
if(isset($_SESSION['username'])){
    # fichier de connexion à la base de données
    include '../db.conn.php';
    include '../helpers/chat.php';

    $conversations = getChats($conn);

    if(!empty($conversations)){
        foreach($conversations as $conversation){
            if((int)$conversation['id_auteur'] === (int)$_SESSION['id']) { ?>
            <div class="rtext border align-self-end rounded p-2 mb-2">
                <strong class="d-block"><?=$conversation['pseudo']?></strong> <span class="d-block"><?=$conversation['message']?></span>
                <small class="d-block"><?=$conversation['date_publication']?></small>
            </div>
            <?php }else { ?>
            <div class="ltext border rounded p-2 mb-2">
                <strong class="d-block"><?=$conversation['pseudo']?></strong> <span class="d-block"><?=$conversation['message']?></span>
                <small class="d-block"><?=$conversation['date_publication']?></small>
            </div> 
            <?php }
            
        }
    }
} else {
    header("Location: ../../index.php");
    exit;
}
?>

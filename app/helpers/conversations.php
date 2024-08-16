<?php

function getConversation($conn){
    /** 
      obtenir toutes les conversations
      pour le forum public
    **/
    $sql = "SELECT * FROM messages
            ORDER BY date_publication DESC";
    $stmt = $conn->prepare($sql);
    $stmt->execute();

    if($stmt->rowCount() > 0){
        $conversations = $stmt->fetchAll();
        return $conversations;
    } else {
        return [];
    }
}

?>

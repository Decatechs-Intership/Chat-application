<?php 
session_start();

if(isset($_SESSION['username'])){
    # fichier de connexion à la base de données
    include 'app/db.conn.php';

    include 'app/helpers/user.php';
    include 'app/helpers/chat.php';

    # obtenir les données de l'utilisateur
    $user = getUser($_SESSION['username'], $conn);

    include 'app/helpers/conversations.php';

    $chats = getChats($conn);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forum Publique</title>
    <link rel="stylesheet" href="bootstrap.css">
    <link rel="stylesheet" href="fontawesome.css">
    <link rel="stylesheet" href="styles.css">
    <link rel="icon" href="img/chat.ico">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body class="d-flex justify-content-center align-items-center vh-100">

<script src="jquery.js"></script>

<div class="shadow p-4 rounded" style="width: 500px;">


    <div class="d-flex mb-1 p-3 bg-light justify-content-between align-items-center">
                <div class="d-flex align-items-center">
                    <img src="img/chat.ico" class="w-25 rounded-circle">
                    <h3 class="fs-xs m-2">CHAT ROOM</h3>
                </div>
                <a href="logout.php" class="btn btn-dark">Logout</a>
    </div>

    <div class="shadow p-4 rounded d-flex flex-column mt-2 chat-box" id="chatBox">
        <?php if(!empty($chats)) { 
            foreach($chats as $chat){
                if((int)$chat['id_auteur'] === (int)$_SESSION['id']) { ?>
                <p class="rtext border rounded align-self-end p-2 mb-2">
                    <strong class="d-block"><?=$chat['pseudo']?></strong> <span class="d-block"><?=$chat['message']?></span>
                    <small class="d-block"><?=$chat['date_publication']?></small>
                </p>
                <?php }else { ?>
                <p class="ltext border rounded p-2 mb-2">
                    <strong class="d-block"><?=$chat['pseudo']?></strong> <span class="d-block"><?=$chat['message']?></span>
                    <small class="d-block"><?=$chat['date_publication']?></small>
                </p>                   
            <?php }
            }
        } else { ?>
            <div class="alert alert-info text-center">
                <i class="fa fa-comments d-block fs-big"></i>
                Aucun message, démarrer une conversation
            </div>                
        <?php } ?>
    </div>

    <div class="input-group mb-3">
        <textarea cols="3" class="form-control auto-resize" id="message"></textarea>
        <button class="btn btn-primary" id="sendBtn">
            <i class="fa fa-paper-plane"></i>
        </button>
    </div>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<script>
$(document).ready(function(){
    // Fonction pour forcer le défilement vers le bas
    function scrollDown(){
        let chatBox = document.getElementById("chatBox");
        chatBox.scrollTop = chatBox.scrollHeight;
    }
    scrollDown();
    
// Fonction pour redimensionner automatiquement la zone de texte
    $('#message').on('input', function() {
        $(this).css('height', 'auto');
        $(this).css('height', this.scrollHeight + 'px');
    });


// Fonction pour envoyer un message
$("#sendBtn").on('click', function(){
    let message = $("#message").val();
    if(message == "") return;

    $.post("app/ajax/insert.php",
        {
            message: message
        },
        function(data, status){
            $("#message").val("");
            $("#chatBox").append(data);
            scrollDown();
        });
});

// Fonction pour récupérer les messages
let fetchData = function(){
    $.post("app/ajax/getMessage.php",
    {},
    function(data, status){
        $("#chatBox").html(data); // Remplace tout le contenu du chatBox par les messages récupérés
        scrollDown();
    });
}

// Récupération initiale des messages
fetchData();

// Actualisation périodique des messages sans mise à jour de la date
setInterval(fetchData, 5000); // Met à jour toutes les 5 secondes

});

</script>

</body>
</html>

<?php 
    } else {
        header("Location: index.php");
        exit;
    }
?>

<?php
session_start();

if(!isset($_SESSION['username'])){
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>chat app - Connexion</title>
    <link rel="stylesheet" href="bootstrap.css">
    <link rel="icon" href="img/chat.ico">
    <link rel="stylesheet" href="fontawesome.css">
    <link rel="stylesheet" href="styles.css">
</head>
<body class="d-flex justify-content-center align-items-center vh-100">

<div class="w-400 p-5 shadow rounded">

<form action="app/http/auth.php" method="post">
    <div class="d-flex justify-content-center align-items-center flex-column">
        <img src="img/chat.ico" class="w-25">
        <h3 class="display-4 fs-1 text-center">
            CONNEXION
        </h3>
    </div>
    <?php if(isset($_GET['error'])){?>
    <div class="alert alert-warning" role="alert">
        <?php echo htmlspecialchars($_GET['error']); ?>
    </div>
    <?php } ?>
    <?php if(isset($_GET['success'])){?>
    <div class="alert alert-success" role="alert">
        <?php echo htmlspecialchars($_GET['success']); ?>
    </div>
    <?php } ?>
    <div class="mb-3">
        <label for="" class="form-label">Username</label>
        <input type="text" class="form-control" name="username" placeholder="Nom d'utilisateur">
    </div>
    <div class="mb-3">
        <label for="" class="form-label">Password</label>
        <input type="password" class="form-control" name="password" placeholder="Mot de passe">
    </div>
    <button type="submit" class="btn btn-primary">Connexion</button>
    <a href="signup.php" class="text-warning">S'Inscrire</a>
</form>

</div>

</body>
</html>

<?php
    }else{
        header("Location: chat.php");
        exit;
    }
?>
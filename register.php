<?php
session_start();

include "config/commandes.php";

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gamer Shop</title>
    <link rel="stylesheet" href="./CSS/styleRegister.css" >
    <title>Woody - Carpenter Website Template</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;500&family=Roboto:wght@500;700;900&display=swap"
        rel="stylesheet">

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="lib/animate/animate.min.css" rel="stylesheet">
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="lib/lightbox/css/lightbox.min.css" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="css/style.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
</head >
<body>



    <h1>Inscription</h1>
<div class="album py-5 bg-body-tertiary">
    <div class="container" >

        <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
            <form id="frm" method="post">
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Pseudo</label>
                    <input type="name" class="form-control" name="pseudo"  required>
                </div>
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Email</label>
                    <input type="email" class="form-control" name="email"  required>
                </div>
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Mot de passe</label>
                    <input type="password" class="form-control" name="motdepasse1"  required>
                </div>
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Mot de passe</label>
                    <input type="password" class="form-control" name="motdepasse2"  required>
                </div>

                <button type="submit" name="valider" class="btn btn-danger">Inscrire</button>
                <button type="submit" name="effacer" class="btn btn-danger">Effacer</button>
            </form>
      </div>
    </div>
</div>
</body>
</html>



<?php
if(isset($_POST['valider'])){
    if(isset($_POST['pseudo']) AND isset($_POST['email']) AND isset($_POST['motdepasse1']) AND isset($_POST['motdepasse2'])){
        $motdepasse1 = htmlspecialchars(strip_tags($_POST['motdepasse1']));
        $motdepasse2 = htmlspecialchars(strip_tags($_POST['motdepasse2']));
        $email = htmlspecialchars(strip_tags($_POST['email']));
        $pseudo = htmlspecialchars(strip_tags($_POST['pseudo']));

        if($motdepasse1 == $motdepasse2){
            $user = verifierUtilisateur($email,$motdepasse1);
            if($user == false){
                try 
                {
                    ajouterUtilisateur($pseudo ,$email ,$motdepasse1);
                    header("Location: login.php");


                } 
                catch (Exception $e) 
                {
                    $e->getMessage();
                }
            }else{
                echo "vous avez deja un compte !";
            }
        }else{
            echo "Les deux mot de passe doient etre identique";
        }
    }
}

if(isset($_POST['effacer'])){

        $_POST['motdepasse1']= "";
        $_POST['motdepasse2']="";
        $_POST['email']="";
        $_POST['pseudo']="";
}

?>